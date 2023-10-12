import Swal from 'sweetalert2'

export const handlerErrors = async error => {
	console.error(error)
	const status = error.response.status
	let options = null
	let error_object = {}

	switch (status) {
		case 422:
			{
				options = {
					icon: 'error',
					title: 'Error: Campos erroneos.',
					text: 'Llena correctamente el formulario.'
				}
				const errors = error.response.data.errors
				for (let prop in errors) {
					error_object[prop] = errors[prop][0]
				}
			}
			break
		case 404:
			options = {
				icon: 'error',
				title: 'Error: URL no encontrada.',
				text: 'Intenta utilizar otra URL.'
			}
			break
		case 403:
			options = {
				icon: 'error',
				title: 'Error: Usuario sin permisos',
				text: 'No tienes los permisos para ejecutar esta accion.'
			}
			break
		default:
			options = {
				icon: 'error',
				title: 'Erro de servido',
				text: 'Algo salio mal, espera que se revisara este error.'
			}
			break
	}
	await Swal.fire(options)
	return error_object
}

export const successMessage = async ({ is_delete = false, reload = false }) => {
	await Swal.fire({
		icon: 'success',
		title: 'All done!',
		text: is_delete
			? 'The entry has been deleted.'
			: 'The entry has been saved.'
	})
	if (reload) window.location.reload()
}

export const deleteMessage = async () => {
	const { isConfirmed } = await Swal.fire({
		icon: 'warning',
		title: 'Do you want to delete the entry?',
		showCancelButton: true
	})
	return isConfirmed
}
