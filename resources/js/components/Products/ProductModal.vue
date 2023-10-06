<template>
	<!-- Modal -->
	<div class="modal fade" id="product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						{{ is_created ? "create" : "edit" }} Product
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- formulario -->
				<Form :validation-schema="schema" @submit="saveProduct">
					<div class="modal-body">
						<!-- product_name -->
						<div class="col-12">
							<label for="product_name">Product Name</label>

							<Field name="product_name" v-slot="{ errorMessage, field }" v-model="product.product_name">
								<input type="text" id="product_name" v-model="product.product_name"
									:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

								<span class="invalid-feedback">{{ errorMessage }}</span>
							</Field>
						</div>

						<!-- category_id -->
						<div class="col-12" v-if="load_category">
							<label for="category">Category</label>

							<Field name="category" v-slot="{ errorMessage, field, valid }" v-model="category">
								<label for="category">Categoria</label>

								<v-select id="category" :options="categories_data" v-model="category"
									:reduce="category => category.id" v-bind="field" label="category_name"
									placeholder="Selecciona categoria" :clearable="false"
									:class="`${errorMessage ? 'is-invalid' : ''}`">
								</v-select>
								<span class="invalid-feedback" v-if="!valid">{{ errorMessage }}</span>

							</Field>
						</div>

						<!-- description -->
						<div class="col-12">
							<label for="description">Description</label>

							<Field name="description" v-slot="{ errorMessage, field }" v-model="product.description">
								<textarea type="textarea" id="description" v-model="product.description"
									:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

								<span class="invalid-feedback">{{ errorMessage }}</span>
							</Field>
						</div>

						<!-- price -->
						<div class="col-12">
							<label for="price">Price</label>

							<Field name="price" v-slot="{ errorMessage, field }" v-model="product.price">
								<input type="text" id="price" v-model="product.price"
									:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

								<span class="invalid-feedback">{{ errorMessage }}</span>
							</Field>
						</div>

						<!-- stock -->
						<div class="col-12">
							<label for="stock">Stock</label>

							<Field name="stock" v-slot="{ errorMessage, field }" v-model="product.stock">
								<input type="text" id="stock" v-model="product.stock"
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
import * as yup from "yup";
import axios from "axios";

export default {
	components: { Field, Form },
	computed: {
		schema() {
			return yup.object({
				product_name: yup.string().required(),
				category: yup.string().required(),
				description: yup.string().required(),
				price: yup.number().required().positive().integer(),
				stock: yup.number().required().positive().integer(),
			});
		},
	},

	data() {
		return {
			is_created: true,
			product: {},
			author: null,
			category: null,
			categories_data: [],
			load_category: false,
		};
	},

	created() {
		this.index();
	},

	methods: {
		async index() {
			this.getCategories();
		},

		async saveProduct() {
			try {
				this.product.category_id = this.category;
				await axios.post("/products", this.product);
				await Swal.fire("success", "Felicidades");
				// this.$parent.closeModal();
			} catch (error) {
				console.error(error);
			}
		},

		async getCategories() {
			try {
				const { data: { categories } } = await axios.get("/categories/get-all");
				this.categories_data = categories;
				console.log(this.categories_data);
				this.load_category = true;
			} catch (error) {
				console.error(error);
			}
		},
	},
};
</script>

<style></style>
