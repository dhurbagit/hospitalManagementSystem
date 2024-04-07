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
                                <th>SNo</th>
                                <th>Name</th>
                                <th>specialization</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>specialization</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                       
                            @foreach ($doctorList as $data)
                               
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <th>{{$data->first_name. ' ' .$data->middle_name. ' ' . $data->last_name }}</th>
                                <th>{{$data->education->specialization}} </th>
                                <th>{{$data->department->dept_name}}</th>
                                <th>
                                    <a href="{{route('doctor.show', $data->id)}}"><i class="far fa-eye"></i></a>
                                    <a href="{{route('doctor.edit', $data->id)}}"><i class="far fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#exampleModal_{{$data->id}}"><i class="fas fa-trash"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Doctor Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You sure you want to delete Doctor {{$data->first_name}}
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('doctor.destroy', $data->id)}}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                             </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop