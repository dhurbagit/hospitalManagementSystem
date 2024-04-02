@extends('layout.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="{{ route('doctor.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Add Doctor</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Doctor</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>specialization</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>specialization</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                             <tr>
                                <td>1</td>
                                <th>Name</th>
                                <th>specialization</th>
                                <th>Department</th>
                                <th>Action</th>
                             </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop