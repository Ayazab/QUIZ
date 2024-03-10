@extends('layouts.app')


<style>

    .container{
        /* color: red;
        background-color: yellow; */
    }
    /* Add your custom styles here */
    #questionsTable_wrapper {
        margin-top: 20px;
    }

    #questionsTable th, #questionsTable td {
        text-align: center;
        background-color: white;
    }

    .dt-length {
        color: white;
    }

    #questionsTable_filter label {
        display: flex;
        justify-content: end;
    }
</style>


@section('content')
    <div class="container">
        <h2>Questions List</h2>

        <!-- Add Button to Create a New Question -->
        <div class="text-end mb-3">
            <a href="{{ route('questions.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Question
            </a>
        </div>

        <!-- Display Questions in DataTable -->
        <table id="questionsTable" class="display">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Question Text</th>
                    <th>Options</th>
                    <th>Correct Answer</th>
                    <th>Marks</th>
                    <th>Difficulty Level</th>
                    <th>Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
            @endphp
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $question->question_text }}</td>
                        <td style="text-align: left;">
                            @if(is_array($question->options))
                                @foreach($question->options as $key => $value)
                                    <strong>{{ strtoupper(chr(65 + $key)) }}:</strong> {{ $value }}<br>
                                @endforeach
                            @else
                                @php
                                    $options = json_decode($question->options, true);
                                @endphp
                                @foreach($options as $key => $value)
                                    <strong>{{ strtoupper(chr(65 + $key)) }}:</strong> {{ $value }}<br>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $question->correct_answer }}</td>
                        <td>{{ $question->marks }}</td>
                        <td>{{ $question->difficulty_level }}</td>
                        <td>{{ $question->subject_code }}</td>
                        <td>
                            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-link action-btn text-success" title="View Subject">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-link action-btn text-warning" title="Edit Subject">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('questions.destroy', $question->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link action-btn text-danger" title="Delete subject" onclick="return confirm('Are you sure you want to delete this subject?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <script>
            $(document).ready(function() {
                $('#questionsTable').DataTable();
            });
        </script>

@endsection
