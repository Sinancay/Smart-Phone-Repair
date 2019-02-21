<template>
  <div>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Smart Phone Admin Panel</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <router-link class="nav-link" to="/login" v-on:click.native="logout()" replace>Sign out</router-link>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <router-link class="nav-link" to="/admin">
                  Dashboard
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/user">
                  User
                </router-link>
              </li>
              <li class="nav-item">
                  <router-link class="nav-link" to="/adminapoitment">
                    Appoitments
                  </router-link>
                </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/devices">
                  Devices
                </router-link>
              </li>
               <li class="nav-item">
                <router-link class="nav-link active" to="/admindate">
                  Disable Date
                </router-link>
              </li>
               <li class="nav-item">
                <router-link class="nav-link" to="/mails">
                  Mails
                </router-link>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Admin Disable Date</h1>
          </div>
              <div class="container">
                <datepicker
                  v-model="disSelected.datess"
                  :inline="true"
                  calendar-class="col"
                ></datepicker>
                <hr>
                <v-btn
                 @click="readablbeText(); showModal(); "
                 class="btn btn-primary"
                 >
                 Disable This Date
                 </v-btn>
              </div><br><br>
              <div class="container">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="disable in del">
                      <td>{{ disable.id }}</td>
                      <td>{{ disable.datess }}</td>
                      <th><a v-on:click="selectDate(disable); showDelete();"><i class="fas fa-trash" style="color: #ff6f3e"></i></a></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            <canvas class="my-4 w-100" id="myChart" width="900" height="380">
          </canvas>
        </main>
      </div>
    </div>
    <modal name="addDisable">
      <div class="container align-items-center" align="center" >
         <form class="ml-3 mt-lg-5">
          <h5 class="ml-2">Are You Sure Disable</h5>
           <label>DATE OF : {{ tarih }}</label> <br>
           <hr>
            <button type="submit" class="btn btn-sm btn-danger mr-1" @click="createDisabledate(); hideModal();">Yes Disable Date</button>
            <button type="submit" @click="hideModal()" class="btn btn-sm btn-success mr-4">No Keep Active</button>
         </form>
      </div>
   </modal>
    <modal name="addDisabledelete">
      <div class="container align-items-center" align="center" >
         <form class="ml-3 mt-lg-5">
          <h5 class="ml-2">Are You Sure Delete Disable</h5>
           <label>DATE OF : {{ selectedDate.datess }}</label> <br>
           <hr>
            <button type="submit" class="btn btn-sm btn-danger mr-1" @click="delDate(); hideModal();">Yes Delete Disable Date</button>
            <button type="submit" @click="hideModal()" class="btn btn-sm btn-success mr-4">No</button>
         </form>
      </div>
   </modal>
  </div>
</template>

<script>
  import axios from 'axios';
  import Datepicker from 'vuejs-datepicker';

  export default {
    name: "Appoitmen",
    components: {
      Datepicker
    },
      data(){
        return {
            disSelected: {},
            dasdate:{},
            tarih:{},
            del:{},
            selectedDate:{}
      }
    },
    created(){
      this.check();
      this.disabledatesall();
    },
      methods:{
        logout() {
        this.$parent.$data.authenticated = 'false';
        console.log(this.$parent.$data.authenticated);
        this.$router.replace({ name: "login" });
      },
      createDisabledate: function(){
      let self = this;
        var appForm = self.toFormData(self.disSelected);
        axios.post('http://localhost/DB/disable.php?action=createdisable', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.disabledatesall();
            }
          });
      },
      disabledatesall(){
          let self = this;
          axios.get('http://localhost/DB/disable.php?action=readdates')
            .then(function (response) {
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
                self.del = response.data.datess;
                self.disabledatesall();
              }
            });
      },
      delDate(){
        let self = this;
        var appForm = self.toFormData(self.selectedDate);
        axios.post('http://localhost/DB/disable.php?action=deletedisable', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.selectedDate = {};
              self.disabledatesall();
            }
          });
      },
      readablbeText: function(){
        var tarihsaat = new Date(this.disSelected.datess);
       this.tarih = ('0' + tarihsaat.getDate()).slice(-2) + '/' + ("0" + (tarihsaat.getMonth() + 1)).slice(-2) + '/' + tarihsaat.getFullYear();
      },
        toFormData: function(obj){
          var form_data = new FormData();
          for(var key in obj){
            form_data.append(key, obj[key]);
          }
          return form_data;
        },
        check: function(){
        if(this.$parent.$data.authenticated === 'false') {
          this.$router.replace({ name: "login" });
        }
       },
      selectDate: function(date){
        this.selectedDate = date;
      },
      showModal () {
        this.$modal.show('addDisable');
      },
      showDelete () {
        this.$modal.show('addDisabledelete');
      },
      hideModal () {
        this.$modal.hide('addDisable');
        this.$modal.hide('addDisabledelete');
      },
      }
    }
</script>

<style scoped>

</style>
