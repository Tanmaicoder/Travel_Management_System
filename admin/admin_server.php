<?php
session_start();

$errors = array(); // Initialize the $errors array

$db = mysqli_connect('localhost', 'root', '', 'Project');

// Check if the database connection is successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle admin login
if (isset($_POST['admin_login_user'])) {
    $admin_username = mysqli_real_escape_string($db, $_POST['admin_username']);
    $admin_password = mysqli_real_escape_string($db, $_POST['admin_password']);

    $query = "SELECT * FROM admins WHERE admin_username='$admin_username' AND admin_password='$admin_password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin_username'] = $admin_username;
        header('location: admin.html'); // Redirect to admin dashboard or home page
    } else {
        array_push($errors, "Invalid username or password");
    }
}
?>

