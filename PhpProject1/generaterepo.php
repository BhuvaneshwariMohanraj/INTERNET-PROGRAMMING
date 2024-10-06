<?php
session_start();
@include 'config.php';

// Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('location:Login.php');
    exit();
}

// Fetch Total Events
$events_query = "SELECT COUNT(*) AS total_events FROM events";
$events_result = mysqli_query($conn, $events_query);
$events_data = mysqli_fetch_assoc($events_result);
$total_events = $events_data['total_events'];

// Fetch Total Bookings
$bookings_query = "SELECT COUNT(*) AS total_bookings FROM bookings";
$bookings_result = mysqli_query($conn, $bookings_query);
$bookings_data = mysqli_fetch_assoc($bookings_result);
$total_bookings = $bookings_data['total_bookings'];

// Fetch Bookings Per Event
$bookings_per_event_query = "
    SELECT events.title, COUNT(bookings.id) AS total_bookings 
    FROM bookings 
    JOIN events ON bookings.event_id = events.id 
    GROUP BY events.id";
$bookings_per_event_result = mysqli_query($conn, $bookings_per_event_query);

// Fetch Bookings by User
$bookings_by_user_query = "
    SELECT users.username, COUNT(bookings.id) AS total_bookings 
    FROM bookings 
    JOIN users ON bookings.user_id = users.id 
    GROUP BY users.id";
$bookings_by_user_result = mysqli_query($conn, $bookings_by_user_query);

// Fetch Booking Status Breakdown
$status_query = "
    SELECT status, COUNT(id) AS count 
    FROM bookings 
    GROUP BY status";
$status_result = mysqli_query($conn, $status_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
        }
        h1, h2 {
            color: #a60fa3cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #a60fa3cb;
            color: white;
        }
    </style>
</head>
<body>

<h1>Admin Reports</h1>

<h2>Total Events: <?php echo $total_events; ?></h2>
<h2>Total Bookings: <?php echo $total_bookings; ?></h2>

<h2>Bookings Per Event</h2>
<table>
    <tr>
        <th>Event Title</th>
        <th>Total Bookings</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($bookings_per_event_result)) {
        echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['total_bookings']}</td>
              </tr>";
    }
    ?>
</table>

<h2>Bookings by User</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Total Bookings</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($bookings_by_user_result)) {
        echo "<tr>
                <td>{$row['username']}</td>
                <td>{$row['total_bookings']}</td>
              </tr>";
    }
    ?>
</table>

<h2>Booking Status Breakdown</h2>
<table>
    <tr>
        <th>Status</th>
        <th>Count</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($status_result)) {
        echo "<tr>
                <td>{$row['status']}</td>
                <td>{$row['count']}</td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
