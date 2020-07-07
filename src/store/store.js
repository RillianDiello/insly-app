import Vuex from 'vuex'
import Vue from 'vue'
import http from '../httpHelper'
import api from '../api'
import { _ } from 'core-js'

Vue.use(Vuex) 

export default new Vuex.Store({ 
    state:{
        calc :{
            valueOfCar:'',
            percent: '',
            instalments: ''
        },
        table:{

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
        makingCalcs({ commit }){
            debugger;
          return http.post(api.url + 'calc', calc)
          .then(( { data } ) => {
            commit('setItens', data); 
          })
        }
    }
})