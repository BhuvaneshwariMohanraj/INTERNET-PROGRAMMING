<?php 
session_start();

// Ensure the user is logged in before displaying the page
if(!isset($_SESSION['username'])){
    header('location:Login.php');
    exit();
}

// Get the user's name
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
             background-color: beige;
            width: 75%;
            margin:  120px auto;
            padding: 50px;
            font-family: "cursive","Arial","Courier";
            box-shadow: 10px 10px 5px rgb(82,11,54);
            border-radius: 8px;
        }
        h1 {
            color: #a60fa3cb;
        }
        .navigation {
            margin-top: 20px;
        }
        .navigation a {
            color: #a60fa3cb;
            text-decoration: none;
            margin: 0 20px;
            padding: 10px;
            font-size: 18px;
            font-weight: 500;
            transition: color 0.3s;
        }
        .navigation a:hover {
            color: #c00bf3;
        }
        .navigation form.example {
            margin-top: 20px;
        }
        .navigation form.example input[type="text"] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            width: 80%;
            background: #f1f1f1;
        }
        .navigation form.example button {
            padding: 10px;
            background-color: #a60fa3cb;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            cursor: pointer;
        }
        .navigation form.example button:hover {
            background-color: #c00bf3;
        }
    </style>
</head>
<body>
    <div class="container">
        <center><h1>Hello,'<?php echo $username; ?>'</h1> <!-- Displays the username -->
        <div class="navigation">
            <a href="Home.php">Home</a>
            <a href="Events.php">Events</a>
            <a href="Contact.php">Contact</a>
            <a href="Logout.php">Logout</a>
        </center>
        </div>

        <!-- Search bar -->
        <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</body>
</html>
