<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{url('home')}}">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
              My Business Profile <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('user-preferences')}}">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
              Preferences
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('password-change')}}">
            <i class="fa fa-lock" aria-hidden="true"></i>
              Change Password
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>
         
        </ul>
    </div>
</nav>

