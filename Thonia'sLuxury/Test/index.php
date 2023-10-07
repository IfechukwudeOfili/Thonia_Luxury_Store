<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../icons/css/all.css" />
    <script src="../scripts/jquery.js"></script>
    <title>Thonia's Luxury</title>
</head>

<body>

    <nav id="mobiletopNav">
        <div style="display:flex; gap:10px;">
            <i class="fa-solid fa-user"></i>
            <i class="fa-solid fa-search"></i>
        </div>
        <div id="logo" style="align-self: center; justify-self: center;">
            <a href="#"><img src="../webimg/PEGV7499.png" alt="nav Logo"></a>
        </div>
        <div style="display:flex; gap:10px;">
            <i class="fa-regular fa-heart"></i>
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
    </nav>

    <nav id="mobileunderNav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="shop.php">Store <i class="fa-solid fa-shop"></i></a></li>
            <li><a href="#">Custom designs</a></li>
        </ul>
    </nav>
    <?php

    require_once("shop.includes.php");


    ?>
    <div class="catalogue">
        <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom:10px;">
            <h1>Product Catalogue</h1>
            <div>
                <i class="fa-solid fa-sliders"></i>
                <span>Filters</span>
            </div>
        </div>

        <div id="filter-slider">
            <form id="filter-form">
                <div style="display:flex; justify-content: space-between; align-items:center;
                padding:0 10px; margin-bottom:10px;">
                  <h1>Filters</h1> 
                  <i class="fa-solid fa-x"></i>
                </div>
                
                <div id="price-filter">
                    <p>Price</p>
                    <div class="price-input">
                        <div class="field">
                            <span>From &#8358;</span>
                            <input type="number" class="input-min" value="0" name="minPrice">
                        </div>
                        <div class="field">
                            <span>Up To &#8358;</span>
                            <input type="number" class="input-max" value="10000" name="maxPrice">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="10000" value="0" step="100">
                        <input type="range" class="range-max" min="0" max="10000" value="10000" step="100">
                    </div>
                </div>
                <hr style="opacity: 0.5; margin: 20px 0;">
                <div class="productFilterDropdown">
                    <i class="fa fa-filter"></i>
                    <select name="sortBy" id="filter" size="1" style="width: 200px; color: #a5a5a5;">
                        <option value="popularity" style="color: #a5a5a5;">Popularity</option>
                        <option value="new" style="color: #a5a5a5;">New Arrivals</option>
                        <option value="low" style="color: #a5a5a5;">Low to High</option>
                        <option value="high" style="color: #a5a5a5;">High to Low</option>
                    </select>
                </div>
                <hr style="opacity: 0.5; margin: 20px 0;">
                <div class="productfilter">
                    <p>Product</p>
                    <div class="checkboxes">
                        <div class="jewelryType">
                            <label class="container">Bracelets
                                <input type="checkbox" name="productType[]" value="bracelet">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container">Rings
                                <input type="checkbox" name="productType[]" value="ring">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container">Earrings
                                <input type="checkbox" name="productType[]" value="earring">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container">Necklaces
                                <input type="checkbox" name="productType[]" value="necklace">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container">Matching Sets
                                <input type="checkbox" name="productType[]" value="set">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="applyFilterButton">
                    <button class="gold-btn" type="submit">APPLY</button>
                </div>
                <div id="clearFilterButton">
                    <a href="shop.php">CLEAR FILTERS</a>
                </div>
            </form>
        </div>

        <div class="currentFilter">
            <?php
            if (!empty($_GET["productType"])) {
                foreach ($_GET["productType"] as $category) {



            ?>
                    <span class="usedfilter">
                        <p><?php echo $category ?></p>
                    </span>
            <?php
                }
            }
            ?>
        </div>
        <div id="productlist">
            <?php
            foreach ($shopProducts as $product) {

            ?>
                <a href="<?php echo "../shopProductPages/" . $product["uniquid"] . ".php" ?>">
                    <div class="productItem">
                        <div class="productItemImage">
                            <img src="
            <?php
                $word = $product["imagelocation"];
                $real = explode("../../", $word);
                $newWord = "../../" . $real[1];
                echo $newWord;
            ?>
            " alt="">
                        </div>
                        <div class="productItemText">
                            <p style="font-family:sans-serif;"><b><?php echo $product["productname"]  ?></b></p>
                            <p>&#8358;<?php echo $product["price"]  ?></p>
                            <p><s>&#8358;<?php echo $product["compareprice"] ?></s></p>
                        </div>
                    </div>
                </a>

            <?php
            }
            ?>

        </div>

        <nav id="multipageNav">
            <ul>
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li ';
                    if ($i == $page) {
                        echo 'class="active-box-number"';
                    } else {
                        echo 'class="inactive-box-number"';
                    }
                    echo '><a href="shop.php?page=' . $i;
                    // Include filter parameters in pagination links
                    if (!empty($filters['minPrice'])) {
                        echo '&minPrice=' . $filters['minPrice'];
                    }
                    if (!empty($filters['maxPrice'])) {
                        echo '&maxPrice=' . $filters['maxPrice'];
                    }
                    if (!empty($filters['productType'])) {
                        echo '&productType[]=' . implode('&productType[]=', $filters['productType']);
                    }
                    if (!empty($filters['sortBy'])) {
                        echo '&sortBy=' . $filters["sortBy"];
                    }
                    echo '">' . $i . '</a></li>';
                }
                ?>
            </ul>
        </nav>