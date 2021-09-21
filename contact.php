<?php
session_start();
include_once("config.php");
$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact us</span></p>
          <h1 class="mb-0 bread">Contact us</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col d-flex">
          <div class="info bg-white p-4">
            <p><span>Address : </span>GF-28, The Capital, infront of Top 3 Circle, B.A.D.A. Vikash Path, Bhavnagar, Gujarat 364002</p>
          </div>
        </div>
        <div class="col d-flex">
          <div class="info bg-white p-4">
            <p><span>Phone : </span> <a href="tel://1234567920">+91 1234567823</a></p>
          </div>
        </div>
        <div class="col d-flex">
          <div class="info bg-white p-4">
            <p><span>Email : </span> <a href="mailto:info@yoursite.com">koutilyabhatt@gmail.com</a></p>
          </div>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="#" class="bg-white p-5 contact-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>

        <div class="col-md-6 d-flex">
          <div id="map" class="bg-white">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926.5630110871352!2d72.15475054236516!3d21.73175231612084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f5a1ca3f865cf%3A0x902d52fb23c428f5!2sThe%20Capital!5e0!3m2!1sen!2sin!4v1623901904721!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- loader -->
  <?php
  include "footer.php";
  ?>


</body>

</html>