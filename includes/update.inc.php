<?php

if (isset($_POST['update'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $username = $_SESSION['username'];
    $currentData = userExists($connection, $username);
    $q1 = $_POST['q1'];
    $phoneNumber = $_POST['phone'];
    $firstName = $_POST['fName'];
    $middleName = $_POST['MI'];
    $lastName = $_POST['lName'];
    $gender = $_POST['q6'];
    $birthday = date('Y-m-d', strtotime($_POST['q7']));
 
    if ($_POST['q2o1'] == "") {
        $q2o1 = $currentData['q2o1'];
    } else {
        $q2o1 = $_POST['q2o1'];
    }
    if ($_POST['q2o2'] == "") {
        $q2o2 = $currentData['q2o2'];
    } else {
        $q2o2 = $_POST['q2o2'];
    }
    if ($_POST['q2o3'] == "") {
        $q2o3 = $currentData['q2o3'];
    } else {
        $q2o3 = $_POST['q2o3'];
    }
    if ($_POST['q2o4'] == "") {
        $q2o4 = $currentData['q2o4'];
    } else {
        $q2o4 = $_POST['q2o4'];
    }
    if ($q2o5 == "") {
        $q2o5 = $currentData['q2o5'];
    } else {
        $q2o5 = $_POST['q2o5'];
    }
    if ($_POST['q3'] == "") {
        $q3 = $currentData['q3'];
    } else {
        $q3 = $_POST['q3'];
    }
    if ($_POST['q8'] == "") {
        $race = $currentData['race'];
        $type = $currentData['raceType'];
    } else {
        if ($_POST['q8'] == "White") {
            $race = $_POST['q8o1'];
            $type = "White";
        } elseif ($_POST['q8'] == "Black") {
            $race = $_POST['q8o2'];
            $type = "Black";
        } elseif ($_POST['q8'] == "Alaska") {
            $race = $_POST['q8o3'];
            $type = "Indian";
        } elseif ($_POST['q8'] == "Some") {
            $race = $_POST['q8o4'];
            $type = "Some";
        } else {
            $race = $_POST['q8'];
            $type = NULL;
        }
    }
    
    
    updateData($connection, $username, $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type);
} else {
    header("location: ../home.php");
    exit();
}