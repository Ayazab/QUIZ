<!-- resources/views/students/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Student</h2>

        <!-- Card for editing student details -->
        <div class="card">
            <div class="card-body">

                <!-- Profile Picture Display (Top of Card) -->
                <div class="text-center mb-3">
                    <img src="{{ $student->profile_pic ? asset('storage/'.$student->profile_pic) : asset('images/default-user.png') }}" alt="Profile Picture" class="img-fluid rounded" width="100" height="100">
                </div>

                <!-- If profile pic doesn't exist, show Font Awesome user icon -->
                @if (!$student->profile_pic)
                    <div class="text-center mb-3">
                        <i class="fas fa-user-circle fa-5x text-secondary"></i>
                    </div>
                @endif

                <!-- Form for editing student details -->
                <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Firstname and Lastname (Two fields in one row) -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $student->firstname }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $student->lastname }}" required>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $student->username }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email_id" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_id" name="email_id" value="{{ $student->email_id }}" required>
                        </div>
                    </div>

                    <!-- Subject and Approval Status (Two fields in one row) -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subject_name" class="form-label">Subject</label>
                            <select class="form-select" id="subject_name" name="subject_name">
                                <option value="" selected>Select Subject</option> <!-- Placeholder option -->

                                @foreach($subjects as $subject)
                                <?php
                        $isSelected = trim($student->subject_name) === trim($subject->sub_code . ' - ' . $subject->sub_name);
                                ?>
                                <option value="{{ $subject->sub_code }} - {{ $subject->sub_name }}" {{ $isSelected ? 'selected' : '' }}>
                                    {{ $subject->sub_code }} - {{ $subject->sub_name }}
                                </option>
                        @endforeach

                            </select>
                        </div>




                    <!-- Profile Picture Update Button -->
                    <div class="col-md-6">
                        <label for="update_profile_pic" class="form-label">Update Profile Picture</label>
                        <input type="file" class="form-control" id="update_profile_pic" name="update_profile_pic">
                    </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Student</button>

                    <!-- Back Button -->
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students List</a>
                </form>

            </div>
        </div>
    </div>
@endsection
