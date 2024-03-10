@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Teacher Details</h2>

    <div class="card mb-3">
        <div class="card-body">
            @if($teacher->profile_pic)
    <img src="{{ asset('storage/'.$teacher->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
@else
    <!-- If no profile picture is available, show a default user icon -->
    <i class="fas fa-user-circle fa-3x mb-3"></i>
@endif


            <p><strong>First Name:</strong> {{ $teacher->firstname }}</p>
            <p><strong>Last Name:</strong> {{ $teacher->lastname }}</p>
            <p><strong>Username:</strong> {{ $teacher->username }}</p>
            <p><strong>Email ID:</strong> {{ $teacher->email_id }}</p>
            <p><strong>Subjects:</strong> {{ $teacher->subject_name }}</p>
            <p>
                <strong>Approval Status:</strong>
                <b><span style="color: {{ ($teacher->is_approved == 1) ? 'green' : 'red' }}">
                    {{ ($teacher->is_approved == 1) ? 'Approved' : 'Not Approved' }}
                </span></b>
            </p>


            <!-- Add more details as needed -->

            <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
</div>
@endsection
