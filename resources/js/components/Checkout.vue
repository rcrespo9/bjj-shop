<template>
  <div>
    <div v-for="item in cart" :key="item.id">
      <ShoppingCartItem
        :item="item"
        @remove-product="removeItem"
      />
      <input type="hidden" :name="`product[${item.id}]`" :value="item.id">
      <input type="hidden" :name="`product_${item.id}[quantity]`" :value="item.quantity">
    </div>
    <hr>
    <div>
      <p class="h5 mt-0 mb-3">Total: ${{ totalPrice }}</p>
    </div>
  </div>
</template>

<script>
import ShoppingCartItem from './ShoppingCartItem'
import { mapState, mapActions, mapGetters } from 'vuex'

export default {
  name: 'Checkout',
  components: {
    ShoppingCartItem
  },
  computed: {
    ...mapGetters([
      'itemsCount',
      'totalPrice'
    ]),
    ...mapState([
      'cart'
    ])
  },
  methods: {
    removeItem(item) {
      const itemIdx = this.cart.indexOf(item);
      this.removeCartItem(itemIdx);
    }
  }
}
</script>