<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
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
    return view('employee.welcome');
});

Route::resource('candidates', CandidateController::class);
Route::resource('skills', SkillController::class);
Route::resource('jobs', JobController::class);

Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit');
Route::get('/delete/{id}', [JobController::class, 'destroy'])->name('delete');

Route::get('/candidate/edit/{id}', [CandidateController::class, 'edit'])->name('candidate/edit');
Route::get('/candidate/delete/{id}', [CandidateController::class, 'destroy'])->name('candidate/delete');
