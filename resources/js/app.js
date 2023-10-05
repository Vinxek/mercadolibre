import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import TheBookList from './components/Books/TheBookList.vue'

const app = createApp({
	components: {
		ProductList
	}
})

app.component('v-select', vSelect)
app.mount('#app')
