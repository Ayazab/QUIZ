@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

<style>

    .container{
        /* color: red;
        background-color: yellow; */
    }
    /* Add your custom styles here */
    #adminsTable_wrapper {
        margin-top: 20px;
    }

    #adminsTable th, #adminsTable td {
        text-align: center;
        background-color: white;
    }

    .dt-length {
        color: white;
    }

    #adminsTable_filter label {
        display: flex;
        justify-content: end;
    }
</style>

<div class="container">
    <h2>Admins</h2>
    <table id="adminsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Loop through your admins data and populate the table -->
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->email_id }}</td>
                <!-- Add more columns as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
   $(document).ready( function () {
    $('#adminsTable').DataTable();
} );
</script>

@endsection
