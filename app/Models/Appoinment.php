<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'schedule_id',
        'patient_id',
        'description',
        'status',
        'nonte',
        'time_range'
    ];

    public function schedule(){
        return $this->belongsTo(schedule::class, 'schedule_id');
    }
     
    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}
