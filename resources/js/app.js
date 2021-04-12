

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { createApp } from 'vue'
import router from './router'
import store from './store'
import App from './views/AppView'
import NProgress from 'nprogress'

NProgress.configure({ showSpinner: false });

const app = createApp(App)

store.dispatch('me').then(() => {
    app.use(router);
    app.use(store);

    app.mount('#app');
});

