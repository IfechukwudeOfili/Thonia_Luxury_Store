<?php
require_once("dbh.inc.php");


if (isset($_SESSION["user"])) {

}else{
    if(isset($_COOKIE["user"])){
        $user= $_COOKIE["user"];
        $sql = "SELECT * FROM `unloggedusercart` WHERE user = '$user'";
        $result = mysqli_query($conn, $sql);

        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        } else {
        echo "Error executing query: " . mysqli_error($conn);
        }
        
        
    
    
    }

 

