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