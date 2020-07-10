const DEV = 'http://localhost:8000/';
const PROD = 'http://localhost:8000/';
const url = process.env.NODE_ENV === 'production' ? PROD : DEV;
export default { url } 