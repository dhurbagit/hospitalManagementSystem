<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorEducation extends Model
{
    use HasFactory;
    protected $table = 'doctor_educations';
    protected $fillable = [
        'institute_name',
        'medical_degree',
        'graduation_year_bs',
        'graduation_year_ad',
        'specialization',
        'doctor_id',
        
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
 
   

}
						