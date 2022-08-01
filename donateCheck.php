<?php
require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $d_name = $_POST['d_name'];
    $username = $_POST['username'];
    $d_months = $_POST['d_months'];
    $p_id = $_POST['id'];
    $p_name = $_POST['p_name'];
    $sql = "INSERT INTO `donors` (`d_name`, `d_months`,`p_id`,`p_name`, `username`) VALUES ('$d_name', '$d_months', '$p_id', '$p_name', '$username')";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        print_r("<h4>Something Went Wrong </h4>".mysqli_error($conn));
    } else{
        echo("<script>Thank you. You adoption is successful. Please see the important posts by community and have a nice day :-)</script>");
        header("location: mypets.php");
    }

}


?>