<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'doctors';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'license_no', 'country_id', 'user_id',
        'province_id', 'district_id', 'municipality_id', 'address', 'ward_no', 'gender', 'date_of_bith_ad', 'date_of_bith_bs', 'image', 'dept_id'
    ];

  
    public function education()
    {
        return $this->hasMany(DoctorEducation::class, 'doctor_id', 'id');
    }
    public function experience()
    {
        return $this->hasMany(DoctorExperience::class, 'doctor_id', 'id');
    }

    public function Department(){
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function DoctorProvince(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function DoctorDistrict(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function DoctorMunicipality(){
        return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
    }
    
 
}
