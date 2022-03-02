window._ = require('lodash');

window.axios = require('axios');

axios.defaults.baseURL = 'http://community.test';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

