<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/all_members', function () {
    return view('all-members');
})->name('all_members');
Route::middleware(['auth:sanctum', 'verified'])->get('/datatables-members', function () {
    return view('datatables-members');
})->name('members');
Route::middleware(['auth:sanctum', 'verified'])->get('/datatables-staff', function () {
    return view('datatables-staff');
})->name('staff');
Route::middleware(['auth:sanctum', 'verified'])->get('/linked', function () {
    return view('linked');
})->name('linked');
Route::get('/gravatar', 'GravatarController@gravatar');
Route::get('/member/{id}', function ($id) {
    return view('member', ['id' => $id]);
})->name('member');
Route::get('/staff-member/{id}', function ($id) {
    return view('staff', ['id' => $id]);
})->name('staff-member');
//Route::middleware(['auth:sanctum', 'verified'])->resource('members', MemberController::class);
