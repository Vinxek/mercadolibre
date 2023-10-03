{{-- Menu --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand mx-5" href="{{ url('/') }}">Mercadolibre</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            {{-- This got be made a date table in the future --}}
            <form class="d-flex justify-content-between col-sm-6">
                <input class="form-control flex-grow-1 me-2 custom-search-input" type="search"
                    placeholder="Search Products" aria-label="Search">
                <button class="btn btn-info"type="submit">Search</button>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto mx-5">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
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
                            {{ Auth::user()->user_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @role('admin')
                                {{-- Users --}}
                                <a class="dropdown-item" href="{{ route('users') }}">Users</a>

                                {{-- Books --}}
                                <a class="dropdown-item" href="{{ route('books') }}">Products</a>
                            @endrole

                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            </a>

                            {{-- Category Products --}}
                            <a class="dropdown-item" href="/category-products/index">Category Products</a>


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
