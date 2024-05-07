@extends('doctorDashboard.layout.app')

@section('content')
@section('title', 'Schedule')
<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/doctor-dashboard') }}">Dashboard</a> /</li>
        <li>@yield('title')</li>

    </ul>
    <a href="{{ route('DoctorSchedule.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus"></i> Add</a>
</div>


<div class="row">
    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

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

                            @foreach ($timeIntervals as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data['start'] . ' to ' . $data['end'] }}</td>
                                    <td>{{ $data['date'] }}</td>
                                    <td style="text-align: center">
                                        @if ($data['status'] !== 'approved' && $data['status'] !== 'pending' && $data['status'] !== 'cancel')
                                            

                                            <a data-toggle="tooltip" data-placement="top" title="Edit"
                                                class="text-primary"
                                                href="{{ route('DoctorSchedule.edit', $data['schedule_id']) }}"><i
                                                    class="far fa-edit"></i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Delete"
                                                class="text-danger" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#exampleModal{{ $data['schedule_id'] }}"><i
                                                    class="fas fa-trash-alt"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data['schedule_id'] }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you
                                                                sure to delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('DoctorSchedule.destroy', $data['schedule_id']) }}"
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
                                            @if ($data['status'] == 'pending')
                                                <div class="badge table_badge text-primary">Pending</div>
                                            @elseif ($data['status'] == 'cancel')
                                                <div class="badge table_badge text-danger">Cancel</div>
                                            @elseif ($data['status'] == 'approved')
                                                <div class="badge table_badge text-success">Approved</div>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
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
