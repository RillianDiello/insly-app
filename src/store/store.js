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
    mutations:{
        setCalc(state, calc){
            state.calc = calc;
        }
    },
    actions: {
        makingCalcu({ commit }){
          return http.post(api.url + 'calc', calc)
          .then(( { data } ) => {
            commit('setFilmes', data); 
          })
        }
    }
})