@extends('doctorDashboard.layout.app')
@section('content')
@section('title', 'Doctor View')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile_backgournd">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="image_place_holder">
                            @if (isset($doctorInfo))
                                <img src="{{ asset('uploads/' . $doctorInfo->image) }}" alt="">
                            @else
                                <img src="{{ asset('backend/img/img_avatar.png') }}" alt="">
                            @endif
                            @if (isset($doctorInfo))
                                <a href="{{ route('doctorDashboard.edit', $doctorInfo->id) }}"
                                    class="btn btn-primary btn-border">Edit Profile</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="profile_name_info">
                            <h3>{{ $doctorInfo->first_name . ' ' . $doctorInfo->middle_name . ' ' . $doctorInfo->last_name }}
                            </h3>
                            <p>{{ Str::upper($doctorInfo->address) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="basic_detail">
                <div class="row">
                    <div class="col-lg-4">
                        <h3>Basic Detail</h3>
                        <ul>
                            <li><span>Department:</span> {{ ($doctorInfo->Department->dept_name ?? '') }}</li>
                            <li><span>License No. :</span> {{ ($doctorInfo->license_no ?? '') }}</li>
                            <li><span>Gender:</span> {{ ($doctorInfo->gender ?? '') }}</li>
                            <li><span>Date Of Birth AD:</span> {{ ($doctorInfo->date_of_bith_ad ?? '') }}</li>
                            <li><span>Date Of Birth BS:</span> {{ ($doctorInfo->date_of_bith_bs ?? '') }}</li>
                            <li><span>Country:</span> {{ ($doctorInfo->country->english_name ?? '') }}</li>
                            <li><span>Province:</span> {{ ($doctorInfo->DoctorProvince->english_name ?? '') }}</li>
                            <li><span>District:</span> {{ ($doctorInfo->DoctorDistrict->english_name ?? '') }}</li>
                            <li><span>Municipality:</span>
                                {{ $doctorInfo->DoctorMunicipality->minicipality_name_nepali ?? '' }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h3>Education</h3>
                        @foreach ($doctorInfo->education as $rec)
                            <ul>
                                <li><span>Institure Name:</span> {{ $rec->institute_name ?? '' }}</li>
                                <li><span>Medical Degree :</span> {{ $rec->medical_degree ?? '' }}</li>
                                <li><span>Graduation year BS:</span> {{ $rec->graduation_year_bs ?? '' }}</li>
                                <li><span>Graduation year AD:</span> {{ $rec->graduation_year_ad ?? '' }}</li>
                                <li><span>Specialization:</span> {{ $rec->specialization ?? '' }}</li>

                            </ul>
                        @endforeach
                    </div>
                    <div class="col-lg-4">
                        <h3>Experience</h3>
                        @foreach ($doctorInfo->experience as $data)
                            <ul>
                                <li><span>Organization:</span> {{ $data->organization_name ?? '' }}</li>
                                <li><span>Start Date Bs:</span> {{ $data->start_date_bs ?? '' }}</li>
                                <li><span>End Date Bs:</span> {{ $data->end_date_bs ?? '' }}</li>
                                <li><span>Start Date AD:</span> {{ $data->start_date_ad ?? '' }}</li>
                                <li><span>End Date BS:</span> {{ $data->end_date_bs ?? '' }}</li>
                                <li><span>Description:</span> {{ $data->description ?? '' }}

                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
