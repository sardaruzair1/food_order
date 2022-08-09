<?php
include('prtial-front/menu.php');
?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
$fetch = $conn ->query("SELECT * FROM `tbl_category` WHERE active='yes'");
foreach($fetch as $row){
?>

            <a href="category-foods.php">
            <div class="box-3 float-container">
                <img src="http://localhost/food-order/images/category/<?php echo $row['image_name']?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php $row['title']?></h3>
            </div>
            </a>
<?php
}
?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


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