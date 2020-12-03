<?php
    include 'header.php';
    include 'config/config.php';
?>      
<?php
    $result = mysqli_query($con,"SELECT * FROM foo1");
?>

<?php
$name = "";
$idfood = "";
$idstore = "";
$price = "";
$show ="";

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["idfood"])) { $idfood = $_POST['idfood']; }
    if(isset($_POST["idstore"])) { $idstore = $_POST['idstore']; }
    if(isset($_POST["price"])) { $price = $_POST['price']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO foo1 (IDfood,name, IDstall, price)
    VALUES ('$idfood','$name', '$idstore', '$price')";

    if ($con->query($sql) === TRUE) {
        $show= "Thêm dữ liệu thành công";
    } else {
        $show= "Thêm dữ liệu thất bại";
    }
}

?>
        <!--inventory.css-->
        <div class="orders imports">
            
            <div class="orders-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Danh sách món ăn</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btnadd btn-primary"  onclick="showput()">
                        <i class="fa fa-plus"></i> Thêm sản phẩm
                    </button>
                       
                </div>
            </div>
       
    <div class="main-space orders-space"></div>
    <div class="orders-content">
        <div class="imports-main-body">
            
        </div>
    </div>
</div>
<div class="putproduct">
    <div class="subputproduct" id="subputproduct">
        <form method="post" action=""> 
            
            <input type="text" name="name" placeholder="Tên sản phẩm">
            
            <input type="text" class="idfood"  name="idfood" placeholder="Mã sản phẩm">

            <input type="text" class="idstore"  name="idstore" placeholder="Mã cửa hàng">
            
            <input type="text" class="note" name="note" placeholder="Ghi chú"> 
            
            <input type="number" class="price" name="price" step="1000" placeholder="Giá sản phẩm"> 
            <select id="cars" class="cars" name="cars">
                        <option value="vnđ">vnđ</option>
                      </select>
            <br><br>
            <input type="submit" name="submit" value="Thêm vào" data-toggle="modal" data-target="#myModal"
            style="width: 80px; height: 30px; border-radius: 0.5rem; ">  
            <button type="button" class="offadd" onclick="showput()" >Đóng phiếu</button>
          </form>
    
  </div>
  <div class ="container">
  
    <div id="showinfo" class="alert alert-info" style=" border-radius: 0.5rem;
    background: rgb(119, 233, 233); padding: 0px 10px; font-size: 30px; display:block; margin-top: 5px;">
    <strong><?php echo $show; ?></strong>
    </div>
    </div>
    <!--in inventory.css-->
    <div class="product-results">
         <table class="table table-bordered table-striped" border="1">
                                            <thead>
                                            <tr style="background: rgb(135, 182, 230);">
                                                <th class="stt">STT</th>
                                                <th class="text-center">Mã cửa hàng</th>
                                                <th class="text-center">Mã sản phẩm</th>
                                                <th class="id">Tên sản phẩm</th>
                                                <th class="text-center">Giá bán</th>
                                                <th>Action</th>
                                            </tr>
            <?php
            $index=1;
           
            while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $index++; ?></td>
                <td><?php echo $row['IDstall']; ?></td>
                <td><?php echo $row['IDfood']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
            
            <?php endwhile;?>
                                            </thead>
         </table>
        </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<?php
    include 'footer.php';
?>
       