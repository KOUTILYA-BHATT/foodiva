<?php


function component($productname, $productprice, $productimg, $productid, $tableN){
    $element = "

    <div class=\"cards\">
                <form action=product.php?tableName=$tableN method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" onerror=this.src=\"images/Fruits&Vegetables.jpg\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\" style=\"text-transform: capitalize;\" >$productname</h5>
                            <h5>
                                <span class=\"price\">₹ $productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                             <input type='hidden' name='product_table' value='$tableN'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid,){
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" onerror=this.src=\"images/Fruits&Vegetables.jpg\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: foodiva</small>
                                <h5 class=\"pt-2\"> ₹$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2 btnpad\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

    ";
    echo  $element;
}

function successElement($productimg, $productname, $productprice, $productid,)
{
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" onerror=this.src=\"images/Fruits&Vegetables.jpg\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: foodiva</small>
                                <h5 class=\"pt-2\"> ₹$productprice</h5>
                            </div>
                        </div>
                    </div>
                </form>

    ";
    echo  $element;
}

function addCart($userId,$productid, $tableN){
    $mysqli = new mysqli("localhost", "root", "", "project");

    $results = $mysqli->query("SELECT * FROM $tableN WHERE `product_id` = '$productid'");
    if ($results->num_rows > 0) {
        while ($obj = $results->fetch_object()) {
            $prod_name = $obj->name;
            $prod_price = $obj->price;
            $prod_image = $obj->image;
            $mysqli->query("INSERT INTO `cart` (`Userid`, `id`, `Name`, `Price`, `tabName`, `productid`, `image`) 
            VALUES ('$userId', NULL, '$prod_name', '$prod_price', '$tableN', '$productid', '$prod_image');");
            
        }
    }
}

function deleteCart($userId, $productid)
{
    $mysqli = new mysqli("localhost", "root", "", "project");

    $mysqli->query("DELETE FROM `cart` WHERE `cart`.`Userid` = '$userId' AND `cart`.`productid` = '$productid'");
}

function getData()
{
    $userId = $_SESSION['uid'];

    $mysqli = new mysqli("localhost", "root", "", "project");

    $result = $mysqli->query("SELECT * FROM cart WHERE `cart`.`Userid` = '$userId'");
    return $result;
}

function getProduct($productid)
{
    $userId = $_SESSION['uid'];

    $mysqli = new mysqli("localhost", "root", "", "project");

    $result2 = $mysqli->query("SELECT * FROM cart WHERE `cart`.`Userid` = '$userId' AND `cart`.`productid` = '$productid'");
     if ($result2->num_rows > 0){
        return true;
     }
     else return false;
}

function shiftProduct($productid)
{
    $mysqli = new mysqli("localhost", "root", "", "project");

    $userId = $_SESSION['uid'];
    $orderid = $_SESSION['OID'];
    $username = $_SESSION['uname'];

    $results = $mysqli->query("SELECT * FROM `cart` WHERE `cart`.`Userid` = '$userId' AND `cart`.`productid` = '$productid';");
    if ($results->num_rows > 0) {
        while ($obj = $results->fetch_object()) {
            $prod_name = $obj->Name;
            $prod_price = $obj->Price;
            $mysqli->query("INSERT INTO `orderdetails` (`orderNo`, `username`, `user_id`, `product_id`, `product_name`, `price`) 
            VALUES ('$orderid', '$username', '$userId', '$productid','$prod_name', '$prod_price');");
        }
    }
}
?>