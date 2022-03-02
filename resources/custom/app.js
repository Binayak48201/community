require('./bootstrap');


import { createApp } from "vue";

import mitt from 'mitt';

const emitter = mitt();

import Flash from "./components/Flash.vue";
import RepliesView from "./pages/RepliesView.vue";
import Favourite from "./components/Favourite";

const app = createApp({
    components: {
        Flash,
        RepliesView,
        Favourite
    }
});

app.config.globalProperties.emitter = emitter;
app.mount("#app");
