<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Business</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </a>
        </h6>
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business') }}"><i class="fa fa-briefcase"
                                                                            aria-hidden="true"></i> View Businesses</a>
            </li>
        <!--   <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Add New Business</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business-category') }}"><i class="fa fa-tag"
                                                                                     aria-hidden="true"></i> Business
                    Catgories</a>
            </li>
        <!--  <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business-category.create') }}">Add New Category</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.level') }}"><i class="fa fa-signal" aria-hidden="true"></i>
                    Levels</a>
            </li>
        <!--  <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.level.create') }}">Add New Level</a>
             </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.section') }}"><i class="fa fa-th-large"
                                                                           aria-hidden="true"></i>
                    Sections</a></li>
        <!--  <li class="nav-item">
                <a class="nav-link"  href="{{ route('admin.section.create') }}">Add New Section</a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business-option') }}"><i class="fa fa-link"
                                                                                   aria-hidden="true"></i>
                    Options</a>
            </li>
        <!--  <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.business-option.create') }}">Add New Option</a>
            </li> -->

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Users</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
            </a>
        </h6>
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.customer') }}"><i class="fa fa-address-book"
                                                                            aria-hidden="true"></i> Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.partner') }}"><i class="fas fa-handshake"></i> Partners</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.setting') }}"><i class="fas fa-handshake"></i> Settings</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('side-logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>

                <form id="side-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>
