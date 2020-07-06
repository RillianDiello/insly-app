import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

const generateRoute = componentName => {
  return {
    path: `/${componentName.toLowerCase()}`,
    name: componentName.toLowerCase(),
    component: () => import(/* webpackChunkName: "[request]" */ `./views/${componentName}.vue`)
  }
}

function loadRoutes () {
    
  const response = require.context('./views', true, /^((?!vue).)*$/, 'lazy')
  return response.keys()
    .map(item => item.replace('./', '')) 
    .filter(item => item !== 'Home') 
    .map(generateRoute) 
}

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    ...loadRoutes()
  ]
})