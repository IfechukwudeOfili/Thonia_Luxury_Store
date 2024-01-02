<?php
if (isset($_GET)) {
    //get the product id of the particular product
    $productId = $_GET["uniquid"];
    //connect to the database
    require_once("./dbh.inc.php");
    require_once("./functions.inc.php");

    //delete product from database using the function
    deleteDbhProduct($conn, $productId);

   //get the location of the adminproductPage
    $adminProductPage = "../productpages/".$productId.".php";
    
    //check if the file exists
    if (file_exists($adminProductPage)) {
        //delete file if it exists
        if (unlink($adminProductPage)) {
            echo "successfullydeleted";
        }else{
            echo "not deleted successfully";
        }
    }else{
        echo "file does not exist";
    }

    //get the location of the shopProductPage
    $shopProductPage = "../../Thonia'sLuxury/shopProductPages/".$productId.".php";
    if (file_exists($shopProductPage)) {
        //delete file if it exists
        if (unlink($shopProductPage)) {
            echo "successfullydeleted";
        }else{
            echo "not deleted successfully";
        }
    }else{
        echo "file does not exist";
    }

    //get the location of the productImage and due to the different file types create a link for each
    $productImagejpeg = "../../ProductImages/".$productId.".jpeg";
    $productImagepng = "../../ProductImages/".$productId.".png";
    $productImagejpg = "../../ProductImages/".$productId.".jpg";
    //put all the possible files in an array to loop through it
    $possibleImagePaths = array($productImagejpeg, $productImagejpg, $productImagepng);
    //loop throught the array
    foreach ($possibleImagePaths as $path) {
        if (file_exists($path)) {
            //delete file if it exists
            if (unlink($path)) {
                echo "successfullydeleted";
            }else{
                echo "not deleted successfully";
            }
        }else{
            echo "file does not exist";
        }
    }


    header("location: ../products.php?filesuccessfullydeleted");
}