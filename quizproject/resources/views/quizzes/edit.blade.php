@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Quiz</h2>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="quiz_title" class="form-label">Quiz Title</label>
                    <input type="text" class="form-control" id="quiz_title" name="quiz_title" value="{{ $quiz->quiz_title }}" required>
                </div>

                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Teacher</label>
                    <select class="form-select" id="teacher_id" name="teacher_id" required>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $quiz->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->firstname }} {{ $teacher->lastname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="timelimit" class="form-label">Time Limit (minutes)</label>
                    <input type="number" class="form-control" id="timelimit" name="timelimit" value="{{ $quiz->timelimit }}" required>
                </div>

                <!-- Add more fields as needed -->

                <button type="submit" class="btn btn-primary">Update Quiz</button>
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Back to Quiz List</a>
            </form>

        </div>
    </div>
</div>
@endsection
