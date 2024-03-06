$(document).ready(function () {
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
