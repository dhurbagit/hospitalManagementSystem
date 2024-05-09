<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class settingController extends Controller
{
    
    public function create()
    {
        return view('doctorDashboard.setting.change-password');
    }

}
