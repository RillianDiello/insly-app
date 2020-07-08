import axios from 'axios';

const http = axios.create({
    baseURL: 'http://localhost/app-back/'
  })       
export default http;