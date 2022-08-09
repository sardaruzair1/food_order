
    <!-- menu -->
    <?php
    include('partial/menu.php');
    ?>
    <!-- main section start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br>
            <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
            <div class="col-4 txt-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 txt-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 txt-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="col-4 txt-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- main section end  -->
    <?php
    include('partial/footer.php');
    ?>