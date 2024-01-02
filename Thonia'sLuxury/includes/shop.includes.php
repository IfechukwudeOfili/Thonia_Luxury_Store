<?php
require_once("dbh.inc.php");

// Function to get filtered and paginated products
function getFilteredProducts($conn, $filters, $page, $itemsPerPage) {
    $offset = ($page - 1) * $itemsPerPage;
    $sql = "SELECT * FROM productinventory WHERE 1=1";

    // Apply filters
    if (!empty($filters['minPrice'])) {
        $sql .= " AND price >= " . $filters['minPrice'];
    }
    if (!empty($filters['maxPrice'])) {
        $sql .= " AND price <= " . $filters['maxPrice'];
    }
    if (!empty($filters['productType'])) {
        $sql .= " AND category IN ('" . implode("','", $filters['productType']) . "')";
    }
    //add vilters for sortBy
    if(!empty($filters['sortBy'])){
        if ($filters["sortBy"] == "popularity") {
            # code...
        }
        if ($filters["sortBy"] == "new") {
            $sql .= " ORDER BY created_at";
        }
        if ($filters["sortBy"] == "low") {
            $sql .= " ORDER BY price ASC";
        }
        if ($filters["sortBy"] == "high") {
            $sql .= " ORDER BY price DESC";
        }
    }
    $sql .= " LIMIT $offset, $itemsPerPage";
    
    $result = mysqli_query($conn, $sql);
    
    $rows = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    
    return $rows;
}

// Function to get the total number of products for pagination
function getTotalProducts($conn, $filters) {
    $sql = "SELECT COUNT(*) AS total FROM productinventory WHERE 1=1";

    // Apply filters
    if (!empty($filters['minPrice'])) {
        $sql .= " AND price >= " . $filters['minPrice'];
    }
    if (!empty($filters['maxPrice'])) {
        $sql .= " AND price <= " . $filters['maxPrice'];
    }
    if (!empty($filters['productType'])) {
        $sql .= " AND category IN ('" . implode("','", $filters['productType']) . "')";
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    return $row['total'];
}

// Get filter criteria from GET parameters
$filters = array(
    'minPrice' => isset($_GET['minPrice']) ? intval($_GET['minPrice']) : null,
    'maxPrice' => isset($_GET['maxPrice']) ? intval($_GET['maxPrice']) : null,
    'sortBy' => isset($_GET['sortBy']) ? $_GET['sortBy'] : null,
    'productType' => isset($_GET['productType']) ? $_GET['productType'] : array(),

);
// Get the current page number from GET parameter
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Number of products per page
$itemsPerPage = 6;

// Get filtered and paginated products
$shopProducts = getFilteredProducts($conn, $filters, $page, $itemsPerPage);

// Get the total number of products for pagination
$totalProducts = getTotalProducts($conn, $filters);

// Calculate total pages
$totalPages = ceil($totalProducts / $itemsPerPage);

// Include the rest of your HTML and PHP code to display products and pagination
// ...

?>
