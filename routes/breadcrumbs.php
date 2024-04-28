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
    $trail->push('List', route('doctor.index'));
});
Breadcrumbs::for('doctorform', function ($trail) {
    $trail->parent('doctorList');
    $trail->push('Form', route('doctor.create'));
});

Breadcrumbs::for('departmentList', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('List', route('department.index'));
});
Breadcrumbs::for('departmentform', function ($trail) {
    $trail->parent('departmentList');
    $trail->push('Form', route('department.create'));
});
 
Breadcrumbs::for('userList', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('List', route('users.index'));
});
Breadcrumbs::for('userform', function ($trail) {
    $trail->parent('departmentList');
    $trail->push('Form', route('users.create'));
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
 