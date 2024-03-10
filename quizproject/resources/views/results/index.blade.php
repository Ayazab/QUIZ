<!-- resources/views/results/index.blade.php -->

@extends('layouts.app')
<style>
     #resultsTable_wrapper {
        margin-top: 20px;
    }

    #resultsTable th, #resultsTable td {
        text-align: center;
        background-color: white;
    }

    .dt-length {
        color: white;
    }

    #resultsTable_filter label {
        display: flex;
        justify-content: end;
    }
</style>
@section('content')
    <div class="container">
        <h2>Student Results</h2>

        <table id="resultsTable" class="display">
            <thead>
                <tr>
                    <th>Student Username</th>
                    <th>Quiz Title</th>
                    <th>Subject</th>
                    <th>Marks Obtained</th>
                    <th>Total Marks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through your results data and populate the table -->
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->student->username }}</td>
                        <td>{{ $result->quiz->quiz_title }}</td>
                        <td>{{ $result->sub_code }} - {{ $result->sub_name }}</td>
                        <td>{{ $result->marks_obtained }}</td>
                        <td>{{ $result->total_marks }}</td>
                        <td>
                            <!-- View Result Details Button -->
                            <a href="{{ route('results.show', $result->id) }}" class="btn btn-link action-btn text-success" title="View Result">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#resultsTable').DataTable();
        });
    </script>
@endsection
