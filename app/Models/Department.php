<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = []; //To protected mass assignment

    protected $table = 'departments';

    public function doctor(){
        return $this->hasMany(Doctor::class, 'dept_id', 'id');
    }
    
    
}
