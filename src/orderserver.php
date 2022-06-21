<?php
include 'connection.php';
if(isset($_POST['display_all_orders'])){
    display();
}
    function display(){
        include "connection.php";
        $sql = "SELECT * from Orders";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        //  var_dump($row);
        $text ="";
        $text.="<thead>
        <tr class='text-dark bg-warning'>
            <th scope='col'>order_id</th>
            <th scope='col'>userid</th>
            <th scope='col'>f_name</th>
            <th scope='col'>l_name</th>
            <th scope='col'>status</th>
            <th scope='col'>total_amount</th>
            <th scope='col'>email</th>
            <th scope='col'>order_date</th>
            <th scope='col'>delivery_date</th>
            <th scope='col'>address</th>
            <th scope='col'>country</th>
            <th scope='col'>state</th>
            <th scope='col'>pin</th>
            <th scope='col'>Action</th>
            <th scope='col'>Action</th>
        </tr>
        </thead>";
        $text.="<tbody>";
    
            for($i=0;$i<count($row);$i++){ 
                $text.="<tr>
                <td>".$row[$i]['order_id']."</td>
                <td>".$row[$i]['userid']."</td>
                <td>".$row[$i]['f_name']."</td>
                <td>".$row[$i]['l_name']."</td>
                <td>".$row[$i]['status']."</td>
                <td>".$row[$i]['total_amount']."</td>
                <td>".$row[$i]['email']."</td>
                <td>".$row[$i]['order_date']."</td>
                <td>".$row[$i]['delivery_date']."</td>
                <td>".$row[$i]['address']."</td>
                <td>".$row[$i]['country']."</td>
                <td>".$row[$i]['state']."</td>
                <td>".$row[$i]['pin']."</td>
                <td><button id=".$row[$i]['order_id']." data-bs-toggle='modal' data-bs-target='#editBtnModal' class='btn btn-sm btn-primary edit_row'>Edit</button></td>
                <td><button id=".$row[$i]['order_id']." class='btn btn-sm btn-primary delete_row'>Delete</button></td>
                </tr>";
            }
        $text.="</tbody>";
        echo $text;
    }


    if(isset($_POST['order_id'])){
        $orderid = $_POST['order_id'];
       // echo " hello sujeet";
        $sql = "DELETE FROM `Orders` WHERE `Orders`.`order_id` = '$orderid'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "delete successfully";
        }
        else{
            echo  mysqli_error($conn);
            echo  "not delete";
        }
    }

    if(isset($_POST['ord_id'])){
       
        $ord_id = $_POST['ord_id'];
        $sql = "SELECT * from Orders where Orders.order_id = '$ord_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        if($result){
          //  echo "successfull execute";
        }
        else{
          //  echo mysqli_error($conn);
        }
        echo json_encode($row);
    }



    if(isset($_POST['ORD_ID'])){
        //echo "sahu";
        $Order_Id = $_POST['ORD_ID'];
        $First_Name = $_POST['F_NAME'];
        $Last_Name = $_POST['L_NAME'];
        $Status = $_POST['STATUS'];
        $Amount = $_POST['AMOUNT'];
        $Email = $_POST['EMAIL'];
        $Order_Date = $_POST['O_DATE'];
        $Delivery_Date = $_POST['D_DATE'];
        $Address = $_POST['ADDRESS'];
        $Country = $_POST['COUNTRY'];
        $State = $_POST['STATE'];
        $Pin = $_POST['PIN'];
    
        $sql = "UPDATE Orders SET `f_name`='$First_Name', `l_name`='$Last_Name', `status`='$Status', `total_amount`='$Amount', `email`='$Email', `order_date`='$Order_Date',`delivery_date`='$Delivery_Date', `address`='$Address', `country`='$Country', `state`='$State', `pin`='$Pin' where `order_id`='$Order_Id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "editted successfully";
        }
        else{
            echo "not ediited";
            echo mysqli_error($conn);
        }
    }
    
?>