<template>
  <page length="12">
    <br />
    <pannel title="TASK 2 - Calculator">
      <br />
      <div>This form corresponding there are tasks 2 and yours activities</div>
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
          <button class="btn btn-light" v-on:click="ResetForm">Clear</button>
          <button class="btn btn-info" v-on:click="CalcularPolicy">Calculate</button>
        </span>
      </div>

      <br />
      <tableList v-bind:itens="itens"></tableList>
    </pannel>
  </page>
</template>
<script>
import page from "@/components/Page.vue";
import pannel from "@/components/Pannel.vue";
import tableList from "@/components/TableList.vue";
import axios from "axios";
import api from "../api";

export default {
  name: "Calc",
  data() {
    return {
      error: { valueOfCar: "*", taxPercent: "*", numInstalments: "*" },
      calculator: { valueOfCar: "", taxPercent: "", numInstalments: "" },
      itens: []
    };
  },
  components: {
    page,
    pannel,
    tableList
  },
  methods: {    
    ResetForm: function() {
      this.calculator.valueOfCar = "";
      this.calculator.taxPercent = "";
      this.calculator.numInstalments = "";
      this.ResetError();
    },
    ResetError: function() {
      this.error.valueOfCar = "*";
      this.error.taxPercent = "*";
      this.error.numInstalments = "*";
    },
    ValidateForm: function() {
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
        this.error.numInstalments = "Invalid value of Numbers of instalments ";
        error++;
      }

      return error === 0;
    },
    CalcularPolicy() {
      if (this.ValidateForm()) {
        const response = axios
          .post(api.url + "/api/make-calc", {
            valueOfCar: this.calculator.valueOfCar,
            taxPercent: this.calculator.taxPercent,
            numInstalments: this.calculator.numInstalments
          })
          .then(({ data }) => {
           if(data.errors.valueOfCar){
              data.errors.valueOfCar[0];
            }if(data.errors.taxPercent){
            this.error.taxPercent = data.errors.taxPercent[0];
            }if(data.errors.numInstalments){
            this.error.numInstalments = data.errors.numInstalments[0];
            }
           
            this.itens = data;
          });
        console.log(response);
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