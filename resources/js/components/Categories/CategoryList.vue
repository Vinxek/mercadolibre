<template>
	<section>
		<div class="container my-5">
			<div class="card">
				<div class="card-header d-flex justify-content-end">
					<div class="btn btn-primary" @click="openModal">Create</div>
				</div>
				<div class="card-body">
					<div class="table-responsive my-4 mx-2">
						<table class="table align-middle mb-0 bg-white" id="category_table">
							<thead class="bg-light">
								<tr>
									<th>Category</th>
									<th class="d-flex justify-content-end">Options</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(category, index) in categories_data" :key="index">
									<td>
										<p class="fw-normal mb-1">{{ category.category_name }}</p>
									</td>
									<td>
										<div class="d-flex justify-content-end">
											<button type="button" class="btn btn-warning btn-sm"
												@click="editCategory(category)">
												<i class="fa-solid fa-pen" title="Edit"></i>
											</button>
											<form action="" method="post">
												<button type="button" class="ms-2 btn btn-danger btn-sm" @click=""
													title="delete">
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
			<div> <category-modal :category_data="category" /></div>
		</div>
	</section>
</template>

<script>
import CategoryModal from './CategoryModal.vue';
export default {

	components: { CategoryModal },

	props: ["categories_data"],
	data() {
		return {
			modal: null,
			category: {}
		}
	},

	created() {
		console.log(this.categories_data);
	},

	mounted() {
		this.index()
	},

	methods: {
		async index() {
			$('#category_table').DataTable()
			const modal_id = document.getElementById('category_modal')
			this.modal = new bootstrap.Modal(modal_id)
		},

		editCategory(category) {
			this.category = category
			console.log(this.category)
			this.openModal()
		},
		async deleteCategory({ id }) {
			try {
				await axios.delete(`/categories/${id}`)
				window.location.reload()
			} catch (error) {
				console.error(error);
			}
		},
		openModal() {
			this.modal.show()
		}
	}
};
</script>

<style></style>
