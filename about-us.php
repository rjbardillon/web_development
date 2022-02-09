<?php 
    session_start();
    $page = "about";
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
?>

<div class="container home">
    <h1>About Us Page Test</h1>
</div>

<?php include('footer.php'); ?>