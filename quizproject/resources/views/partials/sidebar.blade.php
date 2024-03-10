<!-- Sidebar -->
<div class="sidebar">
    <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="Sidebar Image">
    <a href="{{ route('admins_dashboard') }}">Dashboard</a>
    <a href="#" class="has-submenu">Users</a>
    <ul class="submenu">
        <li><a href="{{ route('admins.index') }}">Admins</a></li>
        <li><a href="{{ route('teachers.index') }}">Teachers</a></li>
        <li><a href="{{ route('students.index') }}">Students</a></li>
    </ul>
    <a href="{{ route('subjects.index') }}">Courses</a>
    <a href="{{ route('questions.index') }}">Questions</a>
    <a href="{{ route('quizzes.index') }}">Quiz</a>
    <a href="{{ route('results.index') }}">Results</a>
    <a href="#">Feedback</a>
    <a href="#" id="logoutBtn" id="logout" onclick="confirmLogout()">Logout <i class="fas fa-sign-out-alt"></i></a>
</div>
