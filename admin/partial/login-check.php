<?php
if(!isset($_SESSION['user'])){
    $_SESSION['no-login-message'] = "<div class'fail'>please login to access admin pannel</div>";
    
    header("location:".SITEURL.'admin/login.php');
}


?>