<?php
require_once("header.php");
require_once("sideBar.php");
require_once("./includes/products.inc.php");

// $word = "../../location";
// $real = explode("../../", $word);
// $newWord = "../".$real[1];
?>

<main id="products">
    <header>
        <h1>Products</h1>
        <div class="profile-badge">
            <div class="avatar">
                <img src="../img/IMG_3724.JPG" alt="Profile Picture">
            </div>
            <div class="info">
                <h3>Anthonia Ofili</h3>
                <p>Owner</p>
                 
            </div>
        </div>
    </header>
    <div id="productNav">
        <a class="blueBtn" href="addProduct.php">ADD NEW PRODUCT +</a>
        <div class="searchBar">
            <i class="fa fa-search"></i>
            <input type="text" name="searchItem" placeholder="Product name" id="adminProductSearchInput">  
        </div>
        <div id="category-container">
    <form action="products.php" method="Get">
        <label for="category">Category:</label>
        <select name="category" id="category" onchange="this.form.submit()">
            <option value="">All Products</option>
            <option value="necklace">Necklaces</option>
            <option value="ring">Rings</option>
            <option value="bracelet">Bracelets</option>
            <option value="earring">Earrings</option>
        </select>
    </form>
</div>

        
    </div>
    <div id="AdminproductList">
        <?php
        foreach ($displayedProducts as $product) {
            
        ?> 
        <div class="adminproduct">
            <div class="adminProductImage">
                <img src="
                 <?php
                 $word = $product["imagelocation"];
                 $real = explode("../../", $word);
                 $newWord = "../".$real[1];
                 echo $newWord;
                 ?>
                " alt="">
            </div>
            <h1><?php echo $product["productname"] ?></h1>
            <div class="moreInfo">
                <p>category: <?php echo $product["category"] ?></p>
                <p>Price: <?php echo $product["price"] ?></p>
                <p>Compare Price: <?php echo $product["compareprice"] ?></p>
                <p>Quantity: <?php echo $product["quantity"] ?></p>
            </div>
            <p>current rating <i class="fa fa-star"></i></p>
            <div class="adminProductButtons">
                <a href="<?php echo "./productpages/".$product["uniquid"].".php" ?>" class="editBtn">Edit <i class="fa fa-pencil"></i></a>
                <a href="<?php echo "./includes/deletePage.inc.php?uniquid=".$product["uniquid"] ?>" class="deleteBtn">Delete <i class="fa fa-trash"></i></a>
            </div>
        </div>
        <?php
        
            }
        ?>
    </div>
</main>
<?php 
    require_once("footer.php");
    ?>