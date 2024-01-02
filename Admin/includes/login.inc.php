<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once("dbh.inc.php");
    require_once("functions.inc.php");

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    };

    logIn($conn, $username, $pwd);
    header("location: ../index.php");
    session_start();
    $_SESSION["id"] =  $uidExists["id"];
    $_SESSION["name"] =  $uidExists["fullname"];
} else {
    header("location:../login.php");
    exit();
}
