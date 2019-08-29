import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  strict: true,
  state: {
    cart: []
  },
  getters: {
    itemsCount: state => {
      const totalItemsReducer = (acc, curr) => acc + curr.quantity;
      const itemsSum = state.cart.reduce(totalItemsReducer, 0);
      return itemsSum;
    },
    totalPrice: state => {
      const totalPriceReducer = (acc, curr) => acc + (parseFloat(curr.price) * curr.quantity);
      let totalPrice = state.cart.reduce(totalPriceReducer, 0);
      return totalPrice.toFixed(2);
    }
  },
  mutations: {
    UPDATE_CART (state, payload) {
      state.cart = payload;
    },
    UPDATE_CART_ITEM_QTY (state, payload) {
      state.cart[payload.idx].quantity += payload.quantity; 
    },
    ADD_ITEM_TO_CART (state, payload) {
      state.cart.push(payload);
    },
    REMOVE_ITEM_FROM_CART (state, payload) {
      state.cart.splice(payload, 1);
    }
  },
  actions: {
    updateCart({ state, dispatch }) {
      localStorage.setItem('fantastic_toys_cart', JSON.stringify(state.cart));
      dispatch('getCartItems');
    },
    getCartItems ({ commit }) {
      const cart = JSON.parse( localStorage.getItem('fantastic_toys_cart') );

      commit('UPDATE_CART', cart);
    },
    addCartItem({ commit, dispatch, state }, newItem) {
      const productInCart = _.find(state.cart, {
          id: newItem.id
      });

      if (productInCart) {
        const idx = state.cart.indexOf(productInCart);
        const quantity = newItem.quantity;
        const updatedProductDetails = {
          idx,
          quantity 
        }

        commit('UPDATE_CART_ITEM_QTY', updatedProductDetails);
        dispatch('updateCart');
      } else {
        commit('ADD_ITEM_TO_CART', newItem);
        dispatch('updateCart');
      }

      const $cartDrop = $('.cart-dropdown');
      const $cartDropLink= $cartDrop.find('#dropdownMenuLink');
      const $cartDropMenu = $cartDrop.find('.dropdown-menu');
      
      $cartDrop.addClass('show');
      $cartDropMenu.addClass('show');
      $cartDropLink.attr('aria-expanded', true);
    },
    removeCartItem({ commit, dispatch }, item) {
      commit('REMOVE_ITEM_FROM_CART', item);
      dispatch('updateCart');
    }
  }
})

export default store;