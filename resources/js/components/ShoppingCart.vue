<template>
  <div class="dropdown cart-dropdown">
    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Cart <span class="badge badge-light">{{ itemsCount }}</span>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <div v-if="cart.length">
        <ShoppingCartItem
          v-for="item in cart" 
          :key="item.id" 
          :item="item"
          @remove-product="removeItem"
        />
        <hr>
        <div class="px-3 pb-2">
          <p class="mt-0 mb-1">Total: ${{ totalPrice }}</p>
          <a class="btn btn-primary btn-block" href="/checkout">Checkout</a>
        </div>
      </div>
      <p class="px-3 m-0" v-else>No items in cart.</p>
    </div>
  </div>
</template>

<script>
import ShoppingCartItem from './ShoppingCartItem.vue'
import { mapState, mapActions, mapGetters } from 'vuex'

export default {
  name: 'ShoppingCart',
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
  created() {
    const isCartEmpty = localStorage['fantastic_toys_cart'].length;

    if (!!isCartEmpty) {
      this.getCartItems();
    }
  },
  methods: {
    ...mapActions([
      'getCartItems',
      'removeCartItem'
    ]),
    removeItem(item) {
      const itemIdx = this.cart.indexOf(item);
      this.removeCartItem(itemIdx);
    }
  }
}
</script>

