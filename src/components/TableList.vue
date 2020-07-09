<template>
  <div>
    
    <table class="table table-striped table-hover">
      <thead>
        
        <tr>
          <th
            style="cursor:pointer"           
            v-for="(title,index) in policy"
            :key="index"
          >{{title}}</th>
          <th
            style="cursor:pointer"           
            v-for="(title,index) in titlesH"
            :key="index"
          >{{title}}</th>
        </tr>
      </thead>

      <tbody>
        <th>
            <tr style="cursor:pointer"           
              v-for="(title,index) in titlesV"
            :key="index"
          >{{title}}</tr>
        </th>
        
        <!-- <tr v-for="(item, index) in list" :key="index">
          <td v-for="el in item" :key="el">{{el}}</td>          
        </tr> -->
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: [
    "policy",
    "titlesH",
    "titlesV",
    "itens",
    
  ],
   computed: {
    list: function() {
      let list = this.itens;
      return list;
    }
   }
};
</script>

