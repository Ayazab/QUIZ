<!-- resources/views/quizzes/index.blade.php -->

@extends('layouts.app')

<style>
    .container {
        /* Add your custom styles here */
    }

    #quizzesTable_wrapper {
        margin-top: 20px;
    }

    #quizzesTable th, #quizzesTable td {
        text-align: center;
        background-color: white;
    }

    .dt-length {
        color: white;
    }

    #quizzesTable_filter label {
        display: flex;
        justify-content: end;
    }
</style>

@section('content')
    <div class="container">
        <h2>Quizzes List</h2>

        <div class="text-end mb-3">
            <a href="{{ route('quizzes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Quiz
            </a>
        </div>

        <table id="quizzesTable" class="display">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Quiz Title</th>
                    <th>Teacher</th>
                    <th>Time Limit</th>
                    <th>Actions</th>
                    <th>View Quiz</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
            @endphp
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $quiz->quiz_title }}</td>
                        <td>{{ $quiz->teacher->firstname }} {{ $quiz->teacher->lastname }}</td>
                        <td>{{ $quiz->timelimit }} minutes</td>
                        <td>
                            <!-- View Quiz Icon -->
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-link action-btn text-success" title="View Quiz">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Edit Quiz Icon -->
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-link action-btn text-warning" title="Edit Quiz">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete Quiz Icon -->
                            <form method="POST" action="{{ route('quizzes.destroy', $quiz->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link action-btn text-danger" title="Delete Quiz" onclick="return confirm('Are you sure you want to delete this quiz?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>

                        <td><a href="{{ route('quizzes.view', $quiz->id) }}" class="btn btn-success">View Quiz</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include DataTables and other scripts at the end of the file -->
    {{-- @push('scripts') --}}
        <script>
            $(document).ready(function () {
                $('#quizzesTable').DataTable();
            });
        </script>
    {{-- @endpush --}}
@endsection
