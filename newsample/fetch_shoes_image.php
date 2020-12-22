<?php
if (isset($_GET['id'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shoesdatabase";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $id = $_GET['id'];
    $query = "SELECT * FROM item_image WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['image'];
        } 
    }
    else {
        echo "0 result found";
    }

}



?>

