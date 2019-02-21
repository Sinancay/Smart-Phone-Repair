// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './assets/css/blog.css'
import './assets/css/dashboard.css'
import VueHolder from 'vue-holderjs'
import Popper from 'vue-popperjs'
import VModal from 'vue-js-modal'
import Vuetify from 'vuetify'



Vue.use(Vuetify);
Vue.use(VModal);
Vue.use(VueHolder);
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: {
       App,
      'popper': Popper
  },
  template: '<App/>'
})
