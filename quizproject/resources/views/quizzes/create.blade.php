<!-- resources/views/quizzes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add Quiz</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('quizzes.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="quiz_title" class="form-label">Quiz Title</label>
                        <input type="text" class="form-control" id="quiz_title" name="quiz_title" required>
                    </div>

                    <div class="mb-3">
                        <label for="teacher_id" class="form-label">Teacher</label>
                        <select class="form-select" id="teacher_id" name="teacher_id" required>
                            <option value="" selected >Select Teacher</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{ $teacher->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="timelimit" class="form-label">Time Limit (in minutes)</label>
                        <input type="number" class="form-control" id="timelimit" name="timelimit" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <!-- Back Button -->
                    <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Back to Quizzes List</a>
                </form>
            </div>
        </div>
    </div>
@endsection
