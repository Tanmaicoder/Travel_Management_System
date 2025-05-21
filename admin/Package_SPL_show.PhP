<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Packages</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .special-package {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            transition: box-shadow 0.3s ease;
        }

        .special-package:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .package-info {
            padding: 15px;
        }

        .package-info p {
            margin: 5px 0;
            color: #555;
        }

        .approval-button {
            position: absolute;
            bottom: 15px;
            right: 15px;
            
            transform: translate(-50%, -50%);
            padding: 8px 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .approval-button:hover {
            background-color: #45a049;
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
    $sql = "SELECT * FROM special_package";
    $result = $conn->query($sql);

    // Display Data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="special-package">';
            echo '<div class="package-info">';
            echo '<p><strong>ID:</strong> ' . $row["id"] . '</p>';
            echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
            echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
            echo '<p><strong>From Location:</strong> ' . $row["from_location"] . '</p>';
            echo '<p><strong>To Location:</strong> ' . $row["to_location"] . '</p>';
            echo '<p><strong>Travel Date:</strong> ' . $row["travel_date"] . '</p>';
            echo '<p><strong>Number of Persons:</strong> ' . $row["number_of_persons"] . '</p>';
            echo '<button class="approval-button" onclick="approveBooking()">Approve</button>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
    } else {
        echo "0 results";
    }

    // Close Connection
    $conn->close();
    ?>

</div>

<script>
    function approveBooking() {
        var confirmation = confirm("Are you sure you want to approve this special package?");
        if (confirmation) {
            alert("Special package approved!");
            // You can add AJAX code here to update approval status without reloading the page.
        }
    }
</script>

</body>
</html>
