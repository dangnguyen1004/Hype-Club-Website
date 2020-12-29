<?php
    include '../conn.php';
?>
<?php
    extract($_POST); 

    if (isset($_POST['readrecord'])){
        
        $data= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >ID</th>
            <th >Brand</th>
            <th >Name</th>
            <th >Price</th>
            <th >Origin-price</th>
            <th class="action">Action</th>
            
            
        </tr>';
        $result= mysqli_query($con,"SELECT * FROM item");

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {

                $data .= '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['brand'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>' . $row['origin_price'] . '</td>
                    <td>  
                        <button onclick="Seen(' .  $row['id'] . ')" class="btn btn-warning"> <i class="far fa-eye"></i></button>
                        <button onclick="Update(' .  $row['id'] . ')" class="btn btn-warning"> <i class="fas fa-edit"></i></button>
                        <button onclick="Delete(' . $row['id'] . ')"  class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                $num++;
            }
        }
        
        $data.='</table>';
        echo $data;
    }
    if (isset($_POST['filter'])){
        $filter=$_POST['filter'];
        $data= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >ID</th>
            <th >Brand</th>
            <th >Name</th>
            <th >Price</th>
            <th >Origin-price</th>
            <th class="action">Action</th>
            
            
        </tr>';
        $result= mysqli_query($con,"SELECT * FROM item WHERE brand='$filter'");

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {
                $data .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['brand'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['origin_price'] . '</td>
                <td>  
                    <button onclick="Seen(' .  $row['id'] . ')" class="btn btn-warning"> <i class="far fa-eye"></i></button>
                    <button onclick="Update(' .  $row['id'] . ')" class="btn btn-warning"> <i class="fas fa-edit"></i></button>
                    <button onclick="Delete(' . $row['id'] . ')"  class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                </td>
                </tr>';
                $num++;
            }
        }
        
        $data.='</table>';
        echo $data;
    }
    if (isset($_POST['name']) ) {
        $name=$_POST['name'];
        $id=$_POST['id'];
        $sale= $_POST['sale'];
        $opr= $_POST['opr'];
        $brand= $_POST['brand'];
        $s50= $_POST['s50'];
        $s55= $_POST['s55'];
        $s60= $_POST['s60'];
        $s65= $_POST['s65'];
        $s70= $_POST['s70'];
        $s75= $_POST['s75'];
        $s80= $_POST['s80'];
        $s85= $_POST['s85'];
        $s90= $_POST['s90'];
        $s95= $_POST['s95'];
        $s00= $_POST['s00'];
        $s05= $_POST['s05'];
        
        

        $query = "INSERT INTO `item` 
                VALUES ('$id','$brand','$name','$sale','$opr')";

            $show=mysqli_query($con, $query);
        $query = "INSERT INTO `item_size` 
            VALUES (NULL,'$id','$s50','$s55','$s60','$s65','$s70','$s75','$s80','$s85','$s90','$s95','$s00','$s05')";

        mysqli_query($con, $query);
            echo $show;

    }

    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery= "DELETE FROM `item_size` WHERE id_item= '$idcheck'";

        mysqli_query($con, $deletequery);
        $deletequery= "DELETE FROM `item` WHERE id= '$idcheck'";

        mysqli_query($con, $deletequery);

    }

    if (isset($_POST['idup'])){

        $up_id= $_POST['idup'];

        $updatequery= "SELECT * FROM `item` WHERE id='$up_id'";

        if (!$result=mysqli_query($con, $updatequery)){
            exit(mysqli_error());
        } 

        if (!$result2=mysqli_query($con, "SELECT * FROM `item_size` WHERE id_item='$up_id'")){
            exit(mysqli_error());
        } 

        $response= array();
        
        if (mysqli_num_rows($result) >0){
            while($row=mysqli_fetch_assoc($result)){
                $response['1']=$row;
                $response['2']=mysqli_fetch_assoc($result2);
            }
        } else {
            $response['status']=200;
            $response['message']="Data not found!";
        }

        echo json_encode($response);
        

    } 

    if (isset($_POST['index'])) {
        $index=$_POST['index'];
        $name=$_POST['upname'];
        $id=$_POST['id'];
        $sale= $_POST['sale'];
        $opr= $_POST['opr'];
        $brand= $_POST['brand'];
        $s50= $_POST['s50'];
        $s55= $_POST['s55'];
        $s60= $_POST['s60'];
        $s65= $_POST['s65'];
        $s70= $_POST['s70'];
        $s75= $_POST['s75'];
        $s80= $_POST['s80'];
        $s85= $_POST['s85'];
        $s90= $_POST['s90'];
        $s95= $_POST['s95'];
        $s00= $_POST['s00'];
        $s05= $_POST['s05'];
        
        $deletequery= "DELETE FROM `item_size` WHERE id_item= '$index'";

        mysqli_query($con, $deletequery);
        $deletequery= "DELETE FROM `item` WHERE id= '$index'";

        mysqli_query($con, $deletequery);

        $query = "INSERT INTO `item` 
                VALUES ('$id','$brand','$name','$sale','$opr')";

            $show=mysqli_query($con, $query);
        $query = "INSERT INTO `item_size` 
            VALUES (NULL,'$id','$s50','$s55','$s60','$s65','$s70','$s75','$s80','$s85','$s90','$s95','$s00','$s05')";

        mysqli_query($con, $query);
        echo 'Đã cập nhật';
        
        
           
       
        
            
        

    }

    if (isset($_POST['idsee'])){

        $sql = "SELECT * FROM item_image WHERE item_id = " . $_POST['idsee'];
                $listImagesFromGivenId = mysqli_query($con, $sql);

                $sql = "SELECT * FROM item WHERE id =" . $_POST['idsee'];
                $listItemOfGivenId = mysqli_query($con, $sql);

                if (mysqli_num_rows($listImagesFromGivenId) > 0) {
                    $recordImage = mysqli_fetch_assoc($listImagesFromGivenId);
                    $recordItem = mysqli_fetch_assoc($listItemOfGivenId);
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $recordImage['image']) . '" alt=""> <br>'. '<span style="margin: 10px 0px 10px 0px;">' . $recordItem['name'].  ' <br> ' . number_format($recordItem['price']) . '</span>';
                } else {
                    echo '<img src="images/des_page/img1.jpg" alt=""> <br>'. '<span>Nike Classic Cortez <br> $129</span>';
                }

    }
    if (isset($_POST['idsee'])){
        

        $result= mysqli_query($con,"SELECT * FROM item_size WHERE id_item=".$_POST['idsee']);
        if (mysqli_num_rows($result) > 0) {
            $result = mysqli_fetch_array($result);
        echo '<p>Amount:</p>'.
        '<p>- Size 5: '.$result['size5'].'</p>'.
        '<p>- Size 5.5: '.$result['size55'].'</p>'.
        '<p>- Size 6: '.$result['size6'].'</p>'.
        '<p>- Size 6.5: '.$result['size65'].'</p>'.
        '<p>- Size 7: '.$result['size7'].'</p>'.
        '<p>- Size 7.5: '.$result['size75'].'</p>'.
        '<p>- Size 8: '.$result['size8'].'</p>'.
        '<p>- Size 8.5: '.$result['size85'].'</p>'.
        '<p>- Size 9: '.$result['size9'].'</p>'.
        '<p>- Size 9.5: '.$result['size95'].'</p>'.
        '<p>- Size 10: '.$result['size10'].'</p>'.
        '<p>- Size 10.5: '.$result['size105'].'</p>';
        } else echo '<p style="color: red;">Please update the quantity for each shoe size!</p>';

    }

    
?>