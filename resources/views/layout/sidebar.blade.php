<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Medi Care<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{(request()->routeIs('department.*') ? 'active' : '')}}">
        <a class="nav-link" href="{{ route('department.index') }}">
            <i class="far fa-building"></i>
            <span>Department</span></a>
    </li>
    <li class="nav-item {{(request()->routeIs('doctor.*') ? 'active' : '')}}">
        <a class="nav-link" href="{{ route('doctor.index') }}">
            <i class="fas fa-user-md"></i>
            <span>Doctor</span></a>
    </li>
    
    <li class="nav-item {{(request()->routeIs('patient.*') ? 'active' : '')}}">
        <a class="nav-link" href="{{ route('patient.index') }}">
            <i class="far fa-user"></i>
            <span>Patient</span></a>
    </li>
     
    <li class="nav-item {{(request()->routeIs('permission.*') ? 'active' : '')}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Role & Permission</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Role & Permission:</h6>
                <a class="collapse-item" href="{{ url('role')}}">Role</a>
                <a class="collapse-item" href="{{ route('permission.index') }}">Permission</a>
                <a class="collapse-item" href="{{ route('users.index') }}">User</a>
                
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
        Logout
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

 

     
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
