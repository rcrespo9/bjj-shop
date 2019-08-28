<template>
  <div class="row">
    <div class="col-md-2">
      Filters Go here
    </div>
    <div class="col-md-10">
      <div class="row">
        <div v-for="product in products" :key="product.id" class="col-sm-3 pb-3">
          <shop-product 
            :item="product"
            @add-product="addToCart"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import ShopProduct from './ShopProduct.vue'

  export default {
    name: 'Shop',
    components: {
      ShopProduct
    },
    data() {
      return {
        products: [],
        filters: {}
      }
    },
    created() {
      this.getProducts();
    },
    methods: {
      getProducts() {
        window.axios.get('/api/products', {
          params: this.filters
        })
          .then(response => {
            this.products = response.data.data;
          })
      },
      addToCart(productId) {
        const selectedProduct = _.find(this.products, { id: productId });
        console.log(selectedProduct);
        console.log('whoa!')
      },
      deleteFromCart() {

      }
    }
  }
</script>
