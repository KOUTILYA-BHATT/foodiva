<?php

session_start();

include_once("config.php");
require_once("./component.php");

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        deleteCart($_SESSION['uid'], $_GET['id'],);
        echo "<script>alert('Product has been Removed...!')</script>";
        echo "<script>window.location = 'cart.php'</script>";
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
                    <h6>My Cart</h6>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['uid'])) {
                        $result = getData();
                        if ($result) {
                            while ($obj = $result->fetch_object()) {
                                cartElement($obj->image, $obj->Name, $obj->Price, $obj->productid);
                                $total = $total + (int)$obj->Price;
                            }
                        } else {
                            echo "<h5>Cart is Empty</h5>";
                        }
                    } else {
                        echo "<h5>Cart is Empty</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['uid'])) {
                                $count  = getcount();
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>₹<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>₹<?php
                                    echo $total;
                                    ?></h6>
                        </div>
                    </div>
                    <form action="checkout.php" method="post">
                        <button type="submit" class="btn btn-primary mx-2 btnpad" name="Confirm">Confirm Order</button>
                        <input type='hidden' name='total' value='<?php echo $total; ?>'>
                    </form>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    
</body>

</html>