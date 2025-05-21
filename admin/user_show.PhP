<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
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

        .content-heading {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .user-info {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .user-info:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .info-details {
            padding: 15px;
        }

        .info-details p {
            margin: 5px 0;
            color: #555;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
    </style>
</head>
<body>

<div class="container">
    <br><br><br><br><br> <br><br><br><br><br>
    <h2 class="content-heading">User Data</h2>

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

    // Number of records per page
    $recordsPerPage = 5;

    // Current page number, default is 1
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the starting record for the current page
    $startFrom = ($page - 1) * $recordsPerPage;

    // SQL query with LIMIT for pagination
    $sql = "SELECT id, username, email FROM users LIMIT $startFrom, $recordsPerPage";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error in query: " . $conn->error);
    }

    // Fetch and display the data
    while ($row = $result->fetch_assoc()) {
        echo '<div class="user-info">';
        echo '<div class="info-details">';
        echo '<p><strong>ID:</strong> ' . $row["id"] . '</p>';
        echo '<p><strong>Username:</strong> ' . $row["username"] . '</p>';
        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }

    // Pagination links
    $sql = "SELECT COUNT(*) as total FROM users";
    $result = $conn->query($sql);
    $totalRecords = $result->fetch_assoc()['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '" class="' . ($i == $page ? 'active' : '') . '">' . $i . '</a> ';
    }
    echo '</div>';

    // Close connection
    $conn->close();
    ?>

</div>

</body>
</html>
