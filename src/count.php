<?php
session_start();
if(isset($_POST['count']))
{
    $c = count($_SESSION['cart']);
    echo $c;
    // print_r($_SESSION['cart']);
}
?>