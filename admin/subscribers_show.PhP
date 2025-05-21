<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve Data
$sql = "SELECT * FROM subscribers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscriber Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .subscriber {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            padding: 15px;
            transition: box-shadow 0.3s ease;
            background-color: #fff;
        }

        .subscriber:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .subscriber-info p {
            margin: 5px 0;
            color: #555;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Subscriber Data</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="subscriber">';
            echo '<div class="subscriber-info">';
            echo '<p>ID: ' . $row["id"] . '</p>';
            echo '<p>Name: ' . $row["name"] . '</p>';
            echo '<p>Email: ' . $row["email"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
    } else {
        echo "0 results";
    }
    ?>

</div>

</body>
</html>

<?php
// Close Connection
$conn->close();
?>
