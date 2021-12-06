import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/Home.vue'
import LoginPage from '../views/LoginPage.vue'
import RegisterPage from '../views/RegisterPage.vue'

const routes = [
  {
    //routing to home page
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    //routing to login page
    path: '/login',
    name: 'LoginPage',
    component: LoginPage
  },
  {
    //routing to register page
    path: '/register',
    name: 'RegisterPage',
    component: RegisterPage
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
