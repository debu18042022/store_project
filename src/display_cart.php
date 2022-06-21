<?php
    session_start();
    include 'connection.php'; 
    if(count($_SESSION['cart'])==''){
      
      header('location: ./index.php');
      //exit();
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


</head>

<body>
  <section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">

          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            <!-- <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p>
          </div> -->
          </div>

          <?php
            for($i=0;$i<count($_SESSION['cart']);$i++){?>
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="<?php echo $_SESSION['cart'][$i]['prod_image'];?>" class="img-fluid rounded-3"
                    alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">
                    <?php echo $_SESSION['cart'][$i]['prod_id'];?>
                  </p>
                  <p class="lead fw-normal mb-2">
                    <?php echo $_SESSION['cart'][$i]['prod_name'];?>
                  </p>
                  <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex" id="divclick">
                  <button class="adjust_button"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus">-</i>
                  </button>

                  <input id="<?php echo $i; ?>" min="0" name="quantity"
                    value="<?php echo $_SESSION['cart'][$i]['quantity']?>" type="number"
                    class="form-control form-control-sm manage_quantity sahu" readonly />

                  <input type="hidden" id="<?php echo $_SESSION['cart'][$i]['prod_id'];?>" name="custId" value="">

                  <button class="adjust_button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus">+</i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">$
                    <?php echo $_SESSION['cart'][$i]['prod_price']?>.00
                  </h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="#!" class="delete_record" id="<?php echo $i; ?>"><i class="bi bi-archive-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php  }  ?>

          <!-- <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Discount code</label>
            </div>
            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
          </div>
        </div> -->

          <div class="card">
            <div class="card-body">
              <div class="float-end">
              <span>Total Price : </span><span><?php
                $price =0;
                for($i=0;$i<count($_SESSION['cart']);$i++){
                 $price = $price + $_SESSION['cart'][$i]['prod_price'];
                }
                echo $price;
              ?></span>
              </div>
              <a href="checkout.php" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
              <!-- <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button> -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>


  <script>
    $(document).ready(function () {
      $(document).on("click", ".adjust_button", function () {
        var value = $(this).parent().children().eq(1).val();
        var id = $(this).parent().children().eq(1).attr('id');
        var product_id = $(this).parent().children().eq(2).attr('id');

        //alert(value);
        //alert(id);
        //alert(product_id);

        $.ajax({
          url: 'display_cart.php',
          method: 'GET',
          data: { 'quan': value, 'index': id, 'p_id': product_id },
          success: function (result) {
            location.reload();
            //  alert(result);
          }
        });
      });

      $(document).on("click", ".delete_record", function () {
        // alert($(this).attr('id'));
        //  $(this).parent().parent().remove();
        // alert( $(this).parent().parent().parent().remove());
        //  $(this).parent().parent().parent().parent().remove();

        var del_index = $(this).attr('id');
        $.ajax({
          url: 'display_cart.php',
          method: 'GET',
          data: { 'delete_index': del_index },
          success: function (result) {
            location.reload();
            // alert(result);
          }
        });
      });
    });
  </script>
  <?php
  if(isset($_GET['quan'])){
   // echo "hello";
    $quan = $_GET['quan'];
    $index = $_GET['index'];
    $product_id = $_GET['p_id'];

    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for($i=0;$i<count($row);$i++){
      if($product_id == $row[$i]['prod_id']){
         $price = $row[$i]['prod_price'];
      }
    }
    $_SESSION['cart'][$index]['quantity']=$quan;
    $_SESSION['cart'][$index]['prod_price']=$price*$quan;
    
   // echo $_SESSION['cart'];
}

  if(isset($_GET['delete_index'])){
   // echo "hello";
    $del_index = $_GET['delete_index'];
    array_splice($_SESSION['cart'],$del_index,1);
    $_session['items']['quantity'] = $_session['items']['quantity'] - 1;
  }
?>

<?php } ?>
</body>

</html>