<?php
include('partial/menu.php');


if(isset($_GET['id'])){


    $id = $_GET['id'];

    $fetch = $conn->query("SELECT * FROM `tbl_category` WHERE `id`='$id'");

    $row = mysqli_fetch_array($fetch);

    $title = $row['title'];
    $current_image = $row['image_name'];
    $featured= $row['featured'];
    $active = $row['active'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        if($image_name != ''){

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

if($current_image != ''){
    $remove_path = "../images/category/".$current_image;
    $remove = unlink($remove_path);
}



if($remove == FALSE){
    header("location:".SITEURL.'admin/add-category.php');
    die();
}

        }else{
            $image_name = $current_image;
        }
    }else{
        $image_name = $current_image;
    }
  
}



?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <br>
        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Add Title" value="<?php echo $title?>"></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                         <img src="http://localhost/food-order/images/category/<?php echo $current_image;?>"width="80">

                    
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured=="yes") {echo "checked";}?> type="radio" name="featured" value="yes"> Yes
                        <input <?php if($featured=="no") {echo "checked";}?> type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input  <?php if($active=="yes") {echo "checked";}?> type="radio" name="active" value="yes"> Yes
                        <input  <?php if($active=="no") {echo "checked";}?>  type="radio" name="active" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                        <input type="submit" value="Update Category" class="btn-primary" name="submit">
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                        <input type="hidden" value="<?php echo $current_image;?>" name="current_image">
                    </td>
                </tr>
            </table>

        </form>


    </div>
</div>
<?php
include('partial/footer.php');

if (isset($_POST['submit'])) {
   $title = $_POST['title'];
   $id = $_POST['id'];
   $current_image = $_POST['current_image'];
   $featured = $_POST['featured'];
   $active = $_POST['active'];

   $update = $conn->query("UPDATE `tbl_category` SET `title`='$title',`image_name`='$image_name', `featured`='$featured', `active`='$active' WHERE `id` ='$id'");
if ($update) {
    ?>
    <script>
        window.location.href = 'manage-category.php';
    </script>
    <?php
}

}

?>
