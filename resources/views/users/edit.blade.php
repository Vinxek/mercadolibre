<x-app title="Edit User">
    <section style="max-width: 500px;" class=" container my-5">
        <div class="card">
            <div class="card-header custom-yellow">
                <h2 class="h4 d-flex justify-content-center"><strong>Edit User</strong></h2>
            </div>
            <div class="card-body">
                <user-forms :user_data="{{ $user }}" :roles_data="{{ $roles }}"
                    :image="{{ $file }}" />
            </div>
        </div>
    </section>
</x-app>
