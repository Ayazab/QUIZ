<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Teacher;

class QuizController extends Controller
{
    /**
     * Display a listing of the quizzes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new quiz.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('quizzes.create', compact('teachers'));
    }

    /**
     * Store a newly created quiz in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'quiz_title' => 'required',
            'teacher_id' => 'required',
            'timelimit' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        Quiz::create([
            'quiz_title' => $request->input('quiz_title'),
            'teacher_id' => $request->input('teacher_id'),
            'timelimit' => $request->input('timelimit'),
            // Add more fields as needed
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully!');
    }

    /**
     * Display the specified quiz.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified quiz.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $teachers = Teacher::all();
        return view('quizzes.edit', compact('quiz', 'teachers'));
    }

    /**
     * Update the specified quiz in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quiz_title' => 'required',
            'teacher_id' => 'required',
            'timelimit' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        $quiz = Quiz::findOrFail($id);

        $quiz->update([
            'quiz_title' => $request->input('quiz_title'),
            'teacher_id' => $request->input('teacher_id'),
            'timelimit' => $request->input('timelimit'),
            // Add more fields as needed
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully!');
    }

    /**
     * Remove the specified quiz from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully!');
    }




    public function view($id)
{
    $quiz = Quiz::findOrFail($id);
    // Add any additional logic you need

    return view('quizzes.view', compact('quiz'));
}



public function start($id)
{
    $quiz = Quiz::findOrFail($id);
    // dd($quiz->toArray());

    // Fetch questions related to the quiz
    // $questions = Question::where('subject_code', $quiz->subject_code)
    //     ->inRandomOrder()
    //     ->limit($quiz->total_questions)
    //     ->get();
    $questions = Question::inRandomOrder()
    ->take(5)
    ->get();

        dd($questions->toArray());

    // Store the questions in the session for the quiz
    session(['quiz_questions' => $questions->pluck('id')->toArray()]);

    // Redirect to the first question
    return redirect()->route('quizzes.question', ['quizId' => $quiz->id, 'questionNumber' => 1]);
}

public function question($quizId, $questionNumber)
{
    // Fetch the quiz and question based on IDs
    $quiz = Quiz::findOrFail($quizId);

    // Here, we need to fetch the question based on the question number
    $questionId = session('quiz_questions')[$questionNumber - 1];
    $question = Question::findOrFail($questionId);

    return view('quizzes.question', compact('quiz', 'question', 'questionNumber'));
}

public function nextQuestion(Request $request, $quizId)
{
    // Logic to fetch the next question based on the current question number
    $currentQuestionNumber = $request->input('currentQuestionNumber');
    $nextQuestionNumber = $currentQuestionNumber + 1;

    // Retrieve the next question ID from the session
    $nextQuestionId = session('quiz_questions')[$nextQuestionNumber - 1];

    $nextQuestion = Question::findOrFail($nextQuestionId);

    return response()->json($nextQuestion);
}
}
