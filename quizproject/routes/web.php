<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admins_dashboard', [DashboardController::class, 'index'])->name('admins_dashboard');

// Route::view('/admins_dashboard', 'admin/admins_dashboard')->name('admins_dashboard');
Route::view('/students_dashboard', 'student/students_dashboard')->name('students_dashboard');
Route::view('/teachers_dashboard', 'teacher/teachers_dashboard')->name('teachers_dashboard');

// Route::middleware(['auth:student'])->group(function () {
//     Route::view('/student/dashboard', 'students_dashboard')->name('students_dashboard');
// });


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



// Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
Route::resource('admins', AdminController::class);
// Teachers
Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);



Route::resource('subjects', SubjectController::class);
Route::resource('questions', QuestionController::class);
Route::resource('quizzes', QuizController::class);
Route::resource('results', ResultController::class);

// Add a custom route for viewing a quiz
Route::get('quizzes/{quiz}/view', [QuizController::class, 'view'])->name('quizzes.view');
Route::get('quizzes/{quiz}/start', [QuizController::class, 'start'])->name('quizzes.start');
// routes/web.php

// Change the route definition to include the question number
Route::get('/quizzes/{quizId}/question/{questionNumber}', [QuizController::class, 'question'])->name('quizzes.question');
Route::post('/quizzes/{quizId}/next-question', [QuizController::class, 'nextQuestion'])->name('quizzes.nextQuestion');
