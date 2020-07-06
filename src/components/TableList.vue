<template>
  <div>
    
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th
            style="cursor:pointer"           
            v-for="(title,index) in titles"
            :key="index"
          >{{title}}</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(item, index) in list" :key="index">
          <td v-for="el in item" :key="el">{{el}}</td>
          
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: [
    "titles",
    "itens"
    
  ],
   computed: {
    list: function() {
      let list = this.itens;
      return list;
    }
   }
  
  
};
</script>

