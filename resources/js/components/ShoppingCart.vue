<template>
  <div class="dropdown">
    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Cart <span class="badge badge-light">{{ itemsCount }}</span>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ShoppingCart',
  data() {
    return {
      items: []
    }
  },
  computed: {
    itemsCount() {
      const totalProductsReducer = (acc, curr) => acc.quantity + curr.quantity;
      let totalProducts = this.items.reduce(totalProductsReducer);
      return totalProducts;
    },
    totalPrice() {
      const totalPriceReducer = (acc, curr) => (parseFloat(acc.price) * acc.quantity) + (parseFloat(curr.price) * curr.quantity);
      let totalPrice = this.items.reduce(totalPriceReducer);
      return totalPrice;
    }
  },
  created() {
    this.getCartItems();
  },
  methods: {
    getCartItems() {
      const cartItems = JSON.parse( localStorage.getItem('fantastic_toys_cart') );
      this.items = cartItems;
    }
  }
}
</script>