<template>
  <form
    v-bind:class="css"
    v-bind:action="action"
    v-bind:method="defineMethod"
    v-bind:enctype="enctype"
  >
    <input type="hidden" name="_method" />
    <input v-if="token" type="hidden" name="_token" v-bind:value="token" />
    <slot></slot>
  </form>
</template>

<script>
export default {
  props: ["css", "action", "method", "enctype", "token"],
  data: function() {
    return {
      urlPost: "http://localhost/insly-app/app-back/Router.php"
    };
  }, 
  computed: {
    defineMethod: function() {
      if (
        this.method.toLowerCase() == "post" ||
        this.method.toLowerCase() == "get"
      ) {
        return this.method.toLowerCase();
      }

      return "post";
    }
  }
};
</script>
