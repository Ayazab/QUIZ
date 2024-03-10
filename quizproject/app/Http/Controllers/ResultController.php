<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;


class ResultController extends Controller
{
    public function index()
    {
        // Fetch results with associated student and quiz data
        $results = Result::with('student', 'quiz')->get();
        return view('results.index', compact('results'));
    }

    public function show($id)
    {
        // Fetch a specific result with associated student and quiz data
        $result = Result::with('student', 'quiz')->findOrFail($id);

        return view('results.show', compact('result'));
    }
}
