<template>
  <div>
  <form class="form-signin" >
    <h1 class="h3 mb-3 font-weight-normal">Sign in Panel</h1>
    <label for="name" class="sr-only">Email address</label>
    <input type="text" id="name" v-model="input.username"  class="form-control" placeholder="Username">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" v-model="input.password" class="form-control" placeholder="Password">
    <div class="checkbox mb-3">
    </div>
    <button class="btn btn-lg btn-primary btn-block" @click="login()" >Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2018-2019 Smart Phone Repair</p>
  </form>
  </div>
</template>

<script>
  import axios from 'axios';
    export default {
        name: "Login",
        data(){
        return {
          input: {
            username: "",
            password: ""
          },
        }
      },
      created(){
        this.getUsernames();
        this.getPass();
      },
      methods: {

        login() {
          var i = 0 ;
          if(this.input.username !== "" && this.input.password !== "") {
            for(i; i<this.usernames.users.length; i++){
            if(this.input.username ===  this.usernames.users[i].username && this.input.password === this.password.users[i].password) {
              this.$parent.$data.authenticated = 'true';
              this.$parent.$data.activeTechnician = this.input.username;
              this.$router.replace({ name: "admin" });

            } else {
              console.log("The username and / or password is incorrect");
            }
            }
          }
          else {
            console.log("A username and password must be present");
          }

        },
        getUsernames: function () {
          let self = this;
          axios.get('http://localhost/DB/users.php?action=username')
            .then(function (response) {
              self.usernames = response.data;
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
                self.users = response.data.users;
              }
            });
        },
        getPass: function () {
          let self = this;
          axios.get('http://localhost/DB/users.php?action=password')
            .then(function (response) {
              self.password = response.data;
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
                self.users = response.data.users;
              }
            });
        }
      }
    }
</script>

<style scoped>
  html,
  body {
    height: 100%;
  }

  body {
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -ms-flex-align: center;
    -ms-flex-pack: center;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    padding-top: 40px;
    padding-bottom: 40px;
  }

  .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }
  .form-signin .checkbox {
    font-weight: 400;
  }
  .form-signin .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

</style>
