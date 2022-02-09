<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/png" href="carmona-logo.png" />
    <script src="includes/functionality.js"></script>
    <title><?php 
                if($page == 'registration'){echo 'Registration';}
                elseif($page == 'index'){echo 'Census';}
                elseif($page == 'login'){echo 'Login';}
                elseif($page == 'create-account'){echo 'Create Account';}
                elseif($page == 'home'){echo 'Home';}
                elseif($page == 'about'){echo 'About Us';}
                elseif($page == 'contact'){echo 'Contact Us';}
            ?>
    </title>
  </head>
  <body>
    <nav class="navigation">
      <ul class="links">
        <img
          src="images/carmona-logo.png"
          alt="Carmona Logo"
          class="carmona-logo"
        />
        <li><a href="index.php">Home</a></li>
        <?php
          if (isset($_SESSION['username'])) {
            echo '<li><a href="register.php">Register</a></li>';
            echo '<li><a href="includes/logout.inc.php">Log Out</a></li>';
          } 
          else {
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="create-account.php">Create Account</a></li>';
          }
        ?>
      </ul>
    </nav>