<?php
  session_start();
  require 'config.php';
  if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST[ 'pcode'];
    
             
    $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code = ?");
    $stmt->bind_param("s", $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = isset($r['product_code']);

    if(!$code){
        $query = $conn->prepare("INSERT INTO cart (product_name, product_price, product_image, total_price, product_code) VALUES(?,?,?,?,?)");
        $query->bind_param("sssss", $pname, $pprice, $pimage, $pprice, $pcode);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible mt-2">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>item added to your cart</strong>
            </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>item already added to your cart</strong>
            </div>';
    }
      
  }

  if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
    $stmt = $conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;
    echo $rows;
  }

  if(isset($_GET['remove'])){
    $p_id = $_GET['remove'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE p_id=?");
    $stmt->bind_param("i", $p_id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed';
    header('location:../cart.php');
  }

  if(isset($_GET['clear'])){
    $stmt = $conn->prepare("DELETE FROM cart");
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All items removed';
    header('location:../cart.php');
  }

  if(isset($_GET['del'])){

    $stmt = $conn->prepare("DELETE FROM cart");
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Checkout successful';
    header('location:../cart.php');
  }
?>