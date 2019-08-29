<template>
  <div class="media mb-3">
    <img class="align-self-start img-fluid mr-3" :src="item.image_url" alt="">
    <div class="media-body">
      <p class="mb-1"><strong class="mt-0 mb-1">{{ item.name }}</strong></p>
      <p class="mt-0 mb-1 text-muted">{{ item.price }}</p>
      <p class="mb-1">Quantity: {{ item.quantity }}</p>
      <a href="#" role="button" class="text-danger" @click.prevent="onRemoveItem(item)">Remove</a>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  name: 'ShoppingCartItem',
  props: ['item'],
  methods: {
    onRemoveItem(item) {
      this.$emit('remove-product', item);
    }
  }
}
</script>

<style scoped>
  .media img {
    width: 50%;
  }
</style>