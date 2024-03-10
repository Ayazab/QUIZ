@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Subject Details</h2>

    <div class="card mb-3">
        <div class="card-body">

            <p><strong>Subject Code:</strong> {{ $subject->sub_code }}</p>
            <p><strong>Subject Name:</strong> {{ $subject->sub_name }}</p>

            <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
</div>
@endsection
