import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/Home.vue'

const routes = [
  {
    //routing to home page
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    //
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue')
  },
  {
   //routing to login page
   path: '/login',
   name: 'Login',
   component: () => import('../views/Login.vue')
 }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
