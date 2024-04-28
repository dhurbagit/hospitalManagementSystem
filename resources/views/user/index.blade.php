@extends('layout.app')
@section('content')
<div class="breadcrumb_wrapper">
    {{ Breadcrumbs::render('userList') }}
    <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus"></i> Add User</a>
</div>
    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($userList as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->roles->name }}</td>
                                        <td style="text-align: center">
                                             
                                            <a href="{{route('users.edit', $data->id)}}"><i class="far fa-edit"></i></a>
                                            <a href="" data-toggle="modal" data-target="#exampleModal_{{$data->id}}"><i class="fas fa-trash text-danger"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete User Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You sure you want to delete User {{$data->name}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('users.destroy', $data->id)}}" method="POST">
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
                            {{$userList->links()}}
                            </div> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
