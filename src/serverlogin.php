<?php
session_start();
include 'connection.php';

if(isset($_POST['status'])){
    $status = $_POST['status'];
    if($status==1){
        if(isset($_POST['login_mail'])){
            $loginmail = $_POST['login_mail'];
            $loginpwd = $_POST['login_pass'];
            $sql_login = "SELECT userid,email,user_password,role from Users where email = '$loginmail'";
            $result = mysqli_query($conn,$sql_login);
            // if($result){
            //     echo "success";
            // }
            // else{
            //     echo mysqli_error($conn);
            // }

            $row = mysqli_fetch_assoc($result);
            if($row['email'] == $_POST['login_mail']){
                
                if($row['user_password'] == $_POST['login_pass']){
                   // echo "login successfully";
                   if($row['role'] == 'admin'){
                        $_SESSION['id']=$row['userid'];
                        
                        echo "T";
                    }
                    elseif($row['role']=='user'){
                        $_SESSION['id']=$row['userid'];
                        //$_SESSION['id']=38;
                        if(count($_SESSION['cart'])!=0){ 
                           echo true;}
                        else{
                          echo "go_to_index";
                        }  
                    }
                }
                else{
                   echo "password doesnot match";
                   //echo false;
                }
            }
            else{
                echo "not registered yet";
            } 
        }
    }

    else{
        if(isset($_POST['u_name'])){
            $username=$_POST['u_name'];
            $email=$_POST['u_mail'];
            $password=$_POST['u_pass'];
            $repassword=$_POST['r_pass'];

        
            //create table
            /*$sql = "CREATE TABLE Users (
                userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                user_password VARCHAR(50)
                )";*/
        
            // $result = mysqli_query($conn,$sql);
        
           // check for the table creation
            /*if(!$result){
                echo "table_error".mysqli_error($conn);
            }
            else{
                echo "created table successfully";
            }*/
        
            $sql_reg = "SELECT email from Users where email = '$email'";
            $result_reg = mysqli_query($conn,$sql_reg);
            $row_reg = mysqli_fetch_assoc($result_reg);
        
            if($row_reg['email']==$email){
                echo "exist";
            }
            else{
                $stmt = "INSERT INTO Users (username,email,user_password,role)
                VALUE('$username','$email','$password','user')";
                $result = mysqli_query($conn,$stmt);

                // add a new user to the user table
                if(!$result){
                // echo "the record was not inserted".mysqli_error($conn);
                }
                else{
                // echo "record inserted successfully";
                }
                //header('location: ./login.php');
            }
        }
    }
}

?>