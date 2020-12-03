<?php
    include '../config/config.php';
?>

<?php
    extract($_POST);  

    $imfood= array();
    $nafood= array();

        $temp2= mysqli_query($con,"SELECT * FROM foo1");
        if (mysqli_num_rows($temp2) >0){
            while($row = mysqli_fetch_array($temp2)){
                $imfood[$row['IDfood']]=$row['url'];
                $nafood[$row['IDfood']]=$row['name'];
            }
        }
      
    if (isset($_POST['notreadrecord'])){
        $idstore=$_POST['notreadrecord'];
        $data= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >Mã đơn hàng</th>
            <th >Thời gian</th>
            <th >Số món</th>
            <th >Giá bán</th>
            <th >Trạng thái</th>
            <th>Xem chi tiết</th>
            <th>Cập nhật</th>
            
        </tr>';
            if ($idstore=="") $temp=mysqli_query($con,"SELECT * FROM orders WHERE status='0'");
            else $temp=mysqli_query($con,"SELECT * FROM orders WHERE status='0' AND IDstall='$idstore'");

            if (mysqli_num_rows($temp) >0){
            $num=0;
            
            while($row = mysqli_fetch_array($temp))
            {
                
               
                $data .= '<tr>
                    <td>' . $row['IDorder'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['total'] . '</td>
                    <td>' . $row['total-price'] . '</td>
                    <th >Chưa hoàn thành</th>
                    <td>  
                        <button onclick="Seen(' .  $row['IDorder'] . ')" class="btn btn-warning"> <i class="fas fa-eye"></i></button>
                    </td>
                    <td>
                        <button onclick="UpdateOK(' . $row['IDorder'] . ')"  class="btn btn-primary"> Hoàn Thành</button>
                    </td>
                    </tr>';
                
            }
            }
        
      
        $data.='</table>';
        echo $data;
    }

    if (isset($_POST['readrecord'])){
        $data= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >Mã đơn hàng</th>
            <th >Thời gian</th>
            <th >Số món</th>
            <th >Giá bán</th>
            <th >Trạng thái</th>
            <th>Cập nhật trạng thái</th>
            <th>Xóa</th>
            
        </tr>';
       
            $temp=mysqli_query($con,"SELECT * FROM orders WHERE status='1'");
            if (mysqli_num_rows($temp) >0){
            $num=0;
            
            while($row = mysqli_fetch_array($temp))
            {
                
               
                $data .= '<tr>
                    <td>' . $row['IDorder'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['total'] . '</td>
                    <td>' . $row['total-price'] . '</td>
                    <th >Đã hoàn thành</th>
                    <td>  
                        <button onclick="UpdateNot(' .  $row['IDorder'] . ')" class="btn btn-dark"> Chưa hoàn thành</button>
                    </td>
                    <td>
                        <button onclick="Delete(' . $row['IDorder'] . ')"  class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                
            }
            }
        
      
        $data.='</table>';
        echo $data;
    }

    if (isset($_POST['id'])){
        
        $idor=$_POST['id'];
        $data ='<label > Mã đơn hàng số '.$idor.'</label>';
        $data  .= ' <table class="table table-bordered table-striped" >
        <tr>
            <th >STT</th>
            <th >#</th>
            <th >Tên món ăn</th>
            <th >Số phần</th>
        </tr>';
       
            $temp=mysqli_query($con,"SELECT * FROM detailorder WHERE IDorder='$idor'");
            if (mysqli_num_rows($temp) >0){
            $num=1;
            
            while($row = mysqli_fetch_array($temp))
            {
                
               
                $data .= '<tr>
                    <td>' . $num++ . '</td>
                    <td><img src="' . $imfood[$row['IDfood']] . '" width="25"></td>
                    <td>' . $nafood[$row['IDfood']]  . '</td>
                    <td>' . $row['number'] . '</td>
                    </tr>';
                
            }
            }
        
      
        $data.='</table>';
        echo $data;
    }
    if (isset($_POST['dataid'])){
        $idcheck= $_POST['dataid'];
        $deletequery1= "DELETE FROM `orders` WHERE IDorder= '$idcheck'";
        $deletequery2= "DELETE FROM `detailorder` WHERE IDorder= '$idcheck'";

        mysqli_query($con, $deletequery1);
        mysqli_query($con, $deletequery2);

    }

    if (isset($_POST['idorder'])) {
        $idorder= $_POST['idorder'];
            $query = "UPDATE `orders` SET `status`='1' WHERE IDorder='$idorder'";
                mysqli_query($con, $query);
                echo 'Đã cập nhật';
    }

    if (isset($_POST['idordernot'])) {
        $idorder= $_POST['idordernot'];
            $query = "UPDATE `orders` SET `status`='0' WHERE IDorder='$idorder'";
                mysqli_query($con, $query);
                echo 'Đã cập nhật';
    }


?>