@extends('doctorDashboard.layout.app')
@section('content')
@section('title', 'Appoinment')
<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/doctor-dashboard') }}">Dashboard</a> /</li>
        <li>@yield('title')</li>
        
    </ul>
    
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
                                    <th>Patient Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Schedule</th>
                                    <th>Patient Name</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($appoinment as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $data->time_range }}</td>
                                        <td>{{ $data->patient->fullname }}</td>
                                        <td>
                                            @if ($data->status == 'pending')
                                                <div class="statusContainer">
                                                    <select name="status" data-id="{{ $data->id }}"
                                                        class="form-control status_action status_type" id="statusSelect">
                                                        <option value="approved"
                                                            {{ $data->status == 'approved' ? 'selected' : '' }}>Approved
                                                        </option>
                                                        <option value="cancel"
                                                            {{ $data->status == 'cancel' ? 'selected' : '' }}>Cancel
                                                        </option>
                                                        <option value="pending"
                                                            {{ $data->status == 'pending' ? 'selected' : '' }}>Pending
                                                        </option>
                                                    </select>
                                                </div>
                                            @else
                                                <div class="statusContainer">
                                                    @if ($data->status == 'approved')
                                                        Approved
                                                    @elseif ($data->status == 'cancel')
                                                        Cancel
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                        <div class="pagination_style">

                            {{ $appoinment->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.status_action').change(function() {
            var id = $(this).attr('data-id');
            var status = $(this).val();

            $.ajax({
                type: "post",
                url: "{{ route('appoinment.status') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(res) {
                    toastr.success(res);
                }
            });
        });
    </script>
    <script>
        < script >
            $(document).ready(function() {
                var status = "{{ isset($data->status) ? $data->status : '' }}"; // Get the status value

                // Initial hide/show based on status
                if (status !== 'pending') {
                    $('#statusSelect').hide(); // Hide the select element if status is not pending
                } else {
                    $('#statusSelect').show(); // Show the select element if status is pending
                }

                // Listen for change events on the status select
                $('#statusSelect').change(function() {
                    var newStatus = $(this).val(); // Get the newly selected status

                    // Perform actions based on the new status
                    if (newStatus !== 'pending') {
                        $('#statusSelect').hide(); // Hide the select element if new status is not pending
                    } else {
                        $('#statusSelect').show(); // Show the select element if new status is pending
                    }

                    // Here, you can add additional logic or perform an AJAX request to update the status
                    // For example, you might want to submit a form or trigger an AJAX call to update the status in the database
                    // After updating the status, you can refresh the page using location.reload()
                    // Example:
                    location.reload();
                });
            });
    </>

    // $(document).ready(function() {
    // var status = "{{ isset($data->status) ? $data->status : '' }}"; // Get the status value
    // if (status !== 'pending') {
    // $('#statusSelect').hide(); // Hide the select element if status is not pending
    // }
    // });
    </script>
@endpush
