<?php
require_once("header.php");
require_once("sideBar.php");
?>

<main id="addProduct">
<header>
        <div class="backToProducts">
            <a href="products.php">&larr;</a>
            <div>
            <p>Back to Product List</p>  
            <h1>Add New Product</h1>
            </div>
        </div>
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
    
    <form action="./includes/addproduct.inc.php" method="post" id="newProductForm" enctype="multipart/form-data">
        <div id="productNameandDesc">
            <h1>Description</h1>
            <div class="form-box">
                <div id="productName">
                    <label for="product-name">Product Name:</label>
                    <input type="text" name="productName" id="product-name">
                </div>
                <div id="productDesc">
                    <label for="product-desc">Product Description:</label>
                    <textarea name="productDesc" id="product-desc" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div id="productCategory">
            <h1>Category</h1>
            <div class="form-box">
                <div id="productType">
                    <label for="type">Product Type:</label>
                    <select name="productType" id="type">
                        <option value=""></option>
                        <option value="necklace">Necklace</option>
                        <option value="ring">Ring</option>
                        <option value="earring">Earring</option>
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
                    <input type="number" name="productAmount" id="amount">
                </div>
            </div>
        </div>
        <div id="productImages">
            <h1>Product Images</h1>
            <div class="form-box">
                <figure class="image-container">
                    <img alt="" id="chosen-image">
                    
                </figure>
                <figcaption id="file-name">
                        
                    </figcaption>
                <input type="file" id="upload-button" name="productImage" value="">
                <label id="visible-upload" for="upload-button">
                <i class="fa fa-upload"></i> &nbsp;
                Choose A Photo
                </label>
            </div>
        </div>
        <div id="productPricing">
            <h1>Pricing</h1>
            <div class="form-box">
                <div id="priceOfProduct">
                    <label for="price">Price</label>
                    <div class="priceInput">
                        <i>&#8358</i>
                        <input type="number" name="price" id="price">
                    </div>
                </div>
                <div id="comparePriceOfProduct">
                    <label for="compare-price">Compare price</label>
                    <div class="priceInput">
                        <i>&#8358</i>
                        <input type="number" name="compare-price" id="compare-price">
                    </div>
                </div>
            </div>
        </div>
        <div id="product-buttons">
            <input type="submit" value="Add Product" class="big-blue-btn">
            <button class="big-blue-btn">Schedule</button>
        </div>
    </form>
</main>
<?php 
    require_once("footer.php");
 ?>