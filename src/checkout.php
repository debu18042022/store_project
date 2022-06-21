<?php
  session_start();
  if(isset($_SESSION['id'])){
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Checkout example · Bootstrap</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body class="bg-light">
  <div class="container">

    <div class="row">

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <!-- <form class="needs-validation was-validated" novalidate="">  -->
        <div class="needs-validation was-validated" novalidate="">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <!-- <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required="">
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div> -->
          <div class="mb-3">
            <label for="email">Email <span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required="">
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" id="state" required="">
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Pin</label>
              <input type="text" class="form-control" id="pin" placeholder="" required="">
              <div class="invalid-feedback">
                Pin code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">

          <hr class="mb-4">

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required="">
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required="">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <hr class="mb-4">

          <button class="btn btn-primary btn-lg btn-block checkout">Continue to checkout</button>
          <!-- </form> -->
        </div>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2017-2020 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dear Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">thank you for your order!</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Prod ID:</label>
                <input type="text" class="form-control" disabled id="prodid" value="123">
              </div>
            </form> -->
          <p class="me-1 fw-light">The estimated delivery date is based on the handling time and warehouse processing
            time.</p>
          <p class="me-1 fw-light">In certain cases the delivery date will vary<br>
            You will receive a tracking number by email once your package ships.You can check the status of your order
            on our App.</p>
          <p class="me-1 fw-light">Find your order confirmation below.thank you again for ordering from <span
              class="fw-normal">Shopvella</span></p>
          <p class="fw-light">For any changes to this order , Contact order Help Desk</p>
          </p>
          <h6>Order Help-Desk:+9213854</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closebtn" data-bs-dismiss="modal">close</button>
          <!-- <button type="button" id="editedContentBtnId" class="btn btn-primary">Edit</button> -->
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body">
        <p>Fields Never be Empty</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
      $(document).on("click", ".checkout", function (){
        // alert("hello");
        let first_name = $("#firstName").val();
        let last_name = $("#lastName").val();
        let email = $("#email").val();
        let address = $("#address").val();
        let country = $("#country").val();
        let state = $("#state").val();
        let zip = $("#pin").val();
        let card = $("#cc-name").val();
        let card_number =$("#cc-number").val();
        let expiration_number = $("#cc-expiration").val();
        let cvv_number = $("#cc-cvv").val();
        //   alert(first_name+""+last_name+""+user_name+""+email+""+address+""+country+""+state+""+zip);
        if (first_name.length > 0 && last_name.length > 0 && email.length > 0 && address.length > 0 && country.length > 0 && state.length > 0 && zip.length > 0 &&  card.length > 0 && card_number.length > 0 && expiration_number.length > 0 && cvv_number.length > 0) {
          $("#myModal").modal('show');
          $.ajax({
            url: 'upload_details.php',
            method: 'POST',
            data: { 'f_name': first_name, 'l_name': last_name, 'mail': email, 'add': address, 'country': country, 'state': state, 'pin': zip },
            success: function (result) {
              console.log(result);
              $("#firstName").val('');
              $("#lastName").val('');
              $("#email").val('');
              $("#address").val('');
              $("#country").val('');
              $("#state").val('');
              $("#pin").val('');
              $("#cc-name").val('');
              $("#cc-number").val('');
              $("#cc-expiration").val('');
              $("#cc-cvv").val('');
            }
          });
        }
        else {
           //alert("first name field is required");
            $("#exampleModal").modal('show');
          }
        //}
      });
      $(".closebtn").on("click", function (){
        window.location = 'index.php';
      });
    });
  </script>

     <?php
             }
             else{
               header('location: ./login.php');
             }
       ?>



</body>

</html>