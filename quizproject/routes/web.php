<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

// routes/web.php

Route::view('/admins_dashboard', 'admin/admins_dashboard')->name('admins_dashboard');
Route::view('/students_dashboard', 'student/students_dashboard')->name('students_dashboard');
Route::view('/teachers_dashboard', 'teacher/teachers_dashboard')->name('teachers_dashboard');

// Route::middleware(['auth:student'])->group(function () {
//     Route::view('/student/dashboard', 'students_dashboard')->name('students_dashboard');
// });


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



// Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
Route::resource('admins', AdminController::class);

