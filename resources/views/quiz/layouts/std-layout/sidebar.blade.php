<ul class="sidebar navbar-nav toggled">
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link " href="{{route('slecture.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Lectures</span>
        </a>
      
    </li>
    <li class="nav-item dropdown">
          <a class="nav-link " href="{{route('sassignment.all')}}" >   <i class="fas fa-fw fa-table"></i>
            <span>Assignments</span>
        </a>
       
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('squiz.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Quiz</span></a>
    </li>
    <li class="nav-item dropdown">
         <a class="nav-link " href="{{route('sbook.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Books</span>
        </a>
    
    </li>
      <li class="nav-item dropdown">
         <a class="nav-link " href="{{route('sresult.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Result</span>
        </a>
    
    </li>
      <li class="nav-item dropdown">
         <a class="nav-link " href="{{route('srequest')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Request</span>
        </a>
    
    </li>
      <li class="nav-item dropdown">
         <a class="nav-link " href="{{route('sreport.all')}}" >
            <i class="fas fa-fw fa-table"></i>
            <span>Report</span>
        </a>
    
    </li>
</ul>
