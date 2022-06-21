<?php
session_start();
session_destroy();
header("Location: index.php");
// if(!isset($_SESSION['test'])){
//     echo "now set";
//     $_SESSION['test'] = array();
// }
// else{
//     echo "already set";
//     $_SESSION['test'] = "setted";
// }

?>