<?php
    include '../config/config.php';
?>
<?php
    extract($_POST); 

    $temp= mysqli_query($con,"SELECT * FROM sto1");
    $idtoname= array();
    while($row = mysqli_fetch_array($temp)){
        $idtoname[$row['IDstall']]=$row['name'];
    }
    

    if (isset($_POST['readrecord'])){
        $data= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >STT</th>
            <th >Tên nhân viên</th>
            <th >Mã nhân viên</th>
            <th >Vị trí</th>
            <th >Cửa hàng</th>
            <th >Email</th>
            <th >Số điện thoại</th>
            <th>Cập nhật</th>
            
        </tr>';
        
        $result= mysqli_query($con,"SELECT * FROM staff");

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {
                if ($row['Object']=='1') $Ob="Admin"; 
                else if ($row['Object']=='2') $Ob="Quản lí"; 
                else  $Ob="Nhân viên"; 

                $data .= '<tr>
                    <td>' . $num . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['ID'] . '</td>
                    <td>' . $Ob . '</td>
                    <td>' . $idtoname[$row['IDstall']] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>  
                        <button onclick="Update(' .  $row['ID'] . ')" class="btn btn-warning"> <i class="fas fa-edit"></i></button>
                     
                        <button onclick="Delete(' . $row['ID'] . ')"  class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
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
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $ob=$_POST['ob'];
        $idstore=$_POST['idstore'];
        $ph=$_POST['ph'];

        if ($name != "" && $email != ""  && $pass != "" && $ob != "" && $idstore != "") {
        $query = "INSERT INTO `staff` (`name`,`email`, `password`, `IDstall`, `Object`,`phone`)
                VALUES ('$name','$email','$pass','$idstore','$ob','$ph')";

            mysqli_query($con, $query);
            echo 'Đã thêm ';
        
        } else echo 'Thêm thất bại, bạn phải điền đủ các thông tin '; 
        
    }

    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery= "DELETE FROM `staff` WHERE ID= '$idcheck'";

        mysqli_query($con, $deletequery);

    }
    if (isset($_POST['id'])){

        $staff_id= $_POST['id'];

        $updatequery= "SELECT * FROM `staff` WHERE ID='$staff_id'";

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
        $upph= $_POST['upph'];
        $upob =$_POST['upob'];
        $upidstore=$_POST['upidstore'];
        $upname= $_POST['upname'];
        $uppass= $_POST['uppass'];
        $upemail =$_POST['upemail'];
        
           
        $query = "UPDATE `staff` SET `name`='$upname',`email`='$upemail',`password`='$uppass', `phone`='$upph',`Object`='$upob', `IDstall`='$upidstore' WHERE ID='$index'";
           
            
        mysqli_query($con, $query);
        echo 'Đã cập nhật';
            
        

    }
?>