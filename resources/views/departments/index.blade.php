@extends('layout.app')
@section('content')
@section('title', 'Department')



<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
        <li>@yield('title')</li>
    </ul>
    <div>
        <a href="{{ route('trashfile') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"> <i
                class="fas fa-trash"></i> Trash</a>
        <a href="{{ route('department.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus"></i> Add</a>
    </div>
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
                                <th>Department Name</th>
                                <th>Department Code</th>
                                <th>Description</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNo</th>
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
                                        <a data-toggle="tooltip" data-placement="top" title="Edit"
                                            href="{{ route('department.edit', $data->id) }}"><i
                                                class="far fa-edit"></i></a>
                                        @can('delete role')
                                            <a href="#" data-toggle="modal"
                                                data-target="#exampleModal_{{ $data->id }}"><i
                                                    class="fas fa-trash text-danger"></i></a>
                                        @endcan

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                            {{ $data->dept_name }} Department</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You sure you want to delete {{ $data->dept_name }}
                                                        department
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('department.destroy', $data->id) }}"
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
                    <div class="pagination_style">
                        {{-- {{$list->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
