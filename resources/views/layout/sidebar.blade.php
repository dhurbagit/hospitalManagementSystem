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

    <li class="nav-item">
        <a class="nav-link" href="{{ route('department.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Department</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctor.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Doctor</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span></a>
    </li>
    <div class="sidebar-heading">
        Logout
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Logout</span></a>
    </li>

 

     
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
