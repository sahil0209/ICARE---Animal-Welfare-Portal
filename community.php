<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedIn'])==false || $_SESSION['loggedIn']!=true){ 
  header("location: Login_admin.php");
  exit;
}

?>

<?php 

require "partials/_dbconnect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $query = "SELECT * FROM `posts` WHERE id=$id";
    $out = mysqli_query($conn, $query);
    $num = mysqli_num_rows($out);
    if($num>0){
        $row = mysqli_fetch_assoc($out);
        $likes = $row['likes']+1;
        $newq = "UPDATE `posts` SET `likes` = $likes WHERE `posts`.`id` = $id";
        $newOut = mysqli_query($conn,$newq);      
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="community.css">
    
</head>
<body>
   <?php require "partials/_nav.php"; ?>
    <div class="row-grid">
        <?php 
        require "partials/_dbconnect.php";
        $query = "SELECT * FROM `posts` ORDER BY `posts`.`likes` DESC";
        $out = mysqli_query($conn, $query);
        $num = mysqli_num_rows($out);
        if($num>0){
            while($row = mysqli_fetch_assoc($out)){
                print_r("
                <div class='cards'>
                    <div class='blog-post' style='background-color: #E6E6FA'>
                        <div class='blog-post-img'>
                            <img src='./images/{$row['cover']}'>
                        </div>
                        <div class='blog-post-info'>
                            
                            <h1 class='title'>{$row['title']}</h1>
                            <div class='blog-post-date'>
                                <span style='color: purple;'>
                                    - by {$row['author']}
                                </span>
                            </div>
                            <p class='text'>{$row['desc']}</p>
                            <form action='community.php' method='post'>
                                <input type='text' name='id' value='{$row['id']}' hidden>
                                <button class='cta' style='cursor: pointer; padding: 1rem'><i class='fa fa-thumbs-up' aria-hidden='true'></i> Like {$row['likes']}</button>
                            </form>
                        </div>
                    </div>
                </div>
                ");
            }

        }
        ?>
    </div>

    <div class="copyright">
        &iCareFoundation, 2021
     </div>
     <script>
        $('#a03').removeAttr('id');
        $('.navbar-links ul#main-comps li:nth-child(1) a').attr('id','a03');
     </script>
     
</body>
</html>