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
                <router-link class="nav-link active" to="/user">
                  <span data-feather="home"></span>
                  User
                </router-link>
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
            <h1 class="h2">Users Operation ({{ users.length }})</h1>
          </div>
          <table class="table">
            <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">User Name</th>
              <th scope="col">Password</th>
              <th scope="col">E-Mail</th>
              <th scope="col">Phone</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
              <th>{{ user.id }}</th>
              <th>{{ user.username }}</th>
              <th>{{ user.password }}</th>
              <th>{{ user.email }}</th>
              <th>{{ user.phone }}</th>
              <th><a v-on:click="selectUser(user); showEdit();"><i class="fas fa-edit" style="color: #ffdc66"></i></a></th>
              <th><a v-on:click="selectUser(user); showDelete();"><i class="fas fa-trash" style="color: #ff6f3e"></i></a></th>
            </tr>
            </tbody>
          </table>
          <modal name="createUser">
            <div class="container">
            <form>
              <div class="form-group">
                <h5>Create User</h5>
                <input type="text" class="form-control" placeholder="Enter Username" v-model="newUser.username"><br>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="newUser.password"><br>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="newUser.email"><br>
                <input type="text" class="form-control" placeholder="Phone Number" v-model="newUser.phone"><br>
                <button type="submit" @click="closeCreate()" class="btn btn-sm btn-success float-right">Cancel</button>
                <button type="submit" class="btn btn-sm btn-success float-right mr-2" @click="addUser(); closeCreate();">Create User</button>
              </div>
            </form>
            </div>
          </modal>
          <modal name="editUser">
            <div class="container">
              <form>
                <div class="form-group">
                  <h5>Edit User</h5>
                  <input type="text" class="form-control" placeholder="Enter Username" v-model="enterUser.username"><br>
                  <input type="password" class="form-control" placeholder="Password" v-model="enterUser.password"><br>
                  <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email" v-model="enterUser.email"><br>
                  <input type="text" class="form-control" placeholder="Phone Number" v-model="enterUser.phone"><br>
                  <button type="submit" @click="closeEdit()" class="btn btn-sm btn-success float-right">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-success float-right mr-2" @click="editUser(); closeEdit();">Update User</button>
                </div>
              </form>
            </div>
          </modal>
          <modal name="deleteUser">
              <form class="ml-3 mt-lg-5">
                  <div class="container align-items-center" align="center" >
                    <h5 class="ml-2">Are You Sure Delete</h5>
                     <br>
                     <hr>
                  <button type="submit" class="btn btn-sm btn-danger mr-1" @click="delUser(); closeDelete();">Yes</button>
                  <button type="submit" @click="closeDelete()" class="btn btn-sm btn-success mr-4">No</button>
                </div>
              </form>
          </modal>
          <button type="button" class="btn btn-success float-right" @click="showCreate()">
            Add New User
          </button>
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
        users: [],
        successMessage: "",
        errorMessage: "",
        enterUser: {},
        newUser:{}
      }
    },
    created(){
      this.check();
      this.getUsers();
    },
    methods: {
      logout() {
        this.$parent.$data.authenticated = 'false';
        console.log(this.$parent.$data.authenticated);
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
      showCreate () {
        this.$modal.show('createUser');
      },
      closeCreate () {
        this.$modal.hide('createUser');
      },
      showEdit () {
        this.$modal.show('editUser');
      },
      closeEdit () {
        this.$modal.hide('editUser');
      },
      showDelete () {
        this.$modal.show('deleteUser');
      },
      closeDelete () {
        this.$modal.hide('deleteUser');
      },
      addUser(){
        let self = this;
        var appForm = self.toFormData(self.newUser);
        axios.post('http://localhost/DB/users.php?action=adduser', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterUser = {};
              self.getUsers();
            }
          });
      },
      editUser(){
        let self = this;
        console.log(self.enterUser);
        var appForm = self.toFormData(self.enterUser);
        axios.post('http://localhost/DB/users.php?action=edituser', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterUser = {};
              self.getUsers();
            }
          });
      },
      delUser(){
        let self = this;
        var appForm = self.toFormData(self.enterUser);
        axios.post('http://localhost/DB/users.php?action=deleteuser', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterUser = {};
              self.getUsers();
            }
          });
      },
      check: function(){
        if(this.$parent.$data.authenticated === 'false') {;
          this.$router.replace({ name: "login" });
        }
      },
      selectUser: function(member){
        this.enterUser = member;
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

</style>

