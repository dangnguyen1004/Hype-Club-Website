<?php
    include '../config/config.php';
?>
<?php
    extract($_POST);  

    if (isset($_POST['readrecord'])){
        $idshow=$_POST['readrecord'];
        $data= ' <table class="table table-bordered table-striped " >
        <tr>
            <th >STT</th>
            <th >#</th>
            <th >Cửa hàng</th>
            <th >Tên món ăn</th>
            <th >Mã món ăn</th>
            <th >Giá bán</th>
            <th>Cập nhật</th>
            
        </tr>';
        if ($idshow == "")
        $result= mysqli_query($con,"SELECT * FROM foo1"); 
        else $result= mysqli_query($con,"SELECT * FROM foo1 WHERE IDstall='$idshow'");
        

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {
                

                $data .= '<tr>
                    <td>' . $num . '</td>
                    <td><img src="' . $row['url'] . '" width="25"></td>
                    <td>' . $row['stallname'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['IDfood'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>  
                        <button onclick="Update(' .  $row['IDfood'] . ')" class="btn btn-warning"> <i class="fas fa-edit"></i></button>
                     
                        <button onclick="Delete(' . $row['IDfood'] . ')"  class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                $num++;
            }
        }
        $data.='</table>';
        echo $data;
    }

    if (isset($_POST['name'])  && isset($_POST['url']) && isset($_POST['price']) && isset($_POST['idstore'])) {
        $idstore= $_POST['idstore'];
        $name=$_POST['name'];
        $url=$_POST['url'];
        $price= $_POST['price'];


        if ($name != "" && $url != "" && $idstore != "" && $price!= "") {
            
            $temp=$idstore;
             $result = mysqli_query($con,"SELECT * FROM sto1");
             while($row = mysqli_fetch_array($result)) { 
                if ($row['IDstall']==$temp) $namestore=$row['name'];
             } ;
             if ($idstore=='3') {
        $query = "INSERT INTO `foo1`(`IDfood`, `name`, `IDstall`, `price`, `url`, `stallname`)
             VALUES (NULL,'$name','3','$price','$url', 'McDonald\'s')";
             
             }
         else $query = "INSERT INTO `foo1`(`IDfood`, `name`, `IDstall`, `price`, `url`, `stallname`)
             VALUES (NULL,'$name','$idstore','$price','$url', '$namestore')";

        

        $result=mysqli_query($con, "SELECT * FROM `foo1` WHERE name='$name' AND IDstall='$idstore'");
        if (mysqli_num_rows($result) >0){
            echo 'Món ăn đã có trong cửa hàng';
        } else {
            mysqli_query($con, $query);
            echo 'Đã thêm ';
        }
        } else echo 'Thêm thất bại, bạn phải điền đủ các thông tin '; 
        
    }

    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery= "DELETE FROM `foo1` WHERE IDfood= '$idcheck'";

        mysqli_query($con, $deletequery);

    }

    if (isset($_POST['id'])){

        $food_id= $_POST['id'];

        $updatequery= "SELECT * FROM `foo1` WHERE IDfood='$food_id'";

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
        

    } else {
        $response['status']=200;
        $response['message']="Invaid Request!";
    
    }

    if (isset($_POST['index'])) {
        $index= $_POST['index'];
        $upname= $_POST['upname'];
        $upurl =$_POST['upurl'];
        $upprice =$_POST['upprice'];
        $upidstore=$_POST['upidstore'];
        if ($upname != "" && $upurl != "" && $upprice != "") {
           
            $query = "UPDATE `foo1` SET `name`='$upname',`url`='$upurl', `price`='$upprice' WHERE IDfood='$index'";
            $result=mysqli_query($con, "SELECT * FROM `foo1` WHERE name='$upname' AND IDstall='$upidstore'  AND IDfood != '$index' ");
            if (mysqli_num_rows($result) >0){
                echo 'Món ăn đã có trong cửa hàng';
            } else {
                mysqli_query($con, $query);
                echo 'Đã cập nhật';
            }
        } else echo 'Cập nhật thất bại, bạn phải điền đủ các thông tin '; 

    }

?>