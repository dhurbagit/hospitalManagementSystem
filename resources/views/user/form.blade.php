@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add Doctor</a>
    </div>
    @if (isset($user))
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @method('PUT')
        @else
            <form action="{{ route('users.store') }}" method="post">
    @endif
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ isset($user) ? $user->name : old('name') }}">
                <small id="name" class="form-text">Enter Your name</small>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ isset($user) ? $user->email : old('email') }}">
                <small id="email" class="form-text">Enter Email Address</small>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="password" class="form-text">Enter Your New Password</small>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="name">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                <small id="password_confirmation" class="form-text">Enter Your Password</small>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="name">Role</label>
                <select class="form-control" id="role" name="role_id">
                   
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == @$user->role_id ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                    

                </select>
                <small id="password_confirmation" class="form-text">Enter Your Password</small>
            </div>
        </div>
        <div class="col-lg-12">
            @if (isset($user))
                <button type="submit" class="btn btn-success">Update</button>
            @else
                <button type="submit" class="btn btn-success">Save</button>
            @endif
        </div>
    </div>
    </form>
@endsection
