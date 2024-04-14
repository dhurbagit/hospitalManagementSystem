<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //
    public function index(){
        $id = Auth::id();
        $userInfo = User::find($id);
        return view('userProfile', compact('userInfo'));
    }
}
