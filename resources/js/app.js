require('./bootstrap');
import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';
import Home from '../js/components/Home.vue';
import CustomerList from '../js/components/CustomerList.vue';
import AddCustomer from '../js/components/AddCustomer';

//Sweet alert 2
import VueSweetAlert2 from 'vue-sweetalert2';
window.Swal = require('sweetalert2');
Vue.use(VueSweetAlert2);

import utils from './helpers/utilities';
Vue.prototype.$utils = utils;

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

const routes = [
    {
        name: '/',
        path: '/',
        component: Home
    },
    {
        name: '/customers',
        path: '/customers',
        component: CustomerList
    },
    {
        name: '/add_customer',
        path: '/add_customer',
        component: AddCustomer
    }
]

const router = new VueRouter({mode: 'history', routes: routes});
const app =  new Vue({ el: '#app', router, render: h => h(App) })
