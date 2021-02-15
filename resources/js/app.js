require('./bootstrap');

import Vue from 'vue';

//import Product from './components/Product.vue';
//import ProductForm from './components/ProductForm.vue';
import Products from './components/Products.vue';
new Vue({
    el : '#app',

    components : { Products }
});

