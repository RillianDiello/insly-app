<template>
  <div>
    <div class="content">
      <div class="box" v-if="tableTrue">
        <vue-scrolling-table>
          <template slot="thead">
            <tr>
              <th style="cursor:pointer"></th>
              <th style="cursor:pointer" v-if="itens.totais">{{itens.totais.policy}}</th>

              <th
                style="cursor:pointer"
                v-for="(title,index) in itens.instalments"
                :key="index"
              >{{`${index+1} instalments`}}</th>
            </tr>
          </template>
          <template slot="tbody">
            <tr style="cursor:pointer" v-for="(title,index) in itens.colunms" :key="index">
              <th>{{title}}</th>
              <td>{{itens.totais[index]}}</td>
              <td
                v-for="(instances,parcela) in itens.instalments"
                :key="parcela+instances"
              >{{instances[index]}}</td>
            </tr>
          </template>
        </vue-scrolling-table>
      </div>
    </div>    
  </div>
</template>

<script>
import VueScrollingTable from "vue-scrolling-table";
export default {
  props: ["itens", "policy", "tableTrue"],
  data: function() {
    return {
      maxRows: 6,
      columns: []
    };
  },
  components: {
    VueScrollingTable
  },
  computed: {
		items() {
			return this.allItems.slice(0, this.maxRows)
		},
	},

  methods: {
    setPolicy: function() {
      this.policy = this.itens.totais.policy;
    }
  }
};
</script>
<style>
table.scrolling .w2 {
  width: 20em;
  min-width: 20em;
  max-width: 20em;
}

table.scrolling tfoot tr th {
  width: 130em;
  min-width: 130em;
  max-width: 130em;
}

table.freezeFirstColumn thead tr,
table.freezeFirstColumn tbody tr {
  display: block;
  width: min-content;
}

table.freezeFirstColumn thead td:first-child,
table.freezeFirstColumn tbody td:first-child,
table.freezeFirstColumn thead th:first-child,
table.freezeFirstColumn tbody th:first-child {
  position: sticky;
  position: -webkit-sticky;
  left: 0;
}

* {
  font-family: sans-serif;
}

.box {
  clear: both;
  padding: 0;
  min-height: 400px;
  height: 40vh;
  margin-left: auto;
  margin-right: auto;
  overflow: hidden;
}

@font-face {
  font-family: FontAwesome;
  src: url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff);
}

.fa {
  font-family: FontAwesome;
}
</style>
