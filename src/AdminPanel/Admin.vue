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
                <router-link class="nav-link active" to="/admin">
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
                <router-link class="nav-link" to="/mails">
                  Mails
                </router-link>
              </li>
            </ul>
          </div>
        </nav>

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Admin Dashboard</h1>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <router-link style="color: #898579" class="ml-lg-5" to="/user"><i class="fas fa-users fa-6x"></i></router-link><br>
                  <h5 style="color: #898579" align="center"><small><strong>Users Operation</strong></small></h5>
                </div>
                <div class="col-sm">
                  <router-link style="color: #898579" class="ml-5" to="/adminapoitment"><i class="fas fa-calendar-check fa-6x"></i></router-link><br>
                  <h5 style="color: #898579" class="ml-4"><small><strong>Appoitments</strong></small></h5>
                </div>
                <div class="col-sm">
                  <router-link style="color: #898579" class="ml-5" to="/devices"><i class="fas fa-mobile fa-6x"></i></router-link><br>
                  <h5 style="color: #898579" class="ml-0"><small><strong>Device Operation</strong></small></h5>
                </div>
                <div class="col-sm">
                 <router-link style="color: #898579" to="/admindate" class="ml-4"><i class="fas fa-calendar-times fa-6x"></i></router-link><br>
                  <h5 style="color: #898579" class="ml-2"><small><strong>Disable Dates</strong></small></h5>
                </div>
                <div class="col-sm">
                  <router-link style="color: #898579" to="/mails"><i class="fas fa-envelope fa-6x"></i></router-link><br>
                  <h5 style="color: #898579" class="ml-2"><small><strong>MailBox</strong></small></h5>
                </div>
              </div>
            </div>
            <canvas class="my-4 w-100" id="myChart" width="900" height="380">

            </canvas>
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
          users: [],
          errorMessage: "",
        }
      },
      created(){
        this.check();
        this.getUsers();
      },
      methods: {
        logout() {
          this.$parent.$data.authenticated = 'false';
          this.$router.replace({ name: "login" });
        },
        getUsers: function () {
          let self = this;
          axios.get('http://localhost/DB/users.php')
            .then(function (response) {
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
                self.users = response.data.users;
              }
            });
        },
        check: function(){
          if(this.$parent.$data.authenticated === 'false') {
            this.$router.replace({ name: "login" });
          }
        },
      }
    }
</script>

<style scoped>

</style>
