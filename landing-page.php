<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: Login_admin.php");
  exit;
}else{
    $user = $_SESSION['username'];
}

?>

<?php

require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $author = $_POST['username'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $u_name = $_POST['u_name'];
    $Get_image_name = $_FILES['cover']['name'];
  	$image_Path = "images/".basename($Get_image_name);
    $imageFileType=strtolower(pathinfo($image_Path,PATHINFO_EXTENSION));
    if($_FILES['cover']['size']>5000000 || !getimagesize($_FILES['cover']['tmp_name'])){
        echo "<script>File may not be an image or the size of the image is greater than 5MB. Please Check!</script>";
    }
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $image_Path)) {
    }else{
        echo  "Not Insert Image";
    }
    $ins = "INSERT INTO `posts` (`author`, `title`, `desc`, `cover`, `u_name`) VALUES ('$author', '$title', '$desc', '$Get_image_name','$u_name')";
    $res = mysqli_query($conn, $ins);
    if(!$res){
        print_r("<h4>Something Went Wrong </h4>".mysqli_error($conn));
    } else{
        echo "
        <script>alert('Post submitted');</script>
        ";
        header('location: community.php');
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="landing-page.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('li#a03').removeAttr('id');
        $('.navbar-links ul#main-comps li:nth-child(3) a').attr('id','a03');
     </script>
</head>
<body>
    <?php require("partials/_nav.php"); ?>
    <div class="add-charity">
        <form action="/iCare/landing-page.php" autocomplete="off"  id="animalPost" method="post" enctype="multipart/form-data">
            <input type="hidden" name="u_name" value="Sahil">
            <table style="border-spacing: 0 15px;">
                <tr>
                    <td><label for="username"><strong>Author Name</strong></label></td>
                    <td><input type="text" placeholder="Enter username" name="username" maxlength="40" required readonly value='<?php echo $user ?>'>
                    
                    </td>    
                </tr>
                <tr>
                    <td><label for="Title"><strong>Title</strong></label></td>
                    <td><input type="text" placeholder="Enter post title" name="title" maxlength="40" required></td>
                </tr>
                <tr>
                    <td><label for="desc"><strong>Description</strong></label></td>
                    <td><textarea name="desc" id="desc" cols="67" rows="10" placeholder="Description for the post..." required maxlength="150"></textarea></td>
                </tr>
                <tr>
                    <td><label for="photo"><strong>Display Picture</strong></label></td>
                    <td><input type="file" name="cover" accept="image/*" id="scream" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="POST" onclick="readImage()" id="submitBtn"></td>
                </tr>
            </table>
        </form>
        <div id="img-prev" style="border:1px solid #000000; height: 350px; width: 350px;"></div>
    </div>
    <script>
        const choosFile = document.getElementById("scream");
        const imagePrev = document.getElementById("img-prev");
        choosFile.addEventListener("change",()=>{
            getImageData();
        });
        function getImageData(){
            const files = choosFile.files[0];
            if(files){
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function () {
                    imagePrev.style.display = "block";
                    imagePrev.innerHTML = '<img id="erruptImage" src="' + this.result + '" style="height: 300px; width: 300px;" />';
                });  
            }
        }

        // function checkCred(){  
        //     const fm = document.getElementById("animalPost");
        //     let username = fm.username;
        //     let charity = fm.charity;
        //     let purpose = fm.purpose;
        //     let cover = fm.cover;
        //     if(username.value && charity.value && purpose.value && cover.value){
        //         let x = confirm("Please confirm the username is "+username.value);
        //         let y = confirm("Please confirm the charity name is "+charity.value);
        //         let z = confirm("Please confirm the purpose of charity is "+purpose.value);
        //         if(x && y && z){
        //             alert("Thank you. You application for new charity has been successfully submitted. :)");
        //             return true;
        //         }
        //         return false;
        //     } else{
        //         alert("Please fill all the entries");
        //         return false;
        //     }
            
        // }
    </script>
</body>
</html>