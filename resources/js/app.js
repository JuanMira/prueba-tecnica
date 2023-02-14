import './bootstrap';
import '../css/app.css';
import "vue-final-modal/style.css";

import { createApp, h } from 'vue';
import {OhVueIcon, addIcons} from "oh-vue-icons";
import * as FaIcons from "oh-vue-icons/icons/md";
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
const Fa = Object.values({...FaIcons});
addIcons(...Fa);

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('v-icon', OhVueIcon)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
