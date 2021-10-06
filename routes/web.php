<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ManageProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentFeeCategoryController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::prefix('users')->group(function(){
	Route::get('view',[UserController::class,'userView'])->name('user.view');
	Route::get('add',[UserController::class,'userAdd'])->name('user.add');
	Route::post('store',[UserController::class,'userStore'])->name('user.store');
	Route::get('edit/{id}',[UserController::class,'userEdit'])->name('user.edit');
	Route::post('update/{id}',[UserController::class,'userUpdate'])->name('user.update');
	Route::get('delete/{id}',[UserController::class,'userDelete'])->name('user.delete');

});
Route::prefix('profile')->group(function(){
	Route::get('view',[ManageProfileController::class,'viewProfile'])->name('view.profile');
	Route::get('edit',[ManageProfileController::class,'editProfile'])->name('edit.profile');
	Route::post('store',[ManageProfileController::class,'storeProfile'])->name('store.profile');
	Route::get('editpassword',[ManageProfileController::class,'editPassword'])->name('edit.password');
	Route::post('changepassword',[ManageProfileController::class,'changePassword'])->name('password.update');


});

//Student Class
Route::prefix('setup')->group(function(){
	Route::get('/student/class/view',[StudentClassController::class,'viewStudentClass'])->name('student.class.view');
	Route::get('/student/class/add',[StudentClassController::class,'addStudentClass'])->name('student.class.add');
	Route::post('/student/class/store',[StudentClassController::class,'storeStudentClass'])->name('student.class.store');
	Route::get('/student/class/edit/{id}',[StudentClassController::class,'editStudentClass'])->name('student.class.edit');
	Route::post('/student/class/update/{id}',[StudentClassController::class,'updateStudentClass'])->name('student.class.update');
	Route::get('/student/class/delete/{id}}',[StudentClassController::class,'deleteStudentClass'])->name('student.class.delete');

//Student Year
	Route::get('/student/year/view',[StudentYearController::class,'viewStudentYear'])->name('student.year.view');
	Route::get('/student/year/add',[StudentYearController::class,'addStudentYear'])->name('student.year.add');
	Route::post('/student/year/store',[StudentYearController::class,'storeStudentYear'])->name('student.year.store');
	Route::get('/student/year/edit/{id}',[StudentYearController::class,'editStudentYear'])->name('student.year.edit');
	Route::post('/student/year/update/{id}',[StudentYearController::class,'updateStudentYear'])->name('student.year.update');
	Route::get('/student/year/delete/{id}}',[StudentYearController::class,'deleteStudentYear'])->name('student.year.delete');

//Student Group
	Route::get('/student/group/view',[StudentGroupController::class,'viewStudentGroup'])->name('student.group.view');
	Route::get('/student/group/add',[StudentGroupController::class,'addStudentGroup'])->name('student.group.add');	
	Route::post('/student/group/store',[StudentGroupController::class,'storeStudentgroup'])->name('student.group.store');
	Route::get('/student/group/edit/{id}',[StudentGroupController::class,'editStudentGroup'])->name('student.group.edit');
	Route::post('/student/group/update/{id}',[StudentGroupController::class,'updateStudentGroup'])->name('student.group.update');
	Route::get('/student/group/delete/{id}}',[StudentGroupController::class,'deleteStudentGroup'])->name('student.group.delete');

//Student Shift
	Route::get('/student/shift/view',[StudentShiftController::class,'viewStudentShift'])->name('student.shift.view');
	Route::get('/student/shift/add',[StudentShiftController::class,'addStudentShift'])->name('student.shift.add');	
	Route::post('/student/shift/store',[StudentShiftController::class,'storeStudentShift'])->name('student.shift.store');
	Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'editStudentShift'])->name('student.shift.edit');
	Route::post('/student/shift/update/{id}',[StudentShiftController::class,'updateStudentShift'])->name('student.shift.update');
	Route::get('/student/shift/delete/{id}}',[StudentShiftController::class,'deleteStudentShift'])->name('student.shift.delete');	

//Student Fee Category
	Route::get('/student/fee/view',[StudentFeeCategoryController::class,'viewStudentFee'])->name('student.fee.view');
	Route::get('/student/fee/add',[StudentFeeCategoryController::class,'addStudentFee'])->name('student.fee.add');	
	Route::post('/student/fee/store',[StudentFeeCategoryController::class,'storeStudentFee'])->name('student.fee.store');
	Route::get('/student/fee/edit/{id}',[StudentFeeCategoryController::class,'editStudentFee'])->name('student.fee.edit');
	Route::post('/student/fee/update/{id}',[StudentFeeCategoryController::class,'updateStudentFee'])->name('student.fee.update');
	Route::get('/student/fee/delete/{id}}',[StudentFeeCategoryController::class,'deleteStudentFee'])->name('student.fee.delete');		
});

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');
