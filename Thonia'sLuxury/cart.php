<?php
require_once("header.php");
require_once("./includes/cart.inc.php");
session_start();
$total = 0;

?>
<div class="backToShop">
  <a href="./shop.php">&larr;</a>
  <h2>Back To Store</h2>
</div>

<main id="cart">
  <div id="cartBox">
    <h1 style="font-family: sans-serif;">Cart</h1>
    <table>
      <thead id="cartProductHead">
        <tr>
          <th>PRODUCT</th>
          <th>QUANTITY</th>
          <th>PRICE</th>
          <th> </th>
        </tr>
      </thead>
      <tbody id="cartProductBody">
        <?php
        foreach ($rows as $product) {
          if ($product !== '') {
            $item = $product["cartitem"];
            $sql = "SELECT * FROM productinventory WHERE uniquid = '$item'";

            $result = mysqli_query($conn, $sql);

            $cartitem = array();

            while ($row = mysqli_fetch_assoc($result)) {
              $cartitem = $row;
            }
        ?>
            <tr>
              <td class="cartProductDetails">
                <div id="cartProductImg">
                  <img src="<?php
                            $word = $cartitem["imagelocation"];
                            $real = explode("../../", $word);
                            $newWord = "../" . $real[1];
                            echo $newWord;
                            ?>" alt="">
                </div>
                <div id="cartProductInfo">
                  <p><?php echo $cartitem["productname"] ?></p>
                </div>
              </td>
              <td class="cartProductQuantityBtn">
                <div>
                  <a id="reduceBtn"  href= <?php
              if (isset($_SESSION["user"])) {
                echo "./includes/decreaseQuantity.php?userID=".$_SESSION["user"]."&productID=".$item; 
              }else{
                echo "./includes/decreaseQuantity.php?userID=".$_COOKIE["user"]."&productID=".$item; 
              }
               
               ?>>-</a>
                  <input type="number" name="cartProductQuantity" id="cartProductQuantity" value=<?php echo $product["quantity"]; ?>>
                  <a id="increaseBtn" href= <?php
              if (isset($_SESSION["user"])) {
                echo "./includes/increaseQuantity.php?userID=".$_SESSION["user"]."&productID=".$item; 
              }else{
                echo "./includes/increaseQuantity.php?userID=".$_COOKIE["user"]."&productID=".$item; 
              }
               
               ?>>+</a>
                </div>

              </td>
              <td>&#8358;<?php echo $cartitem["price"]*$product["quantity"]; ?></td>
              <td><a href= <?php
              if (isset($_SESSION["user"])) {
                echo "./includes/deleteCartItem.inc.php?userID=".$_SESSION["user"]."&productID=".$item; 
              }else{
                echo "./includes/deleteCartItem.inc.php?userID=".$_COOKIE["user"]."&productID=".$item; 
              }
               
               ?>>
              <i class="fa fa-trash" style="color: red; cursor:pointer;" id="<?php echo "deleteBtn" . $product["id"] ?>" class="deletebtn"></i> 
              </a></td>
            </tr>
        <?php
            $total = $total + $cartitem["price"]*$product["quantity"];
          }
        }
        ?>
        <!-- Add more product rows as needed -->
      </tbody>
      <tfoot>
        <tr>
          <td style="text-align: left;">Total: &#8358;<?php echo $total ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div id="checkoutBox">
    <div id="subTotal">
      <h2>Subtotal</h2>
      <h4>#5000</h4>
    </div>
    <div id="discount">
      <h2>Discount</h2>
      <p>$0</p>
    </div>
    <hr>
    <div id="grandTotal">
      <h2>Grandtotal</h2>
      <h3>#5000</h3>
    </div>
    <div id="checkOutBtnBox">
      <button id="checkOutBtn">Checkout Now</button>
    </div>

  </div>
</main>

<?php
require_once("footer.php");
?>