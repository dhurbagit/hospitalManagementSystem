@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            @include('role-permission.nav-links')
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Roles
                        <a href="{{ route('role.create') }}" class="btn btn-primary float-end">Add Roles</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
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
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a href="{{url('role/'. $role->id. '/give-permission')}}">Add / Edit Role Permission</a>
                                        <a href="{{route('role.edit', $role->id)}}">Edit</a>
                                        <form action="{{route('role.destroy', $role->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
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
