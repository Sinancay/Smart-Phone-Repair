<template>
      <div class="container">
        <main role="main" class="container mt-lg-2">
          <div class="row">
            <div class="col-md-12 blog-main">
              <div class="blog-post">
                <div class="container">
                  <hr>
                  <table class="table">
                    <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Mark</th>
                      <th scope="col">Model</th>
                      <th style="text-align: center" scope="col">Screen Replacement</th>
                      <th style="text-align: center" scope="col">Battery Replacement</th>
                      <th style="text-align: center" scope="col">Other Part Replacement</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr v-for="phone in phones">
                        <th v-if="phone.mark === 'Apple'"><i class="fab fa-apple"></i></th>
                        <th v-else-if="phone.mark === 'Windows'"><i class="fab fa-windows"></i></th>
                        <th v-else><i class="fab fa-android"></i></th>
                        <th> {{ phone.mark }} </th>
                        <th> {{ phone.model }} </th>
                        <th style="text-align: center"> ${{ phone.screen_cost }}  </th>
                        <th style="text-align: center"> ${{ phone.battery_cost }}  </th>
                        <th style="text-align: center"> ${{ phone.other_parts }}  </th>
                      </tr>
                    </tbody>
                  </table>
                  <strong><small>Tax is not include. It will add.</small></strong>
                </div><!-- /.blog-post -->
              </div><!-- /.blog-main -->
            </div><!-- /.row -->
          </div>
        </main>
      </div>
</template>

<script>
  import axios from 'axios';
    export default {
        name: "Price",
      data(){
          return{
            phones: {}
          }
      },
      created(){
          this.getPhones();
      },
      methods:{
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
      }
    }
</script>

<style scoped>

</style>
