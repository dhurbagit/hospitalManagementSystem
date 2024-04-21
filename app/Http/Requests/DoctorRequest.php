<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'license_no' => 'required|numeric',
            'gender' => 'required|string',
            'dept_id' => 'required|numeric',
            'country_id' => 'required|string',
            'province_id' => 'nullable',
            'district_id' => 'nullable',
            'municipality_id' => 'nullable',
            'address' => 'required',
            'ward_no' => 'required',
            'date_of_bith_ad' => 'required',
            'date_of_bith_bs' => 'required',
            // 'image' => 'required',
            'institute_name' => 'required',
            'medical_degree' => 'required',
            'graduation_year_bs' => 'required',
            'graduation_year_ad' => 'required',
            'specialization' => 'required',
            'organization_name' => 'required',
            'start_date_bs' => 'required',
            'end_date_bs' => 'required',
            'start_date_ad' => 'required',
            'end_date_ad' => 'required',
            'description' => 'required',
             'password' => Request()->method == 'POST' ?  'required|confirmed' : 'nullable'

        ];
    }

    public function messages()
    {
        return[
            '*.required' => 'This field is required',
        ];
    }
}
