<nav class="col-sm-3 col-md-3 d-none d-sm-block admin-sidebar sidebar">
    <div id="accordion" role="tablist">

        <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                       aria-controls="collapseTwo">
                        Business
                    </a>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo"
                 data-parent="#accordion">
                <div class="card-body">


                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Business <span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.business') }}">View
                                        All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('admin.business.create') }}">Add New</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Business Categories <span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.business-category') }}">View
                                        All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('admin.business-category.create') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Business Badges <span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.badge') }}">View All</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.badge.create') }}">Add
                                        New</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Business Options<span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.business-option') }}">View
                                        All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('admin.business-option.create') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Levels<span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.level') }}">View
                                        All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('admin.level.create') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingThree">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false"
                       aria-controls="collapseThree">
                        Users
                    </a>
                </h5>
            </div>
            <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree"
                 data-parent="#accordion">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Customers<span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.customer') }}">View
                                        All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('admin.customer.create') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Partners <span class="caret"></span></a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.partner') }}">View
                                        All</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('admin.partner.create') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

