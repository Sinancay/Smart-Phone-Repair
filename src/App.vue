<template>
  <div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <div v-if="isAdmin">
      <Navbar></Navbar>
    </div>
        <div class="container">
          <router-view/>
        </div>
    <div v-if="isAdmin">
      <Footer></Footer>
    </div>
  </div>
</template>

<script>
 import Navbar from './components/Navbar'
 import Footer from './components/Footer'

export default {
  name: 'App',
  components:{
    'Navbar': Navbar,
    'Footer': Footer
     },
      data() {
        return {
          isAdmin: true,
          authenticated: 'false',
          activeTechnician: '',
        }
      },
    created() {
      if((this.$route.path === '/login') || (this.$route.path === '/admin') || (this.$route.path === '/user') || (this.$route.path === '/devices' ) || (this.$route.path === '/admindate' ) || (this.$route.path === '/adminapoitment' ) || (this.$route.path === '/mails' )){
          this.isAdmin = false;
      }else if((this.$route.path !== '/login') || (this.$route.path !== '/admin') || (this.$route.path !== '/user') || (this.$route.path !== '/devices') || (this.$route.path !== '/admindate' ) || (this.$route.path !== '/adminapoitment' ) || (this.$route.path !== '/mails' )){
          this.isAdmin = true;
      }
    },
    watch: {
      $route: function () {
              if((this.$route.path === '/login') || (this.$route.path === '/admin') || (this.$route.path === '/user') || (this.$route.path === '/devices') || (this.$route.path === '/admindate' ) || (this.$route.path === '/adminapoitment' ) || (this.$route.path === '/mails' ))
                  {
                    this.isAdmin = false;
                  }
              else if ((this.$route.path !== '/login') || (this.$route.path !== '/admin') || (this.$route.path !== '/user') || (this.$route.path === '/devices') || (this.$route.path !== '/admindate' ) || (this.$route.path !== '/adminapoitment' ) || (this.$route.path !== '/mails' ))
                  {
                    this.isAdmin = true;
                  }
              }
          }
}
</script>

<style scoped>

</style>
