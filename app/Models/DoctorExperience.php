<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorExperience extends Model
{
    use HasFactory;
    protected $table = 'doctor_experiences';
    protected $fillable = [
        'organization_name',
        'start_date_bs',
        'start_date_ad',
        'end_date_bs',
        'end_date_ad',
        'description',
        'doctor_id',
    ];

    public function doctorExperience(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }


}
