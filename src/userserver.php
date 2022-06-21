<?php
     include "connection.php";
    function display(){
        include "connection.php";
        $sql = "SELECT * from Users";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        //  var_dump($row);
        $text ="";
        $text.="<thead'>
        <tr class='text-dark bg-warning'>
           
            <th scope='col'>userid</th>
            <th scope='col'>username</th>
            <th scope='col'>email</th>
            <th scope='col'>user_password</th>
            <th scope='col'>role</th>
            <th scope='col'>Action</th>
            <th scope='col'>Action</th>
        </tr>
        </thead>";
        $text.="<tbody>";
    
            for($i=0;$i<count($row);$i++){ 
                $text.="<tr>
                
                <td>".$row[$i]['userid']."</td>
                <td>".$row[$i]['username']."</td>
                <td>".$row[$i]['email']."</td>
                <td>".$row[$i]['user_password']."</td>
                <td>".$row[$i]['role']."</td>
                <td><button data-bs-toggle='modal' data-bs-target='#editBtnModal'
                id=".$row[$i]['userid']." class='btn btn-sm btn-primary edit_row'>Edit</button></td>
                <td><button id=".$row[$i]['userid']." class='btn btn-sm btn-primary deleting_user'>Delete</button></td></tr>";
            }
        $text.="</tbody>";
        echo $text;
    }

    if(isset($_POST['display_all_user'])){
        display();
    }

    if(isset($_POST['delete_user_id'])){
        $id = $_POST['delete_user_id'];
        $sql1 = "DELETE FROM `Users` WHERE `Users`.`userid` = '$id'";
        $result1 = mysqli_query($conn,$sql1);
        if($result1){
            echo "delete successfull";
        }
        else{
            echo "not delete";
            echo mysqli_error($conn);
        }
     }

    if(isset($_POST['useridforedit'])){
        $id = $_POST['useridforedit'];
        // echo $id;
        $sql = "SELECT * FROM `Users` WHERE `Users`.`userid` = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);
    }

    if(isset($_POST['userid_for_edit_then_Update'])){
      
        $uid = $_POST['userid_for_edit_then_Update'];
        $uname = $_POST['username_for_edit_then_Update'];
        $umail = $_POST['usermail_for_edit_then_Update'];
        $role = $_POST['role_for_edit_then_Update'];
        $sql = "UPDATE Users SET username = '$uname',email = '$umail',role = '$role' where userid ='$uid'";
        $result =mysqli_query($conn,$sql);
        if($result){
            echo "editted";
        }
        else{
              echo mysqli_error($conn);
        }
    }

   
?>