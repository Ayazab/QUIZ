<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
{
    // dd($request->toArray());
    $request->validate([
        'role' => 'required|in:admins,teachers,students',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|unique:' . $this->getTableName($request->input('role')) . ',email_id',
        'username' => 'required|string|unique:' . $this->getTableName($request->input('role')) . ',username',
        'password' => 'required|min:6',
        'department' => ($request->input('role') == 'students') ? 'required|string' : '',
        'subject' => ($request->input('role') == 'teachers') ? 'array' : '',
        'subjects.*' => 'string',
    ]);

    // Validation for unique constraints
    $uniqueValidation = [
        'email_id' => 'unique:' . $this->getTableName($request->input('role')) . ',email',
        'username' => 'unique:' . $this->getTableName($request->input('role')) . ',username',
    ];

    $uniqueValidationMessages = [
        'email_id.unique' => 'The email address has already been taken.',
        'username.unique' => 'The username has already been taken.',
    ];

    $validator = validator($request->all(), $uniqueValidation, $uniqueValidationMessages);

    if ($validator->fails()) {
        return redirect()->route('register')->withErrors($validator)->withInput();
    }

    $modelClass = $this->getClassName($request->input('role'));

    $user = $modelClass::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email_id' => $request->input('email'),
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
        'class' => $request->input('department'),
        'subject_names' => implode(',', $request->input('subjects'))
    ]);

    // Redirect to login page with success message
    return redirect()->route('login')->with('success', 'Registration successful. Please login.');
}


    protected function getTableName($role)
    {
        return ($role === 'admins') ? 'admins' : (($role === 'teachers') ? 'teachers' : 'students');
    }

    protected function getClassName($role)
    {
        $modelName = ucfirst(Str::singular($role));
        return "App\\Models\\$modelName";
    }
}
