<!-- <div class="d-flex flex-row">
        <div class="p-2"><h5>UC-SHOWROOM</h5></div>
        <div class="p-2">Home</div>
        <div class="p-2">Vehicles</div>
    </div> -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <div class="p-2"><h5>UC-SHOWROOM</h5></div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endguest

                @if(Auth::check())
                    @if(Auth::user()->role)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicle.index') }}">Vehicles</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/user">User</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order.index') }}">Order</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>

                        <li class="nav-item">
                            <p class="nav-link">{{ Auth::user()->name }}</p>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
    </div>
</nav>