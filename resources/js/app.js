require('./bootstrap');

import Vue from 'vue';

import Product from './components/Product.vue';
new Vue({
    el : '#app',

    components : { Product }
})

