<?php
    session_start();
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
?>
<div class="container">
    <h1>Registration Page</h1>
</div>
<?php
     include('footer.php'); 
?>