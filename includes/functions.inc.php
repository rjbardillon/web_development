<?php

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $confirmPassword) {
    $result;
    if ($password !== $confirmPassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function insertUser($connection, $surname, $givenName, $middleName, $email, $username, $password){
    $sql = "INSERT INTO users (surname, givenName, middleName, email, username, password) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $surname, $givenName, $middleName, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
    header("location: ../create-account.php?error=none&username=".$username);
    exit();
}

function usernameExists($connection, $username, $email){
    $sql = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-account.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function userExists($connection, $username){
    $sql = "SELECT * FROM user_data WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-account.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUser($connection, $username, $password){
    $usernameExists = usernameExists($connection, $username, $username);

    if ($usernameExists === false) {
        header("location: ../login.php?error=wrongaccount");
        exit();
    }
    $passwordhashed = $usernameExists['password'];
    $checkPassword = password_verify($password, $passwordhashed);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($checkPassword === true) {
        session_start();
        $_SESSION['username'] = $usernameExists['username'];
        $_SESSION['surname'] = $usernameExists['surname'];
        $_SESSION['middleName'] = $usernameExists['middleName'];
        $_SESSION['givenName'] = $usernameExists['givenName'];
        $_SESSION['email'] = $usernameExists['email'];
        header("location: ../home.php");
        exit();
    }
}

function insertData($connection, $username, $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type) {
    $sql = "INSERT INTO user_data(username, q1, q2o1, q2o2, q2o3, q2o4, q2o5, q3, phone, firstName, middleName, lastName, gender, birthday, race, raceType) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss",$username, $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.php?error=none");
    exit();
}

function updateData($connection, $username, $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type) {
    $sql = "UPDATE user_data SET q1 = ?, q2o1 = ?, q2o2 = ?, q2o3 = ?, q2o4 = ?, q2o5 = ?, q3 = ?, phone = ?, firstName = ?,
     middleName = ?, lastName = ?, gender = ?, birthday = ?, race = ?, raceType = ? WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.php?error=none");
    exit();
}