@extends('doctorDashboard.layout.app')

@section('content')
    <div class="breadcrumb_wrapper">
        {{ Breadcrumbs::render('scheduleForm') }}
         
    </div>

    <div class="content_info_wrapper work_experience">
        <fieldset class="fieldSet_wrapper">
            <legend>Create New schedule</legend>
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
                 
                    <input type="time" class="form-control" id="from_time" name="from_time"
                        value="{{ isset($schedule) ? $schedule->from_time : old('from_time') }}">
                    <small id="from_time" class="form-text text-muted">Enter Start time</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                   
                    <input type="time" class="form-control" id="to_time" name="to_time"
                        value="{{ isset($schedule) ? $schedule->to_time : old('to_time') }}">
                    <small id="to_time" class="form-text text-muted">Enter End time</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ isset($schedule->date) ? $schedule->date : old('date') }}">
                    <small id="date" class="form-text text-muted">Enter Date</small>
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
