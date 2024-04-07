<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $guarded = [];

    // we can retreive the number of districts based on province 
    public function districts()
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }

    public function provinceDoctor(){
        return $this->hasMany(Doctor::class, 'province_id', 'id');
    }
}
