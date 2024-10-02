<?php 
session_start();
@include 'config.php';

if(isset($_POST['submit'])){
    $name= mysqli_real_escape_string($conn, $_POST['name']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);

    $select= "Select * from users WHERE username='$name' && password = '$password' ";
    $result= mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $row= mysqli_fetch_array($result);
        $_SESSION['username'] = $row['username'];

        header('location:userpage.php');
   }

else{
    $error='Incorrect password or username';
}
};
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Management</title>
    </head>
    <body>
        <div id ="form">
            <h1> Login form </h1><!-- comment -->
            <form name="form" method="POST">
                 <?php
                if(isset($error)){
                    foreach($error as $error){
                       echo '<span class="error-msg">'.$error.'</span>';
                    }
                };
                ?>
                <label>UserName: </label>
                <input type="text" id="user" name="name"><!-- comment --><br><br>
                <label> Password: </label>
                <input type="password" id="password" name="password"><br><br>
                <button name="submit" type="submit" value="submit" id="sub-btn"> Login</button>
                    <a id="reg" href="Register.php" >New user </a>
            </form>
    </body>
    <style>
        body{
            background-color: #a60fa3cb; 
        }
        #form{
            background-color: beige;
            width: 25%;
            margin:  120px auto;
            padding: 50px;
            font-family: "cursive","Arial","Courier";
            box-shadow: 10px 10px 5px rgb(82,11,54);
            border-radius: 8px;
        }
        #reg{
            align-content: space-between;
            padding-left: 40px;
            
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
         form .error-msg{
            margin: 10px 0;
            display: block;
            color: white;
            background-color: #a60fa3cb;
            border-radius: 10px;
            padding: 5px;
        }
    </style>
