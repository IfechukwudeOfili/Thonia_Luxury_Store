<?php
require_once("header.php");
require_once("sideBar.php");
?>

<main id="customer">
    <header>
        <h1>Customer</h1>
        <div class="profile-badge">
            <div class="avatar">
                <img src="../img/IMG_3724.JPG" alt="Profile Picture">
            </div>
            <div class="info">
                <h3>Anthonia Ofili</h3>
                <p>Owner</p>
            </div>
        </div>
    </header>
    <div id="customerSearch">
        <div id="searchCustomerBy">
                <label for="searchBy">Seach By:</label>
                <select name="category[]" id="searchBy">
                    <option value=""></option>
                    <option value="Name">Name</option>
                    <option value="Date">Entry Date</option>
                    <option value="location">Location</option>

                </select>
        </div>
        <div class="searchBar">
            <i class="fa fa-search"></i>
            <input type="text" name="searchItem" placeholder="customer">  
        </div>

    </div>
    <div id="noCustomer">
                <h1>NO CUSTOMERS CURRENTLY <i class="fa fa-user"></i></h1>
    </div>
</main>

<?php 
    require_once("footer.php");
    ?>