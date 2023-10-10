<template>
	<div class="container">
		<div class="row">
			<div class="col-9">
				<div class="card" style="width: 100%;">
					<div class="card-body" style="display: flex; align-items: center;">
						<img :src="product.file.route" class="card-img-top" alt="..."
							style="width: 250px; height: auto; margin-right: 20px;">
						<div>
							<p class="card-text">{{ product.description }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="card" style="width: 100%;">
					<div class="card-body" style="padding: 20px;">
						<h4 class="card-title " style="margin-bottom: 30px;">{{ product.product_name }}</h4>
						<p class="card-text " style="margin-bottom: 30px;">Free shipping nationwide. Learn about delivery
							times and shipping methods.</p>
						<h5 style="margin-bottom: 50px;">Price {{ formattedPrice }} COP</h5>
						<div class="d-grid gap-2">
							<a href="#" class="btn btn-primary">Buy Now</a>
							<a href="#" class="btn btn-primary mt-2">Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
export default {
	props: ['product'],

	computed: {
		formattedPrice: function () {

			const formatted = new Intl.NumberFormat('es-CO', {
				style: 'currency',
				currency: 'COP',
				minimumFractionDigits: 0,
				maximumFractionDigits: 0,
			}).format(this.product.price);

			return formatted;
		},
	},
};
</script>
