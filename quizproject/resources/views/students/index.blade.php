    <!-- resources/views/students/index.blade.php -->

    @extends('layouts.app')

    @section('content')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

        <style>
            /* Add your custom styles here */
            .container {
                /* color: red;
                background-color: yellow; */
            }

            #studentsTable_wrapper {
                margin-top: 20px;
            }

            #studentsTable th,
            #studentsTable td {
                text-align: center;
                background-color: white;
            }

            .dt-length {
                color: white;
            }

            #studentsTable_filter label {
                display: flex;
                justify-content: end;
            }
        </style>

        <div class="container">
            <h2>Students List</h2>

            <!-- Add Student Button -->
            <div class="text-end mb-3">
                <a href="{{ route('students.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Student
                </a>
            </div>

            <table id="studentsTable" class="display">
                <thead>
                    <tr>
                        <th>Profile Picture</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email Id</th>
                        <th>Subject Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your students data and populate the table -->
                    @foreach($students as $student)
                        <tr>
                            <td>
                                @if($student->profile_pic)
                                    <img src="{{ asset('storage/'.$student->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded" width="50" height="50">
                                @else
                                    <i class="fas fa-user-circle fa-2x text-secondary"></i>
                                @endif
                            </td>
                            <td>{{ $student->firstname }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->email_id }}</td>
                            <td>{{ $student->subject_name }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-link action-btn text-success" title="View Teacher">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Edit Student Icon -->
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-link action-btn text-warning" title="Edit Student">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete Student Icon -->
                                <form method="POST" action="{{ route('students.destroy', $student->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link action-btn text-danger" title="Delete Student" onclick="return confirm('Are you sure you want to delete this student?')">
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
            $(document).ready(function () {
                $('#studentsTable').DataTable();
            });
        </script>

    @endsection
