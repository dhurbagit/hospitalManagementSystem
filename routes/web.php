<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\DoctorDashboard\AppoinmentController;
use App\Http\Controllers\DoctorDashboard\DoctorControllerD;
use App\Http\Controllers\DoctorDashboard\DoctorScheduleController;
use App\Models\Appoinment;

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


    // user 
    Route::resource('/users', UserController::class)->names('users');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login.index');
    })->name('login');

    Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
});




Route::middleware(['auth', 'doctorMiddleware'])->group(function () {
    // doctorDashboard
    Route::resource('/doctorDashboard', DoctorControllerD::class)->names('doctorDashboard');
    Route::get('/getPorvince', [DoctorControllerD::class, 'getProvince'])->name('getProvince');
    Route::get('/getDistrict/{id}', [DoctorControllerD::class, 'getDistrict'])->name('getDistrict');
    Route::get('/getMunicipality/{id}', [DoctorControllerD::class, 'getMunicipality'])->name('getMunicipality');

    // schedule 
    Route::resource('/DoctorSchedule', DoctorScheduleController::class)->names('DoctorSchedule');

    // Appoinment
    Route::resource('/appoinment', AppoinmentController::class)->names('appoinment');
    Route::post('appoinment-status', [AppoinmentController::class, 'status'])->name('appoinment.status');
});




// Frontend home 
Route::resource('/', HomeController::class)->names('home');
Route::get('/getDoctor/{id}', [HomeController::class, 'getDoctor'])->name('getDoctor');
Route::get('/getSchedule/{id}', [HomeController::class, 'getSchedule'])->name('getSchedule');
