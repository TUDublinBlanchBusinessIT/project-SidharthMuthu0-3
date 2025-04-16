<li class="nav-item">
    <a href="{{ route('guests.index') }}"
       class="nav-link {{ Request::is('guests*') ? 'active' : '' }}">
        <p>Guests</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bookings.index') }}"
       class="nav-link {{ Request::is('bookings*') ? 'active' : '' }}">
        <p>Bookings</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('staff.index') }}"
       class="nav-link {{ Request::is('staff*') ? 'active' : '' }}">
        <p>Staff</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('rooms.index') }}"
       class="nav-link {{ Request::is('rooms*') ? 'active' : '' }}">
        <p>Rooms</p>
    </a>
</li>


