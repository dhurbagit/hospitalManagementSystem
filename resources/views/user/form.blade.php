@extends('layout.app')
@section('content')
@section('title', 'User')
<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
        <li><a href="{{ route('users.index') }}">@yield('title')</a> /</li>
        <li>Form</li>
    </ul>

</div>

<div class="content_info_wrapper work_experience">
    <fieldset class="fieldSet_wrapper">

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
                    <label id="name" class="form-text">Enter Your name<span class="text-danger">*</span></label>
                    <input placeholder="Enter Your name" type="text" class="form-control" id="name"
                        name="name" value="{{ isset($user) ? $user->name : old('name') }}">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="" class="form-text">Enter Email Address<span
                            class="text-danger">*</span></label>
                    <input placeholder="Enter Email Address" type="email" class="form-control" id="email"
                        name="email" value="{{ isset($user) ? $user->email : old('email') }}">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="password" class="form-text">Enter Your New Password<span
                            class="text-danger">*</span></label>
                    <input placeholder="Enter Your New Password" type="password" class="form-control" id="password"
                        name="password">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="password_confirmation" class="form-text">Confirm Password<span
                            class="text-danger">*</span></label>
                    <input placeholder="Confirm Password" type="password" class="form-control"
                        id="password_confirmation" name="password_confirmation">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="" class="form-text">Select role for the user<span
                            class="text-danger">*</span></label>


                    <select class="form-control js-example-basic-multiple" id="role" name="roles[]" multiple="multiple">

                        @foreach ($roles as $role)
                            <option value="{{ $role }}" 
                            @if(isset($selectedRole))
                            {{in_array($role, $selectedRole) ? "selected" : ""}}
                            @endif
                            >
                                {{ $role }}</option>
                        @endforeach


                    </select>

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
@push('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endpush
