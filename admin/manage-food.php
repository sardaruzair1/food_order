
    <!-- menu -->
    <?php
    include('partial/menu.php');
    ?>
    <!-- main section start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
<br>
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset( $_SESSION['add']);
            }
            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset( $_SESSION['remove']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset( $_SESSION['delete']);
            }
            
            ?>
        <br>
            <br>
            <br>
            <a href="add-food.php" class="btn-primary">Add Food</a>


            <br>
            <br>
            <br>
           <table class="tbl-full">
            <tr>
                <th>S.no</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category id</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

           <?php
           $sno = 1;
           $fetch = $conn ->query("SELECT * FROM `tbl_food`");
           foreach($fetch as $row){
           ?>

            <tr>
                <td><?php echo $sno++ ?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['description']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php 
                
                if ($row['image_name']!='') {
                ?>
                <img src="http://localhost/food-order/images/food/<?php echo $row['image_name']?>"width="80">
<?php
                }else{
echo "<div class='fail'>Image not added</div>";
                }
                
                ?></td>
                <td><?php echo $row['category_id']?></td>
                <td><?php echo $row['featured']?></td>
                <td><?php echo $row['active']?></td>
                <td>
                <a href="edit-f.php?id=<?php echo $row['id']?>" class="btn-secondary">Update Food</a>
                
                <a href="delete-f.php?id=<?php echo $row['id']?> & image_name=<?php echo $row['image_name']?>" class="btn-danger">Delete Food</a>
                </td>
            </tr>
            <?php
           }
            ?>
           </table>
        </div>
    </div>
    <!-- main section end  -->
    <?php
    include('partial/footer.php');
    ?>