
    <?php
  require_once("pagesheader.php");
  require_once("../includes/dbh.inc.php");
  $uniquid = "649221d14e27d5.54494840";

  function getShopProductDetails($conn, $uniquid){
    $sql = "SELECT * FROM productinventory WHERE uniquid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../products.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $uniquid);
    mysqli_stmt_execute($stmt);
    $resultsData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }
    mysqli_stmt_close($stmt);
}
$details = getshopProductDetails($conn, $uniquid);

function getRelatedCategory($conn, $category){
    $sql = "SELECT * FROM productinventory WHERE category = '$category' LIMIT 5";
    $result = mysqli_query($conn, $sql);

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}

$similarProducts = getRelatedCategory($conn, $details["category"])
?>

<main id="productPage">
<div class="backToShop">
    <a href="../shop.php">&larr;</a>
    <h2>Back To Store</h2>
</div>
<div id="productInfo">
<div id="productDetails">
            <div id="productDetailImg">
                <img src="
        <?php
        echo $details["imagelocation"];
        ?>
        " alt="<?php echo "Picture of" . $details["productname"] ?>">
            </div>
            <div id="productDetailsText">
                <h1><?php echo $details["productname"] ?></h1>

                <div class="rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                </div>

                <hr style="margin: 20px 0; border-color: rgb(195, 147, 47); opacity: 0.5;">
                <h1>&#8358; <?php echo $details["price"] ?></h1>
                <p>In stock</p>
                <p>Shipping Costs may apply</p>
                <hr style="margin: 20px 0; border-color: rgb(195, 147, 47); opacity: 0.5;">
                <?php
                require_once("../includes/functions.inc.php");
                if (!isset($_SESSION["user"])) {


                    if (!checkunLoggedCart($conn, $uniquid, $_COOKIE["user"])) {

                ?>
                        <a id="addToCart" href=<?php
                                                echo "../includes/unloggedusercart.inc.php?userID=" . $_COOKIE["user"] . "&productID=" . $uniquid; ?>><i class="fa fa-cart"></i>Add to Cart</a>
                    <?php

                    } else {

                    ?>
                        <a id="alreadyInCart" aria-disabled="true"><i class="fa fa-cart"></i>Item already In Cart</a>
                    <?php
                    }
                } else {
                    if (checkLoggedCart($conn, $uniquid, $_SESSION["user"])) {
                        
                    ?>
                    <a id="addToCart" href=<?php
                                                echo "../includes/loggedusercart.inc.php?userID=" . $_SESSION["user"] . "&productID=" . $uniquid; ?>><i class="fa fa-cart"></i>Add to Cart</a>
                    <?php

                    } else {

                    ?>
                        <a id="alreadyInCart" aria-disabled="true"><i class="fa fa-cart"></i>Item already In Cart</a>
                    
                    
                <?php
                    }
                }
                ?>
            </div>
        </div>
<div id="productDetailsDescription">
    <h1>Product Description</h1>
    <p><?php echo $details["productdesc"] ?></p>
</div>
</div>

<!-- <div id="review">
    <button>ADD A REVIEW</button>
    <h1>Add review</h1>
    <form action="">

    </form>
    <div id="currentReviews">

    </div>
</div> -->
<div id="similar-products">
    <h3>Similar Products</h3>
    <div id="similarProductsList">
        <?php
        foreach ($similarProducts as $product) {
            
        ?>
        <a href="
        <?php
        echo $product["uniquid"].".php"
        ?>
        " class="similarProduct">
            <img src="
            <?php
            echo $product["imagelocation"]
            ?>
            " alt="">
        </a>
        <?php
        }
        ?>
    </div>
</div>
</main>


<?php
require_once("pagesfooter.php");
?>
    