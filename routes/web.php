<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prof', function () {
    return view('prof');
});

Route::resource("/programm", \App\Http\Controllers\ProgrammController::class);

Route::get('/dashboard', function () {
    return redirect("/home");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');


    Route::resource("/admin/user", \App\Http\Controllers\AdminUserController::class);
    Route::resource("/admin/role", \App\Http\Controllers\AdminRoleController::class);
    Route::resource("/admin/log", \App\Http\Controllers\LogController::class);
    Route::resource("/admin/navigation", \App\Http\Controllers\NavigationController::class);
});

require __DIR__ . '/auth.php';


