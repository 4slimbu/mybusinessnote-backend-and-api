<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>User Dashboard</span>
          <a class="d-flex align-items-center text-muted" href="#">
           <i class="fa fa-briefcase" aria-hidden="true"></i>
          </a>
        </h6>
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user-dashboard.dashboard') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('side-logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                </a>

                <form id="side-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>
