<template>
  <div v-bind:class="defineColor">
    <div class="panel-heading">{{title}}</div>

    <div class="panel-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "color"],
  computed: {
    defineColor: function() {
      return "panel " + (this.color || "panel-default");
    }
  }
};
</script>

<style media="screen">
.blue {
  border-color: #0b50ce;
}

.blue > .panel-heading {
  color: #f7f7f7;
  background-color: #0b50ce;
  border-color: #0b50ce;
}

.orange {
  border-color: #e85e0d;
}

.orange > .panel-heading {
  color: #f7f7f7;
  background-color: #e85e0d;
  border-color: #e85e0d;
}

.green {
  border-color: #066104;
}

.green > .panel-heading {
  color: #f7f7f7;
  background-color: #066104;
  border-color: #066104;
}
</style>
