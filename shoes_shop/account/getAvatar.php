<?php


include "../conn.php";

if (isset($_POST['getAvatar'])){
    $username = $_POST['username'];
    $getAvatarQuery = "SELECT image FROM avatar WHERE username='$username'";
    $resultGetAvatar = mysqli_query($conn, $getAvatarQuery);
    if (mysqli_num_rows($resultGetAvatar) > 0){
        $avatar = mysqli_fetch_assoc($resultGetAvatar);
        if ($avatar['image'] != ''){
            echo 'success';
        }
        else{
            echo 'fail';
        }
    }
    else{
        echo 'fail';
    }
}


if (isset($_GET['getAvatar'])){
    $username = $_GET['username'];
    $getAvatarQuery = "SELECT image FROM avatar WHERE username='$username'";
    $resultGetAvatar = mysqli_query($conn, $getAvatarQuery);
    if (mysqli_num_rows($resultGetAvatar) > 0){
        $avatar = mysqli_fetch_assoc($resultGetAvatar);
        echo $avatar['image'];
    }
}