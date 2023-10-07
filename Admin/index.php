<!-- <?php

// session_start();
// if(isset($_SESSION["name"])){
//     echo "Hello World";
// }

?> -->

<?php
require_once("header.php");
require_once("sideBar.php");
?>
<main id="dashboard">
        <header>
            <h1>Dashboard</h1>
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
         <div class="dashboard-content">
        <section id="weekly-sales">
            <h1>Sales' stats</h1>
            <div class="salesStats">
                <div class="customers">
                    <div class="stat">
                    <p class="number">00</p>
                    <span class="detail">customers <a href="#">&rarr;</a></span>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="orders">
                    <div class="stat">
                        <p class="number">00</p>
                        <span class="detail">orders <a href="#">&rarr;</a></span>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cart-shopping"></i>
                    </div>
                </div>
                <div class="income">
                    <div class="stat">
                        <p class="number">00</p>
                        <span class="detail">income <a href="#">&rarr;</a></span>
                    </div>
                    <div class="icon">
                      <i class="fa fa-dollar"></i>  
                    </div>
                </div>
            </div>
        </section>
        <section id="notices">
            <h1>important notices <i class="fa fa-envelope"></i></h1>
            <hr>
            <div class="messages empty">
                <h1>There are no messages</h1>
                <p><i class="fa fa-envelope-open"></i></p>
            </div>
        </section>
        <section id="graph">
            <h1>GRAPH</h1>
            
        </section>
        <section id="goToStore" href="#">
            <a href="../Thonia'sLuxury/index.php">GO TO STORE</a>
        </section>
    </div>
    </main>

    <?php 
    require_once("footer.php");
    ?>