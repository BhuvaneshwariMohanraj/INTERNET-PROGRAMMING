<?php
session_start();
@include 'config.php'; // Include database connection

// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Sanitize user inputs
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query the database for the admin credentials
    $query = "SELECT * FROM admin WHERE id='$admin_id' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    // Check if the credentials are correct
    if (mysqli_num_rows($result) > 0) {
        // Fetch admin details
        $admin = mysqli_fetch_assoc($result);
        
        // Store admin session data
        $_SESSION['admin_id'] = $admin['id'];
        
        // Redirect to the admin dashboard
        header('location:admindashboard.php');
        exit();
    } else {
        // If credentials are incorrect
        $error = "Invalid ID or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div id="form3">
    <h2>Admin Login</h2>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    
    <form method="POST" name="form3">
        <label for="admin_id">Admin ID:</label>
        <input type="text" id="admin_id" name="admin_id" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit" id="sub-btn" name="login">Login</button>
    </form>
    </div>
</body>
</html>
<style>
    #form3{
            background-color: beige;
            width: 25%;
            margin:  120px auto;
            padding: 50px;
            font-family: "cursive","Arial","Courier";
            box-shadow: 10px 10px 5px rgb(82,11,54);
            border-radius: 8px;
        }
        #sub-btn{
            color: white;
            background-color: #a60fa3cb;
            border-radius: 8px;
            font-size: medium;
        }
        @media screen and (max-width:700px){
            #form{
                width: 65px;
                padding: 40px;
            }
        }
</style>
