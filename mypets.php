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
    <h2 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 26pt;
  padding: 20px;
  background: aliceblue;
  margin: 10px;
  width: fit-content;
  border-radius: 25px;
  border: 3px solid black;
  box-shadow: 2px 2px 4px darkgrey;">MY PETS</h2>
    <div class="row">
      <?php 
        require "partials/_dbconnect.php";
        $sql = "SELECT * FROM `donors` WHERE username='$user'";
        $res = mysqli_query($conn,$sql);
        if($res){
            while($row1 = mysqli_fetch_assoc($res)){
                $id = $row1['p_id'];
                $duration = $row1['d_months'];
                $query = "SELECT * FROM `pets` WHERE id='$id'";
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
                      <br><strong>Duration - </strong>{$duration}
                      </span>
                      
                    </p>
                    
                  </div>
                </div>
                    ");
                  }
                }
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