@extends('doctorDashboard.layout.app')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Appoinment</h1>
     
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Appoinment</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <td>{{$loop->iteration}}</td>
                                    
                                    <td>{{$data->schedule->from_time .' to '. $data->schedule->to_time}}</td>
                                    <td>{{$data->patient->fullname}}</td>
                                    <td>
                                        <select name="status" id="" data-id = "{{$data->id}}" class="form-control status_action">
                                            <option value="pending" {{$data->status == 'pending' ? 'selected' : '' }} >Pending</option>
                                            <option value="approved" {{$data->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="cancel" {{$data->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                       
                             
                            
                        </tbody>
                    </table>
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
                _token: "{{csrf_token()}}",
                id: id,
                status : status
            },
            success:function(res){
                toastr.success(res);
            }
        });
    });
</script>
@endpush