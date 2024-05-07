@extends('layout.app')
@section('content')
@section('title', 'Patient')

<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
        <li>@yield('title')</li>
    </ul>

</div>
<div class="row">
    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date Of Birth</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date Of Birth</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($patient as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->fullname}}</td>
                                    <td>{{$data->gender}}</td>
                                    <td>{{$data->DateOfBirth}}</td>
                                    <td>{{$data->Permanent_address}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="pagination_style">
                    {{ $patient->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
