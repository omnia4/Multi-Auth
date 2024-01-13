<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('users', UserController::class);
Route::resource('roles', RolesController::class);
Route::resource('permissions', PermissionsController::class);
// Route::post('users/{userId}/assign-role', [UserController::class, 'assignRole'])->middleware('admin');
// Route::post('/roles/{role}/assign-permission', [RolesController::class, 'assignPermission']);
// Route::get('users/{user}/assign-role', [UserController::class, 'showAssignRoleForm']);
// Route::get('/roles/{role}/assign-permission', [RolesController::class, 'showAssignPerForm']);
Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])
    ->middleware('admin')
    ->name('users.assign-role');

Route::get('/users/{user}/assign-role', [UserController::class, 'showAssignRoleForm'])
    ->middleware('admin')
    ->name('users.show-assign-role');

Route::get('/roles/{role}/assign-permission', [RolesController::class, 'showAssignPermissionForm'])
    ->middleware('admin')
    ->name('roles.show-assign-permission');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard');
});

Route::middleware(['auth', 'client'])->prefix('client')->group(function () {
    Route::get('/dashboard', 'ClientController@dashboard');
});
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
