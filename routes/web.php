<?php

use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\DoctorDashboard\AppoinmentController;
use App\Http\Controllers\DoctorDashboard\DoctorControllerD;
use App\Http\Controllers\DoctorDashboard\DoctorScheduleController;
use App\Http\Controllers\DoctorDashboard\settingController;
use App\Http\Controllers\Roleandpermission\PermissionController;
use App\Http\Controllers\Roleandpermission\RoleController;
use App\Models\Admin\Role;
use App\Models\Department;
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


Route::middleware(['checkRole', 'role:Super admin|admin'])->group(function () {

    // dashboard
    Route::resource('dashboard', DashboardController::class)->names('dashboard');

    //userProfile
    Route::resource('user-profile', UserProfileController::class)->names('userProfile');

    // Department 
    Route::resource('/department', DepartmentController::class)->names('department');
    Route::get('/trashfile', [DepartmentController::class, 'trashfile'])->name('trashfile');
    Route::get('/restoretrashfile/{id}', [DepartmentController::class, 'restoretrashfile'])->name('restoretrashfile');
    Route::DELETE('/trashPermanentDelete/{id}', [DepartmentController::class, 'trashPermanentDelete'])->name('trashPermanentDelete');
    //doctor
    Route::resource('/doctor', DoctorController::class)->names('doctor');
    Route::get('/doctorTrash', [DoctorController::class, 'doctorTrash'])->name('doctorTrash');
    Route::get('/restoreDoctortrashfile/{id}', [DoctorController::class, 'restoreDoctortrashfile'])->name('restoreDoctortrashfile');
    Route::DELETE('/trashDoctorPermanentDelete/{id}', [DoctorController::class, 'trashDoctorPermanentDelete'])->name('trashDoctorPermanentDelete');

    Route::get('/getDistrict/{id}', [DoctorController::class, 'getDistrict'])->name('getDistrict');
    Route::get('/getMunicipality/{id}', [DoctorController::class, 'getMunicipality'])->name('getMunicipality');
    Route::get('/getPorvince', [DoctorController::class, 'getProvince'])->name('getProvince');
    Route::post('deleteEducation', [DoctorController::class, 'deleteEducation'])->name('deleteEducation');
    Route::post('deleteExperience', [DoctorController::class, 'deleteExperience'])->name('deleteExperience');
    
    Route::resource('/admin-setting', AdminSettingController::class)->names('admin-setting');
    
    // user 
    Route::resource('/users', UserController::class)->names('users');

    Route::resource('/patient', PatientController::class)->names('patient');

    Route::resource('permission', PermissionController::class)->names('permission');
    Route::resource('role', RoleController::class)->names('role');
    Route::get('role/{roleId}/give-permission', [RoleController::class, 'addPermissionToRole']);
    Route::put('role/{roleId}/give-permission', [RoleController::class, 'givePermissionToRole']);




});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware('guest')->group(function () {
//     Route::get('/login', function () {
//         return view('login.index');
//     })->name('login');
//     // Route::get('/login', [LoginController::class, 'loginCheck'])->name('login');
//     Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
// });


Route::middleware(['doctorMiddleware' ,'role:doctor'])->group(function () {
    // doctorDashboard
    Route::get('doctor-dashboard', function(){
        return view('doctorDashboard.dashboard');
    })->name('mainDoctorDashboard');
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
    Route::post('deleteDoctorExperience', [DoctorControllerD::class, 'deleteDoctorExperience'])->name('deleteDoctorExperience');

    Route::resource('/setting', settingController::class)->names('setting');
});

Route::get('/notify', [AppoinmentController::class, 'notify']);
Route::get('/markAsRead/{id}', [AppoinmentController::class, 'markasread'])->name('markasread');


// Frontend home 
Route::resource('/', HomeController::class)->names('home');
Route::get('/getDoctor/{id}', [HomeController::class, 'getDoctor'])->name('getDoctor');
Route::get('/getSchedule/{id}', [HomeController::class, 'getSchedule'])->name('getSchedule');
