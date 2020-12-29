<?php
    include '../conn.php';
?>
<?php
    extract($_POST); 

    if (isset($_POST['readrecord'])){
        $data= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >ID</th>
            <th >Name</th>
            <th >Phone Number</th>
            <th >Address</th>
            <th >Position</th>
            <th class="action">Action</th>
            
            
        </tr>';
        $result= mysqli_query($con,"SELECT * FROM staff");

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {

                $data .= '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['FullName'] . '</td>
                    <td>' . $row['PhoneNumber'] . '</td>
                    <td>' . $row['Address'] . '</td>
                    <td>' . $row['Position'] . '</td>
                    <td>  
                        <button onclick="Update(' .  $row['id'] . ')"  class="btn btn-warning"> <i class="fas fa-edit"></i></button>
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
            <th >Name</th>
            <th >Phone Number</th>
            <th >Address</th>
            <th >Position</th>
            <th class="action">Action</th>
            
            
        </tr>';
        $result= mysqli_query($con,"SELECT * FROM staff WHERE Position='$filter'");

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {
                $data .= '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['FullName'] . '</td>
                    <td>' . $row['PhoneNumber'] . '</td>
                    <td>' . $row['Address'] . '</td>
                    <td>' . $row['Position'] . '</td>
                    <td>  
                        <button onclick="Update(' .  $row['id'] . ')"  class="btn btn-warning"> <i class="fas fa-edit"></i></button>
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
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $job=$_POST['job'];
        
        if ((int)$id != $id) echo 'Id must a integer value';
        else if ($id<0) echo 'Id must greater than 0';
        else if (strlen($name) < 2 || strlen($name) >40) echo 'Name must in range 2-40 character!';
        else if (strlen($address) < 2 || strlen($address) >40) echo 'Address must in range 2-40 character!!';
        else {

        if ($name != "" && $id != ""  && $phone != "" && $job != "" && $address != "") {

        $query = "INSERT INTO `staff` 
                VALUES ('$id','$name','$phone','$address','$job')";

            mysqli_query($con, $query);
            echo 'Đã thêm';

        
        } else echo 'Thêm thất bại, bạn phải điền đủ các thông tin '; 
        
        }
        
    }

    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery= "DELETE FROM `staff` WHERE id= '$idcheck'";

        mysqli_query($con, $deletequery);

    }

    if (isset($_POST['idup'])){

        $staff_id= $_POST['idup'];

        $updatequery= "SELECT * FROM `staff` WHERE id='$staff_id'";

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
        $upphone=$_POST['upphone'];
        $upjob=$_POST['upjob'];
        $upaddress=$_POST['upaddress'];

        
        if ((int)$upid != $upid) echo 'Id must a integer value';
        else if ($upid<0) echo 'Id must greater than 0';

        else if (strlen($upname) < 2 || strlen($upname) >40) echo 'Name must in range 2-40 character!';
        else if (strlen($upaddress) < 2 || strlen($upaddress) >40) echo 'Address must in range 2-40 character!!';
        else {
           
        $query = "UPDATE `staff` SET `id`='$upid',`FullName`='$upname',`PhoneNumber`='$upphone',`Address`='$upaddress',`Position`='$upjob' WHERE id='$index'";
           
            
        mysqli_query($con, $query);
        echo 'Đã cập nhật';
        }
            
        

    }

    
?>