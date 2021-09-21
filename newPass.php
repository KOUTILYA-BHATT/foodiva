<?php
session_start();
include("config.php");
if(isset($_SESSION['loginUser']))
{
$uemail=$_SESSION['loginUser'];
}
if(isset($_GET['reus']))
{
	$uemail=$_GET['reus'];
	$_SESSION['forgotUser']=$uemail;
	//$_SESSION['loginUser']=$user;
}
if(isset($_POST['passold']))
{
	$oldPassword=$_POST['passold'];
//	$oldPassword=md5($oldPassword);
	$query="select * from users where Email='$uemail'";
	$result=mysqli_query($dbc,$query);
	$no_rows=mysqli_num_rows($result);
	if($no_rows==1)
	{
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			//printf ("%s (%s)\n",$row["Firstname"],$row["DOB"]);
			$opassd=$row["Password"];
			//$verify=$row["Verified"];
			//echo "Your password:$passd";
			if($opassd!=$oldPassword)
			{
				header("location:changePass.php?wrongPass=1");
			}
	}
}
if(isset($_POST['passnew']))
{
	$newPassword=$_POST['passnew'];
	//$newPassword=md5($newPassword);
	if(isset($_SESSION['forgotUser']))
		$uemail=$_SESSION['forgotUser'];
	$query="UPDATE users set Password='$newPassword' where Email='$uemail'";
	$result=mysqli_query($dbc,$query);
	header("location:index.php?passChange=1");

}
?>
<!DOCTYPE html>
<html>
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
<body>
<?php require_once("./navbar.php"); ?>



	<div class="col-md-4 text-center col-sm-6 col-xs-6">

	</div>
	<div class="col-md-4 text-center col-sm-6 col-xs-6">
        <div class="thumbnail product-box">
			<strong>Change Password</strong>
			 <form method="POST" action="newPass.php">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="Password" class="form-control" required="required" placeholder="New Password" id="passnew" name="passnew">
                            </div>
                        </div>

                    </div>
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
							<div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
							</div>
						</div>
					</div>

                </form>

		</div>
	</div>


</body>
</html>
