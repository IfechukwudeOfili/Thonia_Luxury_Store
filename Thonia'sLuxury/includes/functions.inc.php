<?php

function checkunLoggedCart($conn, $product, $userID){
    $sql = "SELECT * FROM unloggedusercart WHERE user = '$userID' AND cartitem = '$product'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row)){
        if(count($row)>0){
        return true;
    }else{
        return false;
    }
    }
    

}
function checkLoggedCart($conn, $product, $userID){
    $sql = "SELECT * FROM loggedusercart WHERE user = '$userID' AND cartitem = '$product'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row)){
        if(count($row)>0){
        return true;
    }else{
        return false;
    }
    }
    

}
