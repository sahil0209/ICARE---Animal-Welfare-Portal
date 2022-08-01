<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: Login_admin.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="media.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('li#a03').removeAttr('id');
        // $('.navbar-links ul#main-comps li:nth-child(3) a').attr('id','a03');
     </script>
    <title>Photos and Videos</title>
</head>
<body>
    <?php require("partials/_nav.php"); ?>
    <div class="sec_1">
        <h2>PHOTOS</h2>
            <div class="row">
                <div class="column">
                <img src="Assets/cat1.jpg" alt="Snow" style="width:100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                </div>
                <div class="column">
                <img src="Assets/cat2.jpg" alt="Forest" style="width:100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                </div>
                <div class="column">
                <img src="Assets/cat4.jpg" alt="Mountains" style="width:100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                </div>
            </div> 
            <div class="row">
                <div class="column">
                <img src="Assets/dog1.jpg" alt="Snow" style="width:100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                </div>
                <div class="column">
                <img src="Assets/cat3.jpg" alt="Forest" style="width:100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                </div>
                <div class="column">
                <img src="Assets/cat2.jpg" alt="Mountains" style="width:100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                </div>
            </div> 
            <hr>
            <h2>VIDEOS</h2>
            <div class="row">
                <div class="column">
                    <video controls class="physics" style="width: 100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                        <source src="Assets/catVideo1.mp4" type="video/mp4" s> Your browser does not support the video tag.
                    </video>
                </div>
                <div class="column">
                    <video controls class="physics" style="width: 100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                        <source src="Assets/catVideo2.mp4" type="video/mp4" s> Your browser does not support the video tag.
                    </video>
                </div>
                <div class="column">
                    <video controls class="physics" style="width: 100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                        <source src="Assets/dogVideo1.mp4" type="video/mp4" s> Your browser does not support the video tag.
                    </video>
                </div>
            </div> 
            <div class="row">
                <div class="column">
                    <video controls class="physics" style="width: 100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                        <source src="Assets/catVideo3.mp4" type="video/mp4" s> Your browser does not support the video tag.
                    </video>
                </div>
                <div class="column">
                    <video controls class="physics" style="width: 100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                        <source src="Assets/dogVideo2.mp4" type="video/mp4" s> Your browser does not support the video tag.
                    </video>
                </div>
                <div class="column">
                    <video controls class="physics" style="width: 100%; border: 2px black solid; border-radius: 15px; height: 300px;">
                        <source src="Assets/dogVideo3.mp4" type="video/mp4" s> Your browser does not support the video tag.
                    </video>
                </div>
            </div> 
    </div>
</body>
</html>