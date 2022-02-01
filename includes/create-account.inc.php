<?php

if (isset($_POST['submit'])) {
    $surname = $_POST["surname"];
    $givenName = $_POST["given"];
    $middleName = $_POST["middle"];
    $username = strtolower($givenName[0].$middleName[0].$surname);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (invalidEmail($email) !== false) {
        header("location: ../create-account.php?error=invalidemail");
        exit();
    }
    if (usernameExists($connection, $username, $email) !== false) {
        header("location: ../create-account.php?error=usernametaken");
        exit();
    }
    if (passwordMatch($password, $confirmPassword) !== false) {
        header("location: ../create-account.php?error=passwordnotmatch");
        exit();
    }
    insertUser($connection, $surname, $givenName, $middleName, $email, $username, $password);
    
}
else {
    header("location: ../create-account.php");
    exit();
}