@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

<style>

    .container{
        /* color: red;
        background-color: yellow; */
    }
    /* Add your custom styles here */
    #teachersTable_wrapper {
        margin-top: 20px;
    }

    #teachersTable th, #teachersTable td {
        text-align: center;
        background-color: white;
    }

    .dt-length {
        color: white;
    }

    #teachersTable_filter label {
        display: flex;
        justify-content: end;
    }
</style>

<div class="container">
    <h2>Teachers List</h2>

     <!-- Add Teacher Button -->
     <div class="text-end mb-3">
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Teacher
        </a>
    </div>


    <table id="teachersTable" class="display">
        <thead>
            <tr>
                {{-- <th>Profile Picture</th> --}}
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Email Id</th>
                <th>Subjects</th>
                <th>Approval Status</th>
                <th>Actions</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Loop through your teachers data and populate the table -->
            @foreach($teachers as $teacher)
            <tr>
                {{-- <td>
                    @if($teacher->profile_pic)
                        <img src="{{ asset('storage/'.$teacher->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded" width="50" height="50">
                    @else
                        <i class="fas fa-user-circle fa-2x text-secondary"></i>
                    @endif
                </td> --}}
                <td>{{ $teacher->firstname }}</td>
                <td>{{ $teacher->lastname }}</td>
                <td>{{ $teacher->username }}</td>
                <td>{{ $teacher->email_id }}</td>
                <td>{{ $teacher->subject_name }}</td>
                <td style="color: {{ $teacher->is_approved ? 'green' : 'red' }}">
                   <b> {{ $teacher->is_approved ? 'Approved' : 'Not Approved' }} </b>
                </td>

                <td>
                    <!-- View Teacher Icon -->
                    <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-link action-btn text-success" title="View Teacher">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit Teacher Icon -->
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-link action-btn text-warning" title="Edit Teacher">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Teacher Icon -->
                    <form method="POST" action="{{ route('teachers.destroy', $teacher->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link action-btn text-danger" title="Delete Teacher" onclick="return confirm('Are you sure you want to delete this teacher?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>



                <!-- Add more columns as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
   $(document).ready( function () {
    $('#teachersTable').DataTable();
} );
</script>

@endsection
