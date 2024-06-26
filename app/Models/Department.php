<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = []; //To protected mass assignment

    protected $table = 'departments';
    protected $dates = ['deleted_at'];
    public function doctor(){
        return $this->hasMany(Doctor::class, 'dept_id', 'id');
    }
    
    
}
