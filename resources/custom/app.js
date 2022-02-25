// window._ = require('lodash');
// window.events =createApp();
// window.flash = function (message) {
//     window.events.$emit('flash', message);
// }

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import {createApp} from "vue";

import Flash from "./components/Flash.vue";
import Reply from "./components/Reply.vue";

const app = createApp({
    components: {
        Flash,
        Reply
    }
});

app.mount("#app");

