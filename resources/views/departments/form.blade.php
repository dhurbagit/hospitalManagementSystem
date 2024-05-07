@extends('layout.app')
@section('content')
@section('title', 'Department')
<div class="breadcrumb_wrapper">

    <ul>
        <li><a href="{{ url('/dashboard') }}">Dashboard</a> /</li>
        <li><a href="{{ route('department.index') }}">@yield('title')</a> /</li>
        <li>Form</li>
    </ul>
   
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

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-text text-muted">Department Name <span class="text-danger">*</span></label>
                    <input placeholder="Department Name" type="text" class="form-control" id="inputName"
                        name="dept_name" value="{{ isset($showList) ? $showList->dept_name : old('dept_name') }}">

                    @error('dept_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-text text-muted">Deprtment Code<span class="text-danger">*</span></label>
                    <input placeholder="Deprtment Code" type="text" class="form-control" id="inputCode"
                        name="dept_code" value="{{ isset($showList) ? $showList->dept_code : old('dept_code') }}">

                    @error('dept_code')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-text text-muted">Enter Description<span class="text-danger">*</span></label>
                    <textarea placeholder="Enter Description" class="form-control" style="height: 100px;" name="dept_description"
                        id="editor" rows="10">{{ isset($showList) ? $showList->dept_description : old('dept_description') }}</textarea>

                    @error('dept_description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
