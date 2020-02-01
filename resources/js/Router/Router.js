import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from "../components/login/login.vue"
import Signup from "../components/login/signup.vue"
import Forum from "../components/forum/forum.vue"
import Logout from "../components/logout/logout.vue"
import Read from "../components/forum/read.vue"
import Create from "../components/forum/create.vue"
import category from "../components/category/categoryCrud.vue"

const routes = [
    { path: '/login1', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum, name: 'forum' },
    { path: '/question/:slug', component: Read, name: 'read' },
    { path: '/ask', component: Create },
    { path: '/category', component: category },
    
  ]

  const router = new VueRouter({
    routes, // short for `routes: routes`,
    hashbang:false,
    mode:'history'
  })

export default router   