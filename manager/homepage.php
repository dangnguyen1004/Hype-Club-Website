<?php
    include 'config/config.php';
    $saveob=$_SESSION['object'];
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Food Court Management</title>
        <link rel="stylesheet" type="text/css" href="css\homepage.css">
        <link rel="stylesheet" type="text/css" href="css\background.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <script src="https://kit.fontawesome.com/a00706d209.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>
    <body >
    
    <nav class="navbar navbar-expand-sm  navbar-dark" style="background: #040b2b ;">
    <?php
        
        echo '<button onclick="actionmenu('.$saveob.')" class="btn btn-dark"
        style="margin-right:5px;"><i class="fas fa-bars"></i></button>';
    ?>
        <a class="navbar-brand" href="#">VIOFOOD</a>
        
        <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#">
            <i class="fa fa-home" aria-hidden="true" style="margin-right:5px;"></i>Trang chủ</a></li>
            
        </ul>
        <form class="form-inline " action="index.php" style="position: absolute; right: 10px;">
        <button class="btn btn-success" type="submit">Đăng xuất <i class="fas fa-sign-out-alt"></i></i></button>
        </form>
    </nav>

        <nav class="menu" id="menu">
            <ul class="mainmenu" id="mainmenu">
                
                <li><a href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ
                    </a></li>
                <li><a href="payment.php"><i class="fa fa-cash-register" aria-hidden="true"></i>Thanh toán
                    </a></li>
                <li><a href="product2.php"><i class="fa fa-pizza-slice" aria-hidden="true"></i>Món ăn
                    </a></li>
                <li><a href="report.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>Báo cáo
                        </a></li>
                <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cập nhật
                    <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu3">
                        <li><a href="order.php">Đơn hàng</a></li>
                        <li><a href="customer.php">Khách hàng</a></li>
                        <li><a href="staff.php">Nhân viên</a></li>
                        <li><a href="store.php">Cửa hàng</a></li>
                        
                        
                        
                    </ul>
                </li>
            </ul>
        </nav>
        <!--<img src="picture/bghome1.png" alt="photo" width="100%" heigth="100%">-->
        <div class="title">
        <img src="picture/logo2.png" alt="photo" width="120">
        <div class="after" >
            <h1>FOOD COURT MANAGEMENT</h1>
        </div>
        <div class="">
            <h6>THANH TOÁN * CẬP NHẬT DANH SÁCH * QUẢN LÍ TÀI KHOẢN * BÁO CÁO</h4>
            
        </div>
        </div>
        

        <script type="text/javascript" >
        function actionmenu(ob) {
        // in home.html
        if (document.getElementById("menu").style.display=="none"){
             document.getElementById("menu").style.display= "block";
             if (ob==4) alert("Chào Bạn! Bạn chỉ có thể truy cập vào trang cập nhật đơn hàng.");
             else
             if (ob==3) alert("Chào Bạn! Bạn chỉ có thể truy cập vào trang thanh toán và cập nhật đơn hàng.");
        }
         else {
             document.getElementById("menu").style.display= "none";
             
         }
   
        }
        </script>
        
    </body>
</html>