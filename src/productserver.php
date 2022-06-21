<?php
 include "connection.php";
if(isset($_POST['display_all_product'])){
    display();
}
    function display(){
        include "connection.php";
        $sql = "SELECT * from Products";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        //  var_dump($row);
        $text ="";
        $text.="<thead>
        <tr class='text-dark bg-warning'>
            <th scope='col'>prod_id</th>
            <th scope='col'>prod_name</th>
            <th scope='col'>prod_price</th>
            <th scope='col'>quantity</th>
            <th scope='col'>Action</th>
            <th scope='col'>Action</th>
        </tr>
        </thead>";
        $text.="<tbody>";
    
            for($i=0;$i<count($row);$i++){ 
                $text.="<tr>
                <td>".$row[$i]['prod_id']."</td>
                <td>".$row[$i]['prod_name']."</td>
                <td>".$row[$i]['prod_price']."</td>
                <td>".$row[$i]['quantity']."</td>

                <td><button data-bs-toggle='modal' data-bs-target='#Modal_button_edit' class='btn btn-sm btn-primary edit_row' id=".$row[$i]['prod_id'].">Edit</button></td>
                <td><button id=".$row[$i]['prod_id']." class='btn btn-sm btn-primary delete_row'>Delete</button></td>
                </tr>";
            }
        $text.="</tbody>";
        echo $text;
    }
    if(isset($_POST['p_id'])){
        $p_id = $_POST['p_id'];
        $sql = "DELETE FROM `Products` WHERE `Products`.`prod_id` = '$p_id'";
        $result= mysqli_query($conn,$sql);
        if($result){
            echo "delete successfully";
        }
        else{
            echo mysqli_error($conn);
        }
    }

    if(isset($_POST['pid'])){
        $prod_id = $_POST['pid'];
        $sql = "select * from Products where Products.prod_id = '$prod_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);

    }

    if(isset($_POST['pr_id'])){
        $prod_id = $_POST['pr_id'];
        $prod_name = $_POST['pr_name'];
        $prod_price = $_POST['pr_price'];
        $prod_quan = $_POST['pr_quan'];
        
        $sql = "update Products set prod_id='$prod_id',prod_name='$prod_name',prod_price='$prod_price',quantity='$prod_quan' where `Products`.`prod_id` = '$prod_id'";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "editted";
        }
        else{
            echo mysqli_error($conn);
        }

    }


    if(isset($_POST['pr_name'])){
        //echo "sujeet";
        $prod_name = $_POST['pr_name'];
        $prod_price = $_POST['pr_price'];
        $prod_image = $_POST['pr_image'];
        $prod_quan = $_POST['pr_quan'];
        $prod_description = $_POST['pr_description'];
        // echo  $_POST['pr_image'];
        // echo $prod_quan;
        $sql = "INSERT INTO `Products`(`prod_name`, `prod_price`, `prod_image`, `quantity`,`description`) VALUES ('$prod_name','$prod_price','$prod_image','$prod_quan','$prod_description')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "inserted successfull";
        }
        else{
            echo "not inserted";
            echo mysqli_error($conn);
        }
    }

    
?>
