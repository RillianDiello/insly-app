<template>
  <page length="12">
    <br />
    <pannel>
      <br />
      <formulary id="form-add" action="#" method="post">
        <div class="form-group">
          <label for="valueOfCar">
            Estimated value of the Car
            <span class="red-alert">{{error.valueOfCar}}</span>
          </label>
          <input
            type="number"
            class="form-control"
            id="titulo"
            name="valueOfCar"
            v-model="calculator.valueOfCar"
            placeholder="Value between 100 - 100.000 EUR"
          />
        </div>
        <div class="form-group">
          <label for="taxPercent">
            Tax percent
            <span class="red-alert">{{error.taxPercent}}</span>
          </label>
          <input
            type="number"
            class="form-control"
            id="taxPercent"
            name="taxPercent"
            v-model="calculator.taxPercent"
            placeholder="Tax Percentage between (0 - 100) %"
          />
        </div>
        <div class="form-group">
          <label for="numInstalments">
            Number of instalments
            <span class="red-alert">{{error.numInstalments}}</span>
          </label>
          <input
            type="number"
            class="form-control"
            id="numInstalments"
            name="numInstalments"
            v-model="calculator.numInstalments"
            placeholder="Number of instalments between (1 - 12)"
          />
        </div>
        <div>
          <span slot="buttons">
            <button form="form-add" class="btn btn-light" v-on:click="ResetForm">Clear</button>
            <button form="form-add" class="btn btn-info" v-on:click="makeCalcs">Calculate</button>
          </span>
        </div>
      </formulary>
      <br />
      <tableList
        v-bind:titlesH="['#', 'Policy', '1 instalment', 'instalment2 instalment']"
        v-bind:titlesV="['Value', 'Base Premium (11%)', 'Commision (17%)', 'Tax(10%)', 'Total Cost']"
      ></tableList>

      <tableList v-bind:titles="['#', 'Título', 'Descrição', 'Data']"></tableList>
    </pannel>
  </page>
</template>
<script>
import page from "@/components/Page.vue";
import pannel from "@/components/Pannel.vue";
import formulary from "@/components/Formulary.vue";
import tableList from "@/components/TableList.vue";
import { mapActions } from "vuex";
export default {
  name: "MakeCalc",
  data() {
    return {
      error: { valueOfCar: "*", taxPercent: "*", numInstalments: "*" },
      calculator: { valueOfCar: "", taxPercent: "", numInstalments: "" }
    };
  },
  components: {
    page,
    pannel,
    formulary,
    tableList
  },

  methods: {
    ...mapActions(["makingCalcs"]),
    ResetForm: function() {
      this.calculator.valueOfCar = "";
      this.calculator.taxPercent = "";
      this.calculator.numInstalments = "";
    },
    ResetError: function() {
      this.error.valueOfCar = "*";
      this.error.taxPercent = "*";
      this.error.numInstalments = "*";
    },
    ValidateForm: function() {
      debugger;
      var error = 0;
      this.ResetError();
      if (this.calculator.valueOfCar != "") {
        let valueOfCar = parseFloat(this.calculator.valueOfCar);
        if (valueOfCar < 100 || valueOfCar > 100000) {
          this.error.valueOfCar = "Invalid value of Estimated value of the car";
          error++;
        }
      } else {
        this.error.valueOfCar = "Invalid value of Estimated value of the car";
        error++;
      }
      if (this.calculator.taxPercent != "") {
        let taxPercent = parseFloat(this.calculator.taxPercent);
        if (taxPercent < 0 || taxPercent > 100) {
          this.error.taxPercent = "Invalid taxPercent";
          error++;
        }
      } else {
        this.error.taxPercent = "Invalid taxPercent";
        error++;
      }
      if (this.calculator.numInstalments != "") {
        let numInstalments = parseInt(this.calculator.numInstalments);
        if (numInstalments < 1 || numInstalments > 12) {
          this.error.numInstalments =
            "Invalid value of Numbers of instalments ";
          error++;
        }
      } else {
        this.error.taxPercent = "Invalid value of Numbers of instalments ";
        error++;
      }

      return error === 0;
    },
    makeCalcs() {
      debugger;
      let erros = this.ValidateForm()
      if (this.ValidateForm()) {
        this.makingCalcs(this.calculator).then(({ data }) => {
          alert(data);
        });
      }
    }
  }
};
</script>
<style>
.red-alert {
  color: red;
  font-size: 0.9em;
}
</style>