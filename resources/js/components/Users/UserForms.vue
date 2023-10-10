<template>
	<Form @submit="saveUser">

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
			<label for="role">Role</label>

			<Field name="role" v-slot="{ errorMessage, field }" v-model="user.role">
				<input type="text" id="role" v-model="user.role" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`"
					v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- password -->
		<div class="col-12">
			<label for="password">Password</label>

			<Field name="password" v-slot="{ errorMessage, field }" v-model="user.password">
				<input type="password" id="password" v-model="user.password"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<!-- confirm password -->
		<div class="col-12">
			<label for="password_confirmation">Confirm Password</label>

			<Field name="password_confirmation" v-slot="{ errorMessage, field }" v-model="user.password_confirmation">
				<input type="password" id="password_confirmation" v-model="user.password_confirmation"
					:class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" />

				<span class="invalid-feedback">{{ errorMessage }}</span>
			</Field>
		</div>

		<div class="my-3 d-flex justify-content-between">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
				Close
			</button>
			<button type="Submit" class="btn btn-primary">Save</button>
		</div>

	</Form>
</template>

<script>
import { Field, Form } from 'vee-validate'
import axios from 'axios';
export default {

	props: ['user_data'],
	components: { Field, Form },
	watch: {
		user_data(new_value) {
			this.user = new_value
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
		};
	},
	methods: {
		async saveUser() {
			try {
				if (this.is_create) {
					await axios.post("/users", this.user)
					await Swal.fire("success", "Product Saved");
				}
			} catch (error) {
				console.error(error)
			}
		},
	},
};
</script>

<style></style>
