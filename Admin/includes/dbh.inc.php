<?php

$servername = "localhost";
$dbhusername = "root";
$password = "";
$dbName = "thonialuxury";

$conn = mysqli_connect($servername, $dbhusername, $password, $dbName);

if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
  }