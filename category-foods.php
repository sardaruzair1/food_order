<?php
include('prtial-front/menu.php');
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
$fetch = $conn ->query("SELECT * FROM `tbl_food` WHERE active='yes'");
foreach($fetch as $row){
?>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="http://localhost/food-order/images/food/<?php echo $row['image_name']?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $row['title']?></h4>
                    <p class="food-price"><?php $row['price']?></p>
                    <p class="food-detail">
                        <?php echo  $row['description']?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL?>order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
<?php }?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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