<?php
session_start();
require_once("config.php");
require_once("./component.php");

if (isset($_POST['add'])) {

  if (isset($_SESSION['uid'])) {

    $product =$_POST['product_id'];
    $tableN = $_POST['product_table'];
        if (getProduct($product)) {
          echo "<script>alert('Product is already added in the cart..!')</script>";
          echo "<script>window.location = 'product.php?tableName=$tableN'</script>";
        } else {

        addCart($_SESSION['uid'], $product, $tableN);
        }
  }else{
    echo "<script>alert('Login First to add products to the cart')</script>";
    echo "<script>window.location = 'product.php'</script>";
  }
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
  <style>
    img {
      max-width: 100%;
      height: auto;
    }

    .cat_container {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-gap: .5rem;
    }

    .galcontainer {
      width: 100%;
      height: 100%;
      position: relative;
    }
    
    .cards {
      width: 100%;
      height: 100%;
    }

    @media only screen and (max-width: 900px) {
      .cat_container {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    @media only screen and (max-width: 644px) {
      .cat_container {
        grid-template-columns: repeat(2, 1fr)
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

  <section style="  height: 50px; display: flex;">
  </section>

  <!-- View Cart Box Start -->

  <div class="cat_container">
    <?php
    if (isset($_GET['tableName'])) {
      $_SESSION['tabName'] = $_GET['tableName'];
    }
    $tableN = $_SESSION['tabName'];
    $results = $mysqli->query("SELECT * FROM $tableN ORDER BY id ASC");
    if ($results) {
      while ($obj = $results->fetch_object()) {
        component($obj->name, $obj->price, $obj->image, $obj->product_id, $tableN);
        $prod_img = $obj->image;
        $prod_name = $obj->name;
        $prod_price = $obj->price;
        $prod_quan = $obj->quant_avai;
        $prod_id = $obj->product_id;
      }
    }
    ?>
  </div>

  <?php
  include "footer.php";
  ?>



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