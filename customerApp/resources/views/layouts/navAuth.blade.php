<ul class="navbar-nav ms-auto align-items-center">
    @guest
        <!-- When not logged in -->
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('register') }}">
                <i class="fas fa-user-plus"></i> Register
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </li>
    @else
        <!-- When logged in -->
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-white" style="text-decoration: none; padding: 0 10px; font-size: 1.25rem;">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </li>
    @endguest
</ul>
