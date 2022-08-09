
    <!-- menu -->
    <?php
    include('partial/menu.php');
    ?>
    <!-- main section start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Orders</h1>
            <br>
            <br>
           
           <table class="tbl-full">
            <tr>
                <th>S.no</th>
                <th>food</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
                <th>order_date</th>
                <th>status</th>
                <th>customer_name</th>
                <th>customer_contact</th>
                <th>customer_email</th>
                <th>customer_adress</th>
            </tr>

            <?php
           $sno = 1;
           $fetch = $conn ->query("SELECT * FROM `tbl_order`");
           foreach($fetch as $row){
           ?>

            <tr>
                <td><?php echo $sno++?></td>
                <td><?php echo $row['food']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['qty']?></td>
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['order_date']?></td>
                <td><?php echo $row['status']?></td>
                <td><?php echo $row['customer_name']?></td>
                <td><?php echo $row['customer_contact']?></td>
                <td><?php echo $row['customer_email']?></td>
                <td><?php echo $row['customer_adress']?></td>
                <!-- <td>
                    <a href="#" class="btn-secondary">Update Admin </a>
                    <a href="#" class="btn-danger">Delete Admin </a>
                </td> -->
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