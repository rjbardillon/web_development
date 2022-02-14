<?php 
    $page = "create-account";
    include('header.php'); 
?>
<div class="container create-account">
    <div class="create-account-form">
        <form action="includes/create-account.inc.php" method="post">
            <br>
            <h2>Create Account</h2><br>
            <input type="text" name="surname" placeholder="Surname" required>
            <input type="text" name="given" placeholder="Given Name" required>
            <input type="text" name="middle" placeholder="Middle Name" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required><br><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    
    <?php
        if (isset($_GET["username"])) {
            $username = $_GET['username'];
        }
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "none"){
                echo "<script>alert('Your Username is $username')</script>";
            }    
            else if ($_GET["error"] == "invalidemail"){
                echo "<script>alert('Invalid Email')</script>";
            }
            else if ($_GET["error"] == "usernametaken"){
                echo "<script>alert('User is existing')</script>";
            }
            else if ($_GET["error"] == "passwordnotmatch"){
                echo "<script>alert('Password Not Match')</script>";
            } 
            else if ($_GET["error"] == "stmterror"){
                echo "<script>alert('Something Went Wrong')</script>";
            }
        }
    ?>
</div>
<?php include('footer.php'); ?>