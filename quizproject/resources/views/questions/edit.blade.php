@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Question</h2>

    <div class="card">
        <div class="card-body">

            <!-- Form for editing question details -->
            <form method="POST" action="{{ route('questions.update', $question->id) }}">
                @csrf
                @method('PUT')

                <!-- Question Text -->
                <div class="mb-3">
                    <label for="question_text" class="form-label">Question Text</label>
                    <textarea class="form-control" id="question_text" name="question_text" required>{{ $question->question_text }}</textarea>
                </div>

                <!-- Options (Assuming A, B, C, D) -->
                <div class="row mb-3">
                    @foreach($question->options as $key => $option)
                        <div class="col-md-3">
                            <label for="option_{{ $key }}" class="form-label">Option {{ strtoupper(chr(65 + $key)) }}</label>
                            <input type="text" class="form-control" id="option_{{ $key }}" name="options[]" value="{{ $option }}" required>
                        </div>
                    @endforeach
                </div>

                <!-- Correct Answer -->
                <div class="mb-3">
                    <label for="correct_answer" class="form-label">Correct Answer</label>
                    <input type="text" class="form-control" id="correct_answer" name="correct_answer" value="{{ $question->correct_answer }}" required>
                </div>

                <!-- Marks -->
                <div class="mb-3">
                    <label for="marks" class="form-label">Marks</label>
                    <input type="number" class="form-control" id="marks" name="marks" value="{{ $question->marks }}" required>
                </div>

                <!-- Difficulty Level -->
<div class="mb-3">
    <label for="difficulty_level" class="form-label">Difficulty Level</label>
    <select class="form-select" id="difficulty_level" name="difficulty_level" required>
        <option value="easy" {{ $question->difficulty_level === 'easy' ? 'selected' : '' }}>Easy</option>
        <option value="medium" {{ $question->difficulty_level === 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="hard" {{ $question->difficulty_level === 'hard' ? 'selected' : '' }}>Hard</option>
    </select>
</div>

<!-- Subject Code -->
<div class="mb-3">
    <label for="subject_code" class="form-label">Subject Code</label>
    <select class="form-select" id="subject_code" name="subject_code">
        <option value="" selected>Select Subject</option> <!-- Placeholder option -->
        <!-- Loop through subjects and mark the selected subject as 'selected' -->
        @foreach($subjects as $subject)
        <?php
$isSelected = trim($question->subject_code) === trim($subject->sub_code . ' - ' . $subject->sub_name);
        ?>
        <option value="{{ $subject->sub_code }} - {{ $subject->sub_name }}" {{ $isSelected ? 'selected' : '' }}>
            {{ $subject->sub_code }} - {{ $subject->sub_name }}
        </option>

        {{-- Debug Information --}}
        <script>
            console.log("Subject :", "{{ $question->subject_code }}");
            console.log("Subject :", "{{$subject->sub_code . ' - ' . $subject->sub_name }}");
            console.log("Subject Code:", "{{ $subject->sub_code }}");
            console.log("Subject name:", "{{ $subject->sub_name }}");
            console.log("Is Selected:", "{{ $isSelected }}");
        </script>
    @endforeach
    </select>
</div>


                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Question</button>

                <!-- Back Button -->
                <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to Questions List</a>
            </form>

        </div>
    </div>
</div>
@endsection
