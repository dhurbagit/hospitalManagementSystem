@extends('layout.app')

@section('content')
@section('title', 'Role')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb_wrapper">

            <ul>
                <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
                <li><a href="{{ route('role.index') }}">@yield('title')</a> /</li>
                <li>Permission</li>
            </ul>
            <div>

                <a href="{{ route('role.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    Back</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12">



        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <span><b>Assign Permission to Role</b></span>



                <form action="{{ url('role/' . $role->id . '/give-permission') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @error('permission')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror


                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-lg-2">
                                <div class="form-group permission_form">
                                    <input type="checkbox" name="permission[]" class="form-control"
                                        value="{{ $permission->name }}"
                                        {{ in_array($permission->id, $rolePermission) ? 'checked' : '' }}>
                                    {{ $permission->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>





                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
