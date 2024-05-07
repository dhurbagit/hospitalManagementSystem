@extends('doctorDashboard.layout.app')

@section('content')
@section('title', 'Schedule')
<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/doctor-dashboard') }}">Dashboard</a> /</li>
        <li><a href="{{ route('DoctorSchedule.index') }}">@yield('title')</a> /</li>
        <li>Form</li>
    </ul>
   
</div>

    <div class="content_info_wrapper work_experience">
        <fieldset class="fieldSet_wrapper">
            @if (isset($schedule))
            <form action="{{ route('DoctorSchedule.update', $schedule->id) }}" method="POST">
                @method('PUT')
            @else
                <form action="{{ route('DoctorSchedule.store') }}" method="POST">
        @endif
    
        <div class="row">
            @csrf
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="from_time" class="form-text text-muted">Enter Start time<span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="from_time" name="from_time"
                        value="{{ isset($schedule) ? $schedule->from_time : old('from_time') }}">
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="to_time" class="form-text text-muted">Enter End time<span class="text-danger">*</span></label>
                   
                    <input type="time" class="form-control" id="to_time" name="to_time"
                        value="{{ isset($schedule) ? $schedule->to_time : old('to_time') }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label id="date" class="form-text text-muted">Enter Date<span class="text-danger">*</span></label>
                    
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ isset($schedule->date) ? $schedule->date : old('date') }}">
                </div>
            </div>
    
            <div class="col-lg-12">
                @if (isset($schedule))
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
