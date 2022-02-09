<?php 
    session_start();
    $page = "contact";
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
?>

<div class="container home">
    <h1>Contact Page</h1>
</div>

<?php include('footer.php'); ?>