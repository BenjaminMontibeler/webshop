<?php

session_start();

?>

<html>
    
    <body>
      
        <nav class="navbar fixed-top navbar-light bg-light">
            <div class="container-fluid">
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
              </button>
              <a class="navbar-brand" href="brnja2.php">B R N J A</a>
              <div class="cart">
                  <a class="navbar-brand" href="cart.php">cart  <span id="cart-item" class="badge bg-dark"></span></a>
              </div>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="all.php">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <?php
                    if(isset($_SESSION["name"])){
                      echo " <li class='nav-item'>
                      <p class='nav-link'>Hello " . $_SESSION["name"] . " </p>
                    </li> ";
                    echo " <li class='nav-item'>
                      <a class='nav-link' href='includes/logout.php'>Log out</a>
                    </li> ";
                    } else{
                      echo " <li class='nav-item'>
                      <a class='nav-link' href='#'>Guest</a>
                    </li> ";
                    
                    }
                  ?>
                </ul>
              </div>
            </div>
            
        </nav>
        
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
</body>
</html>