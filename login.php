<?php
include("conn.php");
session_start();
error_reporting(0);

if (isset($_GET['loginFailed'])) {
    $message = "Invalid Credentials ! Please try again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
  </head>
  <body onload="form.reset();">

<form id="form" class="box" action="checklogin.php" method="post">
<!-- <div class="message"></div> -->
  <h1>Login</h1>
  <input type="text" name="name" placeholder="Username" required>
  <input type="password" name="pass" placeholder="Password" required>
  <input type="submit" name="submit" value="Login">
  <!-- <h5 class="forgot">Don't have an account? <a href="signup.html">SignUp</a></h5> -->
  
</form>

<style>
  body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: #34495e;  
  
}
.box{
  width: 400px;
  padding: 60px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: black;

  text-align: center;
  border-radius: 40px;
  border: solid 5px gray ;

 
}
.box h1{
  color: white;
  text-transform: uppercase;
  font-weight: 500;
}
.box input[type = "text"],.box input[type = "password"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #0004ff;
  padding: 14px 10px;
  width: 250px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
}
.box input[type = "text"]:focus,.box input[type = "password"]:focus{
  width: 300px;
  border-color: #eff300;
}
.box input[type = "submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #00ff0d;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

.forgot {
  color: white;  
  margin: 5px auto;
}

.box input[type = "submit"]:hover{
  background: #2ecc71;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
body {
 background-image: url("bg.jpg");
 background-color: #cccccc;
}

</style>
  </body>
</html>