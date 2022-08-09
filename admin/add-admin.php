<?php
include('partial/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br>
<?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset( $_SESSION['add']);
            }
            ?>
<br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name" required></td>
                </tr>
                <tr>
                    <td>User name:</td>
                    <td><input type="text" name="username" placeholder="Enter your username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter your password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submitt" value="Add Admin" class="btn-secondary"></td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php
include('partial/footer.php');
?>
<?php
// process the value from form and save it in database

// chect weather the the button is clicked or not
if(isset($_POST['submitt']))
{
    // button clicked
  $fullname = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

//   sql query to save data on data base
$sql = "INSERT INTO tbl_admin SET
full_name = '$fullname',
username = '$username',
password = '$password'
";
//   exceute query and save in db

$res = mysqli_query($conn, $sql) or die(mysqli_error());

// displaying result
if($res == TRUE){
    $_SESSION['add'] = "Admin is Added"; 

    // rederection to
    header("location:".SITEURL.'admin/manage-admin.php');

}else{
    $_SESSION['add'] = "fail to add admin"; 

    // rederection to
    header("location:".SITEURL.'admin/add-admin.php');
}

}
?>