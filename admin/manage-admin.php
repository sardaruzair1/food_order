
    <!-- menu -->
    <?php
    include('partial/menu.php');
    ?>
    <!-- main section start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset( $_SESSION['add']);
            }
            ?>
            <br>
            <br>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br>
            <br>
            <br>
           <table class="tbl-full">
            <tr>
                <th>S.no</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
<?php
$sno = 1;
$fetch = $conn ->query("SELECT * FROM `tbl_admin`");
foreach($fetch as $row){
    
?>

            <tr>
                <td><?php echo $sno++?></td>
                <td><?php echo $row['full_name']?></td>
                <td><?php echo $row['username']?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn-secondary">Update Admin </a>
                    <a href="changepwd.php?id=<?php echo $row['id']?>" class="btn-danger">Change Password</a>
                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn-danger">Delete</a>
                </td>
            
                    
                
            </tr>
            <?php
            }
            ?>










            <!-- <tr>
                <td>02</td>
                <td>bilal</td>
                <td>bilal12</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin </a>
                    <a href="#" class="btn-danger">Delete Admin </a>
                </td>
            </tr>
            <tr>
                <td>03</td>
                <td>Ubaid</td>
                <td>Ubaid12</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin </a>
                    <a href="#" class="btn-danger">Delete Admin </a>
                </td>
            </tr> -->
           </table>

           
        </div>
    </div>
    <!-- main section end  -->
    <?php
    include('partial/footer.php');
    ?>