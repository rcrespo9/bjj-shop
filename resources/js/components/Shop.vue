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
      addToCart(productId, quantity) {
        const selectedProduct = _.find(this.products, { id: productId });
        const formattedQuantity = parseInt(quantity, 10);
        const newProduct = {
          ...selectedProduct,
          quantity: formattedQuantity
        }
        const cart = JSON.parse( localStorage.getItem('fantastic_toys_cart') );
        const productInCart = _.find(cart, { id: newProduct.id });

        if (productInCart) {
          productInCart.quantity += newProduct.quantity;
        } else {
          cart.push(newProduct);
        }

        localStorage.setItem('fantastic_toys_cart', JSON.stringify(cart));
      },
      deleteFromCart() {

      }
    }
  }
</script>
