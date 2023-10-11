<template>
	<section class="d-flex flex-wrap justify-content-center">

		<div class="card d-flex card mx-2 my-3 card_size flex-wrap justify-content-center" v-for="product in products_data"
			:key="product.id">
			<img :src="product.file.route" class="card-img-top" alt="product image">
			<div class="card-body">
				<h5 class="card-title">{{ product.product_name }}</h5>
				<p class="card-text">{{ product.description }}</p>
				<p class="card-text">Price: ${{ product.price }}</p>
				<p class="card-text">Stock: {{ product.stock }}</p>
			</div>
		</div>

	</section>
</template>

<script>

export default {
	props: ['products_data'],
	data() {

	},

	mounted() {
		console.log("debug", this.products_data)
	},

}
</script>

<style></style>
