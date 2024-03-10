@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Question Details</h2>

    <div class="card mb-3">
        <div class="card-body">

            <p><strong>Question: </strong> {{ $question->question_text }}</p>

            <div class="mb-3">
                <strong>Options:</strong>
                <ul>
                    @foreach ($question->options as $key => $option)
                        <li><strong>{{ strtoupper(chr(65 + $key)) }}:</strong> {{ $option }}</li>
                    @endforeach
                </ul>
            </div>

            <p><strong>Correct Answer:</strong> {{ $question->correct_answer }}</p>
            <p><strong>Marks:</strong> {{ $question->marks }}</p>
            <p><strong>Difficulty Level:</strong> {{ $question->difficulty_level }}</p>
            {{-- Display Subject Code and Name --}}
            @if ($question->subject_code)
                <p><strong>Subject:</strong> {{ $question->subject_code }}</p>
            @endif

            <a href="{{ route('questions.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
</div>
@endsection
