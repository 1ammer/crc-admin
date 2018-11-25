<ul class="sidebar navbar-nav toggled">
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">User Action Screens:</h6>
            <a class="dropdown-item" href="{{route('user.create')}}"><i class="fa fa-plus"></i> Create User</a>
            <a class="dropdown-item" href="{{route('user.all')}}"><i class="fa fa-users"></i> All Users</a>

            <div class="dropdown-divider"></div>
           {{-- <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>--}}
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Courses</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Courses Actions:</h6>
            <a class="dropdown-item" href="{{route('course.create')}}"><i class="fa fa-plus"></i> ADD Courses</a>
            <a class="dropdown-item" href="{{route('course.all')}}"><i class="fa fa-users"></i> All Courses</a>

            <div class="dropdown-divider"></div>
           {{-- <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>--}}
        </div>
    </li>
     
   
</ul>
