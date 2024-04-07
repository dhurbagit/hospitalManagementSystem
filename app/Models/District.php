<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $guarded = [];

    public function porvince(){
        return $this->belongsTo(Province::class, 'province_id' , 'id');
    }

    public function municipality(){
        return $this->hasMany(Municipality::class, 'districts_id');
    }

    public function DistricDoctor(){
        return $this->hasMany(Doctor::class, 'district_id','id');
    }
    
}
