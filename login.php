<?php 
    $page = "login";
    include('header.php');
 ?>
<div class="container login">
    <div class="login-form">
        <form action="includes/login.inc.php" method="post"><br><br><br><br><br><br><br><br>
            <input type="text" name="username" placeholder="Username/Email..." required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" name="submit" value="Login"><br><br>
            <a href="forgot-password.php">Forgot Password?</a>
        </form>
    </div>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] == "wrongaccount") {
                echo "<script>alert('Account not found')</script>";
            }
            else if ($_GET['error'] == "wrongpassword") {
                echo "<script>alert('Incorrect Password')</script>";
            }
        }
    ?>
</div>
<?php include('footer.php'); ?>