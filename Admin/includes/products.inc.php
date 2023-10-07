<?php
// Make sure to establish a valid database connection here
require_once("dbh.inc.php");
// Check if a category is selected
if (!empty($_GET["category"])) {
    $category = $_GET["category"];

    // Create a function to retrieve products by category
    function getProductsByCategory($category, $conn) {
        $sql = "SELECT * FROM productinventory WHERE category = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signUp.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $category);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    // Call the function to get products by category
    $displayedProducts = getProductsByCategory($category, $conn);
} else {
    // If no category is selected, retrieve all products
    function getAllProducts($conn) {
        $sql = "SELECT * FROM productinventory";
        $result = mysqli_query($conn, $sql);

        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    // Call the function to get all products
    $displayedProducts = getAllProducts($conn);
}
?>
