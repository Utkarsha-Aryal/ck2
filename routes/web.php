<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/',[MemberController::class,'index'])->name('index');

Route::post('/save',[MemberController::class,'save'])->name('employe.save');
Route::post('/data', [MemberController::class, 'getEmployeData'])->name('employe.data');
Route::post('/about', [MemberController::class, 'aboutEmploye'])->name('employe.about');
Route::post('/delete', [MemberController::class, 'delete'])->name('employe.delete');













