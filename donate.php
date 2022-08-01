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
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM pets WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res){
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
    }
} else{
    header("location: community.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="donate.css">
    
    <title>Donate</title>
</head>
<body>
    <?php require "partials/_nav.php"; ?>
    <div class="add-charity">
        <h1 style="margin-left: 37%; margin-bottom: 10px; padding: 10px;box-shadow: 2px 2px 4px black ;background-color: aqua; border: 1px solid black; width: fit-content; border-radius: 20px;">PETIFY</h1>
        <form action="donateCheck.php" autocomplete="off" onsubmit="return checkCred();" id="charityFrm" method="POST">
            <input type="hidden" name="username" value='<?php echo $user; ?>'>
            <input type="hidden" name="id" value='<?php echo $id ?>'>
            <table style="border-spacing: 0 15px;">
                <tr>
                    <td><label for="name"><strong>Donor Name</strong></label></td>
                    <td><input type="text" placeholder="Enter name" name="d_name" maxlength="40" required></td>    
                </tr>
                <tr>
                    <td><label for="p_name"><strong>Name of the pet</strong></label></td>
                    <td><input type="text" name="p_name" maxlength="50" value='<?php echo $name ?>' disabled></td>
                </tr>
                <tr>
                    <td><label for="d_months"><strong>Payment Duration</strong></label></td>
                    <td><select name="d_months" id="d_months" required style="width: 60%;">
                        <option value="">Select Duration</option>
                        <option>6 Month</option>
                        <option>12 Month</option>
                        <option>24 Month</option>
                        <option>Lifetime</option>
                    </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Start Petting" id="submitBtn"></td>
                </tr>
            </table>
        </form>
        
    </div>
    <script>
        function checkCred(){
            const payment = document.getElementById("d_months");
            let paymentIndex = payment.selectedIndex;
            if(paymentIndex==0){
                console.log(uindex)
                alert("Please select a value");
                return false;
            }
            alert("Thank you for your Donation! :)");
            return true;
        }
    </script>
    <script>
        $("#a03").removeAttr('id');
    </script>
</body>
</html>