<?php
include('prtial-front/menu.php');
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="post">
                <fieldset>
            <?php
           $id = $_GET['id'];
          
$fetch = $conn ->query("SELECT * FROM `tbl_food` WHERE `id` = $id ");
foreach($fetch as $row){
?>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="http://localhost/food-order/images/food/<?php echo $row['image_name']?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $row['title']?></h3>
                        <p class="food-price"><?php echo $row['price']?></p>
<?php }?>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <?php
include('prtial-front/footer.php');
?>

<?php
// process the value from form and save it in database

// chect weather the the button is clicked or not
if(isset($_POST['submit']))
{
    // button clicked
  $customer_name = $_POST['full-name'];
  $customer_contact = $_POST['contact'];
  $customer_adress = $_POST['address'];
  $order_date = date("y-m-d h:i:sa");
  $status = "Orderd";
  $price = $row['price'];
  $food = $row['title'];
  $qty = $_POST['qty'];
  $total = $qty * $price;
  $customer_email = $_POST['email'];

//   sql query to save data on data base
$sql = "INSERT INTO tbl_order SET
customer_name = '$customer_name',
food = '$food',
customer_adress = '$customer_adress',
customer_contact = '$customer_contact',
customer_email  = '$customer_email ',
order_date = '$order_date',
status = '$status',
price = '$price',
qty = '$qty',
total = '$total'
";
//   exceute query and save in db

$res = mysqli_query($conn, $sql) or die(mysqli_error());

// displaying result
if($res == TRUE){
    // rederection to
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php

}

}
?>