<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Management</title>
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <body>
        
        <header>
            <nav class="navigation">
                <ul>
                    <a href="Home.php"> ABOUT</a>
                    <a href="Events.php"> EVENTS</a>
                    <a href="Login.php">LOGIN/REGISTER</a>
                    <a href="Admin.php"> ADMIN </a>
                    
                   
                </ul>
                <form class="example" action="/action_page.php" style="margin:auto;max-width:300px ;padding-right:60px">
                 <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </nav>
        </header>
        <?php
                
        ?>
    </body>
</html>
<style>
     body {
            background-image: url('');
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent repeating the image */
            height: 100vh; /* Full viewport height */
            margin: 0;
            font-family: Arial, sans-serif;
        }
    * {
  box-sizing: border-box;
}
.img{
    justify-content: center;
    background-repeat: no-repeat;
    
    
}
    .navigation a{
        justify-content: space-between; /* Space between items (alternatives: space-around, space-evenly, or flex-start, center) */
        align-items: center; 
       margin: 2%;
       color: #a60fa3cb;
       text-decoration: none;
       margin-right: 40px;
       transition: .3s;
       font-weight: 500;
    
}
.navigation a:hover{
    color:#c00bf3 ;
}
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background:#a60fa3cb ;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #c00bf3;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>