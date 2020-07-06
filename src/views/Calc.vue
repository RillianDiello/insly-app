<template>
  <page length="12"><br>
    <pannel>
      <formulary id="form-add" css action="#" method="post">
        <div class="form-group">
          <label for="valueOfCar">Estimated value of the Car</label>
          <input
            type="number"
            class="form-control"
            id="titulo"
            name="valueOfCar"
            placeholder="Value between 100 - 100.000 EUR"
          />
        </div>
        <div class="form-group">
          <label for="taxPercent">Tax percent</label>
          <input
            type="number"
            class="form-control"
            id="taxPercent"
            name="taxPercent"
            placeholder="Tax Percentage between (0 - 100) %"
          />
        </div>
        <div class="form-group">
          <label for="numInstalments">Number of instalments</label>
          <input
            type="number"
            class="form-control"
            id="numInstalments"
            name="numInstalments"
            placeholder="Number of instalments between (1 - 12)"
          />
        </div>  
         <span slot="buttons">
          <button form="form-add" class="btn btn-light">Clear</button>
          <button form="form-add" class="btn btn-info">Calculate</button>
        </span>      
      </formulary>
      <tableList v-bind:titlesH="['#', 'Policy', '1 instalment', 'instalment2 instalment']" 
      v-bind:titlesV="['Value', 'Base Premium (11%)', 'Commision (17%)', 'Tax(10%)', 'Total Cost']"     
      >

    </tableList>
    </pannel>
  </page>
</template>
<script>
import page from "@/components/Page.vue";
import pannel from "@/components/Pannel.vue";
import formulary from "@/components/Formulary.vue";
import tableList from "@/components/TableList.vue";
export default {
  name: "calc",
  components: {
    page,
    pannel,
    formulary,
    tableList
  }
};
</script>