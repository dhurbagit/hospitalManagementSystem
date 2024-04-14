<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

     

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

         

         

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    @if (Auth::check())
                        <div class="dashboard-header">
                            <span>Welcome, {{ Auth::user()->name }}</span>
                        </div>
                    @endif
                </span>
                @php
                $userId = Auth::user();
                   $doctor = App\Models\Doctor::where('user_id', $userId->id)->first();
                @endphp

                 
                    <img class="img-profile rounded-circle" src="{{ asset('uploads/'. $doctor->image) }}">
            </a>
             
        </li>

    </ul>

</nav>
