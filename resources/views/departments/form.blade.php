@extends('layout.app')
@section('content')
    <div class="breadcrumb_wrapper">
        {{ Breadcrumbs::render('departmentform') }}

    </div>

    <div class="content_info_wrapper work_experience">
        @if (isset($showList))
            <form action="{{ route('department.update', $showList->id) }}" method="POST">
                @method('PUT')
            @else
                <form action="{{ route('department.store') }}" method="POST">
        @endif
        @csrf
        <fieldset class="fieldSet_wrapper">
            <legend>Create New Department Form</legend>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" name="dept_name"
                            value="{{ isset($showList) ? $showList->dept_name : old('dept_name') }}">
                        <small class="form-text text-muted">Enter Your New department name</small>
                        @error('dept_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputCode" name="dept_code"
                            value="{{ isset($showList) ? $showList->dept_code : old('dept_code') }}">
                        <small class="form-text text-muted">Enter Your deprtment Code</small>
                        @error('dept_code')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <textarea class="form-control" style="height: 100px;" name="dept_description" id="editor" rows="10">{{ isset($showList) ? $showList->dept_description : old('dept_description') }}</textarea>
                    <small class="form-text text-muted">Enter Description</small>
                    @error('dept_description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>




        </fieldset>
        @if (isset($showList))
            <button type="submit" class="btn btn-success">Update</button>
        @else
            <button type="submit" class="btn btn-success">Save</button>
        @endif
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
