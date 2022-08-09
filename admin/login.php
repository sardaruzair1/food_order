<?php
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>login</title>
</head>
<body>
    <div class="login txt-center">
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }


        ?>
        <h1 class="txt-center">Login</h1>
        <br><br>
        <form action="" method="post">
           <p style=" text-align: left;">username:</p> 
            <br>
            <input type="text" name="username" placeholder="Enter username" style="padding: 2% 5%
            ;">
            <br>
            <br>
          <p style=" text-align: left">password:</p>  
            <br>
            <input type="password" name="password" placeholder="Enter password" style="padding: 2% 5%
            ;">
            <br>
<br>
            <input type="submit" value="Login" name="submit" class="btn-primary" style="padding: 1% 5%
            ;">
        </form>
        <br>
        <p class="txt-center">created by - <a href="#">Sardar Uzair</a></p>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // login successfull
        $_SESSION['login'] = "<div class='suc'>login success.</div>";
        $_SESSION['user'] = $username;
        header("location:".SITEURL.'admin/');
    }else{
        $_SESSION['login'] = "<div class='fail'>login failed</div>";
        header("location:".SITEURL.'admin/login.php');
    }
}

?>