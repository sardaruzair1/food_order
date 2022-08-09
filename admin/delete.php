<?php
include('config.php');

if(isset($_GET['id'])){

    $id= $_GET['id'];



    $delete=$conn->query("DELETE FROM `tbl_admin` WHERE `id`='$id'");

    if($delete){

        header("location:".SITEURL.'admin/manage-admin.php');
    }
}


?>