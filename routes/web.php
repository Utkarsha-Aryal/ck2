<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Models\Member;
use Illuminate\Support\Facades\Route;


Route::get('/',[MemberController::class,'index'])->name('index');

Route::post('/save',[MemberController::class,'save'])->name('employe.save');
Route::post('/data', [MemberController::class, 'getEmployeData'])->name('employe.data');
Route::post('/about', [MemberController::class, 'aboutEmploye'])->name('employe.about');
Route::post('/delete', [MemberController::class, 'delete'])->name('employe.delete');

Route::any('/form', [MemberController::class, 'form'])->name('form');




// Route::group(['prefix' => 'post'], function () {
//     Route::get('/', [MemberController::class, 'index'])->name('admin.post');
//     Route::post('/save', [MemberController::class, 'save'])->name('admin.post.save');
//     Route::any('/form', [MemberController::class, 'form'])->name('admin.post.form');
//     Route::post('/list', [MemberController::class, 'list'])->name('admin.post.list');
//     Route::post('/view', [MemberController::class, 'view'])->name('admin.post.view');
//     Route::post('/delete', [MemberController::class, 'delete'])->name('admin.post.delete');
//     Route::post('/restore', [MemberController::class, 'restore'])->name('admin.post.restore');
//     Route::post('/deletefeatureimage', [MemberController::class, 'deleteFeatureImage'])->name('admin.post.deletefeatureimage');
// });













