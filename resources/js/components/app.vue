<template>
    <div class="productListContainer">
        <products :products='server_data'/>

    </div>
</template>

<script>
import Products from './Products.vue'
export default {
  props : ['server_data'],
  components: { Products },


}



</script>
