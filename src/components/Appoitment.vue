<template>
    <div>
      <main role="main" class="container mt-lg-0">
        <div class="row">
          <div class="col-md-12 blog-main">
            <v-stepper  v-model="e1">
              <v-stepper-header>
                <v-stepper-step step="1"> - Appoitment Time Sheet</v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step step="2"> - Device Info</v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step step="3"> - Personal Information</v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step step="4"> - Check & Confirmation Page</v-stepper-step>
              </v-stepper-header>
              <v-stepper-items>
                <v-stepper-content step="1">
                  <v-card
                    class="mb-5"
                    color="grey lighten-1"
                    height="100%"
                  >
                  <div  class="container">
                   <form action="#" method="post" novalidate="true">
                    <datepicker
                      v-model="appoitment.appoitment_date"
                      :inline="true"
                      calendar-class="col"
                      :disabledDates = disabledDates
                    ></datepicker>
                    <br>
                    <hr>
                    <div class="container" align="center">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <table class="table btn" align="center">
                        <label><strong>Appoitmet Hour Selected : </strong>{{ appoitment.appoitment_hour }}</label>
                          <tbody>
                              <tr>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn">
                                        <input type="radio" name="options" id="option1" value="8:00am - 9:00am" autocomplete="off" v-model="appoitment.appoitment_hour"> 8:00am - 9:00am
                                      </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                        <input type="radio" name="options" id="option2" value="9:00am - 10:00am" autocomplete="off" v-model="appoitment.appoitment_hour"> 9:00am - 10:00am
                                      </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                        <input type="radio" name="options" id="option3" value="10:00am - 11:00am" autocomplete="off" v-model="appoitment.appoitment_hour"> 10:00am - 11:00am
                                      </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                        <input type="radio" name="options" id="option4" value="11:00am - 12:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 11:00am - 12:00pm
                                      </label>
                                </td>
                              </tr>
                              <tr>
                                <td type="ttime" class="table-light" scope="row">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option5" value="12:00pm - 1:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 12:00pm - 1:00pm
                                  </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option6" value="1:00pm - 2:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 1:00pm - 2:00pm
                                  </label>
                                </td>
                                <td type="ttime" class="table-light">
                                 <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option7" value="2:00pm - 3:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 2:00pm - 3:00pm
                                  </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option8" value="3:00pm - 4:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 3:00pm - 4:00pm
                                  </label>
                                </td>
                              </tr>
                              <tr>
                                <td type="ttime" class="table-light" scope="row">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option9" value="4:00pm - 5:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 4:00pm - 5:00pm
                                  </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option10" value="5:00pm - 6:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 5:00pm - 6:00pm
                                  </label>
                                </td>
                                <td type="ttime" class="table-light">
                                 <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option11" value="6:00pm - 7:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 6:00pm - 7:00pm
                                  </label>
                                </td>
                                <td type="ttime" class="table-light">
                                  <label type="ttime" class="btn col mr-5 mb-2">
                                    <input type="radio" name="options" id="option12" value="7:00pm - 8:00pm" autocomplete="off" v-model="appoitment.appoitment_hour"> 7:00pm - 8:00pm
                                  </label>
                                </td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                   </div>
                  <hr>
                </form>
                <hr>
                <div v-if="errors.length>0" class="alert alert-danger">
                    <p>Please Check Form and Try Again</p>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>
                  </div>
                  </v-card>

                 <v-btn
                    color="primary"
                    @click="STEP1"
                  >
                    Next
                  </v-btn>


                </v-stepper-content>

                <v-stepper-content class="btntextcolorhover" step="2">
                  <v-card
                    class="mb-5"
                    color="grey"
                    height="100%"
                    >
                   <div class="container">
                    <form action="#" method="post">
                        <div class="form-group">
                        <label>Select Phone Mark & Model</label>
                        <div class="input-group  mb-3">
                          <select class="custom-select border"   v-model="appoitment.phone_type" id="inputGroupSelect02" required>
                            <option v-for="phone in phones">{{ phone.model }}</option>
                          </select>
                          <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02"></label>
                          </div>
                        </div><br>
                      </div>
                      <div class="form-group">
                        <label>Select Phone Problem</label>
                        <div class="input-group mb-3">
                          <select class="custom-select border" v-model="appoitment.phone_problem" id="inputGroupSelect03" required>
                            <option selected>Choose...</option>
                            <option>Broken Screen</option>
                            <option>Battery</option>
                            <option>Other Parts Repair</option>
                          </select>
                          <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect03"></label>
                          </div>
                        </div><br>
                      </div>
                      <div class="form-group">
                        <label>Another Problem</label>
                        <label><small>(IF you have another problem or you select Other Parts Please note it here for part check)</small></label>
                        <textarea class="form-control custom-select border" style="height: 85px" v-model="appoitment.phone_other" required></textarea>
                      </div>
                      <br>
                      <div v-if="errors.length>0" class="alert alert-danger">
                          <p>Please Check Form and Try Again</p>
                          <ul>
                              <li v-for="error in errors">{{ error }}</li>
                          </ul>
                      </div>
                    </form>
                    </div>
                  </v-card>
                  <v-btn
                    color="primary"
                    @click="STEP2"
                  >
                    Next
                  </v-btn>
                  <v-btn
                    flat
                    type="extra"
                    class="backbtn"
                    @click="e1 = 1"
                  >
                    Previous
                  </v-btn>
                </v-stepper-content>

                <v-stepper-content class="btntextcolorhover" step="3">
                  <v-card
                    class="mb-5"
                    color="grey lighten-1"
                    height="100%"
                  >
                    <div class="container">
                     <form method="post" action="#">
                        <div class="form-group">
                          <label>Name</label><br>
                          <input type="text" class="form-control border" v-model="appoitment.name" placeholder="Enter Name" required><br>
                        </div>
                        <div class="form-group">
                          <label>Surname</label> 
                          <input type="text" class="form-control border"   v-model="appoitment.surname" placeholder="Enter Surname" required><br>
                        </div>
                        <div class="form-group">
                          <label>Adress</label>
                          <input type="textarea" class="form-control border"   v-model="appoitment.adress" placeholder="Enter Adress" required><br>
                        </div>
                        <div class="form-group">
                          <label>Email Adress</label>
                          <input type="email" class="form-control border"   v-model="appoitment.email" aria-describedby="emailHelp" placeholder="Enter E-mail" required><br>
                        </div>
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" class="form-control border" v-model="appoitment.phone" placeholder="Enter Phone Number" required><br>
                        </div>
                        <div class="form-group">
                          <label>Contact Person Name (If Meet Different Person)</label>
                          <input type="text" class="form-control border" v-model="appoitment.contact_person" placeholder="Enter If meet with another person" required><br>
                        </div>
                        <br>
                        <hr>
                        <div v-if="errors.length>0" class="alert alert-danger">
                          <p>Please Check Form and Try Again</p>
                          <ul>
                              <li v-for="error in errors">{{ error }}</li>
                          </ul>
                      </div>
                    </form>
                    </div>
                  </v-card>
                  <v-btn
                    color="primary"
                    @click="STEP3"
                  >
                    Next
                  </v-btn>
                  <v-btn
                    flat
                    type="extra"
                    class="backbtn"
                    @click="e1 = 2"
                  >
                    Previous
                  </v-btn>
                </v-stepper-content>

                <v-stepper-content class="btntextcolorhover" step="4">
                  <v-card
                    class="mb-5"
                    height="100%"
                  >
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <h4>DRIVETOFIX APPOITMENT INFORMATION</h4>
                          <hr><br>
                        </div>
                      </div>
                      <div class="row" style="height: 500px;">
                        <div class="col-7">
                           <div class="row "><h5 class="mt-0"><small><b>Name   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.name }} &nbsp; {{ appoitment.surname }}</label></div><br>
                           <div class="row"><h5 class="mt-0"><small><b>Adress   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.adress }}</label></div><br><br>
                           <div class="row"><h5 class="mt-0"><small><b>Contact Person   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.contact_person }}</label></div><br>
                           <div class="row"><h5 class="mt-0"><small><b>Phone Model & Mark   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.phone_type }}</label></div><br>
                          <div class="row"><h5 class="mt-0"><small><b>Phone Problem   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.phone_problem }}</label></div><br>
                           <div class="row"><h5 class="mt-0"><small><b>Another Problem   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.phone_other }}</label></div><br>
                        </div>
                        <div class="col-5">
                          <div class="row"><h5 class="mt-0"><small><b>Email   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.email }}</label></div><br>
                          <div class="row"><h5 class="mt-0"><small><b>Phone   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.phone }}</label></div><br>
                          <div class="row"><h5 class="mt-0"><small><b>Appoitment Date   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ readabledate }}</label></div><br>
                          <div class="row"><h5 class="mt-0"><small><b>Appoitment Hours   :</b></small></h5>&nbsp;<label style="font-size: 17px">{{ appoitment.appoitment_hour }}</label></div><br><br><br>
                        </div>
                      </div>
                    </div>
                  </v-card>
                  <v-btn
                    color="success"
                    @click="sendAppoitment()"
                    @click.native="showComplete()"
                  >
                    COMPLETE
                  </v-btn>
                  <v-btn
                    flat
                    type="extra"
                    class="backbtn"
                    @click="e1 = 1"
                  >
                    Go Back & Check
                  </v-btn>
                </v-stepper-content>
              </v-stepper-items>
            </v-stepper>
          </div><!-- /.blog-main -->
        </div><!-- /.row -->
         <modal name="complete">
              <form class="ml-3 mt-lg-5">
                  <div class="container align-items-center" align="center" >
                    <h5 class="ml-2">Thank You Appointment is Complete</h5>
                     <br>
                     <hr>
                     <br>
                  <button type="submit" class="btn btn-success mr-1 bg-success " style="height: 45px; color: white;" @click="closeComplete();"> &nbsp;Ok Got It Send Appointment :)&nbsp; </button>
                </div>
              </form>
          </modal>
      </main>
    </div>

</template>

<script>
  import Datepicker from 'vuejs-datepicker';
  import axios from 'axios';
    export default {
        name: "appoitment",
      components: {
        Datepicker
      },
      data(){
          return {
            appoitment: {},
            result: true,
            readabledate: "",
            errors: [],
            e1: 0,
            disdates:[],
            realarraydis:[],
            phones: {},
            disabledDates: {
              
                dates: [ // Disable an array of dates
                ],
                customPredictor: function(dates) {     
              }
            }


          }
      },
      created() {
          this.setDisabledates();
          this.getDeviceName();
      },  
      methods:{
      showComplete () {
        this.$modal.show('complete');
      },
      closeComplete () {
        this.$modal.hide('complete');
        this.$router.push({ name: 'home' })
      },
        sendAppoitment(){
          let self = this;
          var appForm = self.toFormData(self.appoitment);
          axios.post('http://localhost/DB/appoitment.php?action=sendappoitment', appForm)
            .then(function(response){
              if(response.data.error){
                self.errorMessage = response.data.message;
              }
              else{
                self.successMessage = response.data.message;
                self.appoitment = {};
              }
            });
        },
        getDeviceName: function () {
          let self = this;
          axios.get('http://localhost/DB/devices.php?action=devicename')
            .then(function (response) {
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
                self.phones = response.data.devices;
                console.log(self.phones);
              }
            });
        },
       readablbeText: function(){
        var tarihsaat = new Date(this.appoitment.appoitment_date);
        var tarih = ('0' + tarihsaat.getDate()).slice(-2) + '/' + ("0" + (tarihsaat.getMonth() + 1)).slice(-2) + '/' + tarihsaat.getFullYear();
       this.readabledate= tarih;
      },
         setDisabledates: function () {
          let self = this;
          axios.get('http://localhost/DB/disable.php?action=readdates')
            .then(function (response) {
              self.disdates.push(response.data);
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
              for (var i = 0; i < self.disdates[0].datess.length; i++) {
                var tarihsaat = new Date(self.disdates[0].datess[i].datess);
                var tarih = tarihsaat.getFullYear() + ', ' + ("0" + (tarihsaat.getMonth() + 1)).slice(-2) + ', ' + ('0' + tarihsaat.getDate()).slice(-2);
                self.disabledDates.dates.push(new Date(tarih),);
                }
                }
            });
        },
        showConfirm () {
          this.$modal.show('confirmAppoitment');
        },
        closeConfirm () {
          this.$modal.hide('confirmAppoitment');
        },
        selectUser: function(member){
          this.appoitment = member;
        },
        toFormData: function(obj){
          var form_data = new FormData();
          for(var key in obj){
            form_data.append(key, obj[key]);
          }
          return form_data;
        },
        ValidEmail:function(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
       STEP1(e) {
                e.preventDefault();
                this.errors = [];
                if (!this.appoitment.appoitment_date) this.errors.push('You Must Select Appoitment Date');
                if (!this.appoitment.appoitment_hour) this.errors.push('You Must Enter Appoitment Hour');
                if (this.errors.length === 0) {
                  this.readablbeText();
                  this.e1 = 2;
                } else {
                    let msg = '';
                    this.errors.forEach(value => {
                        msg += value + "<br>";
                    });
                }
            },
        STEP2(e) {
                e.preventDefault();
                this.errors = [];
                if (!this.appoitment.phone_type) this.errors.push('You Must Select Phone Mark');
                if (!this.appoitment.phone_problem) this.errors.push('You Must Select Phone Problem');
                if (this.appoitment.phone_problem==="Other Parts Repair" && !this.appoitment.phone_other) this.errors.push('Please Explain Other Problem Short');
                if (this.errors.length === 0) {
                  this.e1 = 3;
                } else {
                    let msg = '';
                    this.errors.forEach(value => {
                        msg += value + "<br>";
                    });
                }
            },
       STEP3(e) {
                e.preventDefault();
                this.errors = [];
                if (!this.appoitment.name) this.errors.push('You Must Enter Name');
                if (!this.appoitment.surname) this.errors.push('You Must Enter Surname');
                if (!this.appoitment.adress) this.errors.push('You Must Enter Adress');
                if (!this.appoitment.phone) this.errors.push('You Must Enter Phone');
                if (!this.appoitment.email){ this.errors.push('You Must Enter E-mail');}
                else if (!this.ValidEmail(this.appoitment.email)) this.errors.push('You Must Enter Valid E-mail');
                console.log(this.errors);
                if (this.errors.length === 0) {
                  this.e1 = 4;
                } else {
                    let msg = '';
                    this.errors.forEach(value => {
                        msg += value + "<br>";
                    });
                }
            },


      }
    

    }
</script>

<style scoped>
  @import '../assets/css/vuetify.min.css';
  
 td[type=ttime]:hover {
  background-color:#4bd; 
  border-color:#4bd; 
  color: white;
  }
  .den label[type=ttime]:focus{
      background-color:#4bd; 
  border-color:#4bd; 
  color: white;
  }
  .btntextcolorhover button[type=extra]:hover {
  color:white;
  background-color:#007bff;
   }
   .backbtn{
    background-color: lightgrey;
   }
</style>
