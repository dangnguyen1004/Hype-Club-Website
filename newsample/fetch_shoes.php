<?php
    if (isset($_POST['limit']) and isset($_POST['start'])){
        include "conn.php";
        $brand = 'all';
        $sql = "";
        if (isset($_POST['brand'])){
            $brand = $_POST['brand'];
        }
        if ($brand == 'all'){
            $sql = "SELECT * FROM item ORDER BY id LIMIT ". $_POST['start']. ", ". $_POST['limit'];
        }
        else{
            $sql = "SELECT * FROM item WHERE brand = '$brand' ORDER BY id LIMIT ". $_POST['start']. ", ". $_POST['limit'];
        }
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
            $delay = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="box" data-wow-delay="'.$delay.'s">
                    <input type="hidden" id="id_item" name="id_item" value="'.$row['id'].'">
                    <a href="../newsample/description.php?id='.$row['id'].'" style="text-decoration: none;">
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
                            $rand_num = rand(10,50);
                            if ($rand_num % 2 == 0){
                                $rand_num += 1;
                            }
                            if ($rand_num == 47){
                                $rand_num += 2;
                            }
                            echo '
                            <img src="fetch_shoes_image.php?id='.$rand_num.'" alt="price" class="img-bot" />';
                            $rand_num += 1;
                            echo '
                            <img src="fetch_shoes_image.php?id='.$rand_num.'" alt="price" class="img-top" />';
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