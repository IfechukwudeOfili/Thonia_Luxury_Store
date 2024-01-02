<?php 
session_start();
if($_SERVER["REQUEST_METHOD"]=="GET"){
$user = $_GET['userID'];
$product = $_GET['productID'];

require_once("dbh.inc.php");
$sql = "SELECT * FROM `productinventory` WHERE uniquid = '$product'";
$result = mysqli_query($conn, $sql);
$productDetailsFromInventory = mysqli_fetch_assoc($result);
$maxQuantity = $productDetailsFromInventory['quantity'];

if(!isset($_SESSION["user"])){
    $sql = "SELECT * FROM `unloggedusercart` WHERE cartitem = '$product' AND user = '$user'";
    $result = mysqli_query($conn, $sql);
    $productDetailsFromCart = mysqli_fetch_assoc($result);
    $currentQuantity = $productDetailsFromCart["quantity"];

if ($currentQuantity > 1) {
    $newQuantity = $currentQuantity - 1;

    $sql = "UPDATE `unloggedusercart` SET quantity = '$newQuantity' WHERE cartitem = '$product' AND user = '$user'";
    mysqli_query($conn, $sql);


}
}else{

}



header("location: ../cart.php");




}