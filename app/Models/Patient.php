<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'gender',
        'DateOfBirth',
        'temporary_address',
        'Permanent_address',
        'phone',
        'email',
        'guardian_name',
        'appointment_message',
        'medical_history',
    ];

    public function appoinment(){
        return $this->belongsTo(Appoinment::class, 'patient_id');
    }
}
