@extends('doctorDashboard.layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('DoctorSchedule.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add Schedule</a>
    </div>
@if(isset($schedule))
<form action="{{ route('DoctorSchedule.update', $schedule->id) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('DoctorSchedule.store') }}" method="POST">
@endif
    
        <div class="row">
            @csrf
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="from_time">From Time</label>
                    <input type="time" class="form-control" id="from_time" name="from_time" value="{{isset($schedule) ? $schedule->from_time : old('from_time')}}" >
                    <small id="from_time" class="form-text text-muted">Enter Start time</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="from_time">To Time</label>
                    <input type="time" class="form-control" id="to_time" name="to_time" value="{{isset($schedule) ? $schedule->to_time : old('to_time')}}" >
                    <small id="to_time" class="form-text text-muted">Enter End time</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="from_time">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{isset($schedule->date) ? $schedule->date : old('date')}}">
                    <small id="date" class="form-text text-muted">Enter Date</small>
                </div>
            </div>
            
            <div class="col-lg-12">
                @if(isset($schedule))
                <button type="submit" class="btn btn-success">Update</button>
            @else
            <button type="submit" class="btn btn-success">Save</button>
            @endif
               
            </div>
        </div>
    </form>
@endsection
