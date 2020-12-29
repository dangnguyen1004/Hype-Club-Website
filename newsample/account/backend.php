<?php

include "../conn.php";

if (isset($_POST['getInfo'])){
    $username = $_POST['username'];

    $getUsernameQuery = "SELECT * FROM account WHERE username = '$username'";
    $resultGetUsername = mysqli_query($conn, $getUsernameQuery);
    
    if (mysqli_num_rows($resultGetUsername) > 0){
        $temp = mysqli_fetch_assoc($resultGetUsername);
        echo json_encode($temp);
    }
    else {
        echo "cant find user";
    }

}

if (isset($_POST['updateInfo'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ssn = $_POST['ssn'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];


    $updateInfoQuery = "UPDATE account SET name='$name', email='$email', phone='$phone', ssn='$ssn', gender='$gender', birth='$birth' WHERE username='$username'";
    $resultUpdateInfo = mysqli_query($conn, $updateInfoQuery);

    if ($resultUpdateInfo){
        echo 'success';
    }
    else{
        echo 'fail';
    }
}


if (isset($_POST['changePassword'])){
    $username = $_POST['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $checkOldPasswordQuery = "SELECT * FROM account WHERE username = '$username';";
    $resultCheckOldPassword = mysqli_query($conn, $checkOldPasswordQuery);
    if (mysqli_num_rows($resultCheckOldPassword) > 0){
        $user = mysqli_fetch_assoc($resultCheckOldPassword);
        if ($oldPassword == $user['password']){
            $updatePasswordQuery = "UPDATE account SET password = '$newPassword' WHERE username = '$username';";
            $resultUpdatePassword = mysqli_query($conn, $updatePasswordQuery);
            if ($resultUpdatePassword) {;
                echo 'Update pass successful';
            }
            else{
                echo 'Update fail';
            }
        }
        else{
            echo 'OldPasswordNotCorrect';
        }
    }
    else{
        echo 'cant fint username';
    }


}