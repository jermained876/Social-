import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from "../components/login/login.vue"

const routes = [
    { path: '/login1', component: Login },
    
  ]

  const router = new VueRouter({
    routes, // short for `routes: routes`,
    hashbang:false,
    mode:'history'
  })

export default router   