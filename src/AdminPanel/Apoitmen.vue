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
                  <span data-feather="home"></span>
                  Dashboard
                </router-link>
              </li>
              <li class="nav-item active">
                <router-link class="nav-link" to="/user">
                  User
                </router-link>
              </li>
              <li class="nav-item">
                  <router-link class="nav-link active" to="/adminapoitment">
                    Appoitments
                  </router-link>
             </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/devices">
                  Devices
                </router-link>
              </li>
               <li class="nav-item">
                <router-link class="nav-link" to="/admindate">
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
            <h1 class="h2">ADMIN PANEL APPOITMENTS  ({{ appoitments.length }})</h1>
          </div>
          <table class="table table-fontsize">
            <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Adress</th>
              <th scope="col">Phone</th>
              <th scope="col">Contact Person</th>
              <th scope="col">Phone Type</th>
              <th scope="col">Phone Problem</th>
              <th scope="col">Phone Other Problem</th>
              <th scope="col">Appoitment Date</th>
              <th scope="col">Appoitment Hour</th>
              <th scope="col">Appoitment Technician Register</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="appoitment in appoitments">
              <th>{{ appoitment.id }}</th>
              <th>{{ appoitment.name }}</th>
              <th>{{ appoitment.surname }}</th>
              <th>{{ appoitment.adress }}</th>
              <th>{{ appoitment.phone }}</th>
              <th>{{ appoitment.contact_person }}</th>
              <th>{{ appoitment.phone_type }}</th>
              <th>{{ appoitment.phone_problem }}</th>
              <th>{{ appoitment.phone_other }}</th>
              <th>{{ appoitment.appoitment_date }}</th>
              <th>{{ appoitment.appoitment_hour }}</th>
              <th>{{ appoitment.technician }}</th>
              <th><a v-on:click="selectDevice(appoitment); showDelete();"><i class="fas fa-trash" style="color: #ff6f3e"></i></a></th>
              <th><a style="color: gray" v-on:click="selectAdmin(appoitment); showTechnician(appoitment.technician);">Take Job</a></th>
            </tr>
            </tbody>
          </table>
           <div v-if="this.errorTech.length>0" class="alert alert-danger">
                          <p>Please Check Form and Try Again</p>
                          <ul>
                              <li v-for="error in errorTech">{{ error }}</li>
                          </ul>
          </div>
          <modal name="deleteDevice">
            <form class="ml-3 mt-lg-5">
              <div class="container align-items-center" align="center" >
                <h5 class="ml-2">Are You Sure Delete</h5>
                  <br>
                  <hr>
              <button type="submit" class="btn btn-sm btn-danger mr-1" @click="delAppoitment(); closeDelete();">Yes</button>
              <button type="submit" @click="closeDelete()" class="btn btn-sm btn-success mr-4">No</button>
            </div>
            </form>
          </modal>
           <modal name="showTechnician">
            <form class="ml-3 mt-lg-5">
              <div class="container align-items-center" align="center" >
                <h5 class="ml-2">Do You Want Add Technician ({{ this.activeTech }})</h5>
                  <br>
                  <hr>
              <button type="submit" class="btn btn-sm btn-danger mr-1" @click="addTechnician(); closeTechnician();">Yes</button>
              <button type="submit" @click="closeTechnician()" class="btn btn-sm btn-success mr-4">No</button>
            </div>
            </form>
          </modal>
          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    name: "Admin",
    data() {
      return {
        appoitments: [],
        successMessage: "",
        errorMessage: "",
        enterAppoitment: {},
        activeTech: '',
        enterTechnician: {},
        error: [],
        errorTech: [],
      }
    },
    created(){
      this.check();
      this.getAppoitment();
      this.activeTech = this.$parent.$data.activeTechnician;
    },
    methods: {
      logout() {
        this.$parent.$data.authenticated = 'false';
        this.$router.replace({ name: "login" });
      },
      getAppoitment: function () {
        let self = this;
        axios.get('http://localhost/DB/appoitment.php')
          .then(function (response) {
            if (response.data.error) {
              this.errorMessage = response.data.message;
            } else {
              self.appoitments = response.data.appoitment;
            }
          });
      },
      showDelete () {
        this.$modal.show('deleteDevice');
      },
      closeDelete () {
        this.$modal.hide('deleteDevice');
      },
      showTechnician (val){
         if (val.length > 0) {this.errorTech.push('You Have Already Register for Appoitment Technician'); 
         }else {
        this.$modal.show('showTechnician');
       }
      },
       closeTechnician (){
        this.$modal.hide('showTechnician');
      },
      addTechnician(){
        this.enterTechnician.technician =  this.activeTech;
        var appForm = this.toFormData(this.enterTechnician);
        axios.post('http://localhost/DB/appoitment.php?action=sendtechnician', appForm)
          .then(function(response){
            if(response.data.error){
              this.errorMessage = response.data.message;
            }
            else{
            }
          });
      },
      delAppoitment(){
        let self = this;
        var appForm = self.toFormData(self.enterAppoitment);
        axios.post('http://localhost/DB/appoitment.php?action=deleteappoitment', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterAppoitment = {};
              self.getAppoitment();
            }
          });
      },
      check: function(){
        if(this.$parent.$data.authenticated === 'false') {;
          this.$router.replace({ name: "login" });
        }
      },
      selectDevice: function(member){
        this.enterAppoitment = member;
      },
      selectAdmin: function(member){
        this.techCheck = "true";
        this.enterTechnician = member;
      },
      toFormData: function(obj){
        var form_data = new FormData();
        for(var key in obj){
          form_data.append(key, obj[key]);
        }
        return form_data;
      },
    }
  }
</script>

<style scoped>
  .table-fontsize{
    font-size: 10px;
  }
</style>

