<!-- resources/views/subjects/index.blade.php -->

@extends('layouts.app')

<style>

    .container{
        /* color: red;
        background-color: yellow; */
    }
    /* Add your custom styles here */
    #subjectsTable_wrapper {
        margin-top: 20px;
    }

    #subjectsTable th, #subjectsTable td {
        text-align: center;
        background-color: white;
    }

    .dt-length {
        color: white;
    }

    #subjectsTable_filter label {
        display: flex;
        justify-content: end;
    }
</style>

@section('content')
    <div class="container">
        <h2>Subjects List</h2>

        <div class="text-end mb-3">
            <a href="{{ route('subjects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Subject
            </a>
        </div>

        <table id="subjectsTable" class="display">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->sub_code }}</td>
                        <td>{{ $subject->sub_name }}</td>
                        <td>
                            <!-- View subject Icon -->
                            <a href="{{ route('subjects.show', $subject->sub_code) }}" class="btn btn-link action-btn text-success" title="View Subject">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Edit subject Icon -->
                            <a href="{{ route('subjects.edit', $subject->sub_code) }}" class="btn btn-link action-btn text-warning" title="Edit Subject">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete subject Icon -->
                            <form method="POST" action="{{ route('subjects.destroy', $subject->sub_code) }}" style="display: inline;">
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

    <!-- Include DataTables and other scripts at the end of the file -->
    {{-- @push('scripts') --}}
        <script>
            $(document).ready(function () {
                $('#subjectsTable').DataTable();
            });
        </script>
    {{-- @endpush --}}
@endsection
