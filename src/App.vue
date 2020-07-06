<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/insly.png">
    <div id="nav">
      <router-link to="/">Home</router-link> |

      <router-link v-for="(view, index) in getViews()"
        :key="`route-link-${index}`"
        :to="`/${view.toLowerCase()}`">
          {{ view }}
          <span v-if="index !== getViews().length - 1"> | </span>
      </router-link>
    </div>
    <router-view/>
  </div>
</template>

<script>
const response = require.context('./views', true, /^((?!vue).)*$/, 'lazy')
export default {
  methods: {
    getViews () {
      return response.keys()
        .map(item => item.replace('./', ''))
        .filter(item => item !== 'Home')
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}


</style>
