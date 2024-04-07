<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipalities';

    protected $fillable = ['municipalitiy_type_id','districts_id','minicipality_code','minicipality_name_nepali','minicipality_name_english'];

    public function district(){
        return $this->belongsTo(District::class, 'districts_id', 'id');
    }

    public function municipalityDoctor(){
        return $this->hasMany(Doctor::class, 'municipality_id', 'id');
    }


}
