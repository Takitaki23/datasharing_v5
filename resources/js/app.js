/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import NavigationComponent from './components/NavigationComponent.vue'
import FooterComponent from './components/FooterComponent.vue'
import DashboardMain from './dashboard_resources/saso/DashboardMain.vue'
import router from './routes';
// import Toast from "vue-toastification";
// Import the CSS or use your own!
// import "vue-toastification/dist/index.css";
import $ from 'jquery';
window.$ = window.jQuery = $;

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    components:{
        NavigationComponent,
        FooterComponent,
        DashboardMain 
    }
});



// app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
 
// import VToaster from 'v-toaster'
 
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-default.css';

import Vue3Signature from "vue3-signature"

import {LoadingPlugin} from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';
// import 'vue-toast-notification/dist/theme-bootstrap.css';



app.use(router).use(ToastPlugin).use(Vue3Signature).use(LoadingPlugin).mount('#app');
