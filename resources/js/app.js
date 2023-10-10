import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';
import store from './store'; // Import your Vuex store

// Components ---------------------------------------------------
import ProductList from './components/Products/ProductList.vue';
import ProductPage from './components/Products/ProductPage.vue';

const app = createApp({
  components: {
    ProductList,
    ProductPage,
  },
});

app.use(store); // Use the Vuex store
app.component('v-select', vSelect);
app.mount('#app');
