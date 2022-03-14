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
                elseif($page == 'profile'){echo 'Profile';}
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
        <li><a href="index.html">Home</a></li>
        <?php
          require_once 'includes/dbh.inc.php';
          require_once 'includes/functions.inc.php';
          if (isset($_SESSION['username'])) {
            echo '<div class="profile-name">Welcome, <br>'; echo ($_SESSION["givenName"]." ".$_SESSION["middleName"]." ".$_SESSION["surname"]); echo '</div>';
            if (userExists($connection, $_SESSION['username'])) {
              echo '<li><a href="profile.php">Profile</a></li>';
            } else {
              echo '<li><a href="register.php">Register</a></li>';
            }
            echo '<li><a href="includes/logout.inc.php">Log Out</a></li>';
          } 
          else {
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="create-account.php">Create Account</a></li>';
          }
        ?>
        <div class="display"></div>
        <script>
          setInterval(function () {
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            const clock = document.querySelector('.display')
            let time = new Date()
            let sec = time.getSeconds()
            let min = time.getMinutes()
            let hr = time.getHours()
            let month = time.getMonth()
            let year = time.getFullYear()
            let date = time.getDate()
            let day = 'AM'
            if (hr > 12) {
              day = 'PM'
              hr = hr - 12
            }
            if (hr == 0) {
              hr = 12
            }
            if (sec < 10) {
              sec = '0' + sec
            }
            if (min < 10) {
              min = '0' + min
            }
            if (hr < 10) {
              hr = '0' + hr
            }
            clock.textContent = months[month] + ' ' + date + ' '  + year + '\n' + hr + ':' + min + ':' + sec + ' ' + day;
          })
        </script>
      </ul>
    </nav>