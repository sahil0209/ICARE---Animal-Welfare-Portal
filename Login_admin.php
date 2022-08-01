<?php
require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * from users WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    if($num==1 && $password==$row['password']){
        $login = true;
        session_start();
        $_SESSION['loggedIn']=true;
        $_SESSION['username']=$username;
        header("location: landing-page.php");
    } else{
        echo "
        <script>alert('Invalid Credentials');</script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Login_admin.css">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="hight=device-hight">
</head>
<body>
<div id="page">
<img id="logo" src="./Assets/GreenPeace.svg" alt="logo">
<div id="container">

    <h1>Log In</h1>

    <div id="form">
        <form action="/iCare/Login_admin.php" name='createAccount' method="post">
        
        <label for="username">Username <font color='red'>*</font></label>
        <input type="text" class="text" name="username" placeholder="Username" required><br><br>
            
        <label for="password">Password <font color='red'>*</font></label>
        <input type="password" class="text" name="password" id="pass1" placeholder="Password" required><br>

        <button type="submit" id="button" value="Submit">Login</button>

        </form>
        <p>New user <a href="/iCare/signup.php">Signup</a></p>
    </div>
</div>
</div>
</body>
</html>