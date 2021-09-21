<?php

session_start();

include_once("config.php");
require_once("./component.php");

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
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
        #cart_count {
            text-align: center;
            padding: 0 0.9rem 0.1rem 0.9rem;
            border-radius: 3rem;
        }

        .shopping-cart {
            padding: 3% 0;
        }

        .cart-items+.cart-items {
            padding: 1% 0;
        }

        .price-details h6 {
            padding: 3% 2%;
        }

        .btnpad {
            margin: 1%;
        }
    </style>
</head>

<body class="bg-light">

    <?php require_once("./navbar.php"); ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h3>ORDER PLACED SUCCESSFULLY </h3>
                    <hr>

                    <?php
                    $userId = $_SESSION['uid'];
                    $total = 0;
                    if (isset($_SESSION['uid'])) {
                        $result = getData();
                        if ($result) {
                            while ($obj = $result->fetch_object()) {
                                successElement($obj->image, $obj->Name, $obj->Price, $obj->productid);
                                $total = $total + (int)$obj->Price;
                                shiftProduct($obj->productid);
                                deleteCart($userId, $obj->productid);
                            }
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>TOTALL PRICE ₹<?php echo $total; ?></h6>
                </div>
            </div>
        </div>

    </div>


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
    <script src="js/main.js"></script>

</body>

</html>