@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Student Details</h2>

    <div class="card mb-3">
        <div class="card-body">
            @if($student->profile_pic)
    <img src="{{ asset('storage/'.$student->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
@else
    <!-- If no profile picture is available, show a default user icon -->
    <i class="fas fa-user-circle fa-3x mb-3"></i>
@endif


            <p><strong>First Name:</strong> {{ $student->firstname }}</p>
            <p><strong>Last Name:</strong> {{ $student->lastname }}</p>
            <p><strong>Username:</strong> {{ $student->username }}</p>
            <p><strong>Email ID:</strong> {{ $student->email_id }}</p>
            <p><strong>Subject:</strong> {{ $student->subject_name ?? '-' }}</p>
            <!-- Add more details as needed -->

            <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
</div>
@endsection
