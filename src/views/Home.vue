<template>
  <page length="12">
    <br />
    <pannel title="Insly Test">
     <span>Developer Test</span>
      
    </pannel>
  </page>
</template>

<script>
import page from "@/components/Page.vue";
import pannel from "@/components/Pannel.vue";

export default {
  name: "home",
  components: {
    page,
    pannel   
  }
};
</script>