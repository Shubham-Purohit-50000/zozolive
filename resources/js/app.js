import './bootstrap';
// import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { Ziggy } from "./ziggy";
// const messaging = firebase.messaging();
import VueChatScroll from "vue-chat-scroll";
// import AgoraRTC from "agora-rtc-sdk-ng";
import { createStore } from "vuex";
import { state, mutations, getters, actions } from "./store/index.js";

const store = createStore({
    state: state,
    mutations: mutations,
    getters: getters,
    actions: actions,
});
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            // .use(AgoraRTC)
            .use(store)
            .use(VueChatScroll)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
// window.Vue.prototype.$messaging = messaging;

// Vue.component("viewer", require("./components/Viewer.vue").default);

InertiaProgress.init({ color: '#4B5563' });
