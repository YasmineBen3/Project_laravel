<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware(['RoleMiddleware:doctor'])->group(function () {
    Route::resource('/doctors', DoctorController::class);
    // Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::post('/appointments/{appointment}/validate', [AppointmentController::class, 'validateAppointment'])->name('appointments.validate');
    Route::get('/appointments/export/excel', [AppointmentController::class, 'exportToExcel'])->name('appointments.export.excel');
    Route::get('/appointments/{appointment}/generate-pdf', [AppointmentController::class, 'generatePDF'])->name('appointments.generate.pdf');
});

// Route::middleware([''])->group(function () {
//     Route::resource('/doctors', DoctorController::class);
//     Route::post('/appointments/{appointment}/validate', [AppointmentController::class, 'validateAppointment'])->name('appointments.validate');
//     Route::get('/appointments/export/excel', [AppointmentController::class, 'exportToExcel'])->name('appointments.export.excel');
//     Route::get('/appointments/{appointment}/generate-pdf', [AppointmentController::class, 'generatePDF'])->name('appointments.generate.pdf');
// });


Route::resource('/appointments', AppointmentController::class);

Route::resource('/patients', PatientController::class);


