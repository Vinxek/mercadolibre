<x-app title="Create User">
    <section style="max-width: 500px;" class=" container my-5">
        <div class="card">
            <div class="card-header custom-yellow">
                <h2 class="h4 d-flex justify-content-center"><strong>Create User</strong></h2>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <x-users.form :roles="$roles" />
                </form>
            </div>
        </div>
    </section>
</x-app>
