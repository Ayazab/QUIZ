<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data
        $studentCount = Student::count();
        $teacherCount = Teacher::count();
        $questionCount = Question::count();
        $subjectCount = Subject::count();

        // Pass data to the view
        return view('admin.admins_dashboard', compact('studentCount', 'teacherCount', 'questionCount', 'subjectCount'));    }
}
