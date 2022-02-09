// window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import {createApp} from "vue";

import Home from "./components/Button.vue";

const app = createApp({
    components: {
        Home
    }
});

app.mount("#app");
