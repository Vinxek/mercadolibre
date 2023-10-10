import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import ProductList from './components/Products/ProductList.vue'
import ProductPage from './components/Products/ProductPage.vue'

const app = createApp({
	components: {
		ProductList,
		ProductPage
	}
})

app.component('v-select', vSelect)
app.mount('#app')
