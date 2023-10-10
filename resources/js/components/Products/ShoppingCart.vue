<template>
	<!-- Modal -->
	<div class="modal fade" id="shopping_cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Cart Items</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<ul>
						<li v-for="itemInfo in uniqueComponentNames" :key="itemInfo.name">
							{{ itemInfo.name }}
							<span>({{ itemInfo.count }})</span>
						</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Understood</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['cart'],
	computed: {
		uniqueComponentNames() {
			const counts = {};
			const uniqueItems = [];

			// Count occurrences of each component name
			this.cart.forEach(item => {
				const name = item.product_name;
				counts[name] = (counts[name] || 0) + 1;
			});

			// Create an array of unique component names and their counts
			for (const name in counts) {
				uniqueItems.push({ name, count: counts[name] });
			}

			return uniqueItems;
		},
	},
};
</script>
