<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    UserController
};
use App\Http\Controllers\Admin\ACL\{
    PermissionController,
    RoleController
};

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/roles', RoleController::class);
    Route::resource('/admin/permissions', PermissionController::class);

});
