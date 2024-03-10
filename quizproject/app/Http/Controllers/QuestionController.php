<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('questions.create', compact('subjects'));
    }

    /**
     * Store a newly created question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        // Validation logic
        $request->validate([
            'question_text' => 'required',
            'options' => 'required|array|min:4|max:4',
            'options.*' => 'required|string',
            'correct_answer' => 'required',
            'marks' => 'required|numeric',
            'difficulty_level' => 'required',
            // 'subject_code' => 'required',
        ]);

        // dd($request->toArray());

        // $options = json_encode($request->input('options'));
        // Storing the question
        Question::create([
            'question_text' => $request->question_text,
            'options' => $request->options,
            'correct_answer' => $request->correct_answer,
            'marks' => $request->marks,
            'difficulty_level' => $request->difficulty_level,
            'subject_code' => $request->subject_code,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question created successfully!');
    }

    public function update(Request $request, $id)
    {
        // dd($request->toArray());
        // Validation logic
        $request->validate([
            'question_text' => 'required',
            'options' => 'required|array|min:4|max:4',
            'options.*' => 'required|string',
            'correct_answer' => 'required',
            'marks' => 'required|numeric',
            'difficulty_level' => 'required',
            // 'subject_code' => 'required',
        ]);

        // dd($request->toArray());

        // Updating the question
        $question = Question::find($id);
        // dd($question->toArray());
        // $options = json_encode($request->input('options'));


        $question->update([
            'question_text' => $request->question_text,
            'options' => $request->options,
            'correct_answer' => $request->correct_answer,
            'marks' => $request->marks,
            'difficulty_level' => $request->difficulty_level,
            'subject_code' => $request->subject_code,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully!');
    }



    /**
     * Display the specified question.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    // Retrieve the question by its ID
    $question = Question::findOrFail($id);

    // Retrieve the subjects to populate the dropdown
    $subjects = Subject::all();

    // dd($question->toArray(), $subjects->toArray());

    // Pass the data to the view
    return view('questions.edit', compact('question', 'subjects'));
}


    /**
     * Update the specified question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified question from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully!');
    }
}
