<template>
  <page length="12">
    <br />
    <pannel title="TASK 1 - Name">
     
     <div>
       01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101
        01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110
        01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000
        00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000
        01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000
        01110011
     </div>
     <h2> Translation</h2>
     <div>
       Print out your name with one of php loops:<br>
       This answer is  in a file MyName.php
     </div>
      
    </pannel>
  </page>
</template>

<script>
import page from "@/components/Page.vue";
import pannel from "@/components/Pannel.vue";

export default {
  name: "task1",
  components: {
    page,
    pannel
   
  }
};
</script>