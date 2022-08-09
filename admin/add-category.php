<?php
include('partial/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset( $_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset( $_SESSION['upload']);
            }
            ?>
        <br>
        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Add Title"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="yes"> Yes
                        <input type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Category" class="btn-primary" name="submit">
                    </td>
                </tr>
            </table>

        </form>


    </div>
</div>
<?php
include('partial/footer.php');
?>
<?php
if(isset($_POST['submit'])){

$title = $_POST['title'];
if(isset($_POST['featured'])){
  $featured = $_POST['featured'];
}else{
    $featured = "no";
}
if(isset($_POST['active'])){
  $active = $_POST['active'];
}else{
    $active = "no";
}
// print_r($_FILES['image']);

if(isset($_FILES['image']['name'])){
$image_name = $_FILES['image']['name'];
// auto rename
// get the extension .jpg .png
$ext = end(explode('.',$image_name));
$image_name = "Food_category_".rand(000,999).'.'.$ext;

$source_path = $_FILES['image']['tmp_name'];
$destinatin_path = "../images/category/".$image_name;
$upload = move_uploaded_file($source_path , $destinatin_path);

if ($upload==false) {
 $_SESSION['upload'] = "<div class='suc'>faieled to upload image</div>";

 header("location:".SITEURL.'admin/add-category.php');
 die();
}

}else {
    $image_name ="";
}

// conection to sql
$sql = "INSERT INTO tbl_category SET
title = '$title',
featured = '$featured',
image_name = '$image_name',
active = '$active'
" ;

// res
$res = mysqli_query($conn, $sql);

if($res == TRUE){
    $_SESSION['add'] = "<div class='suc'>Category Added Successfully</div>"; 

    // rederection to
    header("location:".SITEURL.'admin/manage-category.php');

}else{
    $_SESSION['add'] = "<div class='suc'>Category not added</div>"; 

    // rederection to
    header("location:".SITEURL.'admin/add-category.php');
}

}

?>