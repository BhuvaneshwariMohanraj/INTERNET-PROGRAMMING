<?php 
@include 'config.php';

if(isset($_POST['submit'])){
    
    $name= mysqli_real_escape_string($conn, $_POST['name']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $select= "Select * from users WHERE id='$id' && password = '$password' ";
    $result= mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $error[]= 'user already exist';
    }else{
        $insert ="Insert into users(username,password,email) VALUES ('$name','$password','$email'  )";
        mysqli_query($conn, $insert);
           header('location:Login.php');
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
        <div id ="form2">
            <h1> Welcome </h1><!-- comment -->
            <form name="form" method="POST">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                       echo '<span class="error-msg">'.$error.'</span>';
                    }
                };
                ?>
                <!--<label>User ID: </label>
                <input type="int" id="id" name="id"><br><br>-->
                <label>UserName: </label>
                <input type="text" id="user" name="name"><br><br>
                <label> Password: </label>
                <input type="password" id="password" name="password"><br><br>
                <label> Email: </label>
                <input type="email" id="mail-id" name="email"><br><br>
                
                <button name="submit"  type="submit" value="submit" id="sub-btn"> Register Now</button>
                <p>Already have an account  <a href="Login.php">Login</p>
        </div>
            </form>
    </body>
    <style>
        body{
            background-color: #a60fa3cb; 
        }
        #form2{
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
        #sub-btn:hover{
            background-color: #c00bf3;
            color: white;
            
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
    </html>