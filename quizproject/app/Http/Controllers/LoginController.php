<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password', 'role'); // Include 'role' in credentials
        Log::info('Login attempt with credentials:', $credentials);

        // Determine the table based on the selected role
        $user = null;
        $role = null;

        // dd($credentials);
        switch ($credentials['role']) {
            case 'admins':
                $user = \App\Models\Admin::where('username', $credentials['username'])->first();
                $role = 'admins';
                break;

            case 'teachers':
                $user = \App\Models\Teacher::where('username', $credentials['username'])->first();
                $role = 'teachers';
                break;

            case 'students':
                $user = \App\Models\Student::where('username', $credentials['username'])->first();
                $role = 'students';
                break;

            default:
                // Handle default case if needed
                break;
        }

        // Check if user is found in the database
        if ($user) {
            // dd($credentials);
            // Check the entered password against the stored plain text password
            if (Hash::check($credentials['password'], $user->password)) {
                // dd('if');
                // Password is correct
                Log::info('Password is correct');
                $dashboard = $role . '_dashboard';
                // dd($dashboard);
                return Redirect::route($dashboard);
            } else {
                // Password is incorrect
                Log::warning('Password is incorrect');
            }
        } else {
            // User not found
            Log::warning('User not found');
        }

        // Authentication failed
        Log::warning('Authentication failed');
        return redirect()->back()->withInput()->withErrors(['login_error' => 'Invalid username or password']);
    }

}
