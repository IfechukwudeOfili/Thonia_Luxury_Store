<?php
require_once("header.php");
require_once("includes/index.includes.php");
?>
<div id="banner">
  <div id="bannerText">
    <h2>Welcome to <span>THONIA'S LUXURY</span> </h2>
    <h1>Luxury that lasts a lifetime.</h1>
    <button>EXPLORE <i class="fa-solid fa-shop"></i> <span>&rarr; </span></button>
  </div>
</div>


<section class="topProduct">
  <h1>Top Products</h1>
  <p>Discover the collection of our best selling and top interesting products</p>
  <nav id="homePageProducts">
    <ul>
      <li id="newArrivalBtn">New Arrivals</li>
      <li id="featuredBtn">Featured</li>
      <li id="onSaleBtn" style="color: red;">On Sale</li>
    </ul>
  </nav>

  <div class="dynamicTopProductBox" id="newArrival">
    <?php
    foreach ($newArrivals as $product) {

    ?>
      <a href="<?php echo "./shopproductpages/" . $product["uniquid"] . ".php" ?>" class="productCard">
        <div class="productImg">
          <img src="
            <?php
            $word = $product["imagelocation"];
            $real = explode("../../", $word);
            $newWord = "../" . $real[1];
            echo $newWord;
            ?>
            " alt="">
        </div>
        <div class="productText">
          <p><?php echo $product["productname"] ?> </p>
          <p>#<?php echo $product["price"] ?></p>
        </div>
      </a>
    <?php

    }
    ?>
  </div>
  <div class="dynamicTopProductBox" id="featured">
    <?php
    foreach ($featured as $product) {

    ?>
      <a href="<?php echo "./shopproductpages/" . $product["uniquid"] . ".php" ?>" class="productCard">
        <div class="productImg">
          <img src="
            <?php
            $word = $product["imagelocation"];
            $real = explode("../../", $word);
            $newWord = "../" . $real[1];
            echo $newWord;
            ?>
            " alt="">
        </div>
        <div class="productText">
          <p><?php echo $product["productname"] ?> </p>
          <p>#<?php echo $product["price"] ?></p>
        </div>
      </a>
    <?php

    }
    ?>
  </div>
  <div class="dynamicTopProductBox" id="sale">
    <?php
    foreach ($sales as $product) {

    ?>
      <a href="<?php echo "./shopproductpages/" . $product["uniquid"] . ".php" ?>" class="productCard">
        <div class="productImg">
          <img src="
            <?php
            $word = $product["imagelocation"];
            $real = explode("../../", $word);
            $newWord = "../" . $real[1];
            echo $newWord;
            ?>
            " alt="">
          <span class="salesTag">Off 20%</span>
        </div>
        <div class="productText">
          <p><?php echo $product["productname"] ?> </p>
          <p>#<?php echo $product["price"] ?></p>
        </div>
      </a>
    <?php

    }
    ?>
  </div>

</section>
<section class="wordOnTheStreet">
  <div class="review">
    <h1>WORD <em>on the</em><br> STREET</h1>
    <h1 class="apos" style="font-family: 'Times New Roman';"><em>"</em></h1>
    <div class="writing">
      <p style="font-family: sans-serif;" class="message">"I really love the necklace I got from Thonia- they are simple but elegant, and I can wear them anywhere. I also loves the packaging and care that Thonia took throughout the entire process. It's great to support a small business, and i'll definitely be ordering again!I really love the necklace I got from Thonia- they are simple but elegant, and I can wear them anywhere. I also loves the packaging and care that Thonia took throughout the entire process. It's great to support a small business, and i'll definitely be ordering again!"</p>
      <p id="byWho">-Charles O.</p>
    </div>
  </div>
  <div id="streetImg">
    <img src="./webimg/WhatsApp Image 2023-04-19 at 10.56.11.jpeg" alt="">
  </div>
  <div id="effortless">
    <h1>EFFORTLESS <br><span>Lifestyle</span></h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, veritatis nulla. Laudantium minus ratione animi dolore natus quam, autem unde at aliquid accusamus perferendis! Eveniet doloribus et quaerat. Expedita, ipsum!</p>
    <button>About Us</button>
  </div>
</section>
<section id="ourServices">
  <h1>Our Services</h1>
  <div class="cardContainer">
    <div class="card">
      <div class="cardImg">
        <img src="./webimg/gem.png" alt="gem">
      </div>
      <div class="cardText">
        <h3>Jewelry Store</h3>
        <p>From elegant necklaces and bracelets to stunning earrings and rings, we have something to suit every occasion and taste. <span><a href="#"><i class="fa-solid fa-shop"></i>&rarr;</a></span></p>
      </div>
    </div>
    <div class="card">
      <div class="cardImg">
        <img src="./webimg/ratingStar.png" alt="user">
      </div>
      <div class="cardText">
        <h3>Top Customer Engagement</h3>
        <p>
          We are always ready to listen to you. Our WhatsApp Channels are open 24/7 and we promise to leave you happier and more assured after every contact.
        </p>
      </div>
    </div>
    <div class="card">
      <div class="cardImg">
        <img src="./webimg/truck.png" alt="truck">
      </div>
      <div class="cardText">
        <h3>Home delivery</h3>
        <p>We deliver to any location in Lagos. Delivery outside Lagos can be discussed. .</p>
      </div>
    </div>
  </div>
</section>

<hr style="margin: 0 20px;">
<section id="newsLetter">
  <h1>SUBSCRIBE <em>to get</em> <br><em>the</em> LATEST UPDATES</h1>
  <div class="email">
    <input type="email" placeholder="Email Address">
    <input type="submit" value="Subscribe to Newsletter">
  </div>
</section>


<?php
require_once("footer.php");
?>