import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
// import Login from '../views/Login.vue'
// import Register from '../views/Register.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  
  {
    path: '/Film/:id',
    name: 'Film',
    component: ()=>import(/* webpackChunkName:"Films"*/ '../views/Film.vue')
  },
]

const router = createRouter({

  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router