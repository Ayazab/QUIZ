<!-- resources/views/subjects/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Subject</h2>

        <!-- Card for editing subject details -->
        <div class="card">
            <div class="card-body">

                <!-- Form for editing subject details -->
                <form method="POST" action="{{ route('subjects.update', $subject->sub_code) }}">
                    @csrf
                    @method('PUT')

                    <!-- Subject Code and Subject Name -->
                    <div class="mb-3">
                        <label for="sub_code" class="form-label">Subject Code</label>
                        <input type="text" class="form-control" id="sub_code" name="sub_code" value="{{ $subject->sub_code }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="sub_name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="sub_name" name="sub_name" value="{{ $subject->sub_name }}" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Subject</button>

                    <!-- Back Button -->
                    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Back to Subjects List</a>
                </form>

            </div>
        </div>
    </div>
@endsection
