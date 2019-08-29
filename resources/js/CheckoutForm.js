export default {
  checkoutFormSubmit() {
    const $checkoutForm = $('.checkout-form');
    $checkoutForm.on('submit', (e) => {
      if (localStorage.getItem('fantastic_toys_cart') === null) {
        alert('Cart is empty!');
        e.preventDefault();
      } else {
        localStorage.setItem('fantastic_toys_cart', '');
      }
    });
  },

  init() {
    $(document).ready(() => {
      this.checkoutFormSubmit();
    });
  }
}