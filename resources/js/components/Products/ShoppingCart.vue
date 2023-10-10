<template>
	<!-- Modal -->
	<div class="modal fade" id="shopping_cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Shopping Cart</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">


					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Amount</th>
								<th scope="col">Price</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(itemInfo, index) in uniqueComponentNames" :key="index">
								<td>{{ itemInfo.name }}</td>
								<td>{{ itemInfo.count }}</td>
								<td>{{ formatPrice(getPriceForProduct(itemInfo.name) * itemInfo.count) }}</td>
							</tr>


						</tbody>
					</table>
					<div class="d-flex justify-content-end">
						Total: {{ formatPrice(totalAmount) }}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" @click="clearCart" data-bs-dismiss="modal">Empty
						Shopping Cart</button>
					<button type="button" class="btn btn-primary">Go To Pay</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['cart'],

	data() {
		return {
			totalAmount: 0
		};
	},

	computed: {
		uniqueComponentNames() {
			const counts = {};
			const uniqueItems = [];

			this.cart.forEach(item => {
				const name = item.product_name;
				counts[name] = (counts[name] || 0) + 1;
			});

			for (const name in counts) {
				uniqueItems.push({ name, count: counts[name] });
			}


			this.totalAmount = uniqueItems.reduce((total, itemInfo) => {
				return total + (this.getPriceForProduct(itemInfo.name) * itemInfo.count);
			}, 0);

			return uniqueItems;
		},

	},

	methods: {
		getPriceForProduct(productName) {
			const matchingItem = this.cart.find(item => item.product_name === productName);
			return matchingItem ? matchingItem.price : 'N/A';
		},

		clearCart() {
			this.$store.dispatch('clearCart');
		},

		formatPrice(value) {
			return new Intl.NumberFormat('es-CO', {
				style: 'currency',
				currency: 'COP',
				minimumFractionDigits: 0,
				maximumFractionDigits: 0,
			}).format(value);
		},


	}
};
</script>
