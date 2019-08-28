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
            <h5 class="mt-0">{{ item.name }}</h5>
            <p class="text-muted">{{ item.price }}</p>
            <p>Quantity: {{ item.quantity }}</p>
            <button class="btn btn-link text-danger" @click="removeItem(item)">Remove</button>
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
    width: 25%;
  }
</style>

