@extends('layouts.app')

@section('content')

<style>
    /* Sample Card styles */
    .card {
        width: 360px;
        height: 140px;
        margin-bottom: 20px;
    }
</style>

<h2 class="mb-4">Admin Dashboard</h2>

<!-- Card Row -->
<div class="row">

    <!-- Card 1 - Students -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="text-end">
                    <i class="fas fa-users fa-3x"></i>
                    <span class="fs-3">{{ $studentCount }}</span>
                </div>
                <h5 class="card-title mt-2">Students</h5>
            </div>
        </div>
    </div>

    <!-- Card 2 - Teachers -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="text-end">
                    <i class="fas fa-chalkboard-teacher fa-3x"></i>
                    <span class="fs-3">{{ $teacherCount }}</span>
                </div>
                <h5 class="card-title mt-2">Teachers</h5>
            </div>
        </div>
    </div>

    <!-- Card 3 - Subjects -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="text-end">
                    <i class="fas fa-book fa-3x"></i>
                    <span class="fs-3">{{ $subjectCount }}</span>
                </div>
                <h5 class="card-title mt-2">Subjects</h5>
            </div>
        </div>
    </div>

</div>
<!-- End of Card Row -->

<!-- Card 4 - Questions -->
<div class="card">
    <div class="card-body">
        <div class="text-end">
            <i class="fas fa-question-circle fa-3x"></i>
            <span class="fs-3">{{ $questionCount }}</span>
        </div>
        <h5 class="card-title mt-2">Questions</h5>
    </div>
</div>

</div>
</div>
@endsection
