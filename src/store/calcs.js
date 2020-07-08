import {http} from '../httpHelper'

export default {
    calc:(calculator) => {
        return http.post('router', calculator)
    }
}