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
      const totalProductsReducer = (acc, curr) => acc.quantity + curr.quantity;
      let totalProducts = state.cart.reduce(totalProductsReducer);
      return totalProducts;
    },
    totalPrice: state => {
      const totalPriceReducer = (acc, curr) => (parseFloat(acc.price) * acc.quantity) + (parseFloat(curr.price) * curr.quantity);
      let totalPrice = state.cart.reduce(totalPriceReducer);
      return totalPrice;
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
      state.cart.push(payload)
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
    }
  }
})

export default store;