<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];
$persons = $_POST['persons'];

// SQL query to insert data into the table
$sql = "INSERT INTO special_package (name, email, from_location, to_location, travel_date, number_of_persons) VALUES ('$name', '$email', '$from', '$to', '$date', '$persons')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    $successMessage = "Booking submitted successfully!";
} else {
    $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .success-message {
            color: #4CAF50;
            font-weight: bold;
        }
        
        .error-message {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($successMessage)) {
            echo '<p class="success-message">' . $successMessage . '</p>';
        } elseif (isset($errorMessage)) {
            echo '<p class="error-message">' . $errorMessage . '</p>';
        }
        ?>
    </div>
</body>
</html>
