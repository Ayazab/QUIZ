<?php

// app/Http/Controllers/TeacherController.php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:students',
            'email_id' => 'required|email|max:255|unique:students',
            'password' => 'required|string|min:6',
            'subject_name' => 'nullable|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle profile picture upload
        // $profilePicPath = $request->file('profile_pic') ? $request->file('profile_pic')->store('profile_pics', 'public') : null;

        // Store the student
        $student = new Student([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email_id' => $request->input('email_id'),
            'password' => bcrypt($request->input('password')),
            'subject_name' => $request->input('subject_name'),
            // 'profile_pic' => $profilePicPath,
        ]);

        // dd($student->toArray());
        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $student->profile_pic = $profilePicPath;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $subjects = Subject::all();
        return view('students.edit', compact('student','subjects'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students')->ignore($student->id),
            ],
            'email_id' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students')->ignore($student->id),
            ],
            'password' => 'nullable|string|min:6',
            'subject_name' => 'nullable|string|max:255',
            // 'is_approved' => 'required|boolean',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update student fields
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->username = $request->input('username');
        $student->email_id = $request->input('email_id');
        $student->subject_name = $request->input('subject_name');
        // $student->is_approved = $request->input('is_approved');

        // Update password if provided
        if ($request->filled('password')) {
            $student->password = bcrypt($request->input('password'));
        }

        // Handle profile picture upload
       // Handle profile picture upload
if ($request->hasFile('update_profile_pic')) {
    $profilePicPath = $request->file('update_profile_pic')->store('profile_pics', 'public');
    $student->profile_pic = $profilePicPath;
}


        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }


    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
