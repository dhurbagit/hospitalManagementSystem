@extends('layout.app')

@section('content')
@section('title', 'Permission')
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb_wrapper">

                <ul>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
                    <li><a href="{{route('permission.index')}}">@yield('title')</a> /</li>
                    <li>Form</li>
                </ul>
                <div>

                    <a href="{{ route('permission.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">  Back</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                
                <div class="card-body">
                    <form action="{{route('permission.update', $permission->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{$permission->name}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
