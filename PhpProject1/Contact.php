<?php
session_start();
@include 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location:Login.php');
    exit();
}

// Handle form submission
if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact (user_id, name, email, subject, message) VALUES ('$user_id', '$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $query)) {
        $success = "Your message has been sent successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 100px;
        }
        h1 {
            text-align: center;
            color: #a60fa3cb;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        input, textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }
        button {
            padding: 10px;
            background-color: #a60fa3cb;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        .message {
            text-align: center;
            color: green;
        }
        .error {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Contact Us</h1>

    <?php if (isset($success)) { echo "<p class='message'>$success</p>"; } ?>
    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit" name="submit">Send Message</button>
    </form>
</div>

</body>
</html>
