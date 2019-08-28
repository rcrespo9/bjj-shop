<template>
  <div class="dropdown cart-dropdown">
    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Cart <span class="badge badge-light">{{ itemsCount }}</span>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <div v-if="cart.length">
        <div class="media" v-for="item in cart" :key="item.id">
          <img class="align-self-start img-fluid mr-3" :src="item.image_url" alt="">
          <div class="media-body">
            <p class="mb-1"><strong class="mt-0 mb-1">{{ item.name }}</strong></p>
            <p class="mt-0 mb-1 text-muted">{{ item.price }}</p>
            <p class="mb-1">Quantity: {{ item.quantity }}</p>
            <a href="#" role="button" class="text-danger" @click.prevent="removeItem(item)">Remove</a>
          </div>
        </div>
        <hr>
        <div class="px-3 pb-2">
          <p class="mt-0 mb-1">Total: ${{ totalPrice }}</p>
          <a class="btn btn-primary btn-block" href="#">Checkout</a>
        </div>
      </div>
      <p class="px-3 m-0" v-else>No items in cart.</p>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions, mapGetters } from 'vuex'

export default {
  name: 'ShoppingCart',
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
    this.getCartItems();
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

<style scoped>
  .media img {
    width: 50%;
  }
</style>

