<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<!-- <table id="display">
    <tr>
        <th>product_id</th>
        <th>product_name</th>
        <th>product_price</th>
        <th>product_quantity</th>
    </tr>
</table> -->

<?php
    echo "<table><tr><th>product Id</th><th>product Name</th><th>product Price</th><th>product Quantity</th><th>Action</th></tr>";
    foreach($_SESSION['cart'] as $key => $value){
        echo "<tr><td>".$value['prod_id']."</td><td>".$value['prod_name']."</td><td>".$value['prod_price']."</td><td>".$value['quantity']."</td><td><a id=".$key." class='deleteitem' href='#'>Delete</a></td></tr>";
    } 
    echo "</table>";
?>

<script>
    $(document).ready(function(){
        $(document).on("click",".deleteitem",function(){
           // alert("hello");
           index = alert($(this).attr('id'));
           
        })
   });
</script>
</body>
</html>


