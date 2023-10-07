<?php


if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = $_POST["name"];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $repeatpwd = $_POST["repeatpwd"];

    require_once("dbh.inc.php");
    require_once("functions.inc.php");

    if(emptyInputSignUp($name, $email, $phone, $pwd, $repeatpwd) !== false) {
        header("location: ../signUp.php?error=emptyinput");
        exit();
     };
     if(invalidEmail($email) !== false) {
        header("location: ../signUp.php?error=invalidemail");
        exit();
     };
     if(pwdMatch($pwd, $repeatpwd) !== false) {
        header("location: ../signUp.php?error=passworddontmatch");
        exit();
     };
     if(pwdcheck($pwd) !== false) {
        header("location: ../signUp.php?error=passwordisinvalid");
        exit();
     };
     if(userExists($conn, $phone, $email) !== false) {
        header("location: ../signUp.php?error=UserExists");
        exit();
     };
     
     createAccount($conn, $name, $email, $phone, $pwd);
     header("location: ../login.php");
    
}else{
    header("location:../signUp.php");
    exit();
}