<?php
require_once("header.php");
require_once("./includes/shop.includes.php");


?>

<main id="shop">
  <div id="filter-slider">
    <form>
      <div id="filter-sliderTitle">
        <h1>Filters</h1>
        <i class="fa-solid fa-x" id="closeFilters"></i>
      </div>

      <div id="price-filter">
        <p>Price</p>
        <div class="mobilePrice-input">
          <div class="field">
            <span>From &#8358;</span>
            <input type="number" class="input-min" value="0" name="minPrice">
          </div>
          <div class="field">
            <span>Up To &#8358;</span>
            <input type="number" class="input-max" value="10000" name="maxPrice">
          </div>
        </div>
        <div class="mobileSlider">
          <div class="progress"></div>
        </div>
        <div class="mobileRange-input">
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
  <script>
    if ($('.show')) {
      $('#filter-slider').removeClass('show')
    }
  </script>
  <form id="filter-form">
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
    <hr style="opacity: 0.5; margin: 40px 0;">
    <div class="productFilterDropdown">
      <i class="fa fa-filter"></i>
      <select name="sortBy" id="filter" size="1" style="width: 200px; color: #a5a5a5;">
        <option value="popularity" style="color: #a5a5a5;">Popularity</option>
        <option value="new" style="color: #a5a5a5;">New Arrivals</option>
        <option value="low" style="color: #a5a5a5;">Low to High</option>
        <option value="high" style="color: #a5a5a5;">High to Low</option>
      </select>
    </div>
    <hr style="opacity: 0.5; margin: 40px 0;">
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
  <div class="catalogue">
    <div id="catalogueHeading">
      <h1>Product Catalogue</h1>
    </div>

    <div id="mobileCatalogueHeading">
      <h1>Product Catalogue</h1>
      <div id="openFilters">
        <i class="fa-solid fa-sliders"></i>
        <span>Filters</span>
      </div>
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
        <a href="<?php echo "./shopProductPages/" . $product["uniquid"] . ".php" ?>">
          <div class="productItem">
            <div class="productItemImage">
              <img src="
            <?php
            $word = $product["imagelocation"];
            $real = explode("../../", $word);
            $newWord = "../" . $real[1];
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

  </div>

</main>
<hr style="border-color: rgb(195, 147, 47); margin: 50px;">
<div class="customize">
  <div class="customizeCaption">
    <h1>Looking to create a piece of jewelry which is representative of who you are ?</h1>
    <p>Browse our available customization options here</p>
    <button>Customize Here</button>
  </div>
  <div class="customizeimgCollage">
    <div class="collage">
      <div class="collage-one"></div>
      <div class="collage-two"></div>
      <div class="collage-three"></div>
      <div class="collage-four"></div>
      <div class="collage-five"></div>
    </div>
  </div>
</div>

<?php
require_once("footer.php");
?>