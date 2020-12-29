<?php

include "conn.php";

$message = '';

if (isset($_POST['checkLogin'])){
    $userName = $_POST['username'];
    $password = $_POST['password']; 
    $query = "SELECT * FROM account WHERE username = '$userName'";
    $findUserName = mysqli_query($conn, $query);

    $findUserName2 = mysqli_query($conn, "SELECT * FROM staff WHERE PhoneNumber = '$userName'");
    // check account in database
    if (mysqli_num_rows($findUserName) > 0 || mysqli_num_rows($findUserName2) > 0){
        $accountInfo = mysqli_fetch_assoc($findUserName);
        $accountInfo2 = mysqli_fetch_assoc($findUserName2);
        if ($password == $accountInfo['password']){
            $message = 'success1';
            setcookie("username", $userName, time() + 3600, "/"); 
        }
        else if ($password == $accountInfo2['PhoneNumber']){
            $message = 'success2';
            setcookie("username", $userName, time() + 3600, "/"); 
        }
        else{ # wrong password
            $message = 'fail';
        }
    }
    else{    # can't find account
        $message = 'fail';
    }
    echo $message;
}


if (isset($_POST['createAccount'])){
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $queryToInsert = "INSERT INTO account (username, email, password, ssn)
    VALUES ('$userName', '$email', '$password', NULL);";
    $resultInsertAccount = mysqli_query($conn, $queryToInsert);

    if ($resultInsertAccount){
        $message = 'success';
    }
    else{
        $message = 'fail';
    }
    echo $message;
}


if (isset($_POST['username_check'])){
    $userName = $_POST['username'];
    $getUsernameQuery = "SELECT * FROM account WHERE username = '$userName'";
    $resultGetUsername = mysqli_query($conn, $getUsernameQuery);
    if (mysqli_num_rows($resultGetUsername) > 0){
        $message = 'fail';
    }
    else{
        $message = 'success';
    }
    echo $message;
}

if (isset($_POST['email_check'])){
    $email = $_POST['email'];
    $getEmailQuery = "SELECT * FROM account WHERE email = '$email'";
    $resultGetEmail = mysqli_query($conn, $getEmailQuery);
    if (mysqli_num_rows($resultGetEmail)> 0){
        $message = 'fail';
    }
    else{
        $message = 'success';
    }
    echo $message;
}