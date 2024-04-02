@extends('layout.app')

@section('content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">Create New Doctor</h1>

        <a href="{{ route('doctor.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View Records</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form id="regForm" action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">


                @csrf
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-12 col-form-label">First Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="middle_name" class="col-sm-12 col-form-label">Middle Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="middle_name" id="middle_name"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-12 col-form-label">Last Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="license_no" class="col-sm-12 col-form-label">License No.</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="license_no" id="license_no"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="gender" class="col-sm-12 col-form-label">Gender</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="gender" id="gender"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="dept_id" class="col-sm-12 col-form-label">Department</label>
                                <div class="col-sm-12">
                                    <select name="dept_id" id="dept_id" class="form-control"
                                        onchange="this.className = ''">
                                        <option value="">--select Department--</option>
                                        <option value="1">1</option>
                                        <option value="2">1</option>
                                        <option value="3">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="country" class="col-sm-12 col-form-label">Country</label>
                                <div class="col-sm-12">
                                    <select name="country" id="countryID" class="form-control">
                                        <option value="">--Select Country--</option>
                                        @foreach ($countryList as $data)
                                            <option value="{{ $data->english_name }}">{{ $data->english_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="province" class="col-sm-12 col-form-label">Province</label>
                                <div class="col-sm-12">
                                    <select name="province" id="province" class="form-control"
                                        oninput="this.className = ''">
                                        <option value="">--select Province--</option>
                                        <option value="1">1</option>
                                        <option value="2">1</option>
                                        <option value="3">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="district" class="col-sm-12 col-form-label">District</label>
                                <div class="col-sm-12">
                                    <select name="district" id="district" class="form-control"
                                        oninput="this.className = ''">
                                        <option value="">--select District--</option>
                                        <option value="1">1</option>
                                        <option value="2">1</option>
                                        <option value="3">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="municipality" class="col-sm-12 col-form-label">Municipality</label>
                                <div class="col-sm-12">
                                    <select name="municipality" id="municipality" class="form-control"
                                        oninput="this.className = ''">
                                        <option value="">--select Municipality--</option>
                                        <option value="1">1</option>
                                        <option value="2">1</option>
                                        <option value="3">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="address" class="col-sm-12 col-form-label">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="address" id="address"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="ward_no" class="col-sm-12 col-form-label">ward No.</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="ward_no" id="ward_no"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="inputDOB" class="col-sm-12 col-form-label">Date of Birth (AD)</label>
                                <div class="col-sm-12">
                                    <input readonly type="date" class="form-control" name="date_of_bith_ad"
                                        id="inputDOB_ad" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="inputDOB" class="col-sm-12 col-form-label">Date of Birth (BS)</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Select Nepali Date"
                                        name="date_of_bith_bs" id="nepali-datepicker" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="image" class="col-sm-12 col-form-label">Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" placeholder="image" name="image"
                                        id="image" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="tab">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="institute_name" class="col-sm-12 col-form-label">Institute Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="institute_name" id="institute_name"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="medical_degree" class="col-sm-12 col-form-label">Medical Degree</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="medical_degree" id="medical_degree"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="graduation_year_bs" class="col-sm-12 col-form-label">Graduation Year
                                    BS</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="graduation_year_bs"
                                        id="graduation_year_bs" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="graduation_year_ad" class="col-sm-12 col-form-label">Graduation Year
                                    AD</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="graduation_year_ad"
                                        id="graduation_year_ad" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="specialization" class="col-sm-12 col-form-label">Specialization</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="specialization" id="specialization"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="organization_name" class="col-sm-12 col-form-label">Organization Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="organization_name"
                                        id="organization_name" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="start_date_bs" class="col-sm-12 col-form-label">Start Date Bs</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="start_date_bs" id="start_date_bs"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="end_date_bs" class="col-sm-12 col-form-label">End Date Bs</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="end_date_bs" id="end_date_bs"
                                        oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="start_date_ad" class="col-sm-12 col-form-label">Start Date AD</label>
                                <div class="col-sm-12">
                                    <input type="date" readonly class="form-control" name="start_date_ad"
                                        id="start_date_ad" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="end_date_ad" class="col-sm-12 col-form-label">End Date AD</label>
                                <div class="col-sm-12">
                                    <input type="date" readonly class="form-control" name="end_date_ad"
                                        id="end_date_ad" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" class="btn btn-primary" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-success" id="nextBtn"
                            onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </form>
        </div>

    </div>

@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            // show province when country nepal is selected
            $('#countryID').change(function() {
                var countryValue = $(this);
                if (countryValue.val() == 'Nepal') {
                    $.ajax({
                        url: '{{ route("getProvince") }}',
                        type: 'GET',
                        datatype: 'JSON',
                        success: function(res) {
                            var province = $('#province');
                            province.empty().append(
                                '<option value="" selected> Select your district </option>');
                            res.forEach(function(getProv) {
                                province.append('<option value='+ getProv['id']+'>' + getProv['nepali_name'] +
                                    '</option>');
                            })
                        }

                    });
                } else {
                    var province = $('#province');
                    province.empty().append(
                        '<option value="" selected> Select your district </option>');
                }
            });

            // show district when province is select

            

        });

        


    </script>
    <script>
         
        $(document).ready(function(){
            $('#province').change(function(){
                var PorvinceId = $(this).val();
                var url = " {{ route('getDistrict', ':PorvinceId') }} ";
                url = url.replace(':PorvinceId', PorvinceId);
                if(PorvinceId){
                    $.ajax({
                        url: url,
                        type: 'GET',
                        datatype: 'JSON',
                        success:function(res){
                            var district = $('#district');
                            district.empty().append(
                                '<option value="" selected> Select your district </option>'
                            );
                            console.log(res);
                            res.forEach(function(getDistrict){
                                district.append(
                                    '<option value="'+getDistrict['district_code']+'">'+ getDistrict['nepali_name']+'</option>'
                                );
                            }) 

                        },
                        error:function(){
                            alert('Error Fetching District !!!');
                        }
                    });
                }
                else{
                    $('#district').empty().append('<option value="">Select Your District</option>');
                }
            });
        })
    </script>
    <script>
         
        $(document).ready(function(){
            $('#district').change(function(){
                var DistrictId = $(this).val();
                var url = " {{ route('getMunicipality', ':DistrictId') }} ";
                url = url.replace(':DistrictId', DistrictId);
                if(DistrictId){
                    $.ajax({
                        url: url,
                        type: 'GET',
                        datatype: 'JSON',
                        success:function(res){
                            var district = $('#municipality');
                            district.empty().append(
                                '<option value="" selected> Select your district </option>'
                            );
                            console.log(res);
                            res.forEach(function(getMunicipality){
                                district.append(
                                    '<option value="'+getMunicipality['minicipality_code']+'">'+ getMunicipality['minicipality_name_nepali']+'</option>'
                                );
                            }) 

                        },
                        error:function(){
                            alert('Error Fetching District !!!');
                        }
                    });
                }
                else{
                    $('#district').empty().append('<option value="">Select Your District</option>');
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
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
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
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            console.log('next prev');
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, z, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].querySelectorAll("input");
            z = x[currentTab].querySelectorAll("select");
            console.log(z);
            // A loop that checks every select field in the current tab:
            for (i = 0; i < z.length; i++) {
                if (z[i].value == '') {
                    z[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {

                // If a field is empty...
                if (

                    y[i].value == ""


                ) {

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
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
@endpush
