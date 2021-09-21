<?php

$db_username = 'root';
$db_password = '';
$db_name = 'project';
$db_host = 'localhost';

//connect to MySql
$dbc = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die("Error connecting sql server");
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


function getcount()
{
    $userId = $_SESSION['uid'];
    $count = 0;
    $mysqli = new mysqli("localhost", "root", "", "project");

    $result = $mysqli->query("SELECT * FROM cart WHERE `cart`.`Userid` = '$userId'");
    if ($result) {
        while ($obj = $result->fetch_object()) {
            $count = $count + 1;
        }
    }
    return $count;
}
?>