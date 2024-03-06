<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            /* background-color: #f8f9fa; Bootstrap default background color */
            background-color: #191970;
            color: #000;
        }

        .register-card {
            width: 500px; /* Increased width */
            margin: auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-card h2 {
            color: #007bff; /* Bootstrap primary color */
            text-align: center;
        }

        .register-card label {
            font-weight: 525;
            color: #495057;
        }

        /* .register-card select, .register-card input {
            background-color: #e2e3e5;
        } */

        .register-card .form-group {
            margin-bottom: 15px;
        }

        .register-card button {
            background-color: #007bff;
            color: #fff;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #007bff;
        }
    </style>
</head>
<body>

    <div class="register-card">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2 class="mb-4">REGISTER</h2>

        <!-- Registration Form -->
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="role">Select Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="admins">Admin</option>
                            <option value="teachers">Teacher</option>
                            <option value="students">Student</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                 <!-- Additional Fields based on Role -->
        <div class="col-md-6" id="departmentField" style="display: none;">
            <label for="department" class="form-label">Department</label>
            <select class="form-select" id="department" name="department">
                <option value="computer">Computer</option>
                <option value="mechanical">Mechanical</option>
                <option value="electrical">Electrical</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="col-md-6" id="subjectsField" style="display: none;">
            <label for="subjects" class="form-label mb-0">Subjects</label>
            <select class="form-select" id="subjects" name="subjects[]" multiple>
                <option value="math">Math</option>
                <option value="science">Science</option>
                <option value="english">English</option>
                <!-- Add more options as needed -->
            </select>
        </div>


            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <!-- Login Link -->

        <p class="mt-4 mb-2 text-center">
            Already have an account?
            <a href="{{ route('login') }}" class="btn btn-success btn-sm">Login here</a>
        </p>
    </div>



<!-- Bootstrap JS (optional, for Bootstrap features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery (optional, for dynamic behavior) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>


<!-- Custom Script for dynamic form behavior -->
<script>
    $(document).ready(function () {
        $('#role').change(function () {
            // Hide all additional fields initially
            $('#departmentField, #subjectsField').hide();

            // Show additional fields based on the selected role
            if ($(this).val() === 'students') {
                $('#departmentField').show();
            } else if ($(this).val() === 'teachers') {
                $('#subjectsField').show();
            }
        });


        $('#subjects').select2({
            width: '100%',
            multiple: true,
            placeholder: 'Select subjects',
            tags: true,
            tokenSeparators: [',', ' '],
            allowClear: true,
        });
    });
</script>

</body>
</html>
