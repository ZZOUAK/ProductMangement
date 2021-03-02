require('./bootstrap');


// //import Product from './components/Product.vue';
// import ProductForm from './components/ProductForm.vue';
// //import Products from './components/Products.vue';
// new Vue({
//     el : '#app',
//     data : {
//         productApp:[
//             {name : ''},
//            {desciption : ''},
//            {price : ''},
//            {category : ''},
//         ]
//         },
//     components : {  ProductForm}


// });

import Vue from 'vue';
import App from './components/app';


const app = new Vue({
    el : '#app',

    data : {
        old_data: old_data,
        product:
            {name : '',
        desciption : '',
        price : '',
        category : ''}
    },
    components : { App },

    methods : {

    },
    computed :
    {
        isValid() {
            return this.product.name !== '' && this.product.decription !== '' && this.product.price !=='' && this.product.category!=='';
        },

    },
    mounted() {
        if (this.old_data.name) {
            this.product.name=this.old_data.name;
            this.product.price=this.old_data.price;
            this.product.description=this.old_data.description;
            this.product.category=this.old_data.Category;
        }

    },



});
