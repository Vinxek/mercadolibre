import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import ProductList from './components/Products/ProductList.vue'

const app = createApp({
	components: {
		ProductList
	}
})

app.component('v-select', vSelect)
app.mount('#app')
