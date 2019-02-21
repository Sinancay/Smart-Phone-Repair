<template>
  <div>
  <main role="main" class="container mt-lg-0">
    <div class="row">
      <div class="col-md-12 blog-main">
        <div class="blog-post">
          <div class="container">
            <h2>Contact</h2>
            <hr>
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" v-model="messages.contact_name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">E-mail</label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="E-mail" v-model="messages.contact_email">
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label for="inputquestion">Message</label>
                    <textarea type="text" class="form-control" id="inputquestion" rows="3" placeholder="ASK HERE" v-model="messages.contact_text"></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-success" @click="sendMessage()">Send Form</button>
            </form>
            <hr>
            <div class="row">
              <div class="col-6">
                <h5>Contact Numbers</h5>
                <p>(+1) 818 888 88 88</p>
                <p>(+1) 888 888 88 88</p>
              </div>
              <div class="col-6">
                <h5>Contact Email</h5>
                <p>sample@info.com</p>
              </div>
            </div>
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
        name: "Contact",
        data(){
          return{
            messages: [],
          }
        },
       methods:{
          sendMessage(){
          let self = this;
          var appForm = self.toFormData(self.messages);
          axios.post('http://localhost/DB/mailbox.php?action=sendmail', appForm)
            .then(function(response){
              if(response.data.error){
                self.errorMessage = response.data.message;
              }
              else{
                self.successMessage = response.data.message;
                self.messages = {};
              }
            });
        },
         toFormData: function(obj){
          var form_data = new FormData();
          for(var key in obj){
            form_data.append(key, obj[key]);
          }
          return form_data;
        },
        },

    }
</script>

<style>

</style>
