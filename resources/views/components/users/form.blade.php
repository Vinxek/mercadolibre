<section class="row">
    {{-- User Name --}}
    <div class="mb-3 col-12">
        <label for="user_name">Username</label>
        <input id="user_name" type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror"
            value="{{ old('user_name') ? old('user_name') : (isset($user) ? $user->user_name : '') }}" />
        @error('user_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- email --}}
    <div class="mb-3 col-12">
        <label for="email">Email</label>
        <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') ? old('email') : (isset($user) ? $user->email : '') }}" />

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Name --}}
    <div class="mb-3 col-12">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') ? old('name') : (isset($user) ? $user->name : '') }}" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- last name --}}
    <div class="mb-3 col-12">
        <label for="last_name">Last name</label>
        <input id="last_name" type="text" name="last_name"
            class="form-control @error('last_name') is-invalid @enderror"
            value="{{ old('last_name') ? old('last_name') : (isset($user) ? $user->last_name : '') }}" />
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- phone number --}}
    <div class="mb-3 col-12">
        <label for="phone_number">Phone Number</label>
        <input id="phone_number" type="text" name="phone_number"
            class="form-control @error('phone_number') is-invalid @enderror"
            value="{{ old('phone_number') ? old('phone_number') : (isset($user) ? $user->phone_number : '') }}" />

        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- User Name --}}
    <div class="mb-3 col-12">

        <label for="role">Role</label>

        <select id="role" type="text" name="role" class="form-control @error('role') is-invalid @enderror">
            @foreach ($roles as $role)
                <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>



        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- password --}}
    <div class="mb-3 col-12">
        <label for="password">Password</label>
        <input id="password" type="password" name="password"
            class="form-control @error('password') is-invalid @enderror" />

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{-- Password confirmation --}}
    <div class="mb-3 col-12">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation"
            class="form-control @error('password_confirmation') is-invalid @enderror" />

        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-12">
        <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Cancel</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</section>
