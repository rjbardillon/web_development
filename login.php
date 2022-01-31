<?php include('header.php'); ?>
<div class="container login">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username/Email..." required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">
        <a href="forgot-password.php">Forgot Password?</a>
    </form>
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