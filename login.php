<?php 
    $page = "login";
    include('header.php');
 ?>
<div class="container login">
    <div class="login-form">
        <form action="includes/login.inc.php" method="post">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username/Email..." required>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" name="submit" value="Login"><br>
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