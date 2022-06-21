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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<?php

    $sql_Users = "SELECT * FROM `Users` LIMIT 5";
    $result_Users = mysqli_query($conn,$sql_Users);
    $row_Users = mysqli_fetch_all($result_Users,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_Users);
    // echo "</pre>";

    $sql_products = "SELECT * FROM `Products` LIMIT 5";
    $result_Products = mysqli_query($conn,$sql_products);
    $row_Products = mysqli_fetch_all($result_Products,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_Products);
    // echo "</pre>";

    $sql_Orders = "SELECT * FROM `Orders` LIMIT 5";
    $result_Orders = mysqli_query($conn,$sql_Orders);
    $row_Orders = mysqli_fetch_all($result_Orders,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_Orders);
    // echo "</pre>";

    $sql_OrderItem = "SELECT * FROM `OrderItems` LIMIT 5";
    $result_OrderItem = mysqli_query($conn,$sql_OrderItem);
    $row_OrderItem = mysqli_fetch_all($result_OrderItem,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_OrderItem);
    // echo "</pre>";
?>

<body>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                <button class="mb-0 me-5 Users">Users</button>
                <button class="mb-0 me-5" class="products">prducts</button>
                <button class="mb-0 me-5" class="Orders">Orders</button>
                <button class="mb-0 me-5" class="orderItem">orderItem</button>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">recent Users</h6>
                        <a href="" class="Users">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                                    <th scope="col">userid</th>
                                    <th scope="col">username</th>
                                    <th scope="col">email</th>
                                    <th scope="col">user_password</th>
                                    <th scope="col">role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=0;$i<count($row_Users);$i++){ ?>
                                   <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $row[$i]['userid']; ?></td>
                                    <td><?php echo $row[$i]['username']; ?></td>
                                    <td><?php echo $row[$i]['email']; ?></td>
                                    <td><?php echo $row[$i]['user_password']; ?></td>
                                    <td><?php echo $row[$i]['role']; ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Edit</a></td>
                                    <td><button class="btn btn-sm btn-primary deleterow" href="">Delete</button></td>
                                    </tr>
                               <?php
                                }
                                ?>
                               
                                <!-- <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr> -->
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">recent Products</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">prod_id</th>
                                    <th scope="col">prod_name</th>
                                    <th scope="col">prod_image</th>
                                    <th scope="col">quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=0;$i<count($row_Users);$i++){ ?>
                                    <tr>
                                    <td><?php echo $row_Products[$i]['prod_id']; ?></td>
                                    <td><?php echo $row_Products[$i]['prod_name']; ?></td>
                                    <td><?php echo $row_Products[$i]['prod_price']; ?></td>
                                    <td><?php echo $row_Products[$i]['quantity']; ?></td>
                                    </tr>
                               <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">recent Orders</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Order_id</th>
                                    <th scope="col">userid</th>
                                    <th scope="col">f_name</th>
                                    <th scope="col">l_name</th>
                                    <th scope="col">user_name</th>
                                    <th scope="col">status</th>
                                    <th scope="col">total_amount</th>
                                    <th scope="col">email</th>
                                    <th scope="col">order_date</th>
                                    <th scope="col">delivery_date</th>
                                    <th scope="col">address</th>
                                    <th scope="col">total_amount</th>
                                    <th scope="col">country</th>
                                    <th scope="col">state</th>
                                    <th scope="col">pin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=0;$i<count($row_Users);$i++){ ?>
                                    <tr class="Orders" id="<?php echo $i; ?>">
                                    <td><?php echo $row_Orders[$i]['order_id']; ?></td>
                                    <td><?php echo $row_Orders[$i]['userid']; ?></td>
                                    <td><?php echo $row_Orders[$i]['f_name']; ?></td>
                                    <td><?php echo $row_Orders[$i]['l_name']; ?></td>
                                    <td><?php echo $row_Orders[$i]['user_name']; ?></td>
                                    <td><?php echo $row_Orders[$i]['status']; ?></td>
                                    <td><?php echo $row_Orders[$i]['total_amount']; ?></td>
                                    <td><?php echo $row_Orders[$i]['email']; ?></td>
                                    <td><?php echo $row_Orders[$i]['order_date']; ?></td>
                                    <td><?php echo $row_Orders[$i]['delivery_date']; ?></td>
                                    <td><?php echo $row_Orders[$i]['address']; ?></td>
                                    <td><?php echo $row_Orders[$i]['country']; ?></td>
                                    <td><?php echo $row_Orders[$i]['state']; ?></td>
                                    <td><?php echo $row_Orders[$i]['pin']; ?></td>
                                    </tr>
                               <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

           

    <script>
       $(document).ready(function(){
         $(document).on("click",".Users",function(){
             alert("hello");
             window.location='users.php';
         })
        });
            </script>


        <?php

        ?>

            
</body>

</html>