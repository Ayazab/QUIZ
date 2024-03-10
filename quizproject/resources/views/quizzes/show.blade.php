@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Quiz Details</h2>

    <div class="card">
        <div class="card-body">

            <p><strong>Quiz Title:</strong> {{ $quiz->quiz_title }}</p>
            <p><strong>Teacher:</strong> {{ $quiz->teacher->firstname }} {{ $quiz->teacher->lastname }}</p>
            <p><strong>Time Limit:</strong> {{ $quiz->timelimit }} minutes</p>

            <!-- Add more details as needed -->

            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
</div>
@endsection
