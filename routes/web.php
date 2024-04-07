<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\DoctorDashboard\DoctorControllerD;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){
    return view('frontend.index');
});
Route::middleware(['auth', 'role'])->group(function () {
   
    Route::get('/dashboard', function () {
        return view('index');
    });
    // Department 
    Route::resource('/department', DepartmentController::class)->names('department');
    Route::resource('/doctor', DoctorController::class)->names('doctor');

    //doctor
    Route::get('/getPorvince', [DoctorController::class, 'getProvince'])->name('getProvince');
    Route::get('/getDistrict/{id}', [DoctorController::class, 'getDistrict'])->name('getDistrict');
    Route::get('/getMunicipality/{id}', [DoctorController::class, 'getMunicipality'])->name('getMunicipality');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
 
Route::middleware('guest')->group(function(){
    Route::get('/login', function () {
        return view('login.index');
    })->name('login');
    
    Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
    
    
});







// doctorDashboard
Route::resource('/doctorDashboard', DoctorControllerD::class)->names('doctorDashboard');
Route::get('/getPorvince', [DoctorControllerD::class, 'getProvince'])->name('getProvince');
Route::get('/getDistrict/{id}', [DoctorControllerD::class, 'getDistrict'])->name('getDistrict');
Route::get('/getMunicipality/{id}', [DoctorControllerD::class, 'getMunicipality'])->name('getMunicipality');
