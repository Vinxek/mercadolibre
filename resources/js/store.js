// store.js
import { createStore } from 'vuex';

const savedCart = JSON.parse(localStorage.getItem('cart')) || [];

const store = createStore({
  state: {
    cart: savedCart
  },
  mutations: {
    addToCart(state, product) {
		state.cart.push(product);
		localStorage.setItem('cart', JSON.stringify(state.cart));
	  }
  },
  actions: {
    addProductToCart({ commit }, product) {
		commit('addToCart', product);
	  },
  },
  getters: {
    getCart(state) {
		return state.cart;
	  },
  },
});

export default store;
