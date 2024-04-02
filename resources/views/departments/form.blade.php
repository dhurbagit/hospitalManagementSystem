@extends('layout.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if (isset($showList))
        <h1 class="h3 mb-0 text-gray-800">Update Department</h1>
        @else
        <h1 class="h3 mb-0 text-gray-800">Create New Department</h1>
        @endif
        <a href="{{ route('department.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View Records</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if (isset($showList))
                <form action="{{ route('department.update', $showList->id) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('department.store') }}" method="POST">
            @endif
            @csrf
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="dept_name"
                        value="{{ isset($showList) ? $showList->dept_name : old('dept_name') }}">
                    <div class="text-danger">
                        @error('dept_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputCode" class="col-sm-2 col-form-label">Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCode" name="dept_code"
                        value="{{ isset($showList) ? $showList->dept_code : old('dept_code') }}">
                    <div class="text-danger">
                        @error('dept_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputdescription" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px;" name="dept_description" id="editor" rows="10">{{ isset($showList) ? $showList->dept_description : old('dept_description') }}</textarea>
                    <div class="text-danger">
                        @error('dept_description')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            @if (isset($showList))
                <button type="submit" class="offset-sm-2 btn btn-success">Update</button>
            @else
                <button type="submit" class="offset-sm-2 btn btn-success">Save</button>
            @endif
            </form>
        </div>
    </div>


@stop

@push('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
