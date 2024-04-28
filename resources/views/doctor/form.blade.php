@extends('layout.app')

@section('content')

    <div class="breadcrumb_wrapper">
        {{ Breadcrumbs::render('doctorform') }}

    </div>

    <div class="form_wrapper_doctor">
        @if (isset($editDoctor))
            <form id="regForm" action="{{ route('doctor.update', $editDoctor->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
            @else
                <form id="regForm" action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
        @endif

        @csrf
        <div class="tab">
            <div class="row">
                <div class="col-lg-3">
                    <div class="image_thumbnail_wrapper">
                        <div class="img_wrapper">
                            <img @if (isset($editDoctor)) src="{{ asset('uploads/' . $editDoctor->image) }}"
                                @else
                                src="http://127.0.0.1:8000/backend/img/undraw_profile.svg" @endif
                                alt="" id="placeholder_image">
                        </div>
                        <input type="file" onchange="loadFile(event)" class="input_file form-control" placeholder="image"
                            name="image" value="{{ old('image') }}" id="image" oninput="this.className = ''">
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="content_info_wrapper">
                        <fieldset class="fieldSet_wrapper">
                            <legend>Basic Information</legend>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                required
                                                value="{{ isset($editDoctor) ? $editDoctor->first_name : old('first_name') }}"
                                                oninput="this.className = ''" placeholder="First Name">
                                            <small class="form-text text-muted">Please enter your First Name</small>
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <span class="required_label">Required</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="middle_name" id="middle_name"
                                                value="{{ isset($editDoctor) ? $editDoctor->middle_name : old('middle_name') }}"
                                                oninput="this.className = ''" placeholder="Middle Name">
                                            <small class="form-text text-muted">Please enter your Middle Name</small>
                                            @error('middle_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                value="{{ isset($editDoctor) ? $editDoctor->last_name : old('last_name') }}"
                                                oninput="this.className = ''" placeholder="Last Name">
                                            <small class="form-text text-muted">Please enter your Last Name</small>
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Date of Birth in BS"
                                                value="{{ isset($editDoctor) ? $editDoctor->date_of_bith_bs : old('date_of_bith_bs') }}"
                                                name="date_of_bith_bs" id="nepali-datepicker" oninput="this.className = ''">
                                            <small class="form-text text-muted">Please select your Date of Birth in
                                                BS</small>
                                            @error('date_of_bith_bs')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input readonly type="text" class="form-control" name="date_of_bith_ad"
                                                value="{{ isset($editDoctor) ? $editDoctor->date_of_bith_ad : old('date_of_bith_ad') }}"
                                                id="inputDOB_ad" oninput="this.className = ''"
                                                placeholder="Date of Birth in AD">
                                            <small class="form-text text-muted">Its your Date of Birth in AD</small>
                                            @error('date_of_bith_ad')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="license_no" id="license_no"
                                                value="{{ isset($editDoctor) ? $editDoctor->license_no : old('license_no') }}"
                                                oninput="this.className = ''" placeholder="License No.">
                                            <small class="form-text text-muted">Enter you Medical License Number</small>
                                            @error('license_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row select_style">

                                        <div class="col-sm-12">

                                            <select name="dept_id" id="dept_id" class="form-control"
                                                onchange="this.className = ''">
                                                <option value="">--select Department--</option>
                                                @foreach ($departmentList as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == isset($editDoctor->dept_id) ? 'selected' : '' }}>
                                                        {{ $data->dept_name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">Select Which department belong to</small>
                                            @error('dept_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <div class="col-sm-12 edit_gender">

                                            Male &nbsp;<input class="" type="radio" name="gender"
                                                {{ isset($editDoctor->gender) && $editDoctor->gender == 'Male' ? 'checked' : '' }}
                                                value="Male">
                                            &nbsp;Female &nbsp;<input class="" type="radio" name="gender"
                                                {{ isset($editDoctor->gender) && $editDoctor->gender == 'Female' ? 'checked' : '' }}
                                                value="Female">
                                            &nbsp;Other &nbsp;<input class="" type="radio" name="gender"
                                                {{ isset($editDoctor->gender) && $editDoctor->gender == 'Other' ? 'checked' : '' }}
                                                value="Other">
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="content_info_wrapper">
                        <fieldset class="fieldSet_wrapper">
                            <legend>Address</legend>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group row select_style">

                                        <div class="col-sm-12">
                                            <select name="country_id" id="countryID" class="form-control">
                                                <option value="">--Select Country--</option>

                                                @foreach ($countryList as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == isset($editDoctor->country_id) && $data->id == $editDoctor->country_id ? 'selected' : '' }}>
                                                        {{ $data->english_name }}</option>
                                                @endforeach

                                            </select>
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row select_style">

                                        <div class="col-sm-12">
                                            <select name="province_id" id="province_id" class="form-control"
                                                oninput="this.className = ''">
                                                <option value="">--select Province--</option>
                                                @if (isset($province))
                                                    @foreach ($province as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $data->id == $editDoctor->province_id ? 'selected' : '' }}>
                                                            {{ $data->nepali_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('province')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row select_style">

                                        <div class="col-sm-12">
                                            <select name="district_id" id="district_id" class="form-control"
                                                oninput="this.className = ''">
                                                <option value="">--select District--</option>


                                                @if (isset($districts))
                                                    @foreach ($getDistrictList as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $data->id == $editDoctor->district_id ? 'selected' : '' }}>
                                                            {{ $data->nepali_name }}</option>
                                                    @endforeach
                                                @endif


                                            </select>
                                            @error('district')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row select_style">

                                        <div class="col-sm-12">
                                            <select name="municipality_id" id="municipality_id" class="form-control"
                                                oninput="this.className = ''">
                                                <option value="">--select Municipality--</option>
                                                @if (isset($municipalities))
                                                    @foreach ($getMunicipality as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $data->id == $editDoctor->municipality_id ? 'selected' : '' }}>
                                                            {{ $data->minicipality_name_nepali }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('municipality')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="address" id="address"
                                                value="{{ isset($editDoctor) ? $editDoctor->address : old('address') }}"
                                                oninput="this.className = ''" placeholder="Address">
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="ward_no" id="ward_no"
                                                value="{{ isset($editDoctor) ? $editDoctor->ward_no : old('ward_no') }}"
                                                oninput="this.className = ''" placeholder="ward No.">
                                            @error('ward_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content_info_wrapper academic_info">
                        @if (isset($editDoctorEducation))
                            @foreach ($editDoctorEducation as $education)
                                <fieldset class="fieldSet_wrapper">
                                    <legend>Academic Information</legend>

                                    <div class="institure_detail">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="institute_name[]" id="institute_name"
                                                            value="{{ isset($education) ? $education->institute_name : old('institute_name[]') }}"
                                                            oninput="this.className = ''">
                                                        <small class="form-text text-muted">Institute Name</small>
                                                        @error('institute_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="medical_degree[]" id="medical_degree"
                                                            value="{{ isset($education) ? $education->medical_degree : old('medical_degree[]') }}"
                                                            oninput="this.className = ''">
                                                        <small class="form-text text-muted">Medical Degree</small>
                                                        @error('medical_degree')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12 bs_dynamic_class">
                                                        <input type="text" class="form-control "
                                                            name="graduation_year_bs[]"
                                                            value="{{ isset($education) ? $education->graduation_year_bs : old('graduation_year_bs[]') }}"
                                                            id="graduation_year_bs" oninput="this.className = ''">
                                                        <small class="form-text text-muted">Graduation Year in BS</small>
                                                        @error('graduation_year_bs')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12 ad_dynamic_class">
                                                        <input type="date" class="form-control" readonly
                                                            name="graduation_year_ad[]"
                                                            value="{{ isset($education) ? $education->graduation_year_ad : old('graduation_year_ad[]') }}"
                                                            id="graduation_year_ad" oninput="this.className = ''">
                                                        <small class="form-text text-muted">Graduation Year in AD</small>
                                                        @error('graduation_year_ad')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="specialization[]" id="specialization"
                                                            value="{{ isset($education) ? $education->specialization : old('specialization[]') }}"
                                                            oninput="this.className = ''">
                                                        <small class="form-text text-muted">Specialization</small>
                                                        @error('specialization')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <a class="deleteEducatioon" data-id="{{ $education->id }}" href="javascript:void(0)"><i
                                        class="fas fa-trash-alt"></i></a>
                            @endforeach
                        @else
                            <fieldset class="fieldSet_wrapper">
                                <legend>Academic Information</legend>
                                <div class="institure_detail">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="institute_name[]"
                                                        id="institute_name" value="{{ old('institute_name[]') }}"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Institute Name</small>

                                                    @error('institute_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="medical_degree[]"
                                                        id="medical_degree" value="{{ old('medical_degree[]') }}"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Medical Degree</small>
                                                    @error('medical_degree')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12 bs_dynamic_class">
                                                    <input type="text" class="form-control "
                                                        name="graduation_year_bs[]"
                                                        value="{{ old('graduation_year_bs[]') }}" id="graduation_year_bs"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Graduation Year In BS</small>
                                                    @error('graduation_year_bs')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12 ad_dynamic_class">
                                                    <input type="date" class="form-control" readonly
                                                        name="graduation_year_ad[]"
                                                        value="{{ old('graduation_year_ad[]') }}" id="graduation_year_ad"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Graduation Year In AD</small>
                                                    @error('graduation_year_ad')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="specialization[]"
                                                        id="specialization" value="{{ old('specialization[]') }}"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Specialization</small>
                                                    @error('specialization')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </fieldset>
                        @endif


                        <div id="wrapper_one">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0)" id="add" class="btn btn-success">Add Academic Qualification</a>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content_info_wrapper work_experience">
                        @if (isset($editDoctorExperience))
                            @foreach ($editDoctorExperience as $experience)
                                <fieldset class="fieldSet_wrapper">
                                    <legend>Work Experience</legend>

                                    <div class="workExperience_detail">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="organization_name[]"
                                                            value="{{ isset($experience) ? $experience->organization_name : old('organization_name[]') }}"
                                                            id="organization_name" oninput="this.className eri= ''">
                                                        <small class="form-text text-muted">Organization Name</small>
                                                        @error('organization_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12 bs_start_dynamic_class_experience">
                                                        <input type="text" class="form-control" name="start_date_bs[]"
                                                            id="start_date_bs"
                                                            value="{{ isset($experience) ? $experience->start_date_bs : old('start_date_bs[]') }}"
                                                            oninput="this.className = ''">
                                                        <small class="form-text text-muted">Start Date in Bs</small>
                                                        @error('start_date_bs')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-sm-12 bs_end_dynamic_class_experience">
                                                        <input type="text" class="form-control" name="end_date_bs[]"
                                                            id="end_date_bs"
                                                            value="{{ isset($experience) ? $experience->end_date_bs : old('end_date_bs[]') }}"
                                                            oninput="this.className = ''">
                                                        <small class="form-text text-muted">End Date in Bs</small>
                                                        @error('end_date_bs')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12 ad_start_dynamic_class_experience">
                                                        <input type="date" readonly class="form-control"
                                                            name="start_date_ad[]"
                                                            value="{{ isset($experience) ? $experience->start_date_ad : old('start_date_ad[]') }}"
                                                            id="start_date_ad" oninput="this.className = ''">
                                                        <small class="form-text text-muted">Start Date in AD</small>
                                                        @error('start_date_ad')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group row">

                                                    <div class="col-sm-12 ad_end_dynamic_class_experience">
                                                        <input type="date" readonly class="form-control"
                                                            name="end_date_ad[]"
                                                            value="{{ isset($experience) ? $experience->end_date_ad : old('end_date_ad[]') }}"
                                                            id="end_date_ad" oninput="this.className = ''">
                                                        <small class="form-text text-muted">End Date in AD</small>
                                                        @error('end_date_ad')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group row">

                                                    <div class="col-sm-12 useOfEditor">
                                                        <textarea name="description[]" id="editor" class="form-control" cols="30" rows="10">{{ isset($experience) ? $experience->description : old('description[]') }}</textarea>
                                                        <small class="form-text text-muted">Description</small>
                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <span class="required_label">Required</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    


                                </fieldset>
                                <a class="deleteExperience" data-id="{{ $experience->id }}"
                                    href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a>
                            @endforeach
                        @else
                            <fieldset class="fieldSet_wrapper">
                                <legend>Work Experience</legend>
                                <div class="workExperience_detail">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="organization_name[]"
                                                        value="{{ old('organization_name[]') }}" id="organization_name"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Organization Name</small>
                                                    @error('organization_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12 bs_start_dynamic_class_experience">
                                                    <input type="text" class="form-control" name="start_date_bs[]"
                                                        id="start_date_bs" value="{{ old('start_date_bs[]') }}"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">Start Date in Bs</small>
                                                    @error('start_date_bs')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12 bs_end_dynamic_class_experience">
                                                    <input type="text" class="form-control" name="end_date_bs[]"
                                                        id="end_date_bs" value="{{ old('end_date_bs[]') }}"
                                                        oninput="this.className = ''">
                                                    <small class="form-text text-muted">End Date in Bs</small>
                                                    @error('end_date_bs')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12 ad_start_dynamic_class_experience">
                                                    <input type="date" readonly class="form-control"
                                                        name="start_date_ad[]" value="{{ old('start_date_ad[]') }}"
                                                        id="start_date_ad" oninput="this.className = ''">
                                                    <small class="form-text text-muted">Start Date in AD</small>
                                                    @error('start_date_ad')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">

                                                <div class="col-sm-12 ad_end_dynamic_class_experience">
                                                    <input type="date" readonly class="form-control"
                                                        name="end_date_ad[]" value="{{ old('end_date_ad[]') }}"
                                                        id="end_date_ad" oninput="this.className = ''">
                                                    <small class="form-text text-muted">End Date in AD</small>
                                                    @error('end_date_ad')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <textarea name="description[]" id="" class="form-control" cols="30" rows="10">{{ old('description[]') }}</textarea>
                                                    <small class="form-text text-muted">Description</small>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="required_label">Required</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        @endif


                        <div id="wrapper_two">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="javascript:void(0)" id="addExperience" class="btn btn-success">add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab {{ isset($editUserDetail) ? 'dontShow' : '' }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content_info_wrapper">
                        <fieldset class="fieldSet_wrapper">
                            <legend>User Login Info</legend>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="{{ isset($editUserDetail) ? $editUserDetail->email : old('email') }}"
                                                oninput="this.className = ''">
                                            <small class="form-text text-muted">Email</small>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="password"
                                                class="form-control {{ isset($editUserDetail) ? 'not-required' : '' }}"
                                                name="password" id="password" oninput="this.className = ''">
                                            <small class="form-text text-muted">Password</small>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="password"
                                                class="form-control {{ isset($editUserDetail) ? 'not-required' : '' }}"
                                                name="password_confirmation" id="password_confirmation"
                                                oninput="this.className = ''">
                                            <small class="form-text text-muted">Confirm Password</small>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <span class="required_label">Required</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow:auto;" class="btn_group">
            <div style="float:right;">
                <button type="button" class="btn btn-success" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;" id="step_circle">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step" {{ isset($editUserDetail) ? 'style="display:none"' : '' }}></span>
        </div>
        </form>
    </div>














@endsection

@push('scripts')
    <script src="{{ asset('backend/js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            // show province when country nepal is selected
            $('#countryID').change(function() {

                var countryValue = $(this);

                if (countryValue.val() == '156') {
                    $.ajax({
                        url: '{{ route('getProvince') }}',
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {

                            var province = $('#province_id');

                            province.removeAttr('disabled').empty().append(
                                '<option value="" selected>--Select Porvince--</option>');
                            res.forEach(function(getProv) {
                                province.append('<option value=' + getProv['id'] + '>' +
                                    getProv['nepali_name'] + '</option>');
                            })
                        }

                    });
                } else {
                    var province = $('#province_id');
                    var district = $('#district_id');
                    var municipality = $('#municipality_id');
                    district.attr('disabled', 'disabled');
                    municipality.attr('disabled', 'disabled');

                    province.attr('disabled', 'disabled').empty().append(
                        '<option value="" selected>--Select Porvince--</option>');
                }
            });

            // show district when province is select



        });
    </script>
    <script>
        $(document).ready(function() {
            $('#province_id').change(function() {
                var PorvinceId = $(this).val();
                var url = " {{ route('getDistrict', ':PorvinceId') }} ";
                url = url.replace(':PorvinceId', PorvinceId);
                if (PorvinceId) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {
                            var district = $('#district_id');
                            district.removeAttr('disabled').empty().append(
                                '<option value="" selected>--Select district--</option>'
                            );

                            res.forEach(function(getDistrict) {
                                district.append(
                                    '<option value="' + getDistrict[
                                        'district_code'] + '">' + getDistrict[
                                        'nepali_name'] + '</option>'
                                );
                            })

                        },
                        error: function() {
                            alert('Error Fetching District !!!');
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">--Select district--</option>');
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#district_id').change(function() {
                var DistrictId = $(this).val();
                var url = " {{ route('getMunicipality', ':DistrictId') }} ";
                url = url.replace(':DistrictId', DistrictId);
                if (DistrictId) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {
                            var municipality = $('#municipality_id');
                            municipality.removeAttr('disabled').empty().append(
                                '<option value="" selected>--Select Municipality-- </option>'
                            );

                            res.forEach(function(getMunicipality) {
                                municipality.append(
                                    '<option value="' + getMunicipality[
                                        'minicipality_code'] + '">' +
                                    getMunicipality['minicipality_name_nepali'] +
                                    '</option>'
                                );
                            })

                        },
                        error: function() {
                            alert('Error Fetching District !!!');
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">--Select Municipality--</option>');
                }
            });
        })
    </script>

    <script>
        $('.deleteEducatioon').click(function() {

            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('deleteEducation') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success: function(res) {
                    toastr.success(res);
                    window.location.reload();
                }
            });
        });
    </script>
    <script>
        $('.deleteExperience').click(function() {

            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('deleteExperience') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success: function(res) {
                    toastr.success(res);
                    window.location.reload();
                }
            });
        });
    </script>
@endpush
