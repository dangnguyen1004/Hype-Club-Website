<?php
    if (isset($_POST['limit']) and isset($_POST['start'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "shoesdatabase";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM item ORDER BY id LIMIT ". $_POST['start']. ", ". $_POST['limit'];
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
            $delay = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="box" data-wow-delay="'.$delay.'s">
                    <input type="hidden" id="id_item" name="id_item" value="'.$row['id'].'">
                    <a href="/sample/description.html" style="text-decoration: none;">
                        <div class="inner">
                            <div class="img">';
                        $sql_image = "SELECT * FROM item_image WHERE item_id =". $row['id'];
                        $list_image = mysqli_query($conn,$sql_image);
                        if (mysqli_num_rows($list_image) == 2){
                            $image_record = mysqli_fetch_assoc($list_image);
                            echo '
                            <img src="fetch_shoes_image.php?id='.$image_record['id'].'" alt="price" class="img-bot" />';
                            $image_record = mysqli_fetch_assoc($list_image);
                            echo '
                            <img src="fetch_shoes_image.php?id='.$image_record['id'].'" alt="price" class="img-top" />';
                        }
                        else{
                            echo '
                            <img src="fetch_shoes_image.php?id=15" alt="price" class="img-bot" />';
                            echo '
                            <img src="fetch_shoes_image.php?id=16" alt="price" class="img-top" />';
                        }
                echo '
                            </div>
                            <div class="text">
                                <h3>'.$row['name'].'</h3>
                                <p>50% OFF / FULL SIZE </p>
                                <p> <span class="strike-price">'.number_format($row['origin_price']).' VND</span> <span class="off-price">'. number_format($row['price']).'VND</span> </p>
                            </div>
                        </div>
                    </a>
                </div>
                ';
                $delay += 0.2;
            }
        } else {
            
        }
    }
?>