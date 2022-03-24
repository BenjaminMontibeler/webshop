
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
&nbsp;
        <div class="container d-flex justify-content-center mt-50 mb-50">
            <div class="row">
            <div id="message"></div>
                <?php
                include 'includes/config.php';
                $stmt = $conn->prepare("SELECT * FROM product");
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()):
                    
                ?>
                <div class="col-lg-4 d-flex align-items-stretch mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions">
                                <div class="card" id="crd">
                                    <a href="product.php?p_id=<?php echo $row['p_id'] ?>" class="text-default mb-2" data-abc="true"><img src="<?= $row['product_image'] ?>" class = "card-img-top"></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="mb-2">
                                    <h6 class="font-weight-semibold mb-2"> <a href="product.php?p_id=<?php echo $row['p_id'] ?>" class="text-default mb-2" data-abc="true"><?= $row['product_name'] ?></a> </h6>
                                    
                                </div>
                                <h5 class="mb-0 font-weight-semibold">$<?= number_format($row['product_price'],2); ?></h5>
                                <br>
                                <div class='cart mt-4 align-items-center buttons'>
                                    <form action="" class="form-submit">
                                        <input type="hidden" class="pid" value="<?= $row['p_id'] ?>">
                                        <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                                        <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                        <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                                        <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
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
                <?php endwhile; ?>
            </div>
        </div>
     
    </body>
</html>