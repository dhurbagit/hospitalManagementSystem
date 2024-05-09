@extends('doctorDashboard.layout.app')

@section('content')
@section('title', 'Setting')

 
<div class="content_info_wrapper work_experience">
    <fieldset class="fieldSet_wrapper">
        <legend>Change Password</legend>
        <form action="{{ route('user-password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    @if (session('status') == 'password-updated')
                        <div class="text-primary">
                            
                            Password Updated successfully
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="password">Current Password</label>
                        <input name="current_password" placeholder="Current Password" type="password"
                            class="form-control" id="">
                        @error('current_password', 'updatePassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input name="password" placeholder="New Password" type="password" class="form-control"
                            id="">
                        @error('password', 'updatePassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input name="password_confirmation" placeholder="confirm password" type="password"
                            class="form-control" id="">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </fieldset>
</div>




@endsection
