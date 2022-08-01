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
    <link rel="stylesheet" href="dogs.css">
    <title>DOGS</title>
</head>
<body>
<?php require "partials/_nav.php"; ?>
    <div class="row">
      <?php 
        require "partials/_dbconnect.php";
        $query = "SELECT * FROM `pets` WHERE type='dog'";
        $out = mysqli_query($conn, $query);
        $num = mysqli_num_rows($out);
        if($num>0){
          while($row = mysqli_fetch_assoc($out)){
            print_r("
            <div class='column'>
          <div class='card'>
            <p class='container'>
              <img src='./Assets/{$row['image']}' alt='dog' style='width:100%; height: 200px;'>
              <strong class='mainEd'>{$row['name']}</strong><br><br>
              <span>
              <strong>Age - </strong>{$row['age']}<br><strong>Species - </strong>{$row['species']}<br><strong>Location - </strong>{$row['place']}
              <form action='donate.php?id={$row['id']}' method='get' class='container' style='padding: 5px 0px; background-color: #b2c0c0'>
                <input type='text' name='id' value='{$row['id']}' hidden>
                <button class='cta'>PET</button>
              </form>
              </span>
              
            </p>
            
          </div>
        </div>
            ");
          }
        }
      ?>
        
      </div> 
<script>
  $('select[name^="pets"] option[value="dogs.php"]').attr("selected","selected");
  $('#a03').removeAttr('id');
</script>
</body>
</html>