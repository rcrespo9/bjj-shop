<template>
  <div class="card">
    <img class="img-fluid" :src="item.image_url" alt="">
      <div class="card-body">
          <h4 class="h5 mb-3">{{ item.name }}</h4>
          <p class="card-subtitle text-muted mb-2">${{ item.price }}</p>
          <p class="card-subtitle mb-2">Category: {{ item.category.name }}</p>
          <label for="quantity">Quantity</label>
          <input class="form-control mb-3" type="number" name="quantity" id="quantity" v-model="quantity" min="1">
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
      quantity: 1
    }
  },
  methods: {
    onAddToCart(itemId) {
      this.$emit('add-product', itemId, this.quantity)
    }
  }
}
</script>