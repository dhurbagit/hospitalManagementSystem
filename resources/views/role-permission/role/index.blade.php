@extends('layout.app')

@section('content')
@section('title', 'Role')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb_wrapper">

            <ul>
                <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
                <li>@yield('title')</li>
            </ul>
            <div>

                <a href="{{ route('role.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus"></i> Add</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <!-- DataTales Example -->

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="card shadow mb-4">

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="text-secondary" href="{{ url('role/' . $role->id . '/give-permission') }}">Add / Edit Role
                                        Permission</a>
                                    <a class="text-primary" href="{{ route('role.edit', $role->id) }}"><i
                                            class="far fa-edit"></i></a>
                                    <a href="#" data-toggle="modal"
                                        data-target="#exampleModal_{{ $role->id }}"><i
                                            class="fas fa-trash text-danger"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $role->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You sure you want to delete role
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('role.destroy', $role->id) }}"
                                                        method="POST">
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
            </div>
        </div>
    </div>
</div>
@endsection
