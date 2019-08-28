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
  import { mapActions, mapState } from 'vuex'

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
    computed: mapState([
      'cart'
    ]),
    methods: {
      ...mapActions([
        'addCartItem'
      ]),
      getProducts() {
        window.axios.get('/api/products', {
          params: this.filters
        })
          .then(response => {
            this.products = response.data.data;
          })
      },
      addToCart(productId, quantity) {
        const selectedProduct = _.find(this.products, { id: productId });
        const formattedQuantity = parseInt(quantity, 10);
        const newProduct = {
          ...selectedProduct,
          quantity: formattedQuantity
        }

        this.addCartItem(newProduct);
      }
    }
  }
</script>
