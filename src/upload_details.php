<?php
    session_start();
    include './connection.php';

    if(isset($_POST['f_name'])){
      //  echo "hello";
        
        $first_name = $_POST['f_name'];
        $last_name = $_POST['l_name'];
        $mail = $_POST['mail'];
        $address = $_POST['add'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $pin = $_POST['pin'];

        $userid = $_SESSION['id'];
        $total_amount = 0;

        for($i=0;$i<count($_SESSION['cart']);$i++){
            $total_amount += $_SESSION['cart'][$i]['prod_price']; 
            echo "total amount is".$total_amount;
        }
         
        $sql = "CREATE TABLE IF NOT EXISTS Orders(order_id int(6) UNSIGNED       AUTO_INCREMENT PRIMARY KEY,
        userid int UNSIGNED NOT NULL,
        f_name varchar(100) NOT NULL, 
        l_name varchar(100) NOT NULL, 
        user_name varchar(100) NOT NULL,
        status varchar(100) NOT NULL,
        total_amount int(100) NOT NULL,
        email varchar(100) NOT NULL,
        order_date datetime,
        delivery_date datetime,
        address varchar(500) NOT NULL,
        country varchar(100) NOT NULL,
        state varchar(100) NOT NULL, 
        pin varchar(100) NOT NULL,
        FOREIGN KEY(userid) REFERENCES Users(userid))";

        $result = mysqli_query($conn,$sql);

        // if(!$result){
        //     echo "table_error".mysqli_error($conn);
        // }
        // else{
        //     echo "created table successfully";
        // }

        $sql = "INSERT INTO Orders(`userid`,`f_name`,`l_name`,`status`,`total_amount`,`email`,`order_date`,`delivery_date`,`address`,`country`,`state`,`pin`)
                VALUES('$userid','$first_name','$last_name','pending','$total_amount','$mail',now(),now()+interval 1 day,'$address','$country','$state','$pin')"; 
        
        $result = mysqli_query($conn,$sql); 

        if($result){
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $stmt = "CREATE TABLE IF NOT EXISTS OrderItems (order_id int unsigned NOT NULL,p_id int NOT NULL,
                 p_name varchar(100) NOT NULL, price int(100) NOT NULL, quantity int (100) NOT NULL, FOREIGN KEY (order_id) REFERENCES Orders(order_id))";

        $res = mysqli_query($conn,$stmt);
       // var_dump($_SESSION['cart']);
        
        foreach($_SESSION['cart'] as $value){
            $statement="INSERT INTO OrderItems(`order_id`,`p_id`,`p_name`,`price`,`quantity`)
            VALUES($last_id,'".$value['prod_id']."','".$value['prod_name']."','".$value['prod_price']."','".$value['quantity']."')"; 
            echo $statement;

            mysqli_query($conn,$statement);
        }
        
        if(mysqli_query($conn,$statement)){
           $_SESSION['cart']=array();
        }
        
        
    }
?>