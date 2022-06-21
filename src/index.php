<?php session_start(); ?>

<!DOCTYPE html>
<?php
     include 'connection.php'; 
     if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    } 

    // if(!isset($_SESSION['items'])){
    //     $_SESSION['items']= array('quantity'=>0);
    // }
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    
</head>
<body>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info" >
        <h5 class="modal-title" id="staticBackdropLabel">About Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="text-center" id="disp_image">
           <img id="prod_img" src="https://d2d22nphq0yz8t.cloudfront.net/88e6cc4b-eaa1-4053-af65-563d88ba8b26/https://media.croma.com/image/upload/v1649399813/Croma%20Assets/Communication/Mobiles/Images/251267_sgrihb.png/mxw_640,f_auto" alt="" style="height:400px">
      </div>

      <div class="d-flex flex-row-reverse me-2">
        <span><i class="bi bi-star-half text-warning" style="font-size:1.37rem"></i></span>
        <span><i class="bi bi-star-fill text-warning" style="font-size:1.37rem"></i></span>
        <span><i class="bi bi-star-fill text-warning" style="font-size:1.37rem"></i></span>
        <span><i class="bi bi-star-fill text-warning" style="font-size:1.37rem"></i></span>
        <span><i class="bi bi-star-fill text-warning" style="font-size:1.37rem"></i></span><hr>
      </div>
      <div>
          <span class="fw-bold ps-3">product Id :</span><span class="ps-1" id="p_id">10012</span><hr>
          <span class="fw-bold ps-3">product Name :</span><span class="ps-1" id="p_name">Samsung</span><hr>
          <span class="fw-bold ps-3">product Price :</span><span class="ps-1" id="p_price">10000</span><hr>
          <span class="fw-bold ps-3">product Description :</span>
          <p class="ps-3 pe-3" id="p_description">Lorem ipsum, dolor  sit amet consectetur adipisicing elit. Maiores, repellendus!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>


    
    <!-- <div><a href="test.php">Session destroy</a></div> -->
    <!-- Navigation-->
<section style="min-width: 400px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Start Shopping</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
               <?php
                     if(isset($_SESSION['id'])){
                         if($_SESSION['id']=='50'){?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="admin.php">Admin</a></li>
                   <?php }
                     }
                ?>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about_us.html">About</a></li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li> -->
                </ul>
                <!-- <form class="d-flex"> -->
                    <div class="d-flex">
                        <!-- <a class="btn btn-outline-dark" type="submit" href="display_cart.php"> -->
                        <a class="btn btn-outline-dark" type="submit" href="#" id="check_cart_empty">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span id="temp_display_cart" class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        </a>
    
                    <?php
                    if(isset($_SESSION['id'])){ ?>
                       <button class='btn btn-outline-dark ms-1' id='logoutbtn'>logout</button>
                   <?php }
                    else{ ?>
                        <button class='btn btn-outline-dark ms-1' 
                        id='loginbtn'>login</button>
                   <?php }
                    ?>
                    
                    <!-- <button class="btn btn-outline-dark ms-1" id="logout">
                        logout
                    </button> -->
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 ">
            <!-- <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div> -->



            <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="phones1.jpg" class="d-block" alt="..." width="100%" height="400">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 style="color:blue;">Gift your Parents</h1>
                            <h5 style="display:inline-block;color:blue;">Festival  mobile Sets</h5>
                            <h2 style="display:inline_blick;color:blue;"> Upto 70% off</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="phones2.jpg" class="d-block" alt="..." width="100%" height="400">
                        <div class="carousel-caption d-none d-md-block">
                            <h4 class="text-primary">Shop Mobiles</h4>
                            <h4 class='text-primary'>and Accessories</h4>
                            <!-- <p></p> -->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="phones3.jpg" class="d-block" alt="..." width="100%" height="400">
                        <div class="carousel-caption d-none d-md-block">
                            <h4 class="text-warning">Exchange your Old Phones</h4>
                            <h5 class="text-success">With the Brand New One</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <!-- <div id='display'></div> -->
            <?php 
             $sql = "SELECT * FROM Products";
             $result = mysqli_query($conn,$sql);

             if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <!-- <img class="card-img-top" src="<?php echo $row['prod_image']?>" alt="..." /> -->

                        <a id="<?php echo $row['prod_id']?>"href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img class="card-img-top" src="<?php echo $row['prod_image']?>" alt=""></a>


                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h4 class="fw-bolder"><?php echo $row['prod_id']?></h4>
                                <h5 class="fw-bolder"><?php echo $row['prod_name']?></h5>
                                <!-- Product price-->
                                <h6><?php echo "$".$row['prod_price']?></h6>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a id="<?php echo $row['prod_id']?>" class="btn btn-outline-dark mt-auto" href="?p_id=<?php echo $row['prod_id']?>">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
             <?php }    
             }
             ?>
                
            <?php
               
                $sql = "SELECT * FROM Products";
                $result = mysqli_query($conn,$sql);
               
                // if(!isset($_SESSION['cart'])){
                //     $_SESSION['cart']=array();
                // }    
                if(isset($_GET['p_id'])){
                    $product_id = $_GET['p_id'];
                }

                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
             
                for($i=0;$i<count($row);$i++){
                    if($product_id == $row[$i]['prod_id']){
                        $p_price = $row[$i]['prod_price'];

                        for($j=0;$j<count($_SESSION['cart']);$j++){  
                            if($_SESSION['cart'][$j]['prod_id']==$product_id){
                                $_SESSION['cart'][$j]['quantity']+=1;
                                $quantity = $_SESSION['cart'][$j]['quantity'];
                                $_SESSION['cart'][$j]['prod_price']=$p_price*$quantity;
                                break;
                            }
                        }
                      
                        if($j==count($_SESSION['cart'])){
                            $_SESSION['cart'][]=$row[$i];
                        }
                    }
                }
                // echo "<pre>";
                // var_dump($_SESSION['cart']);
                // echo "</pre>";
            ?>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
        <div class="modal-body text-center">
          <div><i class="bi bi-cart-x danger" style="font-size:5rem"></i></div>
          <h4>CART IS EMPTY</h4>
        </div>
        <div class="modal-footer">
          <button type="button" id="go_to_home" class="btn btn-success" data-bs-dismiss="modal">close</button>
        </div>
      </div>
    </div>
  </div>


 <script>
     $(document).ready(function(){
         countCart();
         function countCart(){
             $.ajax({
                 url : "count.php",
                 type : "POST",
                 data :{count : true },
                 success : function(result){
                    console.log("function "+result);
                    $('#temp_display_cart').html(result);
                    $("#check_cart_empty").on("click",function(){
                        if(result==0){
                            $("#exampleModal").modal("show");
                           // alert("zero");
                        }
                        else{
                            window.location='display_cart.php';
                        }
                    })
                 }
             });
         } 
        $(document).on("click","#logoutbtn",function(){
            $.ajax({
               url:'checkloginlogout.php',
               method:'POST',
               data:{'logout_value':1},
               success:function(result){
            //    console.log(result);
                if(result == "sujeet"){
                    window.location = 'index.php';
                }
               }
           });
        });
        $(document).on("click","#loginbtn",function(){
            window.location='login.php';
           });
        $("a").click(function(){
           // alert($(this).attr('id'));
            var pr_id = $(this).attr('id');
            $.ajax({
                url:'display_modal.php',
                method:'POST',
                data:{'product_id':pr_id},
                success:function(result){
                   console.log(result);
                   var product = JSON.parse(result);
                   console.log(product);
                   $("#p_id").text(product[0]['prod_id']);
                   $("#p_name").text(product[0]['prod_name']);
                   $("#p_price").text(product[0]['prod_price']);
                   $('#prod_img').attr('src', product[0]['prod_image']);
                   $('#p_description').text(product[0]['description']);
                }
            });  
        });

        // $("#check_cart_empty").on("click",function(){
        //     //alert("hello");
        //     // var c= countCart();
        //     //console.log("button: "+countCart());
        //     // countCart();
        // })
    });
 </script>

</body>

</html>