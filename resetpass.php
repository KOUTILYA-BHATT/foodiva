<?php
session_start();
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(!isset($_SESSION['uid'])){
 header("Location: index_login.php");
 exit;
}else{
$showerror = false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
   include './config.php';
   $password = $_POST["password"];
   $cpassword = $_POST["cpassword"];

   if($password == $cpassword){

     $sql = "UPDATE userinfo SET user_password = '$password' WHERE userinfo.user_id = $_SESSION[uid]";
     $result = mysqli_query($dbc, $sql);
   	 if($result){
       echo '<script>alert("Password reset was Successfully now login")</script>';
       session_unset();
       session_destroy();
       header("Location:index.php");
     }else{$showerror = "There was a problem in updating the password please try later";}
    } else{$showerror = "passwords does not match";}
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Foodiva</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">

<?php require_once("./navbar.php"); ?>

<section style="  height: 150px; display: flex; align-items: center; justify-content: center; background-color: #82ae46;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="text-align: center;">
                    <h2 class=" text-white"><strong>Create New Password</strong> </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light" style="  height: 65px; display: flex;">
  <?php
    if($showerror){
      echo'<div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">
            <strong>Error!</strong>'.$showerror.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>';}
  ?>
</section>

<section class="login_part section_padding bg-light">
    <div class="container">
        <form class="container col-lg-6 col-lg-offset-3 text-body" action="./resetpass.php" enctype="multipart/form-data" method="post" novalidate="novalidate">

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" value="" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-outline-success btn-lg btn-block" value="submit"> Change Password </button>
        </form>
    </div>
</section>

<section class="bg-light" style="  height: 50px; display: flex;">
</section>

<?php
  include "footer.php";
 ?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>
