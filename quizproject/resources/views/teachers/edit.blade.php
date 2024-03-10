@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Teacher</h2>

        <!-- Card for editing teacher details -->
        <div class="card">
            <div class="card-body">

               <!-- Profile Picture Display (Top of Card) -->
<div class="text-center mb-3">
    <img src="{{ $teacher->profile_pic ? asset('storage/'.$teacher->profile_pic) : asset('images/default-user.png') }}" alt="Profile Picture" class="img-fluid rounded" width="100" height="100">
</div>

<!-- If profile pic doesn't exist, show Font Awesome user icon -->
@if (!$teacher->profile_pic)
    <div class="text-center mb-3">
        <i class="fas fa-user-circle fa-5x text-secondary"></i>
    </div>
@endif


                <!-- Form for editing teacher details -->
                <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Firstname and Lastname (Two fields in one row) -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $teacher->firstname }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $teacher->lastname }}" required>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $teacher->username }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email_id" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_id" name="email_id" value="{{ $teacher->email_id }}" required>
                        </div>


                    </div>

                    <!-- Email and Subjects (Two fields in one row) -->
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <label for="subject_name" class="form-label">Subjects</label>
                            <select class="form-select" id="subject_name" name="subject_name" required>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->sub_code }} - {{ $subject->sub_name }}" {{ ($teacher->subject_name == $subject->sub_code) ? 'selected' : '' }}>
                                        {{ $subject->sub_code }} - {{ $subject->sub_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="is_approved" class="form-label">Approval Status</label>
                            <select class="form-select" id="is_approved" name="is_approved" required>
                                <option value="1" {{ $teacher->is_approved ? 'selected' : '' }}>Approved</option>
                                <option value="0" {{ !$teacher->is_approved ? 'selected' : '' }}>Not Approved</option>
                            </select>
                        </div>
                    </div>

                    <!-- Profile Picture Update Button -->
                    <div class="mb-3">
                        <label for="update_profile_pic" class="form-label">Update Profile Picture</label>
                        <input type="file" class="form-control" id="update_profile_pic" name="update_profile_pic">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Teacher</button>

                    <!-- Back Button -->
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back to Teachers List</a>
                </form>

            </div>
        </div>
    </div>
@endsection
