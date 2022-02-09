<?php 
    session_start();
    $page = "home";
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
?>

<div class="container home">
    <h1>Home Page</h1>
</div>

<?php include('footer.php'); ?>