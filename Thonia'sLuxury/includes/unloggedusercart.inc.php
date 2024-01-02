<?php

// Get the form data
if($_SERVER["REQUEST_METHOD"]=="GET"){
$user = $_GET['userID'];
$product = $_GET['productID'];

// TODO: Perform any necessary validation or sanitization of the data

// TODO: Connect to the database
require_once("dbh.inc.php");


// $sql = "SELECT * FROM `unloggedusercart` WHERE user = '$user'";
// $result = mysqli_query($conn, $sql);

// $rows = array();

// while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
// }



// if (empty($rows)) {
    $additem = $product;
    $sql = "INSERT INTO unloggedusercart (user, cartitem, quantity) VALUES (?, ?, 1)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user, $additem);

    if (mysqli_stmt_execute($stmt)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
// Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
//}

    header("location: ../shopProductPages/".$product.".php");




}



?>
