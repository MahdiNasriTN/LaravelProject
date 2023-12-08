<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\athentificationController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\classroomController;
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

Route::get('/', [homeController::class,'displayHomePage'])->name('DisplayHomePage');
Route::post('/joinclass',[homeController::class,'joinClass'])->name('home.joinClass');
Route::put('/editclass/{classroom}',[homeController::class,'editClass'])->name('home.editClass');
Route::delete('/classroom/{classroomId}', [homeController::class, 'destroy'])->name('home.destroy');
Route::put('/editaccount',[homeController::class,'editAccount'])->name('home.editAccount');
Route::get('/classroom/{classroomId}',[classroomController::class,'showClassroom'])->name('classroom.showClassroom');
Route::post('/classroom/{classroomId}/addNote',[classroomController::class,'addNote'])->name('classroom.addNote');
Route::put('/editnote/{noteId}',[classroomController::class,'editNote'])->name('classroom.editnote');
Route::delete('/classroom/deletenote/{noteId}', [classroomController::class, 'destroyNote'])->name('classroom.destroynote');
Route::post('/addclass',[homeController::class,'addClass'])->name('home.addClass');
Route::get('/login',[athentificationController::class,'loginPage'])->name('authentif.login');
Route::post('/login',[athentificationController::class,'checkAccount'])->name('authentification.login');
Route::get('/signup',[athentificationController::class,'signupPage'])->name('authentif.signup');
Route::post('/signup',[athentificationController::class,'storeAccount'])->name('authentification.signup');
Route::post('/logout',[athentificationController::class,'logoutAccount'])->name('authentification.logout');
Route::get('/settings',[athentificationController::class,'showSettings'])->name('settings');





