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
                <router-link class="nav-link" to="/admindate">
                  Disable Date
                </router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link active" to="/mails">
                  Mails
                </router-link>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">ADMIN PANEL MESSAGES ({{ mails.length }})</h1>
          </div>
          <table class="table table-fontsize">
            <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Mail Person Name</th>
              <th scope="col">Mail Person Mail</th>
              <th scope="col">Mail Person Text</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="mail in mails">
              <th>{{ mail.id }}</th>
              <th>{{ mail.contact_name }}</th>
              <th>{{ mail.contact_email }}</th>
              <th>{{ mail.contact_text }}</th>
              <th><a v-on:click="selectMail(mail); showDelete();"><i class="fas fa-trash" style="color: #ff6f3e"></i></a></th>
            </tr>
            </tbody>
          </table>
          <modal name="deleteMail">
            <form class="ml-3 mt-lg-5">
              <div class="container align-items-center" align="center" >
                <h5 class="ml-2">Are You Sure Delete</h5>
                  <br>
                  <hr>
              <button type="submit" class="btn btn-sm btn-danger mr-1" @click="delMail(); closeDelete();">Yes</button>
              <button type="submit" @click="closeDelete()" class="btn btn-sm btn-success mr-4">No</button>
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
    name: "Mails",
    data() {
      return {
        mails: [],
        enterMail: {}
      }
    },
    created(){
      this.getMails();
    },
    methods: {
      logout() {
        this.$parent.$data.authenticated = 'false';
        this.$router.replace({ name: "login" });
      },
      getMails: function () {
        let self = this;
        axios.get('http://localhost/DB/mailbox.php')
          .then(function (response) {
            if (response.data.error) {
              this.errorMessage = response.data.message;
            } else {
              self.mails = response.data.contact;
            }
          });
      },
      showDelete () {
        this.$modal.show('deleteMail');
      },
      closeDelete () {
        this.$modal.hide('deleteMail');
      },
      delMail(){
        let self = this;
        var appForm = self.toFormData(self.enterMail);
        axios.post('http://localhost/DB/mailbox.php?action=deletemail', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterMail = {};
              self.getMails();
            }
          });
      },
      selectMail: function(mail){
        this.enterMail = mail;
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

