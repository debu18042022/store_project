<?php
    include 'connection.php';
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>



<body>
  <section style="min-width: 400px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container px-4 px-lg-5 bg-info">
        <a class="navbar-brand" href="#!">ADMIN DASHBOARD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->

          </ul>
          <button class='btn btn-outline-dark ms-1' id='logoutbtn'>logout</button>

          <a class='btn btn-outline-dark ms-1' id='loginbtn' href="admin.php">Back</a>

        </div>
      </div>
    </nav>
  </section>



  <?php

$limit = 5;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$offset = ($page-1)*$limit;
$sql = "SELECT * from Orders LIMIT {$offset},{$limit}";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
// echo "<pre>";
// var_dump($row);
// echo "<pre>";

?>

  <div class="container-fluid pt-4 px-4 bg-info">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">ALL Orders</h6>
      </div>
      <div class="table-responsive">
        <table id="display_table" class="table text-start align-middle table-bordered table-hover mb-0">
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editBtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">order Id:</label>
              <input type="text" class="form-control" disabled id="orderid" value="123">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">user Id:</label>
              <input type="text" class="form-control" disabled id="userid" value="123">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">first Name:</label>
              <input type="text" class="form-control" id="firstname">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">last Name:</label>
              <input type="text" class="form-control" id="lastname">
            </div>
            <div class="mb-3">
              <label for="status" class="col-form-label">status:</label>
              <!-- <input type="text" class="form-control" id="recipient-name"> -->
              <select class="form-select" id="status" aria-label="Default select example">
                <option selected disabled>Select status</option>
                <option value="1">pending</option>
                <option value="2">approved</option>
                <option value="3">delivered</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label"> total Amount:</label>
              <input type="text" class="form-control" id="amount">
            </div>
            <div class="mb-3">
              <label for="email" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="ordr_date" class="col-form-label">Order Date:</label>
              <input type="text" class="form-control" id="ordr_date">
            </div>
            <div class="mb-3">
              <label for="deliv_date" class="col-form-label">delivery Date:</label>
              <input type="text" class="form-control" id="deliv_date">
            </div>
            <div class="mb-3">
              <label for="address" class="col-form-label">address:</label>
              <input type="text" class="form-control" id="address">
            </div>
            <div class="mb-3">
              <label for="country" class="col-form-label">country:</label>
              <input type="text" class="form-control" id="country">
            </div>
            <div class="mb-3">
              <label for="state" class="col-form-label">state:</label>
              <input type="text" class="form-control" id="state">
            </div>
            <div class="mb-3">
              <label for="pin" class="col-form-label">pin:</label>
              <input type="text" class="form-control" id="pin">
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="editedContentBtnId" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      display_all_orders();

      function display_all_orders() {
        $.ajax({
          url: 'orderserver.php',
          method: 'POST',
          data: { 'display_all_orders': true },
          success: function (result) {
            // console.log(result);
            $('#display_table').html(result);
          }
        });
      }

      $("#display_table").on("click", ".delete_row", function () {
        alert($(this).attr('id'));
        var o_id = $(this).attr('id');
        $.ajax({
          url: 'orderserver.php',
          method: 'POST',
          data: { 'order_id': o_id },
          success: function (result) {
            alert(result);
            display_all_orders();
          }
        });
      })

      $("#display_table").on("click", ".edit_row", function () {
        //alert("hello");
        var order_id = $(this).attr('id');
        console.log(order_id);
        $.ajax({
          url: 'orderserver.php',
          method: 'POST',
          data: { 'ord_id': order_id },
          success: function (result) {
            //console.log(result);
            var order = JSON.parse(result);
            console.log(order);
            $("#orderid").val(order[0]['order_id']);
            $("#userid").val(order[0]['userid']);
            $("#firstname").val(order[0]['f_name']);
            $("#lastname").val(order[0]['l_name']);
            // $("#status").val(order[0]['status']);
            $("#amount").val(order[0]['total_amount']);
            $("#email").val(order[0]['email']);
            $("#ordr_date").val(order[0]['order_date']);
            $("#deliv_date").val(order[0]['delivery_date']);
            $("#address").val(order[0]['address']);
            $("#country").val(order[0]['country']);
            $("#state").val(order[0]['state']);
            $("#pin").val(order[0]['pin']);
          }
        });
      });

      $("#editedContentBtnId").click(function () {
        //alert("helloo");
        var Order_Id = $("#orderid").val();
        var First_Name = $("#firstname").val();
        var Last_Name = $("#lastname").val();
        var Status = $("#status option:selected").text();
        var Amount = $("#amount").val();
        var Email = $("#email").val();
        var Order_Date = $("#ordr_date").val();
        var Delivery_Date = $("#deliv_date").val();
        var Address = $("#address").val();
        var Country = $("#country").val();
        var State = $("#state").val();
        var Pin = $("#pin").val();

        $.ajax({
          url: 'orderserver.php',
          method: 'POST',
          data: { ORD_ID: Order_Id, F_NAME: First_Name, L_NAME: Last_Name, STATUS: Status, AMOUNT: Amount, EMAIL: Email, O_DATE: Order_Date, D_DATE: Delivery_Date, ADDRESS: Address, COUNTRY: Country, STATE: State, PIN: Pin },
          success: function (result) {
            console.log(result);
            display_all_orders();
          }
        });
      });

      $(document).on("click", "#logoutbtn", function () {
        $.ajax({
          url: 'checkloginlogout.php',
          method: 'POST',
          data: { 'logout_value': 1 },
          success: function (result) {
            //    console.log(result);
            if (result == "sujeet") {
              window.location = 'index.php';
            }
          }
        });
      });
    });
  </script>




</body>

</html>