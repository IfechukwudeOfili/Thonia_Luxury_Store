<?php
require_once("header.php");
require_once("sideBar.php");
?>

<main id="orders">
    <header>
        <h1>Orders</h1>
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
    <div id="orders-content">
        <div id="search">
            <div class="searchBar">
                <i class="fa fa-search"></i>
              <input type="text" name="searchItem" placeholder="customer name">  
            </div>
            <input type="date" name="orderDate" id="orderDate">
            <div id="statusBar">
                <label for="status">Status:</label>
                <select name="status[]" id="status">
                    <option value=""></option>
                    <option value="pending">Pending</option>
                    <option value="fulfilled">Fulfilled</option>
                    <option value="requested">Requested</option>
                </select>
            </div>   
        </div>
        <hr>
        <div id="order-table">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td>Product A</td>
                        <td>5</td>
                        <td>John Doe</td>
                        <td>2023-05-30</td>
                        <td>pending</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Product B</td>
                        <td>3</td>
                        <td>Jane Smith</td>
                        <td>2023-05-29</td>
                        <td>pending</td>
                    </tr> -->
                   
                    <!-- Add more rows for additional orders -->
                </tbody>
            </table>
            <div id="noOrder">
                <h1>NO ORDERS CURRENTLY <i class="fa fa-cart-shopping"></i></h1>
            </div>
        </div>
    </div>
</main>

<?php 
    require_once("footer.php");
    ?>