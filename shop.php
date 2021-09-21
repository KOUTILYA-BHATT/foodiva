<?php
session_start();
include_once("config.php");
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

  <style>
    .cat_container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: .5rem;
    }

    .galcontainer {
      width: 100%;
      height: 100%;
      position: relative;
    }

    .ingcontainer {
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .ingcontainer img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: 50% 50%;
      transition: .4s linear;
    }

    .ingcontainer img:hover {
      transform: scale(1.4);
      opacity: 0.2;

    }

    .deccontainer {
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 24px;
      color: #ffffff;
      transform: translate(-50%, -50%);
    }

    .galcontainer:hover .deccontainer {
      opacity: 1;
    }

    
     @media only screen and (max-width: 764px) {
      .cat_container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media only screen and (max-width: 500px) {
      .cat_container {
        grid-template-columns: repeat(1, 1fr)
      }
    }
  </style>

</head>

<body class="goto-here">

  <?php require_once("./navbar.php"); ?>

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
          <h1 class="mb-0 bread">Browse Categories</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="bg-light" style="  height: 50px; display: flex;">
  </section>

  <section class="bg-light">
    <div class="cat_container">
      <?php
      $results = $mysqli->query("SELECT * FROM product_categories ORDER BY id ASC");
      if ($results) {
        while ($obj = $results->fetch_object()) {
          $product_cat = $obj->cat_name;
          $product_img = $obj->image;
          $product_dec = $obj->description;
      ?>

          <div class="galcontainer">
            <div class="ingcontainer">
              <a href="product.php?tableName=<?php echo $obj->cat_select; ?>">
                <img src="images/<?php echo $product_img; ?>">
              </a>
            </div>
            <div class="deccontainer">
              <h4 style="color: #000000;"><?php echo $product_cat; ?></h4>
            </div>
          </div>
      <?php
        }
      }
      ?>
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