@extends('layout.app')
@section('content')

<div class="breadcrumb_wrapper">
    {{ Breadcrumbs::render('departmentList') }}
    <a href="{{ route('department.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus"></i> Add Department</a>
</div>
    <!-- Page Heading -->
 
    
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Department</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Department Code</th>
                                    <th>Description</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Department Code</th>
                                    <th>Description</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($list as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->dept_name }}</td>
                                        <td>{{ $data->dept_code }}</td>
                                        <td>{!! Str::limit($data->dept_description, 20, '...') !!}</td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('department.edit', $data->id) }}"><i
                                                    class="far fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal_{{$data->id}}"><i
                                                    class="fas fa-trash text-danger"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete {{$data->dept_name}} Department</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You sure you want to delete {{$data->dept_name}} department
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('department.destroy', $data->id)}}" method="POST">
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination_style">
                            {{$list->links()}}
                            </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
