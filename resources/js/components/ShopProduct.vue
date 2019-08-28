<template>
  <div class="card">
    <img class="img-fluid" :src="item.image_url" alt="">
      <div class="card-body">
          <h4 class="h5">{{ item.name }}</h4>
          <p class="card-subtitle text-muted">${{ item.price }}</p>
          <label for="quantity">Quantity</label>
          <input class="form-control" type="number" name="quantity" id="quantity" v-model="quantity">
          <button class="btn btn-primary" @click="onAddToCart(item.id)">Add to Cart</button>
      </div>
  </div>
</template>

<script>
export default {
  name: 'ShopProduct',
  props: ['item'],
  data() {
    return {
      quantity: ''
    }
  },
  methods: {
    onAddToCart(itemId) {
      this.$emit('add-product', itemId, this.quantity)
    }
  }
}
</script>