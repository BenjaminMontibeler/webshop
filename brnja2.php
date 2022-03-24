<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/brnja2style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://kit.fontawesome.com/de3354ea74.js" crossorigin="anonymous"></script>
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
                    <h3>LOG IN</h3>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your username *" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" name="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                    <?php
                      if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                          echo "<p class='text-danger'>All fields must be filled in!</p>";
                        }
                        else if($_GET["error"] == "wronglogin"){
                          echo "<p class='text-danger'>Incorrect username or password!</p>";
                        }
                      }
                    ?>
                    
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>REGISTER</h3>
                    <form action="includes/registration2.php" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your username *" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" name="submit" class="btnSubmit" value="Register" />
                        </div>
                    </form>
                    <?php
                      if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                          echo "<p class='text-danger'>All fields must be filled in!</p>";
                        }
                        else if($_GET["error"] == "invaliduid"){
                          echo "<p class='text-danger'>Chose a proper username!</p>";
                        }
                        else if($_GET["error"] == "nametaken"){
                          echo "<p class='text-danger'>Username already taken!</p>";
                        }
                        else if($_GET["error"] == "none"){
                          echo "<p class='text-primary'>Sign up succesful! Log in to continue shopping.</p>";
                        }
                      }
                    ?>
                </div>
            </div>
        </div>

        
    </body>
</html>