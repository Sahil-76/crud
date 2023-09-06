<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

 Route::resource('students', StudentController::class);

// // Route::get('students',function() {

// //     return view('create');
// // });
//  Route::get('students', function() {
//    return view('sudents.edit');
//  });

//  Route::get('student-create', function() {
//   return view('students.create');
// });

// Route::get('/create', [StudentController::class],'create');

//  Route::get('welcome', function () {
//      return view('welcome');
//  });

Route::view('welcome','welcome');


// Route::get('about', function () {
//   return  " Hello World";
// });
// // Multiple data 
// Route::get('user/{u_id}',function(){

//   return "sahil/{1234}";
// });
 
// Route::get('user/{u_id}/comment/{comment_id}',function( $user_id,$comment_id){
// //  dd($user_id,$comment_id);
//   return "$user_id.$comment_id";
// });
 




// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('registration', [AuthController::class, 'registration'])->name('register');
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
// Route::get('dashboard', [AuthController::class, 'dashboard']); 
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');