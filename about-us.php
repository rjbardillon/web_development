<?php 
    session_start();
    $page = "about";
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.html");
        exit();
    }
?>

<div class="container home">
    <h1>About Us Page</h1>
</div>

<?php include('footer.php'); ?>