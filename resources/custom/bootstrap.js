window._ = require('lodash');

window.axios = require('axios');

axios.defaults.baseURL = 'http://127.0.0.1:8000';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

