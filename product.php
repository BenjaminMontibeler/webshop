<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/productstyle.css">
        <script src="javascript/productjs.js"></script>
        <script src="https://kit.fontawesome.com/de3354ea74.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </head>

    <body>
        <?php
            include_once 'includes/header.php';
            include 'includes/config.php';
            $p_id = $_GET['p_id'];
            $sql = "SELECT * FROM product WHERE p_id = '$p_id'";
            $res = mysqli_query($conn, $sql);
            if($res->num_rows>0){
              while($row = mysqli_fetch_assoc($res)){
                echo"
                <div class='container mt-5 mb-5'>
                <div class='row d-flex justify-content-center'>
                <div id='message'></div>
                <br>
                <br>
                    <div class='col-md-10'>
                        <div class='card'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='images p-3'>
                                        <div class='text-center p-4'> <img id='main-image' src=".$row['product_image']." width='400' /> </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='product p-4'>
                                        <div class='d-flex justify-content-between align-items-center'>
                                            <div class='d-flex align-items-center'>  <span class='ml-1'> <a href='all.php'>Back</a> </span> </div> </i>
                                        </div>
                                        <div class='mt-4 mb-3'> <span class='text-uppercase text-muted brand'>Brnja</span>
                                            <h5 class='text-uppercase'>".$row['product_name']."</h5>
                                            <div class='price d-flex flex-row align-items-center'> <span class='act-price'>$".$row['product_price']."</span>
                                                
                                            </div>
                                        </div>
                                        <p class='about'>".$row['info']."</p>
                                        <div class='sizes mt-5'>
                                            <h6 class='text-uppercase'>Available size: ".$row['size']."</h6> 
                                        </div>
                                        
                                        <div class='cart mt-4 align-items-center buttons'>
                                            <form action='' class='form-submit'>
                                                <input type='hidden' class='pid' value=".$row['p_id'].">
                                                <input type='hidden' class='pname' value=".$row['product_name'].">
                                                <input type='hidden' class='pprice' value=".$row['product_price'].">
                                                <input type='hidden' class='pimage' value=".$row['product_image'].">
                                                <input type='hidden' class='pcode' value=".$row['product_code'].">
                                                <button class='btn addItemBtn btn-info btn-block btn-danger text-uppercase mr-2 px-4 cart-button'> 
                                                <span class='add-to-cart'>Add to cart</span> 
                                                <span class='added'>Item added</span>
                                                <i class='fa fa-shopping-cart'></i> <i class='fa fa-square'></i>
                                                </button>
                                            </form>
                                        </div>
                                        
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
                
              }
            }


        ?>

        

 <script type="text/javascript">
        $(document).ready(function(){
            $(".addItemBtn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val(); 
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcode = $form.find(".pcode").val();

                $.ajax({
                    url: 'includes/action.php', 
                    method: 'post',
                    data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode},
                    success: function(response){
                        $("#message").html(response);
                        window.scrollTo(0,0);
                        load_cart_item_number();
                    }
                });
            });
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
        });
        </script>  
        
            <br><br>

            
    </body>
</html>