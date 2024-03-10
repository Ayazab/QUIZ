<!-- resources/views/quizzes/question.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="float-start">{{ $quiz->quiz_title }}</h2>
                <div class="float-end">
                    <span id="timer">Timer: <span id="time"></span></span>
                </div>
            </div>

            <div class="card-body">
                <div id="questionContainer">
                    <h3>Question {{ $questionNumber }}</h3>
                    <p>{{ $question->question_text }}</p>

                    <form id="quizForm">
                        <ul class="list-group">
                            @foreach($question->options as $index => $option)
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="options" id="option{{ $index }}" value="{{ $option }}">
                                        <label class="form-check-label" for="option{{ $index }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        {{-- @if($questionNumber == 5) --}}
                            <button type="button" id="submitQuizBtn" class="btn btn-primary mt-2">Submit Quiz</button>
                        {{-- @else --}}
                            <button type="button" id="nextQuestionBtn" class="btn btn-success mt-2">Next Question</button>
                        {{-- @endif --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var currentQuestionNumber = {{ $questionNumber }};
            var quizTimeLimit = {{ $quiz->timelimit * 60 }}; // Convert minutes to seconds
            var timeRemaining = quizTimeLimit;
            var quizForm = $('#quizForm');

            // Function to update the timer display
            function updateTimerDisplay() {
                var minutes = Math.floor(timeRemaining / 60);
                var seconds = timeRemaining % 60;

                $('#time').text(minutes + ':' + (seconds < 10 ? '0' : '') + seconds);
            }

            // Function to fetch and display the next question
            function loadNextQuestion() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("quizzes.nextQuestion", $quiz->id) }}',
                    data: {
                        currentQuestionNumber: currentQuestionNumber,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        // Update the DOM with the next question and options
                        $('#questionContainer h3').text('Question ' + currentQuestionNumber);
                        $('#questionContainer p').text(response.question_text);

                        // Clear previous options
                        $('#questionContainer ul').empty();

                        // Append new options
                        $.each(response.options, function(index, option) {
                            $('#questionContainer ul').append('<li class="list-group-item">' +
                                '<div class="form-check">' +
                                '<input class="form-check-input" type="radio" name="options" id="option' + index + '" value="' + option + '">' +
                                '<label class="form-check-label" for="option' + index + '">' + option + '</label>' +
                                '</div>' +
                                '</li>');
                        });

                        // Update the current question number
                        currentQuestionNumber++;
                        updateTimerDisplay();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Initial load
            loadNextQuestion();

            // Update the timer display every second
            var timerInterval = setInterval(function() {
                timeRemaining--;

                if (timeRemaining <= 0) {
                    // Timer reached 0, automatically submit the quiz
                    clearInterval(timerInterval);
                    $('#submitQuizBtn').click();
                }

                updateTimerDisplay();
            }, 1000);

            // Event listener for the "Next Question" button
            $('#nextQuestionBtn').click(function () {
                loadNextQuestion();
            });

            // Event listener for the "Submit Quiz" button
            $('#submitQuizBtn').click(function () {
                // Add logic to submit the quiz
                quizForm.submit();
            });
        });
    </script>
@endsection
