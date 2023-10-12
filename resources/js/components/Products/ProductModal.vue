<template>
	<!-- Modal -->
	<div class="modal fade" id="product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						{{ is_create ? "Create Product" : "Edit Product" }} Product
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- formulario -->
				<Form :validation-schema="schema" @submit="saveProduct" ref="form">
					<div class="modal-body">

						<!-- Image -->
						<div class="col-12 d-flex justify-content-center mt-1">
							<img :src="image_preview" alt="Imagen Libro" class="img-thumbnail" width="170" height="170">
						</div>

						<!-- Load Image -->
						<div class="col-12 mt-1 ">
							<label for="file" class="form-label">Imagen</label>
							<input type="file" class="" id="file" accept="image/*" @change="previewImage">

						</div>


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
	props: ['product_data'],
	watch: {
		product_data(new_value) {
			this.product = { ...new_value }
			if (!this.product.id) return
			this.is_create = false
			this.category = this.product.category_id
			this.image_preview = this.product.file.route
		}
	},
	components: { Field, Form },
	computed: {
		schema() {
			return yup.object({
				product_name: yup.string().required(),
				category: yup.string().required(),
				description: yup.string().required(),
				price: yup.number().required().positive().integer(),
				stock: yup.number().required().integer(),
			});
		},
	},

	data() {
		return {
			is_create: true,
			product: {},
			author: null,
			category: null,
			file: null,
			image_preview: '/storage/image/products/default.png',
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
				const product = this.createFormData(this.product)
				if (this.is_create) {
					await axios.post("/products/store", product);
					await Swal.fire("success", "Product Saved");
				} else {
					await axios.post(`/products/update/${this.product.id}`, product)
					await Swal.fire("success", "Product Edited");
				}
				window.location.reload()
			} catch (error) {
				console.error(error);
			}
		},

		previewImage(envent) {
			this.file = envent.target.files[0]
			this.image_preview = URL.createObjectURL(this.file)
		},

		createFormData(data) {
			const form_data = new FormData()
			if (this.file) form_data.append('file', this.file, this.file.name)
			for (const prop in data) {
				form_data.append(prop, data[prop])
			}
			return form_data
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
		reset() {
			this.is_create = true,
				this.product = {},
				this.author = null,
				this.category = null,
				this, file = null,
				this.$parent.product = {},
				setTimeout(() => this.$refs.form.resetForm(), 100)

		}
	},
};
</script>

<style></style>
