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
            <th >Mã khách hàng</th>
            <th >Tên khách hàng</th>
            <th >Số điện thoại</th>
            <th >Email</th>
            <th >Địa chỉ</th>
            <th >Ngày mua cuối</th>
            <th >Tổng tiền</th>
            <th>Xóa</th>
            
        </tr>';
        
        $result= mysqli_query($con,"SELECT * FROM customer");

        if (mysqli_num_rows($result) > 0){
            $num=1;
            
            while($row = mysqli_fetch_array($result))
            {
                

                $data .= '<tr>
                    <td>' . $row['ID'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['created'] . '</td>
                    <td>' . $row['money'] . '</td>
                    <td>  
                        <button onclick="Delete(' . $row['ID'] . ')"  class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                $num++;
            }
        }
        $data.='</table>';
        echo $data;
    }

   

    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery= "DELETE FROM `customer` WHERE ID= '$idcheck'";

        mysqli_query($con, $deletequery);

    }
    

   
?>