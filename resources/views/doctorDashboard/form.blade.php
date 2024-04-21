@extends('doctorDashboard.layout.app')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">Create New Doctor</h1>

        <a href="{{ route('doctorDashboard.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View Records</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if (isset($editDoctor))
                <form id="regForm" action="{{ route('doctorDashboard.update', $editDoctor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
            @endif

            @csrf

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-12 col-form-label">First Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    value="{{ isset($editDoctor) ? $editDoctor->first_name : old('first_name') }}"
                                    oninput="this.className = ''">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="middle_name" class="col-sm-12 col-form-label">Middle Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="middle_name" id="middle_name"
                                    value="{{ isset($editDoctor) ? $editDoctor->middle_name : old('middle_name') }}"
                                    oninput="this.className = ''">
                                @error('middle_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-12 col-form-label">Last Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    value="{{ isset($editDoctor) ? $editDoctor->last_name : old('last_name') }}"
                                    oninput="this.className = ''">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="license_no" class="col-sm-12 col-form-label">License No.</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="license_no" id="license_no"
                                    value="{{ isset($editDoctor) ? $editDoctor->license_no : old('license_no') }}"
                                    oninput="this.className = ''">
                                @error('license_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="gender" class="col-sm-12 col-form-label">Gender</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="gender" id="gender"
                                    value="{{ isset($editDoctor) ? $editDoctor->gender : old('gender') }}"
                                    oninput="this.className = ''">
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="dept_id" class="col-sm-12 col-form-label">Department</label>
                            <div class="col-sm-12">

                                <select name="dept_id" id="dept_id" class="form-control" onchange="this.className = ''">
                                    <option value="">--select Department--</option>
                                    @foreach ($departmentList as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == isset($editDoctor->dept_id) ? 'selected' : '' }}>
                                            {{ $data->dept_name }}</option>
                                    @endforeach
                                </select>
                                @error('dept_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="country" class="col-sm-12 col-form-label">Country</label>
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
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="province" class="col-sm-12 col-form-label">Province</label>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="district" class="col-sm-12 col-form-label">District</label>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="municipality_id" class="col-sm-12 col-form-label">Municipality</label>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="address" class="col-sm-12 col-form-label">Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{ isset($editDoctor) ? $editDoctor->address : old('address') }}"
                                    oninput="this.className = ''">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="ward_no" class="col-sm-12 col-form-label">ward No.</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="ward_no" id="ward_no"
                                    value="{{ isset($editDoctor) ? $editDoctor->ward_no : old('ward_no') }}"
                                    oninput="this.className = ''">
                                @error('ward_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="inputDOB" class="col-sm-12 col-form-label">Date of Birth (AD)</label>
                            <div class="col-sm-12">
                                <input readonly type="date" class="form-control" name="date_of_bith_ad"
                                    value="{{ isset($editDoctor) ? $editDoctor->date_of_bith_ad : old('date_of_bith_ad') }}"
                                    id="inputDOB_ad" oninput="this.className = ''">
                                @error('date_of_bith_ad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="inputDOB" class="col-sm-12 col-form-label">Date of Birth (BS)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Select Nepali Date"
                                    value="{{ isset($editDoctor) ? $editDoctor->date_of_bith_bs : old('date_of_bith_bs') }}"
                                    name="date_of_bith_bs" id="nepali-datepicker" oninput="this.className = ''">
                                @error('date_of_bith_bs')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="image" class="col-sm-12 col-form-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control {{ isset($editDoctor) ? 'not-required' : '' }}"
                                    placeholder="image" name="image" value="{{ old('image') }}" id="image"
                                    oninput="this.className = ''">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="tab">
                @foreach ($editDoctorEducation as $education)
                    <div class="institure_detail">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="institute_name" class="col-sm-12 col-form-label">Institute Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="institute_name[]"
                                            id="institute_name"
                                            value="{{ isset($education) ? $education->institute_name : old('institute_name') }}"
                                            oninput="this.className = ''">
                                        @error('institute_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="medical_degree" class="col-sm-12 col-form-label">Medical Degree</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="medical_degree[]"
                                            id="medical_degree"
                                            value="{{ isset($education) ? $education->medical_degree : old('medical_degree') }}"
                                            oninput="this.className = ''">
                                        @error('medical_degree')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="graduation_year_bs" class="col-sm-12 col-form-label">Graduation Year
                                        BS</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="graduation_year_bs[]"
                                            value="{{ isset($education) ? $education->graduation_year_bs : old('graduation_year_bs') }}"
                                            id="graduation_year_bs" oninput="this.className = ''">
                                        @error('graduation_year_bs')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="graduation_year_ad" class="col-sm-12 col-form-label">Graduation Year
                                        AD</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="graduation_year_ad[]"
                                            value="{{ isset($education) ? $education->graduation_year_ad : old('graduation_year_ad') }}"
                                            id="graduation_year_ad" oninput="this.className = ''">
                                        @error('graduation_year_ad')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="specialization" class="col-sm-12 col-form-label">Specialization</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="specialization[]"
                                            id="specialization"
                                            value="{{ isset($education) ? $education->specialization : old('specialization') }}"
                                            oninput="this.className = ''">
                                        @error('specialization')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <a class="deleteEducatioon" data-id="{{ $education->id }}" href="javascript:void(0)"><i
                        class="fas fa-trash-alt"></i></a>
                @endforeach
                <div id="wrapper_one">

                </div>
                <a href="javascript:void(0)" id="add" class="btn btn-success">add</a>
            </div>

            <div class="tab">
                <div class="workExperience_detail">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="organization_name" class="col-sm-12 col-form-label">Organization Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="organization_name[]"
                                        value="{{ isset($editDoctorExperience) ? $editDoctorExperience->organization_name : old('organization_name[]') }}"
                                        id="organization_name" oninput="this.className = ''">
                                    @error('organization_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="start_date_bs" class="col-sm-12 col-form-label">Start Date Bs</label>
                                <div class="col-sm-12 bs_start_dynamic_class_experience">
                                    <input type="text" class="form-control" name="start_date_bs[]" id="start_date_bs"
                                        value="{{ isset($editDoctorExperience) ? $editDoctorExperience->start_date_bs : old('start_date_bs[]') }}"
                                        oninput="this.className = ''">
                                    @error('start_date_bs')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="end_date_bs" class="col-sm-12 col-form-label">End Date Bs</label>
                                <div class="col-sm-12 bs_end_dynamic_class_experience">
                                    <input type="text" class="form-control" name="end_date_bs[]" id="end_date_bs"
                                        value="{{ isset($editDoctorExperience) ? $editDoctorExperience->end_date_bs : old('end_date_bs[]') }}"
                                        oninput="this.className = ''">
                                    @error('end_date_bs')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="start_date_ad" class="col-sm-12 col-form-label">Start Date AD</label>
                                <div class="col-sm-12 ad_start_dynamic_class_experience">
                                    <input type="date" readonly class="form-control" name="start_date_ad[]"
                                        value="{{ isset($editDoctorExperience) ? $editDoctorExperience->start_date_ad : old('start_date_ad[]') }}"
                                        id="start_date_ad" oninput="this.className = ''">
                                    @error('start_date_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="end_date_ad" class="col-sm-12 col-form-label">End Date AD</label>
                                <div class="col-sm-12 ad_end_dynamic_class_experience">
                                    <input type="date" readonly class="form-control" name="end_date_ad[]"
                                        value="{{ isset($editDoctorExperience) ? $editDoctorExperience->end_date_ad : old('end_date_ad[]') }}"
                                        id="end_date_ad" oninput="this.className = ''">
                                    @error('end_date_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="description" class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea name="description[]" id="" class="form-control" cols="30" rows="10">{{ isset($editDoctorExperience) ? $editDoctorExperience->description : old('description[]') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div id="wrapper_two">

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="javascript:void(0)" id="addExperience" class="btn btn-success">add</a>
                    </div>
                </div>
            </div>

            <div class="tab">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="email" class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email" id="email"
                                    value="{{ isset($editUserDetail) ? $editUserDetail->email : old('email') }}"
                                    oninput="this.className = ''">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="email" class="col-sm-12 col-form-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password"
                                    class="form-control {{ isset($editUserDetail) ? 'not-required' : '' }}"
                                    name="password" id="password" oninput="this.className = ''">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row">
                            <label for="email" class="col-sm-12 col-form-label">Confirm Password</label>
                            <div class="col-sm-12">
                                <input type="password"
                                    class="form-control {{ isset($editUserDetail) ? 'not-required' : '' }}"
                                    name="password_confirmation" id="password_confirmation"
                                    oninput="this.className = ''">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            </form>
        </div>

    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // show province when country nepal is selected
            $('#countryID').change(function() {
                var countryValue = $(this);
                if (countryValue.val() == '156') {
                    $.ajax({
                        url: '{{ route('getProvince_d') }}',
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {
                            var province = $('#province_id');
                            province.removeAttr('disabled').empty().append(
                                '<option value="" selected> Select your Porvince </option>');
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
                        '<option value="" selected> Select your Porvince </option>');


                }
            });

            // show district when province is select



        });
    </script>
    <script>
        $(document).ready(function() {
            $('#province_id').change(function() {
                var PorvinceId = $(this).val();
                var url = " {{ route('getDistrict_d', ':PorvinceId') }} ";
                url = url.replace(':PorvinceId', PorvinceId);
                if (PorvinceId) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {
                            var district = $('#district_id');
                            district.removeAttr('disabled').empty().append(
                                '<option  value="" selected> Select your district </option>'
                            );
                            console.log(res);
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
                    $('#district').empty().append('<option value="">Select Your District</option>');
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#district_id').change(function() {
                var DistrictId = $(this).val();
                var url = " {{ route('getMunicipality_d', ':DistrictId') }} ";
                url = url.replace(':DistrictId', DistrictId);
                if (DistrictId) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {
                            var municipality = $('#municipality_id');
                            municipality.removeAttr('disabled').empty().append(
                                '<option value="" selected> Select your Municipality </option>'
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
                            alert('Error Fetching Municipality !!!');
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">Select Your Municipality</option>');
                }
            });
        })
    </script>
    <script>
        function graduationBsToAd() {
            var nepaliDate = $('#graduation_year_bs').val();
            var englishDate = NepaliFunctions.BS2AD(nepaliDate);
            $('#graduation_year_ad').val(englishDate);
            // document.getElementById('inputDOB_ad').value = englishDate
        }
    </script>
    <script>
        function startbsToAd() {
            var nepaliDate = $('#start_date_bs').val();
            var englishDate = NepaliFunctions.BS2AD(nepaliDate);
            $('#start_date_ad').val(englishDate);
            // document.getElementById('inputDOB_ad').value = englishDate
        }
    </script>
    <script>
        function EndbsToAd() {
            var nepaliDate = $('#end_date_bs').val();
            var englishDate = NepaliFunctions.BS2AD(nepaliDate);
            $('#end_date_ad').val(englishDate);
            // document.getElementById('inputDOB_ad').value = englishDate
        }
    </script>
    <script>
        function bsToAd() {
            var nepaliDate = $('#nepali-datepicker').val();
            var englishDate = NepaliFunctions.BS2AD(nepaliDate);
            $('#inputDOB_ad').val(englishDate);
            // document.getElementById('inputDOB_ad').value = englishDate
        }
    </script>
    <script type="text/javascript">
        window.onload = function() {
            var mainInput = document.getElementById("nepali-datepicker");
            mainInput.nepaliDatePicker();
            var mainInput = document.getElementById("graduation_year_bs");
            mainInput.nepaliDatePicker();
            var mainInput = document.getElementById("start_date_bs");
            mainInput.nepaliDatePicker();
            var mainInput = document.getElementById("end_date_bs");
            mainInput.nepaliDatePicker();
            setInterval(() => {
                bsToAd();
                graduationBsToAd();
                startbsToAd();
                EndbsToAd();
            }, 1000);
        };
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            console.log('lkjl');
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;

            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var w, x, y, z, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].querySelectorAll("input");
            z = x[currentTab].querySelectorAll("select");
            w = x[currentTab].querySelectorAll("textarea");
            // A loop that checks every select field in the current tab:
            for (i = 0; i < z.length; i++) {
                if (z[i].value == ''&& !z[i].disabled) {
                    z[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            for (i = 0; i < w.length; i++) {
                if (w[i].value == '') {
                    w[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {

                // If a field is empty...
                if (y[i].value == "" && !y[i].classList.contains("not-required")) {

                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
    <script>
        $("#add").click(function() {
            var checkbox = $('<input type="checkbox">');


            $(".tab > .institure_detail:last").clone()
                .append($('<a id="glyphicon-remove" href="#">Remove</a>'))
                .appendTo("#wrapper_one");
        });

        $(document).on('click', '#glyphicon-remove', function() {
            $(this).parent().remove();
        });
    </script>







    <script>
        $(document).ready(function() {

            var cit = $('#countryID').val();
            if (cit == 156) {
                var province = $('#province_id');
                province.removeAttr('disabled');
                var district = $('#district_id');
                district.removeAttr('disabled');
                var municipality = $('#municipality_id');
                municipality.removeAttr('disabled');
            } else {
                var province = $('#province_id');
                province.attr('disabled', 'disabled');
                var district = $('#district_id');
                district.attr('disabled', 'disabled');
                var municipality = $('#municipality_id');
                municipality.attr('disabled', 'disabled');
            }
        })
    </script>

<script>
    $('.deleteEducatioon').click(function() {
        
        var id = $(this).attr('data-id');
        $.ajax({
            type: "post",
            url: "{{ route('deleteDoctorEducation') }}",
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
<script src="{{asset('backend/js/script.js')}}"></script>
@endpush
