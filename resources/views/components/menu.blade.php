<nav class="navbar navbar-expand-md navbar-light custom-yellow shadow-sm">
    <div class="container">
        <a href="/">
            <div class="image-container"><img
                    src="https://seeklogo.com/images/M/mercado-libre-logo-058319A524-seeklogo.com.png" alt="logo"
                    style="max-width: 150px;">
            </div>
        </a>

        {{-- Haburguesa --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            {{-- This got be made a date table in the future --}}
            <form method="POST" action="{{ route('search.product') }}" class="">
                @csrf
                <div class="input-group">
                    <input type="text" name="product_name" class="form-control" placeholder="Search Products">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>



            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong>Hello, {{ Auth::user()->user_name }}</strong>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            @role('admin')
                                {{-- users --}}
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    Manage Users
                                </a>
                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    Manage Products
                                </a>
                            @endrole
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
