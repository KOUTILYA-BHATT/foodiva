<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$login = false;
$showerror = false;
$result = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'config.php';

  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "Select * from userinfo where user_email = '$email' AND `user_password` = '$password'";

  $result = mysqli_query($dbc, $sql);
	$num = mysqli_num_rows($result);
	if($num == 1){

	  $login = true;
		session_start();

    $_SESSION['loginUser'] = $email;

		$row = mysqli_fetch_assoc($result);
	  $_SESSION['uid'] = $row['user_id'];
		$_SESSION['uname'] = $row['user_name'];


    $query = "update cart set Username='$user_name' where Username='anon_user'";
    $result = mysqli_query($dbc, $query);

		if ($row['user_type'] == 1){
		  header("Location:index.php");}
		else{
			header("Location:index_login.php");
		}

  } else {
    $showerror = " Invalid credentials";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="./css/style2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<?php
    if($login){
      echo'<div>
            You are <strong>Successfully</strong> logged in.
          </div>';}
    if($showerror){
      echo'<div>
            <strong>Error! </strong>'.$showerror.'
          </div>';}
  ?>

<div class="container" id="container">

<div class="form-container sign-in-container">
	<form action="./index_login.php" enctype="multipart/form-data" method="post" novalidate="novalidate">
		<h1>Log In</h1>

	<input type="email" name="email" placeholder="Email" required>
	<input type="password" name="password" placeholder="Password" required>

	<a href="forgetpass.php">Forgot Password</a>

	<button>Login</button>
	</form>

</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-right">
			<h1>Hello, Friend!</h1>
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp"><a style="color:#ffffff;" href="./index_signup.php">Sign Up</a></button>
		</div>
	</div>
</div>
</div>

</body>
</html>
