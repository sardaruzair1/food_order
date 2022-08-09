
<?php

include('partial/menu.php');


if(isset($_GET['id'])){


    $id = $_GET['id'];

    $fetch = $conn->query("SELECT * FROM `tbl_admin` WHERE `id`='$id'");

    $sq = mysqli_fetch_array($fetch);
  
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
<br>

<br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Old password</td>
                    <td><input type="text" name="password" placeholder="Enter old password" required></td>
                </tr>
                <tr>
                    <td>new password</td>
                    <td><input type="text" name="newpwd" placeholder="Enter new password" required></td>
                </tr>
                <tr>
                    <td>conferm password</td>
                    <td><input type="password" name="confermpwd" placeholder="conferm password password" required></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $sq['id']; ?>">
                        <input type="submit" name="submitt" value=" Update" class="btn-secondary">
                    </td>
                    
                </tr>

            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submitt'])){
$crunt_password = md5($_POST['password']);
$new_password = md5($_POST['newpwd']);
$oldpwd =  $sq['password'];
if ($crunt_password == $oldpwd) {
    $update = $conn->query("UPDATE `tbl_admin` SET `password`='$new_password' WHERE `id` ='$id'");
    header("location:".SITEURL.'admin/manage-admin.php');
} else {
    echo "wrong password";
}

}

// $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$crunt_password'";

// $res = mysqli_query($conn, $sql);


include('partial/footer.php');

