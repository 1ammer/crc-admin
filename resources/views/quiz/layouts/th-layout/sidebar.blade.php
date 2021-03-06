<ul class="sidebar navbar-nav toggled">
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Lectures</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown1">
            <h6 class="dropdown-header">Lectures Actions:</h6>
            <a class="dropdown-item" href="{{route('lecture.create')}}"><i class="fa fa-plus"></i> Add Lectures</a>
            <a class="dropdown-item" href="{{route('lecture.all')}}"><i class="fa fa-users"></i> All Lectures</a>

            <div class="dropdown-divider"></div>
           
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Assignments</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown3">
            <h6 class="dropdown-header">Assignments Actions:</h6>
            <a class="dropdown-item" href="{{route('assignment.create')}}"><i class="fa fa-plus"></i> Add Assignment</a>
            <a class="dropdown-item" href="{{route('assignment.all')}}"><i class="fa fa-users"></i> All Assignments</a>

            <div class="dropdown-divider"></div>
           
        </div>
       
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown22" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
            <i class="fas fa-fw fa-table"></i>
            <span>Quiz</span></a>
           <div class="dropdown-menu" aria-labelledby="pagesDropdown22">
            <h6 class="dropdown-header">Quiz Actions:</h6>
            <a class="dropdown-item" href="{{route('quiz.create')}}"><i class="fa fa-table"></i> Create Quiz </a>
            <a class="dropdown-item" href="{{route('quiz.all')}}"><i class="fa fa-table"></i> All Quiz</a>

            <div class="dropdown-divider"></div>
           
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Books</span>
        </a>
     <div class="dropdown-menu" aria-labelledby="pagesDropdown2">
            <h6 class="dropdown-header">Books Actions:</h6>
            <a class="dropdown-item" href="{{route('book.create')}}"><i class="fa fa-plus"></i> Add Book</a>
            <a class="dropdown-item" href="{{route('book.all')}}"><i class="fa fa-users"></i> All Books</a>

            <div class="dropdown-divider"></div>
           
        </div>
    </li>
     <li class="nav-item dropdown">
         <a class="nav-link " href="{{route('result.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Result</span>
        </a>
    
    </li>
    <li class="nav-item dropdown">
         <a class="nav-link " href="{{route('report.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Report</span>
        </a>
    
    </li>
</ul>

