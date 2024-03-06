<!-- Sidebar -->
<div class="sidebar">
    <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="Sidebar Image">
    <a href="#">Dashboard</a>
    <a href="#" class="has-submenu">Users</a>
    <ul class="submenu">
        <li id="adminsLink"><a href="#">Admins</a></li>
        <li><a href="#">Teachers</a></li>
        <li><a href="#">Students</a></li>
    </ul>
    <a href="#">Courses</a>
    <a href="#">Questions</a>
    <a href="#">Results</a>
    <a href="#">Feedback</a>
    <a href="#" id="logoutBtn" id="logout" onclick="confirmLogout()">Logout <i class="fas fa-sign-out-alt"></i></a>
</div>
