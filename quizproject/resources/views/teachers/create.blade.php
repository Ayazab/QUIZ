@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Teacher</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>

                    <div class="col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email_id" class="form-label">Email ID</label>
                        <input type="email" class="form-control" id="email_id" name="email_id" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="col-md-6" id="subjectsField">
                        <label for="subject_code" class="form-label">Subject</label>
                        <select class="form-select" id="subject_code" name="subject_name">
                            <option value="" selected>Select Subject</option> <!-- Placeholder option -->

                            <!-- Add options dynamically based on subjects in the database -->
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->sub_code }} - {{ $subject->sub_name }}">{{ $subject->sub_code }} - {{ $subject->sub_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="is_approved" class="form-label">Approval Status</label>
                        <select class="form-select" id="is_approved" name="is_approved" required>
                            <option value="1">Approved</option>
                            <option value="0">Not Approved</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="profile_pic" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <!-- Back Button -->
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back to Teachers List</a>
            </form>
        </div>
    </div>
</div>
@endsection
