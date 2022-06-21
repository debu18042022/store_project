<?php
    include 'connection.php';

    if(isset($_POST['product_id']))
    // echo "hello sujeet";
    $prod_id = $_POST['product_id'];
    $sql = "select * from Products where Products.prod_id = '$prod_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);
    }
    else{
        echo mysqli_error($conn);
    }
?>



