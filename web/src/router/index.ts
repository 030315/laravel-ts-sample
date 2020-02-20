import Vue from 'vue'
import VueRouter from 'vue-router'

import receive from './receive'
import user from './user'

Vue.use(VueRouter)

const routes = [
  ...receive,
  ...user
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
