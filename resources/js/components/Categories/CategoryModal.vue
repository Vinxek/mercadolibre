<template>
	<!-- Modal -->
	<div class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						{{ is_create ? "Create " : "Edit " }} Category
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- formulario -->
				<Form :validation-schema="schema" @submit="saveCategory" ref="form">
					<div class="modal-body">

						<!-- category_name -->
						<div class="col-12">
							<label for="category_name">Category Name</label>

							<Field name="category_name" v-slot="{ errorMessage, field }" v-model="category.category_name">
								<input type="text" id="category_name" v-model="category.category_name"
									:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

								<span class="invalid-feedback">{{ errorMessage }}</span>
							</Field>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="Submit" class="btn btn-primary">Save</button>
					</div>
				</Form>
			</div>
		</div>
	</div>
</template>

<script>
import { Field, Form } from "vee-validate";
import { successMessage, handlerErrors } from '@/helpers/Alerts.js'
import * as yup from "yup";
import axios from "axios";

export default {
	props: ['category_data'],
	watch: {
		category_data(new_value) {
			this.category = { ...new_value };
			console.log(this.category.id)
			if (!this.category.id) return;
			this.is_create = false;
		}
	}, components: { Field, Form },
	computed: {
		schema() {
			return yup.object({
				category_name: yup.string().required(),
			});
		},
	},

	data() {
		return {
			is_create: true,
			category: {},
			category_name: null,
			categories: [],
		};
	},

	created() {

	},

	mounted() {
		console.log('category_data:', this.category_data);
	},

	methods: {
		async saveCategory() {
			try {
				if (this.is_create) {
					await axios.post("/categories", this.category);
					await Swal.fire("success", "Category Saved");
					await successMessage({ reload: true })
				} else {
					await axios.put(`/categories/${this.category.id}`, this.category)
					await Swal.fire("success", "Category Edited");
				}
				window.location.reload()
			} catch (error) {
				console.error(error);
			}
		},

		reset() {
			this.is_create = true,
				this.category_name = null
		},

	},
};
</script>

<style></style>
