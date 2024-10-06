<?php
session_start();
@include 'config.php';

// Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('location:Login.php');
    exit();
}

// Fetch all bookings
$bookings_query = "SELECT * FROM bookings";
$bookings_result = mysqli_query($conn, $bookings_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #a60fa3cb;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #a60fa3cb;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>All Bookings</h1>

    <table>
        <tr>
            <th>Booking ID</th>
            <th>User ID</th>
            <th>Event ID</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($bookings_result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['event_id']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
