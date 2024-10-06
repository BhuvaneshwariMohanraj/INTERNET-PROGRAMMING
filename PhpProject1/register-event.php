<?php
session_start();
@include 'config.php';

// Ensure the user is logged in or provide user_id input
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to register for events.";
    exit();
}

// Handle form submission
if (isset($_POST['submit'])) {
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']); // Assuming user is logged in
    $event_id = mysqli_real_escape_string($conn, $_POST['event_id']);

    // Check if the event exists
    $event_check_query = "SELECT * FROM events WHERE id = '$event_id'";
    $event_check_result = mysqli_query($conn, $event_check_query);

    if (mysqli_num_rows($event_check_result) == 0) {
        echo "Invalid Event ID.";
        exit();
    }

    // Check if the user has already booked the event
    $booking_check_query = "SELECT * FROM bookings WHERE user_id = '$user_id' AND event_id = '$event_id'";
    $booking_check_result = mysqli_query($conn, $booking_check_query);

    if (mysqli_num_rows($booking_check_result) > 0) {
        echo "You have already booked this event.";
        exit();
    }

    // Insert new booking into the bookings table
    $insert_booking_query = "INSERT INTO bookings (user_id, event_id) VALUES ('$user_id', '$event_id')";
    if (mysqli_query($conn, $insert_booking_query)) {
        echo "Successfully registered for the event!";
        header('Location: userpage.php'); // Redirect to a user page after booking
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
    <title>Register Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #a60fa3cb;
            text-align: center;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #a60fa3cb;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #8e0079;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register for Event</h2>
    <form action="register-event.php" method="POST">
        <label for="event_id">Event ID:</label>
        <input type="text" id="event_id" name="event_id" required>

        <button type="submit" name="submit">Register</button>
    </form>
</div>

</body>
</html>
