import Vuex from 'vuex'
import Vue from 'vue'


Vue.use(Vuex) 

export default new Vuex.Store({ 
    state:{
        calc :{
            valueOfCar:'',
            percent: '',
            instalments: ''
        },
      
        table:{
            totals: '',
            instalments: []
        }
    },
    actions:{

    },
    mutations:{
        setCalc(state, calc){
            state.calc = calc;
        },
        setItens(state, itens){
            state.itens = itens
        }
    },
    actions: {
        makingCalcs( calc){
            debugger;
           console.log(calc);
          
        },
        
    }
})
