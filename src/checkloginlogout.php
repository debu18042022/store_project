<?php
session_start();
    if(isset($_POST['logout_value'])){
        session_unset();
        session_destroy();
        echo "sujeet";     
}
?>