@extends('layout.app')

@section('content')
<div class="breadcrumb_wrapper">
    {{ Breadcrumbs::render('doctorList') }}
    <a href="{{ route('doctor.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus"></i> Add Doctor</a>
</div>

     
    <!-- Page Heading -->



    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Doctor List</h6>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Department</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SNo</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Department</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($doctorList as $data)
                               
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::ucfirst($data->first_name) . ' ' . Str::ucfirst($data->middle_name) . ' ' . Str::ucfirst($data->last_name) }}
                                        </td>
                                        <td>
                                            {{-- {{ Str::ucfirst($data->education->specialization) }}  --}}
                                            @foreach ($data->education as $rec)
                                                <span class="badge doctor_table_badge">{{$rec->specialization}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ Str::ucfirst($data->department->dept_name) }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('doctor.show', $data->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="View detail" class="text-success"><i
                                                    class="far fa-eye"></i></a>
                                            <a href="{{ route('doctor.edit', $data->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="Edit Record" class="text-primary"><i
                                                    class="far fa-edit"></i></a>
                                            <a href="" data-toggle="modal"
                                                data-target="#exampleModal_{{ $data->id }}" data-toggle="tooltip"
                                                data-placement="top" title="Delete" class="text-danger"><i
                                                    class="fas fa-trash"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Doctor
                                                                Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You sure you want to delete Doctor {{ $data->first_name }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('doctor.destroy', $data->id) }}"
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
                    <div class="pagination_style">
                        {{ $doctorList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
