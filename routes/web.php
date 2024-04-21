<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\DoctorDashboard\AppoinmentController;
use App\Http\Controllers\DoctorDashboard\DoctorControllerD;
use App\Http\Controllers\DoctorDashboard\DoctorScheduleController;
use App\Models\DoctorEducation;

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


Route::middleware(['auth', 'role'])->group(function () {

     
    // dashboard
    Route::resource('dashboard', DashboardController::class)->names('dashboard');

    //userProfile
    Route::resource('user-profile', UserProfileController::class)->names('userProfile');

    // Department 
    Route::resource('/department', DepartmentController::class)->names('department');
    Route::resource('/doctor', DoctorController::class)->names('doctor');

    //doctor
    Route::get('/getDistrict/{id}', [DoctorController::class, 'getDistrict'])->name('getDistrict');
    Route::get('/getMunicipality/{id}', [DoctorController::class, 'getMunicipality'])->name('getMunicipality');
    Route::get('/getPorvince', [DoctorController::class, 'getProvince'])->name('getProvince');
    Route::post('deleteEducation', [DoctorController::class, 'deleteEducation'])->name('deleteEducation');
    Route::post('deleteExperience', [DoctorController::class, 'deleteExperience'])->name('deleteExperience');

    // user 
    Route::resource('/users', UserController::class)->names('users');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login.index');
    })->name('login');
    // Route::get('/login', [LoginController::class, 'loginCheck'])->name('login');
    Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
});




Route::middleware(['auth', 'doctorMiddleware'])->group(function () {
    // doctorDashboard
    Route::get('doctor-dashboard', function(){
        return view('doctorDashboard.dashboard');
    });
    Route::resource('/doctorDashboard', DoctorControllerD::class)->names('doctorDashboard');
    Route::get('/getProvince_d', [DoctorControllerD::class, 'getProvince_d'])->name('getProvince_d');
    Route::get('/getDistrict_d/{id}', [DoctorControllerD::class, 'getDistrict_d'])->name('getDistrict_d');
    Route::get('/getMunicipality_d/{id}', [DoctorControllerD::class, 'getMunicipality_d'])->name('getMunicipality_d');

    // schedule 
    Route::resource('/DoctorSchedule', DoctorScheduleController::class)->names('DoctorSchedule');

    // Appoinment
    Route::resource('/appoinment', AppoinmentController::class)->names('appoinment');
    Route::post('appoinment-status', [AppoinmentController::class, 'status'])->name('appoinment.status');

    Route::post('deleteDoctorEducation', [DoctorControllerD::class, 'deleteDoctorEducation'])->name('deleteDoctorEducation');
});




// Frontend home 
Route::resource('/', HomeController::class)->names('home');
Route::get('/getDoctor/{id}', [HomeController::class, 'getDoctor'])->name('getDoctor');
Route::get('/getSchedule/{id}', [HomeController::class, 'getSchedule'])->name('getSchedule');
