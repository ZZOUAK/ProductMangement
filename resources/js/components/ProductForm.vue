<script>

    export default {
        name : 'new_product',
        data() {
            return {
                product:[
                    {name : ''},
                {desciption : ''},
                {price : ''},
                {category : ''}]

            }
        },
        methods: {
            isAnValid() {
                return this.product.name !== '' && this.product.decription !== '' && this.product.price !=='' && this.product.category!=='';
            }
        }
    }
</script>




