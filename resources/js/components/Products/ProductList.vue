<template>
	<section>
		<div class="container my-5">
			<div class="card">
				<div class="card-header d-flex justify-content-end">
					<div class="btn btn-primary" @click="openModal">Create</div>
				</div>
				<div class="card-body">
					<div class="table-responsive my-4 mx-2">
						<table class="table align-middle mb-0 bg-white" id="product_table">
							<thead class="bg-light">
								<tr>
									<th>Product</th>
									<th>Product Name</th>
									<th>Description</th>
									<th>Category</th>
									<th>Price</th>
									<th>stock</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(product, index) in  products " :key="index">
									<td><img :src="product.file.route" alt="product image"
											style="width: 100px; height: 100px;"></td>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-3">
												<p class="fw-bold mb-1">{{ product.product_name }}</p>
												<!-- <p class="text-muted mb-0">{{ product.description }}</p> -->
											</div>
										</div>
									</td>

									<td>
										<p class="fw-normal mb-1">{{ product.description }}</p>
									</td>

									<td>
										<p class="fw-normal mb-1">{{ product.category.category_name }}</p>
									</td>

									<td>
										<p class="fw-normal mb-1">{{ product.price }}</p>
									</td>
									<td>{{ product.stock }}</td>
									<td>
										<div class="d-flex justify-content-center">
											<button type="button" class="btn btn-warning btn-sm"
												@click="editProduct(product)"><i class="fa-solid fa-pen"
													title="Edit"></i></button>
											<form action="" method="post">
												<button type="button" class="ms-2 btn btn-danger btn-sm"
													@click="deleteProduct(product)" title="delete">
													<i class="fa-solid fa-trash-can"></i>
												</button>
											</form>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div>
				<product-modal :product_data="product" ref="product_modal" />
			</div>
		</div>
	</section>
</template>

<script>
import ProductModal from './ProductModal.vue' //import a child component then register on components below
export default {
	//Any variable writting in here needs to have [this] example this.products
	components: { ProductModal }, //component registration
	name: '',
	props: ['products'],

	created() {
		console.log(this.products)
	},

	data() {
		//These variables are from the template they can be passed to a child using props
		return {
			modal: null,
			product: {}
		}
	},

	mounted() {
		this.index()


	},

	methods: {
		async index() {
			$('#product_table').DataTable()
			const modal_id = document.getElementById('product_modal')
			this.modal = new bootstrap.Modal(modal_id)


			modal_id.addEventListener('hidden.bs.modal', e => {
				this.$refs.product_modal.reset()
			})
		},

		editProduct(product) {
			this.product = product
			this.openModal()
		},

		async deleteProduct({ id }) {
			try {
				await axios.delete(`/products/${id}`)
				window.location.reload()
			} catch (error) {
				console.error(error);
			}
		},
		openModal() {
			this.modal.show()
		}
	}
}
</script>
