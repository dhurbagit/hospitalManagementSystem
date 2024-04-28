@extends('doctorDashboard.layout.app')

@section('content')
<div class="breadcrumb_wrapper">
    {{ Breadcrumbs::render('scheduleList') }}
    <a href="{{ route('DoctorSchedule.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus"></i> Add Schedule</a>
</div>

    
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Schedule</th>
                                    <th>Date</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Schedule</th>
                                    <th>Date</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $authId = Auth::user();
                                    $doctorId = \App\Models\Doctor::where('user_id', $authId->id)->first();
                                    $appointments = \App\Models\Appoinment::where('doctor_id', $doctorId->id)->get();
                                @endphp
                                

                                @foreach ($list as $item)
                                    @php
                                        $increment = 1;
                                    @endphp
                                    @php
                                        // Convert start and end time to Carbon objects for easier manipulation
                                        $startTime = \Carbon\Carbon::parse($item['from_time']);
                                        $endTime = \Carbon\Carbon::parse($item['to_time']);
                                        // Set the interval to 30 minutes
                                        $interval = 30;
                                        // Initialize a counter variable
                                        $counter = 0;
                                        $status = ''; // Default status
                                    @endphp

                                    @while ($startTime->addMinutes($interval)->lte($endTime))
                                        @php
                                            $startFormatted = $startTime->subMinutes($interval)->format('H:i');
                                            $endFormatted = $startTime->addMinutes($interval)->format('H:i');
                                            $matchFound = false;
                                            // Check if current interval matches any appointment
                                        @endphp

                                        @foreach ($appointments as $appointment)
                                            @php
                                                // Extract start and end times from the time_range field
                                                [$appointmentStartTime, $appointmentEndTime] = explode(
                                                    '-',
                                                    $appointment->time_range,
                                                );
                                                $appointmentStartTime = \Carbon\Carbon::parse($appointmentStartTime);
                                                $appointmentEndTime = \Carbon\Carbon::parse($appointmentEndTime);
                                            @endphp

                                            @if (
                                                $startTime->between($appointmentStartTime, $appointmentEndTime) ||
                                                    $endTime->between($appointmentStartTime, $appointmentEndTime) ||
                                                    $appointmentStartTime->between($startTime, $endTime) ||
                                                    $appointmentEndTime->between($startTime, $endTime))
                                                @php
                                                    $matchFound = true;
                                                    $status = $appointment->status;
                                                @endphp
                                            @break
                                        @endif
                                    @endforeach

                                    <tr>
                                        <td>{{ $increment }}</td>
                                        <td> {{ $startFormatted }} to {{ $endFormatted }}</span></td>
                                        <td>{{ $item->date }}</td>
                                        
                                        <td style="text-align: center">
                                            @if (!$matchFound)
                                                <a class="text-primary" href="{{ route('DoctorSchedule.edit', $item->id) }}"><i
                                                        class="far fa-edit"></i></a>
                                                <a class="text-danger" href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#exampleModal{{ $item->id }}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you
                                                                    sure to delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('DoctorSchedule.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="status_badge {{($status === "approved")? 'text-primary ' : 'text-danger'}}">{{$status}}</div>
                                                
                                                
                                            @endif

                                        </td>
                                    </tr>

                                    @php
                                        // Increment the counter
                                        $counter++;
                                        $increment++;
                                    @endphp
                                @endwhile
                            @endforeach





                        </tbody>
                    </table>
                    <div class="pagination_style">

                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
