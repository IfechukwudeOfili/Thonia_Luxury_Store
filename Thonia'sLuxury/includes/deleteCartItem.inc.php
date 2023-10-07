<?php

session_start();

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $user = $_GET['userID'];
    $product = $_GET['productID'];
    require_once("dbh.inc.php");

    
    if(isset($_SESSION["user"])){

    }else{
        $sql = "DELETE FROM unloggedusercart WHERE user = '$user' AND cartitem = '$product'";
        if (mysqli_query($conn, $sql)) {
            echo "Product successfully deleted from the database";
        }else{
            echo "Error deleting product".mysqli_error($conn);
        }
    }

    header("location: ../cart.php");

}
