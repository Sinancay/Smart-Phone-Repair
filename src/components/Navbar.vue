<template>
    <div>
      <div class="container">
        <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
              <router-link class="text-muted" to="/"><p>SMALL LOGO</p></router-link>
            </div>
            <div class="col-4 text-center">
              <router-link class="blog-header-logo text-dark" to="/">PHONE REPAIR SHOP</router-link>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              <a class="text-muted" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
              </a>
              <router-link class="btn btn-sm btn-outline-secondary" to="/login">Admin Login</router-link>
            </div>
          </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
            <router-link class="p-2 text-muted" to="/">Home</router-link>
            <router-link class="p-2 text-muted" to="/about">About Us</router-link>
            <router-link class="p-2 text-muted" to="/process">What is Our Process</router-link>
            <router-link class="p-2 text-muted" to="/price">What is Our Price List</router-link>
            <router-link class="p-2 text-muted" to="/appoitment">Take Appoitment</router-link>
            <router-link class="p-2 text-muted" to="/contact">Contact Us</router-link>
          </nav>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        name: "Navbar"
    }
</script>

<style scoped>

</style>
