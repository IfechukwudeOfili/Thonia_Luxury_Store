<?php
require_once("./includes/checkLogin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="./icons/css/all.css" />
  <script src="./scripts/jquery.js"></script>
  <title>Thonia's Luxury</title>
</head>

<body>

  <nav id="topNav">
    <div id="topNavIcons">
      <a href="#"><i class="fa-brands fa-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-pinterest"></i></a>
    </div>
    <div id="topNavLogo">
      <a href="#"><img src="./webimg/PEGV7499.png" alt="nav Logo"></a>

    </div>
    <div id="topNavLinks">
      <a href="#">Log In</a>
      <a href="#" id="wish"><i class="fa-regular fa-heart"></i></a>
      <a href="cart.php" id="toCart"><i class="fa-solid fa-cart-shopping"></i></a>
      <!-- <button><i class="fa-solid fa-magnifying-glass"></i></button> -->
    </div>
  </nav>
  <nav id="underNav">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="shop.php">Store <i class="fa-solid fa-shop"></i></a></li>
      <li><a href="#">Custom designs</a></li>
    </ul>
  </nav>

  <nav id="mobiletopNav">
    <div style="display:flex; gap:10px;">
        <i class="fa-solid fa-user"></i>
        <i class="fa-solid fa-search"></i>
    </div>
    <div id="logo" style="align-self: center; justify-self: center;">
    <a href="#"><img src="./webimg/PEGV7499.png" alt="nav Logo"></a>
    </div>
    <div style="display:flex; gap:10px;">
        <i class="fa-regular fa-heart"></i>
        <a href="cart.php" id="toCart"><i class="fa-solid fa-cart-shopping"></i></a>
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