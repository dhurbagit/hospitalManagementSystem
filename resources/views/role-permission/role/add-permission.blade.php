@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
                
            @endif
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Role {{ $role->name}}
                        <a href="{{route('role.create')}}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{url('role/' . $role->id . '/give-permission')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label for="">Permission</label>
                            @foreach ($permissions as $permission)
                            <input type="checkbox" name="permission[]" class="form-control" value="{{$permission->name}}"
                            {{ in_array($permission->id, $rolePermission) ? 'checked' : ''}}
                            >
                            {{ $permission->name}}
                            @endforeach
                          
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
