<?php

require_once("dbh.inc.php");


function getnewArrivalProducts($conn) {
    $sql = "SELECT * FROM productinventory ORDER BY created_at DESC LIMIT 8";
    $result = mysqli_query($conn, $sql);

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

$newArrivals = getnewArrivalProducts($conn);

function getfeatured($conn) {
    $sql = "SELECT * FROM productinventory ORDER BY created_at ASC LIMIT 8";
    $result = mysqli_query($conn, $sql);

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

$featured = getfeatured($conn);

function getsales($conn) {
    $sql = "SELECT * FROM productinventory ORDER BY price ASC LIMIT 8";
    $result = mysqli_query($conn, $sql);

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

$sales = getsales($conn);