<!-- resources/views/subjects/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add Subject</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('subjects.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="sub_code" class="form-label">Subject Code</label>
                        <input type="text" class="form-control" id="sub_code" name="sub_code" required>
                    </div>

                    <div class="mb-3">
                        <label for="sub_name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="sub_name" name="sub_name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <!-- Back Button -->
                    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Back to Subjects List</a>
                </form>
            </div>
        </div>
    </div>
@endsection
