@if (Auth::check())
    <div class="d-flex align-items-center gap-3">
        <span class="navbar-text text-white">
            Welcome, {{ Auth::user()->name }}
        </span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
                <i class="fas fa-sign-out-alt"></i> Logoff
            </button>
        </form>
    </div>
@else
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">
                <i class="fas fa-user-plus"></i> Register
            </a>
        </li>
    </ul>
@endif
