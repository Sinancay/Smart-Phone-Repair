import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import AboutUs from '@/components/AboutUs'
import Appoitment from '@/components/Appoitment'
import Contact from '@/components/Contact'
import Process from '@/components/Process'
import Admin from '@/AdminPanel/Admin'
import Login from '@/AdminPanel/Login'
import User from '@/AdminPanel/User'
import Price from '@/components/Price'
import Devices from '@/AdminPanel/Devices'
import Dissable from '@/AdminPanel/Dissable'
import Apoitmen from '@/AdminPanel/Apoitmen'
import Mails from '@/AdminPanel/Mails'


Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: AboutUs
    },
    {
      path: '/appoitment',
      name: 'appoitment',
      component: Appoitment
    },
    {
      path: '/contact',
      name: 'contact',
      component: Contact
    },
    {
      path: '/process',
      name: 'process',
      component: Process
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/admin',
      name: 'admin',
      component: Admin
    },
    {
      path: '/user',
      name: 'user',
      component: User
    },
    {
      path: '/price',
      name: 'price',
      component: Price
    },
    {
      path: '/devices',
      name: 'devices',
      component: Devices
    },
    {
      path: '/admindate',
      name: 'admindate',
      component: Dissable
    },
    {
      path: '/adminapoitment',
      name: 'adminapoitment',
      component: Apoitmen
    },
    {
      path: '/mails',
      name: 'mails',
      component: Mails
    },
  ]
})
