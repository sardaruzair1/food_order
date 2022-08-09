<?php
include('config.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){

    $id= $_GET['id'];
    $image_name = $_GET['image_name'];
 

    if($image_name != ""){
        $path ='../images/category/'.$image_name;
        $remove = unlink($path);
        
        if ($remove == FALSE) {
            $_SESSION['remove'] = "<div class='fail'>failed to remove the image</div>";
            header("location:".SITEURL.'admin/manage-category.php');
            die();
        }
    }
    $sql = "DELETE FROM `tbl_category` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res == TRUE) {
        $_SESSION['delete'] = "<div class='suc'>succesfully delete</div>";
        header("location:".SITEURL.'admin/manage-category.php');
    }else{
        $_SESSION['delete'] = "<div class='fail'>failed to  delete</div>";
        header("location:".SITEURL.'admin/manage-category.php');
    }
}
else{
    header("location:".SITEURL.'admin/manage-category.php');
}

?>