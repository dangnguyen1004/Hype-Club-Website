<?php
    include 'config/config.php';
    include 'header.php';
    $num=$_SESSION['unam'] ;
    $sql_query = "select * from staff where email='$num ";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
    $name= $row['name'];
    $id=$row['id'];
       
			
    
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle" style="margin-right:5px;"></i> 
            Tài khoản</a></li>
            
        </ul>
<?php
    include 'menu.php';
?>
    <div class="container" >
  <!-- Button to Open the Modal -->
  <h2></h2>
  
  <div>
  <h4>Thông tin tài khoản:</h4>
  
  <div id="records-contant" style="width:800px;">
  <table class="table table-borderless " style="width:600px; position: absolute;" >
        <tr>
            
            <th >Cửa hàng</th>
            <th >Tên món ăn</th>
            
            
        </tr>
        <tr>
            
            <td >Cửa hàng</td>
            <td >Tên món ăn</td>
            
            
        </tr>
        </table>
  
  </div>
  
  </div>

  
  
  




  
</div>
<?php
    include 'footer.php';
?>