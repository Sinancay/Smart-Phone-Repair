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
                <router-link class="nav-link active" to="/devices">
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
            <h1 class="h2">Device Operation  ({{ phones.length }})</h1>
          </div>
          <table class="table">
            <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Mark</th>
              <th scope="col">Model</th>
              <th scope="col">Screen Cost</th>
              <th scope="col">Battery Cost</th>
              <th scope="col">Other Part Cost</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="phone in phones">
              <th>{{ phone.id }}</th>
              <th>{{ phone.mark }}</th>
              <th>{{ phone.model }}</th>
              <th>{{ phone.screen_cost }}$</th>
              <th>{{ phone.battery_cost }}$</th>
              <th>{{ phone.other_parts }}$</th>
              <th><a v-on:click="selectDevice(phone); showEdit();"><i class="fas fa-edit" style="color: #ffdc66"></i></a></th>
              <th><a v-on:click="selectDevice(phone); showDelete();"><i class="fas fa-trash" style="color: #ff6f3e"></i></a></th>
            </tr>
            </tbody>
          </table>
          <modal name="createDevice">
            <div class="container">
              <form>
                <div class="form-group">
                  <h5 class="mt-2">Create Device</h5>
                   <select class="custom-select border" v-model="newDevice.mark" id="inputGroupSelect02" required>
                            <option>Apple</option>
                            <option>Android</option>
                            <option>Windows</option>
                    </select>
                  <input type="text" class="form-control mt-1" placeholder="Device Model" v-model="newDevice.model">
                  <input type="text" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Screen Cost" v-model="newDevice.screen_cost">
                  <input type="text" class="form-control mt-1" placeholder="Battery Cost" v-model="newDevice.battery_cost">
                  <input type="text" class="form-control mt-1" placeholder="Other Parts Cost" v-model="newDevice.other_parts"><br>
                  <button type="submit" @click="closeCreate()" class="btn btn-sm btn-success float-right">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-success float-right mr-2" @click="closeCreate(); addDevice();">Create Device</button>
                </div>
              </form>
            </div>
          </modal>
          <modal name="editDevice">
            <div class="container">
              <form>
                <div class="form-group">
                  <h5 class="mt-2">Edit Device</h5>
                   <select class="custom-select border" v-model="enterDevice.mark" id="inputGroupSelect02" required>
                            <option>Apple</option>
                            <option>Android</option>
                            <option>Windows</option>
                    </select>
                  <input type="text" class="form-control mt-1" placeholder="Device Model" v-model="enterDevice.model">
                  <input type="text" class="form-control mt-1" placeholder="Screen Cost" v-model="enterDevice.screen_cost">
                  <input type="text" class="form-control mt-1" placeholder="Battery Cost" v-model="enterDevice.battery_cost">
                  <input type="text" class="form-control mt-1" placeholder="Other Parts Cost" v-model="enterDevice.other_parts"><br>
                  <button type="submit" @click="closeEdit()" class="btn btn-sm btn-success float-right">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-success float-right mr-2" @click="closeEdit(); editDevice();">Edit Device</button>
                </div>
              </form>
            </div>
          </modal>
          <modal name="deleteDevice">
            <form class="ml-3 mt-lg-5">
              <div class="container align-items-center" align="center" >
                <h5 class="ml-2">Are You Sure Delete</h5>
                  <br>
                  <hr>
              <button type="submit" class="btn btn-sm btn-danger mr-1" @click="delDevice(); closeDelete();">Yes</button>
              <button type="submit" @click="closeDelete()" class="btn btn-sm btn-success mr-4">No</button>
            </div>
            </form>
          </modal>
          <button type="button" class="btn btn-success float-right" @click="showCreate()">
            Add New Device
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
        phones: [],
        successMessage: "",
        errorMessage: "",
        newDevice:{},
        enterDevice: {}
      }
    },
    created(){
      this.check();
      this.getPhones();
    },
    methods: {
      logout() {
        this.$parent.$data.authenticated = 'false';
        console.log(this.$parent.$data.authenticated);
        this.$router.replace({ name: "login" });
      },
      getPhones: function () {
        let self = this;
        axios.get('http://localhost/DB/devices.php')
          .then(function (response) {
            if (response.data.error) {
              this.errorMessage = response.data.message;
            } else {
              self.phones = response.data.devices;
            }
          });
      },
      showCreate () {
        this.$modal.show('createDevice');
      },
      closeCreate () {
        this.$modal.hide('createDevice');
      },
      showEdit () {
        this.$modal.show('editDevice');
      },
      closeEdit () {
        this.$modal.hide('editDevice');
      },
      showDelete () {
        this.$modal.show('deleteDevice');
      },
      closeDelete () {
        this.$modal.hide('deleteDevice');
      },
      addDevice(){
        let self = this;
        var appForm = self.toFormData(self.newDevice);
        axios.post('http://localhost/DB/devices.php?action=newdevice', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterDevice = {};
              self.newDevice = {};
              self.getPhones();
            }
          });
      },
      editDevice(){
        let self = this;
        var appForm = self.toFormData(self.enterDevice);
        axios.post('http://localhost/DB/devices.php?action=editdevice', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterDevice = {};
              self.getPhones();
            }
          });
      },
      delDevice(){
        let self = this;
        var appForm = self.toFormData(self.enterDevice);
        axios.post('http://localhost/DB/devices.php?action=deletedevice', appForm)
          .then(function(response){
            if(response.data.error){
              self.errorMessage = response.data.message;
            }
            else{
              self.successMessage = response.data.message;
              self.enterDevice = {};
              self.getPhones();
            }
          });
      },
      check: function(){
        if(this.$parent.$data.authenticated === 'false') {;
          this.$router.replace({ name: "login" });
        }
      },
      selectDevice: function(member){
        this.enterDevice = member;
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

