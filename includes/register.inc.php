<?php

if (isset($_POST['register'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $username = $_SESSION['username'];
    $q1 = $_POST['q1'];
    $q2o1 = $_POST['q2o1'];
    $q2o2 = $_POST['q2o2'];
    $q2o3 = $_POST['q2o3'];
    $q2o4 = $_POST['q2o4'];
    $q2o5 = $_POST['q2o5'];
    $q3 = $_POST['q3'];
    $phoneNumber = $_POST['phone'];
    $firstName = $_POST['fName'];
    $middleName = $_POST['MI'];
    $lastName = $_POST['lName'];
    $gender = $_POST['q6'];
    $birthday = date('Y-m-d', strtotime($_POST['q7']));
    if ($_POST['q8'] == "q801") {
        $race = $_POST['race1'];
    } elseif ($_POST['q8'] == "q802") {
        $race = $_POST['race2'];
    } elseif ($_POST['q8'] == "q803") {
        $race = $_POST['race3'];
    } elseif ($_POST['q8'] == "q804") {
        $race = $_POST['race4'];
    } else {
        $race = $_POST['q8'];
    }
    
    insertData($connection, $username, $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race);
} else {
    header("location: ../home.php");
    exit();
}