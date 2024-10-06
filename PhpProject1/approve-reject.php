<?php
session_start();
@include 'config.php';

// Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('location:Login.php');
    exit();
}

// Fetch all bookings with user and event details
$bookings_query = "
    SELECT bookings.id AS booking_id, bookings.status, users.id AS user_id, users.username AS username, 
           events.id AS event_id, events.title AS event_title 
    FROM bookings 
    JOIN users ON bookings.user_id = users.id 
    JOIN events ON bookings.event_id = events.id";
$bookings_result = mysqli_query($conn, $bookings_query);

// Handle booking approval/rejection
if (isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['status'];
    
    $update_query = "UPDATE bookings SET status='$new_status' WHERE id='$booking_id'";
    
    if (mysqli_query($conn, $update_query)) {
        echo "<p>Booking status updated successfully.</p>";
        header('Refresh: 1');  // Refresh the page after 1 second
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Bookings</title>
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
            margin-top: 20px;
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
        .status-btn {
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        .status-select {
            padding: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Manage User Bookings</h1>

    <table>
        <tr>
            <th>Booking ID</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Event ID</th>
            <th>Event Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($bookings_result)) {
            echo "<tr>
                    <td>{$row['booking_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['event_id']}</td>
                    <td>{$row['event_title']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
                            <select name='status' class='status-select'>
                                <option value='pending' " . ($row['status'] == 'pending' ? 'selected' : '') . ">Pending</option>
                                <option value='approved' " . ($row['status'] == 'approved' ? 'selected' : '') . ">Approve</option>
                                <option value='rejected' " . ($row['status'] == 'rejected' ? 'selected' : '') . ">Reject</option>
                            </select>
                            <button type='submit' name='update_status' class='status-btn'>Update</button>
                        </form>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
