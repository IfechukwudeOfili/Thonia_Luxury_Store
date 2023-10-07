
    <?php
    require_once("pageheader.php");
    require_once("pagesidebar.php");
    require_once("../includes/dbh.inc.php");
    require_once("../includes/functions.inc.php");
    $uniquid = "6490e6b5bbb282.64785834";
    function getProductDetails($conn, $uniquid){
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
    $details = getProductDetails($conn, $uniquid);
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $productName = $_POST["productName"];
        $productDesc = $_POST["productDesc"];
        $productCategory = $_POST["productType"];
        $productPrice = $_POST["price"];
        $productComparePrice = $_POST["compare-price"];
        $productQuantity = $_POST["productAmount"];
    
        if (isset($_FILES["updateProductImage"]["name"])) {
            $file = $_FILES["updateProductImage"];
            $productImageName = $file["name"];
            $productImageTmp = $file["tmp_name"];
            $productImageType = $file["type"];
            $productImageError = $file["error"];
            $productImagesize = $file["size"];
            $newImgName = uniqid("", true);
            $fileExt = explode(".", $productImageName);
            $fileActualExt = strtolower(end($fileExt));
            $imageDestination = "../../ProductImages/";
            $fileLocation = $imageDestination.$newImgName.".".$fileActualExt;
            updateImg($productImageName, $productImageTmp, $productImagesize, $productImageError, $productImageType, $newImgName, $imageDestination, $_SERVER["PHP_SELF"]);    
        }
        
            updateProduct($conn, $productName, $productDesc, $productCategory, $productPrice, $productComparePrice, $productQuantity, $fileLocation, $details["id"]);
    }
    ?>
    <main id="productPage" style="background-color: white;">
        <header >
            <div class="backToProducts">
                <a href="../products.php">&larr;</a>
                <div>
                <p>Back to Product List</p>  
                <h1>Details</h1>
                </div>
            </div>
            <div class="profile-badge">
                <div class="avatar">
                    <img src="../../img/IMG_3724.JPG" alt="Profile Picture">
                </div>
                <div class="info">
                    <h3>Anthonia Ofili</h3>
                    <p>Owner</p>
                </div>
            </div>
        </header>
        <hr>
        <div id="productDetails">
            <div class="currentProd">
                <div class="largeProductImage">
                <img src="<?php echo $details["imagelocation"]; ?>" alt="">
                </div>
                
                <h1><?php echo $details["productname"]; ?></h1>
                <p class="dateAdded">Created at: <?php echo $details["created_at"] ?></p>
                <p class="lastupdate">Last Updated: <?php echo $details["updated_at"] ?></p>
            </div>
            <div class="updateProd">
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
                <div id="productNameandDesc">
                <h1>Description</h1>
                <div class="form-box">
                    <div id="productName">
                        <label for="product-name">Product Name:</label>
                        <input type="text" name="productName" id="product-name" value="<?php echo $details["productname"] ?>">
                    </div>
                    <div id="productDesc">
                        <label for="product-desc">Product Description:</label>
                        <textarea name="productDesc" id="product-desc" cols="30" rows="10"><?php echo $details["productdesc"] ?></textarea>
                    </div>
                </div>
            </div>
            <div id="productCategory">
                <h1>Category</h1>
                <div class="form-box">
                    <div id="productType">
                        <label for="type">Product Type:</label>
                        <select name="productType" id="type" >
                            <option value = "<?php echo $details["category"] ?>"><?php echo $details["category"] ?></option>
                            <option value="necklace">Necklace</option>
                            <option value="ring">Ring</option>
                            <option value="earing">Earring</option>
                            <option value="bracelet">Bracelet</option>
                            <option value="fullset">Matching Sets</option>
                            <option value="custom">Customizable</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="productQuantity">
                <h1>Quantity in Stock</h1>
                <div class="form-box">
                    <div id="amountOfProduct">
                        <label for="amount">Quantity available</label>
                        <input type="number" name="productAmount" id="amount" value = "<?php echo $details["quantity"] ?>">
                    </div>
                </div>
            </div>
            <button id="changeimgbtn">Change Image</button>
            <div id="productImages">
                <h1>Product Images</h1>
                <div class="form-box">
                    <figure class="image-container">
                        <img alt="" id="chosen-image">
                        
                    </figure>
                    <figcaption id="file-name">
                            
                        </figcaption>
                    <input type="file" id="upload-button" name="updateProductImage" value="">
                    <label id="visible-upload" for="upload-button">
                    <i class="fa fa-upload"></i> &nbsp;
                    Choose A Photo
                    </label>
                </div>
            </div>
            <style>
                #productImages{
                    display: none;
                }
            </style>
            <div id="productPricing">
                <h1>Pricing</h1>
                <div class="form-box">
                    <div id="priceOfProduct">
                        <label for="price">Price</label>
                        <div class="priceInput">
                            <i>&#8358</i>
                            <input type="number" name="price" id="price" value = "<?php echo $details["price"] ?>">
                        </div>
                    </div>
                    <div id="comparePriceOfProduct">
                        <label for="compare-price">Compare price</label>
                        <div class="priceInput">
                            <i>&#8358</i>
                            <input type="number" name="compare-price" id="compare-price" value = "<?php echo $details["compareprice"] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-buttons">
                <input type="submit" value="Update" class="big-blue-btn">
                
            </div>
                </form>
            </div>
        </div>
    </main>
    
        
    <?php 
        require_once("pagefooter.php");
     ?>
    