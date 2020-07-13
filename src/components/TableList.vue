<template>
  <div>
    <table class="table table-striped table-hover" v-if="tableTrue">
      <thead>
        <tr>
          <th style="cursor:pointer"></th>
          <th style="cursor:pointer" v-if="itens.totais">{{itens.totais.policy}}</th>
        
          <th style="cursor:pointer" v-for="(title,index) in itens.instalments" :key="index">
              {{`${index+1} instalments`}}              
              </th>
        </tr>
      </thead>

      <tbody>
        
          <tr style="cursor:pointer" v-for="(title,index) in itens.colunms" :key="index">
            <th>{{title}}</th>
            <td>{{itens.totais[index]}}</td>
            <td
              v-for="(instances,parcela) in itens.instalments"
              :key="parcela+instances"
            >{{instances[index]}}</td>
          </tr>
        
       
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["itens", "policy", "tableTrue"],
  data: function() {
    return {      
      columns: []
    };
  },
 
  methods: {
    setPolicy: function (){
      this.policy =  this.itens.totais.policy
    }
  }
  
};
</script>

