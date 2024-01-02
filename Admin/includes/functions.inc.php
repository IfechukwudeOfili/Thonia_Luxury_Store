<?php

function emptyInputLogin($username, $pwd){
    $result = "";
    if(empty($username) || empty($pwd)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;

}

function emptyInputSignUp($name, $email, $phone, $pwd, $repeatpwd)
{
    $result = "";
    if(empty($name) || empty($pwd) || empty($email) || empty($repeatpwd) || empty($phone)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = "";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}



function pwdMatch($pwd, $pwdRepeat){
    $result = "";
    if($pwd != $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}

function pwdcheck($pwd)
{
    $result = "";
    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $pwd)) {
       $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function userExists($conn, $phone, $email){
    $sql = "SELECT * FROM employees WHERE email = ? OR phone = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signUp.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $email, $phone);
    mysqli_stmt_execute($stmt);
    $resultsData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }else{
        $result = false;
        return $result;
    };
    mysqli_stmt_close($stmt);

}
function createAccount($conn, $name, $email, $phone, $pwd){
    $sql = "INSERT INTO employees (fullname, email, pwd, phone) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signUp.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashedPwd, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signUp.php?error=none");
    exit();

}

function logIn($conn, $username, $pwd){
 $uidExists = userExists($conn, $username, $username);
 if($uidExists === false){
    header("location: ../login.php?error=wronglogin");
    exit();
 }   
 $pwdHashed = $uidExists["pwd"];
 $checkPwd = password_verify($pwd, $pwdHashed);
 if($checkPwd === false){
    header("location: ../login.php?error=wronglogin");
    exit();
 }else if($checkPwd === true){
        session_start();
        $_SESSION["id"] =  $uidExists["id"];
        $_SESSION["name"] =  $uidExists["fullname"];
        header("location: ../index.php");
        exit();
 }
}

//product page functions

function emptyField($arr){
    $result = "";
    foreach ($arr as  $item) {
        if (empty($item)) {
            $result = false;
            return $result;
        }
    }
    $result = true;
    return $result;
}

function addProduct($conn, $name, $desc, $category, $price, $comparePrice, $quantity,$imageLocation, $uniqid){
    $sql = "INSERT INTO productinventory (productname, productdesc, category, price, compareprice, quantity, uniquid, imagelocation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addProduct.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $desc, $category, $price, $comparePrice, $quantity, $uniqid, $imageLocation);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../products.php?error=none");
    exit();
}
function updateProduct($conn, $name, $desc, $category, $price, $comparePrice, $quantity,$imageLocation, $id){
    $fileExt = explode(".", $imageLocation);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");
    if (!in_array($fileActualExt, $allowed)) {
       $sql = "UPDATE productinventory SET productname = ?, productdesc = ?, category = ?, price = ?, compareprice = ?, quantity = ? WHERE id = $id ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../products.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $desc, $category, $price, $comparePrice, $quantity);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../products.php?error=none");
    exit();
    }else{
        $sql = "UPDATE productinventory SET productname = ?, productdesc = ?, category = ?, price = ?, compareprice = ?, quantity = ?, imagelocation = ? WHERE ID = $id ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addProduct.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $desc, $category, $price, $comparePrice, $quantity, $imageLocation);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../products.php?error=none");
    exit();
    }
    
}
function uploadImg($fileName, $fileTmpName, $fileSize, $fileError, $fileType, $newName, $destination){
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNewName = $newName . ".". $fileActualExt;
                $fileDestination = $destination. $fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: ../addProduct.php?error=fileuploaded");
            }else{
                header("location: ../addProduct.php?error=fileistobig");
            }
        }else{
            header("location: ../addProduct.php?error=therewasanerroruploading");
        }
    }else{
        header("location: ../addProduct.php?error=wrongfiletype".$fileActualExt);
  
    }
}
function updateImg($fileName, $fileTmpName, $fileSize, $fileError, $fileType, $newName, $destination, $name){
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNewName = $newName . ".". $fileActualExt;
                $fileDestination = $destination. $fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                header("location: ../".$name."?error=fileistobig");
            }
        }else{
            header("location: ../".$name."?error=therewasanerroruploading");
        }
    }else{
        header("location: ../".$name."?error=wrongfiletype".$fileActualExt);
        echo $fileActualExt;

    }
}

//function to remove a product from the database using its uniquid
function deleteDbhProduct($conn, $id){
    //delete based on the uniquid from the database
    $sql = "DELETE FROM productinventory WHERE uniquid = '$id'";

    //run the querry and check if it worked
    if (mysqli_query($conn, $sql)) {
        echo "Product successfully deleted from the database";
    }else{
        echo "Error deleting product".mysqli_error($conn);
    }
}

