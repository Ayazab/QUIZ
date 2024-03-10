@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Add Question</h2>

        <!-- Card for adding question details -->
        <div class="card">
            <div class="card-body">

                <!-- Form for adding question details -->
                <form method="POST" action="{{ route('questions.store') }}">
                    @csrf

                    <!-- Question Text -->
                    <div class="mb-3">
                        <label for="question_text" class="form-label">Question Text</label>
                        <textarea class="form-control" id="question_text" name="question_text" rows="3" required></textarea>
                    </div>

                    <!-- Options (Assuming A, B, C, D) -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="option_a" class="form-label">Option A</label>
                            <input type="text" class="form-control" id="option_a" name="options[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="option_b" class="form-label">Option B</label>
                            <input type="text" class="form-control" id="option_b" name="options[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="option_c" class="form-label">Option C</label>
                            <input type="text" class="form-control" id="option_c" name="options[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="option_d" class="form-label">Option D</label>
                            <input type="text" class="form-control" id="option_d" name="options[]" required>
                        </div>
                    </div>


                    <!-- Correct Answer -->
                    <div class="mb-3">
                        <label for="correct_answer" class="form-label">Correct Answer</label>
                        <input type="text" class="form-control" id="correct_answer" name="correct_answer" required>
                    </div>

                    <!-- Marks -->
                    <div class="mb-3">
                        <label for="marks" class="form-label">Marks</label>
                        <input type="number" class="form-control" id="marks" name="marks" required>
                    </div>

                    <!-- Difficulty Level -->
                    <div class="mb-3">
                        <label for="difficulty_level" class="form-label">Difficulty Level</label>
                        <select class="form-select" id="difficulty_level" name="difficulty_level" required>
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </div>

                    <!-- Subject Code (Assuming you have a list of subjects) -->
                    <div class="mb-3">
                        <label for="subject_code" class="form-label">Subject Code</label>
                        <select class="form-select" id="subject_code" name="subject_code">
                            <option value="" selected>Select Subject</option> <!-- Placeholder option -->
                            <!-- Add options dynamically based on subjects in the database -->
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->sub_code }} - {{ $subject->sub_name }}">{{ $subject->sub_code }} - {{ $subject->sub_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit Question</button>

                    <!-- Back Button -->
                    <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to Questions List</a>
                </form>

            </div>
        </div>
    </div>

@endsection
