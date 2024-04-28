@extends('layout.app')
@section('content')
    <div class="breadcrumb_wrapper">
        {{ Breadcrumbs::render('userform') }}

    </div>

    <div class="content_info_wrapper work_experience">
        <fieldset class="fieldSet_wrapper">
            <legend>Create New user Form</legend>

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

                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($user) ? $user->name : old('name') }}">
                        <small id="name" class="form-text">Enter Your name</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">

                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ isset($user) ? $user->email : old('email') }}">
                        <small id="email" class="form-text">Enter Email Address</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">

                        <input type="password" class="form-control" id="password" name="password">
                        <small id="password" class="form-text">Enter Your New Password</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">

                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        <small id="password_confirmation" class="form-text">Enter Your Password</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">

                        <select class="form-control" id="role" name="role_id">

                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == @$user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach


                        </select>
                        <small id="password_confirmation" class="form-text">Select role for the user</small>
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
        </fieldset>
    </div>
@endsection
