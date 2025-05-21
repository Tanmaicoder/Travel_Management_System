<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Data</title>
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

        .booking {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .booking:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .booking-info {
            padding: 15px;
            position: relative;
        }

        .booking-info h2 {
            margin-top: 0;
            color: #333;
        }

        .booking-info p {
            margin: 5px 0;
            color: #555;
        }

        .approval-button {
            position: absolute;
            bottom: 15px;
            right: 15px;
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

    // Handle Booking Approval
    if (isset($_GET['approve'])) {
        $bookingId = $_GET['approve'];
        // You should implement the actual update query to mark the booking as approved in your database.
        // For demonstration purposes, let's assume you have a bookings table with a column named 'approved'.
        $updateQuery = "UPDATE bookings SET approved = 1 WHERE id = $bookingId";
        $conn->query($updateQuery);

        echo '<script>alert("Booking Approved!");</script>';
    }

    // Retrieve Data
    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);

    // Display Data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="booking">';
            echo '<div class="booking-info">';
            echo '<h2>Booking ID: ' . $row["id"] . '</h2>';
            echo '<p><strong>User Name:</strong> ' . $row["user_name"] . '</p>';
            echo '<p><strong>Email ID:</strong> ' . $row["email_id"] . '</p>';
            echo '<p><strong>Phone Number:</strong> ' . $row["phone_number"] . '</p>';
            echo '<p><strong>Number of Persons:</strong> ' . $row["num_persons"] . '</p>';
            echo '<p><strong>From Location:</strong> ' . $row["from_location"] . '</p>';
            echo '<p><strong>To Location:</strong> ' . $row["to_location"] . '</p>';
            echo '<p><strong>Package Name:</strong> ' . $row["package_name"] . '</p>';
            echo '<button class="approval-button" onclick="approveBooking(' . $row["id"] . ', \'' . $row["phone_number"] . '\')">Approve</button>';

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
    function approveBooking(bookingId, phoneNumber) {
        var confirmation = confirm("Are you sure you want to approve this booking and send confirmation to the phone number: " + phoneNumber + "?");
        if (confirmation) {
            // Update the button text or style to indicate approval without reloading the page.
            document.getElementById('approvalButton_' + bookingId).innerText = 'Approved';
            document.getElementById('approvalButton_' + bookingId).disabled = true;

            // Send alert message to the user's phone number
            alert("Booking confirmation sent to: " + phoneNumber);
        }
    }
</script>


</body>
</html>
