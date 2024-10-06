<?php
session_start();
@include 'config.php';

//
// Add Event to the Database
if (isset($_POST['add_event'])) {
     $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    
    $sql = "INSERT INTO events (id, title, description, date, time, location, price) 
            VALUES ('$id','$title', '$description', '$date', '$time', '$location', '$price')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch Existing Events
$event_query = "SELECT * FROM events";
$events_result = mysqli_query($conn, $event_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
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
        form {
            margin-bottom: 30px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #a60fa3cb;
            color: white;
            border: none;
            cursor: pointer;
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
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #a60fa3cb;
            color: white;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
        }
        .edit-btn {
            background-color: #2980b9;
        }
        .delete-btn {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Manage Events</h1>

    <!-- Add Event Form -->
    <form action="manage-events.php" method="POST">
                <input type="int" name="id" placeholder="Event ID" required>

        <input type="text" name="title" placeholder="Event Title" required>
        <textarea name="description" placeholder="Event Description" rows="3" required></textarea>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <input type="text" name="location" placeholder="Event Location" required>
        <input type="number" name="price" placeholder="Event Price" required>
        <button type="submit" name="add_event">Add Event</button>
    </form>

    <!-- Display Events Table -->
    <h2>All Events</h2>
    <table>
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($events_result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['price']}</td>
                        <td>
                            <a href='edit-event.php?id={$row['id']}' class='edit-btn'>Edit</a>
                            <a href='delete-event.php?id={$row['id']}' class='delete-btn'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
