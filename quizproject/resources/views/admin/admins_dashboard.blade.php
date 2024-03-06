{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
   <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<!-- Custom Styles -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    #header {
        background-color: #1c2a48;
        color: white;
        padding: 10px;
        text-align: center;
        position: fixed;
        width: 250px; /* Set the width of the sidebar */
        height: 100%; /* Make the sidebar full height */
        overflow: hidden; /* Hide overflowing content */
    }

    #header h2 {
        margin: 0;
    }

    #sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #1c2a48;
        color: white;
        padding-top: 60px; /* Adjust based on the height of the header */
        overflow-x: hidden; /* Hide horizontal scrollbar */
    }

    #content {
        margin-left: 250px; /* Adjust based on the width of the sidebar */
        padding: 20px;
    }

    #profile {
        position: fixed;
        top: 0;
        right: 0;
        background-color: #1c2a48;
        padding: 10px;
        color: white;
    }

    #logout {
        position: fixed;
        bottom: 0;
        left: 0;
        background-color: #1c2a48;
        width: 250px;
        padding: 10px;
        color: white;
        text-align: center;
    }

    #menu a {
        display: block;
        color: white;
        padding: 10px;
        text-decoration: none;
        border-bottom: 1px solid #3a4b78;
    }

    #menu a.active {
        background-color: #d9534f;
    }

    #menu a:hover {
        background-color: #3a4b78;
    }

    #hamburger {
        color: white;
        cursor: pointer;
        font-size: 20px;
        position: fixed;
        top: 15px;
        left: 15px;
        z-index: 2;
    }

    #close {
        display: none;
        color: white;
        cursor: pointer;
        font-size: 60px;
        position: fixed;
        top: 15px;
        left: 15px;
        z-index: 2;
    }
</style>
</head>
<body>

<div id="header">
<h2>Quiz App</h2>
</div>

<div id="sidebar">
<div id="menu">
    <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#"><i class="fas fa-users"></i> Users</a>
    <a href="#"><i class="fas fa-chart-bar"></i> Reports</a>
</div>
<div id="logout" onclick="confirmLogout()">
    <i class="fas fa-sign-out-alt"></i> Logout
</div>
</div>

<div id="content">
<!-- Dashboard Content Goes Here -->
<h2>Welcome to the Dashboard</h2>
</div>

<div id="profile">
<i class="fas fa-user"></i> Admin Profile
</div>

<!-- Bootstrap JS (optional, for Bootstrap features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#3a4b78',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform logout and navigate to login
                alert("Logout successful!");
                window.location.href = '/login'; // Adjust the URL accordingly
            } else {
                console.log("Logout canceled");
            }
        });
    }
    </script>
</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar styles */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            margin-left: 280px;
            height: 50px;
        }

        /* Sidebar styles */
        .sidebar {
            width: 280px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1c2a48;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar img {
    width: 50%;
    height: 100px;
    display: block;
    margin: auto; /* Center the image horizontally and vertically */
    margin-bottom: 20px;
}



        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #3a4b78;
        }

        /* Admin container styles */
        .admin-container {
            display: flex;
        }

        /* Main content styles */
        .main-content {
            flex: 1;
            margin-left: 280px; /* Adjust margin based on the sidebar width */
            padding: 20px;
            background-color: lightblue;
            overflow-y: auto;
            height: calc(100vh - 50px); /* Adjust for the height of the top navbar */
        }

        .profile-icon {
            cursor: pointer;
        }

        /* Profile card styles */
        #profileCard {
            position: fixed;
            top: 55px;
            right: 20px;
            width: 200px;
            display: none;
            border: 1px solid gray;
            border-radius: 4px;
            padding: 5px;
            z-index: 1001;
            background-color: white;
        }

        <!-- Sample Card styles -->
.profile-card {
    width: 300px;
    height: auto;
    margin-bottom: 20px;
    cursor: pointer;
    transition: box-shadow 0.3s;
}

.profile-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.profile-card .text-end {
    position: relative;
}

.profile-card .text-end img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
}
        /* Sample Card styles */
        .card {
            width: 300px;
            height: 120px;
            margin-bottom: 20px;
        }

      
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Navbar content here -->
        <div class="container">
            <!-- Navbar brand/logo if any -->

            <!-- Navbar toggle button for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Add your navbar links/content here -->
            </div>

            <!-- Right side content -->
            <!-- Profile icon -->
            <div class="ms-auto" style="margin-right: 10px;">
                <div class="profile-icon" id="profileIcon">
                    <!-- Add your profile icon and user details here -->
                    <img src="https://via.placeholder.com/50" alt="Profile Icon" class="rounded-circle" width="40" height="40">
                    <span class="ms-2 text-dark fw-bold">Ayyaj Basaida</span>
                </div>
            </div>


        </div>
    </nav>

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

    <!-- Admin container -->
    <div class="admin-container">

        <div class="main-content">
            <h2 class="mb-4">Dashboard</h2>

            <!-- Sample Cards -->
            <div class="card">
                <div class="card-body">
                    <!-- Icon and count at the top-right corner -->
                    <div class="text-end">
                        <i class="fas fa-users fa-3x"></i>
                        <span class="fs-3">100</span>
                    </div>
                    <h5 class="card-title mt-2">Students</h5>
                </div>
            </div>
            <!-- End of Sample Cards -->

        </div>
    </div>

    <!-- Profile card -->
<div class="profile-card" id="profileCard">
    <div class="card-body" style="margin-left: 5px;">
        <p class="card-text">Username</p>
        <p class="card-text">Profile</p>
        <p class="card-text">Logout</p>
    </div>
</div>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function () {
            $("#profileIcon").click(function () {
                $("#profileCard").toggle();
            });

            $(".has-submenu").click(function () {
                $(this).toggleClass("active");
                $(".submenu").slideToggle("fast");
            });
             // Redirect to the admins page
            $("#adminsLink").click(function () {
                window.location.href = "{{ route('admins.index') }}";
            });

        });

        function confirmLogout() {
             Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#3a4b78',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform logout and navigate to login
                // alert("Logout successful!");
                window.location.href = '/login'; // Adjust the URL accordingly
            } else {
                console.log("Logout canceled");
            }
        });
    }
    </script>

<script>
    $(document).ready(function () {

    });
</script>
</body>
</html>
