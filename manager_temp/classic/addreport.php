<?php
    include '../config/config.php';
    extract($_POST);  

    if (isset($_POST['readrecord'])){
        $idstore=$_POST['readrecord'];
        $begin=$_POST['beginday'];
        $end=$_POST['endday'];
        $save=array();
        if ($_POST['readrecord']=="") $result= mysqli_query($con,"SELECT * FROM orders");
        else $result= mysqli_query($con,"SELECT * FROM orders WHERE IDstall='$idstore'");
        $price=0;
        $order=0;
        $apporder=0;
        $price2=0;
        $order2=0;
        $apporder2=0;
        if (mysqli_num_rows($result) > 0){
            
            
            while($row = mysqli_fetch_array($result))
            {
                if (substr($row['date'],0,10)==date("Y-m-d")) {
                $price += $row['total-price'];
                $order++;
                if ($row['IDcustomer']!= NULL) $apporder++;
                }
                if ($begin!= "" && $end!="") {
                if (substr($row['date'],0,10)>=$begin && substr($row['date'],0,10)<=$end) {
                    $price2 += $row['total-price'];
                    $order2++;
                    if ($row['IDcustomer']!= NULL) $apporder2++;
                    }
                }
            }
        }
        $save['t1']=$price;
        $save['t2']=$order;
        $save['t3']=$apporder;
        $save['t4']=$price2;
        $save['t5']=$order2;
        $save['t6']=$apporder2;

        
        
        echo json_encode($save);
    }

?>
