<?php

// app/Http/Controllers/TeacherController.php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:teachers',
            'email_id' => 'required|email|max:255|unique:teachers',
            'password' => 'required|string|min:6',
            'subject_name' => 'nullable|string|max:255',
            'is_approved' => 'required|boolean',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle profile picture upload
        // $profilePicPath = $request->file('profile_pic') ? $request->file('profile_pic')->store('profile_pics', 'public') : null;

        // Store the teacher
        $teacher = new Teacher([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email_id' => $request->input('email_id'),
            'password' => bcrypt($request->input('password')),
            'subject_name' => $request->input('subject_name'),
            'is_approved' => $request->input('is_approved'),
            // 'profile_pic' => $profilePicPath,
        ]);

        // dd($teacher->toArray());
        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $teacher->profile_pic = $profilePicPath;
        }

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
    }


    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $subjects = Subject::all();
        return view('teachers.edit', compact('teacher','subjects'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('teachers')->ignore($teacher->id),
            ],
            'email_id' => [
                'required',
                'email',
                'max:255',
                Rule::unique('teachers')->ignore($teacher->id),
            ],
            'password' => 'nullable|string|min:6',
            'subject_name' => 'nullable|string|max:255',
            'is_approved' => 'required|boolean',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update teacher fields
        $teacher->firstname = $request->input('firstname');
        $teacher->lastname = $request->input('lastname');
        $teacher->username = $request->input('username');
        $teacher->email_id = $request->input('email_id');
        $teacher->subject_name = $request->input('subject_name');
        $teacher->is_approved = $request->input('is_approved');

        // Update password if provided
        if ($request->filled('password')) {
            $teacher->password = bcrypt($request->input('password'));
        }

        // Handle profile picture upload
        if ($request->hasFile('update_profile_pic')) {
            $profilePicPath = $request->file('update_profile_pic')->store('profile_pics', 'public');
            $teacher->profile_pic = $profilePicPath;
        }


        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
    }


    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
