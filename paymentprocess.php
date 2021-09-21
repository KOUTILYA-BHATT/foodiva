<?php

session_start();

include_once("config.php");

if (isset($_POST['amount']) && isset($_POST['address']) && isset($_POST['mobile'])) {
    $payment_id = $_POST['payment_id'];
    $amount = $_POST['amount'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $payment_status = "pending";
    $username = $_SESSION['uname'];
    $uid = $_SESSION['uid'];

    $mysqli->query("INSERT INTO `user_orders` (`user_id`, `username`, `user_address`, `user_mobile`, `amount`, `payment_status`, `added_on`) 
    VALUES ('$uid', '$username', '$address', '$mobile', '$amount', '$payment_status', current_timestamp());");
    $_SESSION['OID']= mysqli_insert_id($mysqli);

}

if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    $oid = $_SESSION['OID'];

    $mysqli->query("update `user_orders` set `payment_status` = 'complete', payment_id = '$payment_id' where orderid=$oid;");
}
?>