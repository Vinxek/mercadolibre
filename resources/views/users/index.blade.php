<x-app title="Users">

    <div class="container my-5">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive my-4 mx-2">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>User Info</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->file->route }}" alt="avatar"
                                                style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $user->user_name }}</p>
                                                <p class="text-muted mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->full_name }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->phone_number }}</p>
                                    </td>
                                    <td>{{ $user->roles[0]->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fa-solid fa-user-pen"></i></a>
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="ms-2 btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>



</x-app>
