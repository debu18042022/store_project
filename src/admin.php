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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<?php

    $sql_Users = "SELECT * FROM `Users` order by `Users`.`userid` desc LIMIT 5 ";
    $result_Users = mysqli_query($conn,$sql_Users);
    $row_Users = mysqli_fetch_all($result_Users,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_Users);
    // echo "</pre>";

    // $sql_products = "SELECT * FROM `Products` LIMIT 5";
    $sql_products = "SELECT * FROM `Products` ORDER BY `prod_id` DESC LIMIT 5";
    $result_Products = mysqli_query($conn,$sql_products);
    $row_Products = mysqli_fetch_all($result_Products,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_Products);
    // echo "</pre>";

    $sql_Orders = "SELECT * FROM `Orders` ORDER BY `order_id` DESC LIMIT 5";
    $result_Orders = mysqli_query($conn,$sql_Orders);
    $row_Orders = mysqli_fetch_all($result_Orders,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row_Orders);
    // echo "</pre>";
?>

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

                    <a class='btn btn-outline-dark ms-1' id='loginbtn' href="login.php">Back</a>

                </div>
            </div>
        </nav>
    </section>



    <div class="container-fluid pt-4 px-4 bg-info">
        <div class="bg-light text-center rounded p-4">
            <!-- <button class="mb-0 me-5 Users">Users</button>
                <button class="mb-0 me-5 Products" class="products">prducts</button>
                <button class="mb-0 me-5 Orders" class="Orders">Orders</button> -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Users</h6>
                <a class='btn btn-outline-dark ms-1 bg-primary' href="users.php">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark bg-warning">
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
                            <!-- <td><input class="form-check-input" type="checkbox"></td> -->
                            <td>
                                <?php echo $row_Users[$i]['userid']; ?>
                            </td>
                            <td>
                                <?php echo $row_Users[$i]['username']; ?>
                            </td>
                            <td>
                                <?php echo $row_Users[$i]['email']; ?>
                            </td>
                            <td>
                                <?php echo $row_Users[$i]['user_password']; ?>
                            </td>
                            <td>
                                <?php echo $row_Users[$i]['role']; ?>
                            </td>
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

    <div class="container-fluid pt-4 px-4 bg-info">
        <div class="bg-light text-center rounded p-4 ">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Products</h6>
                <a class='btn btn-outline-dark ms-1 bg-primary' href="products.php">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark bg-warning">
                            <th scope="col">prod_id</th>
                            <th scope="col">prod_name</th>
                            <th scope="col">prod_image</th>
                            <th scope="col">quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                for($i=0;$i<count($row_Products);$i++){ ?>
                        <tr>
                            <td>
                                <?php echo $row_Products[$i]['prod_id']; ?>
                            </td>
                            <td>
                                <?php echo $row_Products[$i]['prod_name']; ?>
                            </td>
                            <td>
                                <?php echo $row_Products[$i]['prod_price']; ?>
                            </td>
                            <td>
                                <?php echo $row_Products[$i]['quantity']; ?>
                            </td>
                        </tr>
                        <?php
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4 bg-info">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Orders</h6>
                <a class='btn btn-outline-dark ms-1 bg-primary' href="orders.php">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark bg-warning">
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
                            <th scope="col">country</th>
                            <th scope="col">state</th>
                            <th scope="col">pin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                for($i=0;$i<count($row_Orders);$i++){ ?>
                        <tr class="Orders" id="<?php echo $i; ?>">
                            <td>
                                <?php echo $row_Orders[$i]['order_id']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['userid']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['f_name']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['l_name']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['user_name']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['status']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['total_amount']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['email']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['order_date']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['delivery_date']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['address']; ?>
                            </td>

                            <td>
                                <?php echo $row_Orders[$i]['country']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['state']; ?>
                            </td>
                            <td>
                                <?php echo $row_Orders[$i]['pin']; ?>
                            </td>
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
        $(document).ready(function () {
            $(document).on("click", ".Users", function () {
                // alert("hello users");
                window.location = 'users.php';
            });

            $(document).on("click", ".Products", function () {
                //  alert("hello products");
                window.location = 'products.php';
            });

            $(document).on("click", ".Orders", function () {
                // alert("hello products");
                window.location = 'orders.php';
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


    <?php

        ?>


</body>

</html>