@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="background-color: midnightblue; color: white;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-5">
                    <div class="card-header">
                        <h3>{{ $quiz->quiz_title }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Teacher:</strong> {{ $quiz->teacher->firstname }} {{ $quiz->teacher->lastname }}</p>
                        <p><strong>Time Limit:</strong> {{ $quiz->timelimit }} minutes</p>

                        <!-- Add other quiz details as needed -->

                        <!-- Rules and Instructions -->
                        <div class="mb-4">
                            <h5>Rules & Instructions:</h5>
                            <p>
                                <!-- Add your quiz rules and instructions here -->
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...
                            </p>
                        </div>

                        <!-- Start Quiz Button -->
                        <a href="{{ route('quizzes.start', $quiz->id) }}" class="btn btn-primary">Start Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
