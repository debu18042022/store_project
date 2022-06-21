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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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

  <div class="container-fluid pt-4 px-4 bg-info">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">ALL Products</h6>
      </div>

      <div class="d-flex flex-row-reverse align-items-center justify-content-between mb-4">
          <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#add_Btn_Modal'>Add PRODUCTS</button>
      </div>

      <div class="table-responsive">
        <div class="table-responsive">
          <table id="display_table" class="table text-start align-middle table-bordered table-hover mb-0">
          </table>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Modal_button_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Prod ID:</label>
                <input type="text" class="form-control" disabled id="prodid" value="123">
              </div>
              <div class="mb-3">
                <label for="prodname" class="col-form-label">Product Name:</label>
                <input type="text" class="form-control" id="prodname">
              </div>
              <div class="mb-3">
                <label for="prodprice" class="col-form-label">Product Price:</label>
                <input type="text" class="form-control" id="prodprice">
              </div>
              <div class="mb-3">
            <label for="prodquantity" class="col-form-label">Product Quantity</label>
            <input type="text" class="form-control" id="prodquantity">
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

    <div class="modal fade" id="add_Btn_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Products</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              
              <div class="mb-3">
                <label for="prodnameAdd" class="col-form-label">Product Name:</label>
                <input type="text" class="form-control" id="prodnameAdd">
              </div>
              <div class="mb-3">
                <label for="prodpriceAdd" class="col-form-label">Product Price:</label>
                <input type="text" class="form-control" id="prodpriceAdd">
              </div>

              <div class="mb-3">
                <label for="prodimageAdd" class="col-form-label">Prod Image:</label>
                <input type="text" class="form-control" id="prodimageAdd">
              </div>

              <div class="mb-3">
               <label for="prodquantityAdd" class="col-form-label">Product Quantity</label>
               <input type="text" class="form-control" id="prodquantityAdd">
              </div>

              <div class="mb-3">
                <label for="proddescriptionAdd" class="col-form-label">Prod Description:</label>
                <input type="text" class="form-control" id="proddescriptionAdd">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="new_product" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function () {
        display_all_products();

        function display_all_products() {
          $.ajax({
            url: 'productserver.php',
            method: 'POST',
            data: { 'display_all_product': true },
            success: function (result) {
              // console.log(result);
              $('#display_table').html(result);
            }
          });
        }

        $("#display_table").on("click", ".delete_row", function () {
          var id = $(this).attr('id');
          alert(id);
          $.ajax({
            url: 'productserver.php',
            method: 'POST',
            data: { 'p_id': id },
            success: function (result) {
              console.log(result);
              display_all_products();
            }
          });
        });

        $("#display_table").on("click",".edit_row",function(){
          var id=$(this).attr('id');
          $.ajax({
            url:'productserver.php',
            method:'POST',
            data:{'pid':id},
            success:function(result){
              //console.log(result);
              var products = JSON.parse(result);
              $("#prodid").val(products[0]['prod_id']);
              $("#prodname").val(products[0]['prod_name']);
              $("#prodprice").val(products[0]['prod_price']);
              $("#prodquantity").val(products[0]['quantity']);
            }
          });
        });

        $("#editedContentBtnId").on("click",function(){
          var pid = $("#prodid").val();
          var pname = $("#prodname").val();
          var pprice = $("#prodprice").val();
          var pquan = $("#prodquantity").val();
          //alert(pid+pname+pprice+pquan);
          $.ajax({
            url:'productserver.php',
            method:'POST',
            data:{'pr_id':pid, 'pr_name':pname, 'pr_price':pprice, 'pr_quan':pquan},
            success:function(result){
              display_all_products();
              window.location='products.php';
            }
          });
        });


        $("#new_product").on("click",function(){
          var pname = $("#prodnameAdd").val();
          var pprice = $("#prodpriceAdd").val();
          var pimage = $("#prodimageAdd").val();
          var pquan = $("#prodquantityAdd").val();
          var pdescription = $("#proddescriptionAdd").val();
          // console.log(pname);
          // console.log(pprice);
          // console.log(pimage);
          // console.log(pquan);
          alert(pdescription);
          $.ajax({
            url:'productserver.php',
            method:'POST',
            data:{pr_name:pname, pr_price:pprice, pr_image:pimage, pr_quan:pquan,pr_description:pdescription},
            success:function(result){
             console.log(result);
              display_all_products();
              window.location='products.php';
            }
          });
        });

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


      });
    </script>
</body>

</html>