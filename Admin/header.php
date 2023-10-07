<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="pagestyle.css">
    <link rel="stylesheet" href="./icons/css/all.min.css">
</head>

<body>
    <div class="wrapper">