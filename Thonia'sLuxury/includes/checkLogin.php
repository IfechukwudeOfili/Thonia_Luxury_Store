<?php

if (!isset($_SESSION["user"])) {
    if(!isset($_COOKIE["user"])){
        // Set the cookie
    $cookie_name = 'user';
    $cookie_value = uniqid("", true);
    $cookie_expiry = time() + (86400*3000); // Cookie expires in 24 hours (adjust as needed)
    
    // Set the cookie on the user's browser
    setcookie($cookie_name, $cookie_value, $cookie_expiry, '/');
    
    // Display a message or perform any other actions
    }
}else{
    if(isset($_COOKIE["user"])){
         // Set the cookie's expiration time to the past
    setcookie('user', '', time() - 3600, '/');
    
    // Display a message or perform any other actions
    echo "Cookie destroyed.";
    }

}