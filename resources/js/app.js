require('./bootstrap');
window.Vue = require('vue');
//import Vue from 'vue';

//import Product from './components/Product.vue';
import ProductForm from './components/ProductForm.vue';
//import Products from './components/Products.vue';
new Vue({
    el : '#app',
    data : {
        productApp:[
            {name : ''},
           {desciption : ''},
           {price : ''},
           {category : ''},
        ]
        },
    components : {  ProductForm}


});

