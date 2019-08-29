<template>
  <div class="row">
    <div class="col-md-2">
      <h2 class="h3">Filters</h2>
      <div class="form-group">
        <label for="name">Search for toy</label>
        <input class="form-control" type="text" v-model="filters.name">
      </div>
      <div class="mb-3">
        <label for="sort-price">Sort By Price</label>
        <select class="form-control" name="sort-price" id="sort-price" v-model="filters.price_order">
          <option value="">Select order</option>
          <option value="desc">High to Low</option>
          <option value="asc">Low to High</option>
        </select>
      </div>
      <fieldset>
        <legend class="h5">Categories</legend>
        <div v-for="category in categories" :key="category.id">
          <input type="checkbox" :name="category.name" :id="category.name" :value="category.id" v-model="filters.category">
          <label :for="category.name">{{ category.name }}</label>
        </div>
      </fieldset>
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
    props: ['categories'],
    data() {
      return {
        products: [],
        filters: {
          category: []
        }
      }
    },
    created() {
      this.debouncedGetProducts = _.debounce(this.getProducts, 500);
      this.getProducts();
    },
    watch: {
      filters: {
        handler() {
          this.debouncedGetProducts();
        },
        deep: true
      }
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
