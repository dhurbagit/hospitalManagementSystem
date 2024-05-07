<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});
// Doctor dashboard
Breadcrumbs::for('doctor-dashboard', function ($trail) {
    $trail->push('Dashboard', route('doctorDashboard.index'));
});

// dashboard > doctorList
Breadcrumbs::for('doctorList', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Doctor', route('doctor.index'));
});
Breadcrumbs::for('doctorform', function ($trail) {
    $trail->parent('doctorList');
    $trail->push('Add Doctor', route('doctor.create'));
});

Breadcrumbs::for('departmentList', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Department', route('department.index'));
});
Breadcrumbs::for('departmentform', function ($trail) {
    $trail->parent('departmentList');
    $trail->push('Add Department', route('department.create'));
});
 
Breadcrumbs::for('userList', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('users.index'));
});
Breadcrumbs::for('userform', function ($trail) {
    $trail->parent('userList');
    $trail->push('Add User', route('users.create'));
});
Breadcrumbs::for('doctorDashboardView', function ($trail) {
    $trail->parent('doctor-dashboard');
    $trail->push('View', route('doctorDashboard.index'));
});
Breadcrumbs::for('doctorDashboardForm', function ($trail) {
    $trail->parent('doctorDashboardView');
    $trail->push('Form', route('doctorDashboard.create'));
});
 
Breadcrumbs::for('scheduleList', function ($trail) {
    $trail->parent('doctor-dashboard');
    $trail->push('List', route('DoctorSchedule.index'));
});
Breadcrumbs::for('scheduleForm', function ($trail) {
    $trail->parent('scheduleList');
    $trail->push('Form', route('DoctorSchedule.create'));
});
 