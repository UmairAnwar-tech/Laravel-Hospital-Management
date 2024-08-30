<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::post('/login',[App\Http\Controllers\mycontroller::class,'login'])->name('login');
Route::post('/insertdatadoctor',[App\Http\Controllers\mycontroller::class,'insert']);
Route::post('/insertdatapatient',[App\Http\Controllers\patientcontroller::class,'create']);
Route::get('/insertdatapatient',[App\Http\Controllers\patientcontroller::class,'index'])->name('patient');
Route::get('/read',[App\Http\Controllers\mycontroller::class,'index']);
Route::get('/updateordelete',[[App\Http\Controllers\patientcontroller::class,'edit']]);
Route::get('/dashboard',[App\Http\Controllers\mycontroller::class,'read_data'])->name('readdata');
Route::put('/updatedoc/{id}',[App\Http\Controllers\mycontroller::class,'updatedoc'])->name('updatedoc');
Route::put('/updatepatient/{id}',[App\Http\Controllers\patientcontroller::class,'updatepatient'])->name('updatepatient');

Route::get('/editpatient/{id}',[App\Http\Controllers\patientcontroller::class,'editpatient'])->name('editpatient');

Route::get('/editdoc/{id}',[App\Http\Controllers\mycontroller::class,'editdoc'])->name('editdoc');
Route::get('/patient',[App\Http\Controllers\patientcontroller::class,'index'])->name('patientdis');
Route::get('/deletedoc/{id}',[App\Http\Controllers\mycontroller::class,'destroy'])->name('deletedoc');
Route::get('/deletepatient/{id}',[App\Http\Controllers\patientcontroller::class,'destroy'])->name('deletepatient');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
