<template>
    <div>
    <!-- <table>
    <thead>
      <tr>
            <th>Image</th>
            <th @click="sort('name')">Name</th>
            <th @click="sort('description')">Description</th>
            <th @click="sort('price')">Price</th>
            <th>category</th>

      </tr>
    </thead>
    <tbody>
      <tr v-for="product in sortedProducts" v-bind:key="product.id">
        <td>{{product.image}}</td>
        <td>{{product.name}}</td>
        <td>{{product.description}}</td>
        <td>{{product.price}}</td>
        <td>{{product.category}}</td>
      </tr>
    </tbody>
  </table> -->
        <div v-for="(product,index) in products" :key="index">
              <product
              :product="product"
              class="product"
              />
        </div>

    </div>
</template>
<script>
import Product from './Product'
export default {
    props : ['products'],

    components : {Product}
}
</script>
