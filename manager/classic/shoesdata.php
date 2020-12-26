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
                        <button onclick="See(' .  $row['id'] . ')" class="btn btn-warning"> <i class="far fa-eye"></i></button>
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
        $year=$_POST['year'];
        
        if ((int)$id != $id) echo 'Id must a integer value';

        else if (strlen($name) < 5 || strlen($name) >40) echo 'Name must in range 5-40 character!';
        else if ($year < 1990 || $year > 2015) echo 'Year must in 1990-2015!';
        else {

        if ($name != "" && $id != ""  && $year != "" ) {

        $query = "INSERT INTO `cars` (`id`,`name`, `year`)
                VALUES ('$id','$name','$year')";

            mysqli_query($con, $query);
            echo 'Đã thêm';

        
        } else echo 'Thêm thất bại, bạn phải điền đủ các thông tin '; 
        
        }
        
    }

    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery= "DELETE FROM `cars` WHERE id= '$idcheck'";

        mysqli_query($con, $deletequery);

    }

    if (isset($_POST['idup'])){

        $car_id= $_POST['idup'];

        $updatequery= "SELECT * FROM `cars` WHERE id='$car_id'";

        if (!$result=mysqli_query($con, $updatequery)){
            exit(mysqli_error());
        } 

        $response= array();
        
        if (mysqli_num_rows($result) >0){
            while($row=mysqli_fetch_assoc($result)){
                $response=$row;
            }
        } else {
            $response['status']=200;
            $response['message']="Data not found!";
        }

        echo json_encode($response);
        

    } 

    if (isset($_POST['index'])) {
        
        $index= $_POST['index'];
        $upid= $_POST['upid'];
        $upname =$_POST['upname'];
        $upyear=$_POST['upyear'];
        
        if ((int)$upid != $upid) echo 'Id must a integer value';

        else if (strlen($upname) < 5 || strlen($upname) >40) echo 'Name must in range 5-40 character!';
        else if ($upyear < 1990 || $upyear > 2015) echo 'Year must in 1990-2015!';
        else {
           
        $query = "UPDATE `cars` SET `id`='$upid',`name`='$upname',`year`='$upyear' WHERE id='$index'";
           
            
        mysqli_query($con, $query);
        echo 'Đã cập nhật';
        }
            
        

    }

    
?>