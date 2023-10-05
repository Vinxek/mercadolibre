<template>
	<section>
		<div class="container my-5">
			<div class="card">
				<div class="card-header d-flex justify-content-end">
					<a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
				</div>
				<div class="card-body">
					<div class="table-responsive my-4 mx-2">
						<table class="table align-middle mb-0 bg-white" id="product_table">
							<thead class="bg-light">
								<tr>
									<th>Product Name</th>
									<th>description</th>
									<th>Price</th>
									<th>stock</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(product, index) in products" :key="index">
									<td>
										<div class="d-flex align-items-center">
											<img
												src="https://api.dicebear.com/7.x/icons/svg?seed=Peanut"
												alt="avatar"
												style="width: 45px; height: 45px"
												class="rounded-circle"
											/>
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
										<p class="fw-normal mb-1">{{ product.price }}</p>
									</td>
									<td>{{ product.stock }}</td>
									<td>
										<div class="d-flex">
											<a href="" class="btn btn-warning btn-sm"
												><i class="fa-solid fa-user-pen"></i
											></a>
											<form action="" method="post">
												<button class="ms-2 btn btn-danger btn-sm">
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
		</div>
	</section>
</template>

<script>
	export default {
		//Any variable writting in here needs to have [this] example this.products
		name: '',
		props: ['products'],

		created() {
			console.log(this.products)
		},

		mounted() {
			this.index()
		},

		methods: {
			async index() {
				$('#product_table').DataTable()
			}
		}
	}
</script>
