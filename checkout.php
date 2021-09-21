<?php
session_start();
include_once("config.php");
if (isset($_POST['Confirm'])) {
	$total = $_POST['total'];
} else {
	$total = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Foodiva - One place for all your Groceries</title>
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

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
					<h1 class="mb-0 bread">Checkout</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-7 ftco-animate">
					<form class="billing-form">
						<h3 class="mb-4 billing-heading">Billing Details</h3>
						<div class="row align-items-end">
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="streetaddress">Street Address</label>
									<input type="text" class="form-control" id="street_Address" name="street_Address" placeholder="House number and street name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="appartment" name="appartment" placeholder="Appartment, suite, unit etc">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="towncity">Town / City</label>
									<input type="text" class="form-control" id="city" name=" city" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="postcodezip">Postcode / ZIP *</label>
									<input type="text" class="form-control" id="postcode" name="postcode" placeholder="">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="">
								</div>
							</div>

						</div>

						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>

							<p class="d-flex total-price">
								<span>Total</span>
								<span>₹ <?php echo $total; ?></span>
							</p>
							<input type="button" id="rzp-button1" class="btn btn-primary py-3 px-4" name="Confirm" value="Place order" onclick="paynow()">
						</div>
					</form>
					<!-- END -->
				</div>

			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
					<span>Get e-mail updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<input type="text" class="form-control" placeholder="Enter email address">
							<input type="submit" value="Subscribe" class="submit px-3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
	include "footer.php";
	?>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>

	<script>
		function paynow() {
			var address = jQuery('#street_Address').val() + " " + jQuery('#appartment').val() + " " + jQuery('#city').val() + " " + jQuery('#postcode').val();
			var mobile = jQuery('#phone').val();
			var amount = <?php echo $total; ?>;


			jQuery.ajax({
				type: 'post',
				url: 'paymentprocess.php',
				data: "amount=" + amount + "&address=" + address + "&mobile=" + mobile,
				success: function(result) {
					var options = {
						"key": "rzp_test_zdVzjulb51jvYv",
						"amount": amount * 100,
						"currency": "INR",
						"name": "FOODIVA",
						"description": "Complete Your Transaction",
						"image": "https://github.com/KOUTILYA-BHATT/WebDevelopment-Project/blob/master/foodivalogo.jpg",
						"handler": function(response) {

							jQuery.ajax({
								type: 'post',
								url: 'paymentprocess.php',
								data: "payment_id=" + response.razorpay_payment_id,
								success: function(result) {
									window.location.href = "ordersuccess.php";
								}
							})
						},
						"theme": {
							"color": "#82ae46"
						}
					};
					var rzp1 = new Razorpay(options);
					document.getElementById('rzp-button1').onclick = function(e) {
						rzp1.open();
					};
				}
			})
		}
	</script>



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
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</body>

</html>