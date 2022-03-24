<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/brnja2style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://kit.fontawesome.com/8f18912fcc.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <script type = "text/javascript">
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
        <?php
            include_once 'includes/header.php';
        ?>

<div class="container login-container w-50 h-25">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>CONTACTS US</h3>
                    <p>
                    <i class="fas fa-envelope"></i> brnja@gmail.com <br>
                    <i class="fa-brands fa-instagram"></i> @brnjastore <br>
                    <i class="fa-brands fa-twitter"></i> @brnjastore <br>
                    <i class="fa-solid fa-map-location-dot"></i> Osijek <br>
                    </p>
                    
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>ABOUT US</h3>
                    <p class="text-light">
                    Brnja is an online second hand store based in Osijek. We sell exclusively used designer clothes such as Prada, Gucci, Louis Vuitton, Chanel, Balenciaga etc. <br>
                    All earnings are donated to various charities.
                    </p>
                </div>
            </div>
        </div>

        
    </body>
</html>