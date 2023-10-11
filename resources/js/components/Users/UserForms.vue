<template>
	<Form :validation-schema="schema" @submit="saveUser">

		<!-- Image -->
		<div class="col-12 d-flex justify-content-center mt-1">
			<img :src="image_preview" alt="Avatar" class="img-thumbnail" width="170" height="170">
		</div>

		<!-- Load Image -->
		<div class="col-12 mt-1 ">
			<label for="file" class="form-label">Imagen</label>
			<input type="file" class="" id="file" accept="image/*" @change="previewImage">

		</div>

		<!-- user name -->
		<div class="col-12">
			<label for="user_name">User Name</label>

			<Field name="user_name" v-slot="{ errorMessage, field }" v-model="user.user_name">
				<input type="text" id="user_name" v-model="user.user_name"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- email -->
		<div class="col-12">
			<label for="email">Email</label>

			<Field name="email" v-slot="{ errorMessage, field }" v-model="user.email">
				<input type="text" id="email" v-model="user.email"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- name -->
		<div class="col-12">
			<label for="name">Name</label>

			<Field name="name" v-slot="{ errorMessage, field }" v-model="user.name">
				<input type="text" id="name" v-model="user.name" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`"
					v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- Lastname -->
		<div class="col-12">
			<label for="last_name">Last Name</label>

			<Field name="last_name" v-slot="{ errorMessage, field }" v-model="user.last_name">
				<input type="text" id="last_name" v-model="user.last_name"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- phonenumber-->
		<div class="col-12">
			<label for="phone_number">Phone Number</label>

			<Field name="phone_number" v-slot="{ errorMessage, field }" v-model="user.phone_number">
				<input type="text" id="phone_number" v-model="user.phone_number"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- role -->
		<div class="col-12">
			<Field name="role" v-slot="{ errorMessage, field, valid }" v-model="user.role">
				<label for="role">Role</label>

				<v-select id="role" :options="roles" v-model="user.role" placeholder="Select a Role" :clearable="false"
					:class="`${errorMessage ? 'is-invalid' : ''}`"></v-select>


				<span class="invalid-feedback" v-if="!valid">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- password -->
		<div class="col-12" v-if="is_create">
			<label for="password">Password</label>

			<Field name="password" v-slot="{ errorMessage, field }" v-model="user.password">
				<input type="password" id="password" v-model="user.password"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- confirm password -->
		<div class="col-12" v-if="is_create">
			<label for="password_confirmation">Confirm Password</label>

			<Field name="password_confirmation" v-slot="{ errorMessage, field }" v-model="user.password_confirmation">
				<input type="password" id="password_confirmation" v-model="user.password_confirmation"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<div class="my-3 d-flex justify-content-between">
			<a href="/users" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
				Close
			</a>
			<button type="Submit" class="btn btn-primary">Save</button>
		</div>

	</Form>
</template>

<script>
import { Field, Form } from 'vee-validate'
import axios from 'axios';
import * as yup from "yup";
export default {

	props: ['user_data', 'roles_data', 'image'],
	components: { Field, Form },
	computed: {
		schema() {
			return yup.object({
				user_name: yup.string().required(),
				email: yup.string().email().required(),
				name: yup.string().required(),
				last_name: yup.string().required(),
				role: yup.string().required().oneOf(['user', 'admin']),
				phone_number: yup.number().required().positive().integer(),
			});
		},
	},
	watch: {
		user_data(new_value) {
			this.user = { ...new_value }
			if (!this.user.id) return
			this.is_create = false
		}
	},

	data() {
		return {
			is_create: true,
			user: {},
			user_name: null,
			email: null,
			name: null,
			last_name: null,
			phone_number: null,
			role: null,
			password: null,
			password_confirmation: null,
			file: null,
			image_preview: '/storage/images/users/default.png',
			roles: ['user', 'admin'],
		};
	},

	mounted() {

		if (this.user_data) {
			this.user = {
				...this.user_data,
				password: null
			};
			this.is_create = false;
		}

		this.roles = ['user', 'admin']
		console.log(this.roles_data)
		console.log(this.is_create)
	},

	methods: {
		async saveUser() {
			try {
				const user = this.createFormData(this.user)
				if (this.is_create) {
					await axios.post("/users/store", user)
					await Swal.fire("success", "Product Saved");
				} else {
					await axios.post(`/users/update/${this.user.id}`, user)
					await Swal.fire("success", "Product Edited");
				}

			} catch (error) {
				console.error("error updating user", error)
			}
		},

		previewImage(event) {
			this.file = event.target.files[0]
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
	},

};
</script>

<style></style>
