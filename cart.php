<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/tops.css">
        <script src="javascript/tops.js"></script>
        <script src="https://kit.fontawesome.com/de3354ea74.js" crossorigin="anonymous"></script>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
    </head>
    <body>
        <?php
        include_once 'includes/header.php';
        ?>
        
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
          <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{echo 'none';} unset($_SESSION['showAlert']); ?>"class="alert alert-success alert-dismissible mt-5">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']);  ?></strong>
          </div>
            <div class="table-responsive mt-2">
              <table class="table text-center">
                <thead>
                  <tr>
                    <td colspan="7">
                      <h4 class="text-center text-danger mt-5"></h4>
                    </td>
                  </tr>
                  <tr>
                    <th>name</th>
                    <th></th>
                    <th>price</th>
                    <th>
                    <a href="includes/action.php?clear=all" class="bg-danger badge p-1 text-decoration-none" onclick="return confirm('Are you sure you want to clear your shopping cart?');">clear cart</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require 'includes/config.php';
                  $stmt = $conn->prepare("SELECT * FROM cart");
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $grand_total=0;
                  while($row=$result->fetch_assoc()):

                  ?>
                  <tr>
                    <td>
                      <?= $row['product_name']?>
                    </td>
                    <td>
                      <img src="<?= $row['product_image'] ?>" width="200">
                    </td>
                    <td>
                      $<?= number_format($row['product_price'],2); ?>
                    </td>
                    <td>
                      <a href="includes/action.php?remove=<?= $row['p_id'] ?>" class="text-danger lead"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?php $grand_total += $row['product_price']; ?>
                  <?php endwhile; ?>
                  <tr>
                    <td colspan="2">
                      <a href="all.php" class="btn text-danger fw-bold">c o n t i n u e &nbsp; s h o p p i n g</a>
                    </td>
                    <td colspan="1">
                      $<?= number_format($grand_total, 2); ?>
                    </td>
                    <td>
                      <a href="includes/action.php?del=all" class="btn btn-dark <?= ($grand_total>1)?"":"disabled"; ?>">checkout</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>    

    <script type="text/javascript">
      load_cart_item_number();
            function load_cart_item_number(){
                $.ajax({
                    url: 'includes/action.php',
                    method: 'get',
                    data: {cartItem: "cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
    </script>    
    </body>
</html>