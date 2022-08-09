<?php

include('partial/menu.php');


if(isset($_GET['id'])){


    $id = $_GET['id'];

    $fetch = $conn->query("SELECT * FROM `tbl_admin` WHERE `id`='$id'");

    $sq = mysqli_fetch_array($fetch);
  
}


?>






    <!-- menu -->

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
<br>

<br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"
                    value="<?= $sq['full_name'] ?>" 
                    required></td>
                </tr>
                <tr>
                    <td>User name:</td>
                    <td><input type="text" name="username" placeholder="Enter your username"
                    value="<?= $sq['username'] ?> " 
                    required></td>
                </tr>
               
                <tr>
                    <td><input type="submit" name="submitt" value="Update Admin" class="btn-secondary"></td>
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

//   sql query to save data on data base

//   exceute query and save in db


// displaying result
$update = $conn->query("UPDATE `tbl_admin` SET `full_name`='$fullname',`username`='$username' WHERE `id` ='$id'");
if ($update) {
    ?>
    <script>
        window.location.href = 'manage-admin.php';
    </script>
    <?php
}

}
?>