<?php
    include 'config/config.php';
    if ($_SESSION['object']=='3') header('Location: homepage.php');
    include 'header.php';
    $result = mysqli_query($con,"SELECT * FROM sto1");
    
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#"> <i class="fa fa-pizza-slice" aria-hidden="true" style="margin-right:5px;"></i>
            Món ăn</a></li>
            
        </ul>
        <?php
    include 'menu.php';
?>


    
<div class="container">
  <!-- Button to Open the Modal -->
  <h2></h2>
  
  <div class="d-fex justify-content-end" style="text-align: right;">
      
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  <i class="fas fa-plus-circle"></i> Thêm món ăn
  </button>
  </div>
  <div>
  
  <form class="form-inline" action="">
  <h4 style="margin-right:20px;">Danh sách món ăn:</h4>
  <select class="form-control mr-sm-2" id="show-store">
    <?php if ($_SESSION['object']==1) { ?>
        <option value="">Cửa hàng</option>
    <?php } ?>
        <?php $result = mysqli_query($con,"SELECT * FROM sto1");
        while($row = mysqli_fetch_array($result)){ 
           if ($_SESSION['object']=='1') {?>
        <option
        value="<?php echo $row['IDstall']; ?>"><?php echo $row['name']; ?></option>
        <?php } else if ($_SESSION['idst'] == $row['IDstall'] && $_SESSION['object'] !='1' ) { ?>
            <option value="<?php echo $row['IDstall']; ?>"><?php echo $row['name']; ?></option>
        <?php }
        } ?>
   </select>
   <?php if ($_SESSION['object']==1) { ?>
   <button type="button" class="btn btn-primary" onclick="readRecord()">Lọc</button>
   <?php } ?>
   </form>
  <div id="records-contant" style="margin-top:10px;"></div>
  
  </div>
  
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm món ăn</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
            <form class="form-group" action="">
            <select class="form-control" id="idstore">
            <?php if ($_SESSION['object']==1) { ?>
        <option value="">Cửa hàng</option>
    <?php } ?>
        <?php $result = mysqli_query($con,"SELECT * FROM sto1");
        while($row = mysqli_fetch_array($result)){ 
           if ($_SESSION['object']=='1') {?>
        <option
        value="<?php echo $row['IDstall']; ?>"><?php echo $row['name']; ?></option>
        <?php } else if ($_SESSION['idst'] == $row['IDstall'] && $_SESSION['object'] !='1' ) { ?>
            <option value="<?php echo $row['IDstall']; ?>"><?php echo $row['name']; ?></option>
        <?php }
        } ?>
            </select>

            </form>

            <form class="form-group" action="">
              <label> Tên món ăn:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Ví dụ: Mì ý">

          </form>
          <form class="form-group" action="">
              <label> Giá bán (vnđ):</label>
              <input type="text" class="form-control" name="price" id="price" placeholder="Ví dụ: 100000">

          </form>
        
          
          <form class="form-group" action="">
              <label> Đường dẫn hình ảnh (URL):</label>
              <input type="url" class="form-control" name="url" id="url" placeholder="Ví dụ: http://www.kfc.com/home">
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Lưu</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <input type="hidden" name="" id="idfood">
        </div>
        
      </div>
    </div>
  </div>



  <!--Update -->
  <div class="modal" id="up-myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chỉnh sửa món ăn</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >

            <form class="form-group" action="">
              <label> Tên món ăn:</label>
              <input type="text" class="form-control" name="up-name" id="up-name" placeholder="Ví dụ: Mì ý">

          </form>
          <form class="form-group" action="">
              <label> Giá bán (vnđ):</label>
              <input type="text" class="form-control" name="up-price" id="up-price" placeholder="Ví dụ: 100000">

          </form>
        
          
          <form class="form-group" action="">
              <label> Đường dẫn hình ảnh (URL):</label>
              <input type="url" class="form-control" name="up-url" id="up-url" placeholder="Ví dụ: http://www.kfc.com/home">

          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updatefooddatail()">Lưu</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <input type="hidden" name="" id="upidfood">
            <input type="hidden" name="" id="upidstore">
        </div>
        
      </div>
    </div>
  </div>

</div>


       
    <script type="text/javascript">
    
        $(document).ready(function(){readRecord();});

        function readRecord(){

            var readrecord= "";
            readrecord= $('#show-store').val();

            $.ajax({
                url:"classic/addproduct.php",
                type:'post',
                data: {
                    readrecord:readrecord
                },
                success: function(data, status){
                    $('#records-contant').html(data);
                },
            });
        }

        function addRecord(){
            var idstore= $('#idstore').val();
            var name= $('#name').val();
            var url= $('#url').val();
            var price= $('#price').val();
            
            $.ajax({
                url:"classic/addproduct.php",
                type:'post',
                data: {
                    idstore:idstore,
                    price:price,
                    name:name,
                    url: url
                },
                success: function(data, status){
                    alert(data);
                    readRecord();
                }, 
            });
        }

        function Delete(dataid) {
            var conf= confirm("Bạn có chắc chắn muốn xóa? ");
            if (conf==true){
                $.ajax({
                url:"classic/addproduct.php",
                type:'post',
                data: {
                    dataid:dataid
                },
                success: function(data, status){
                    readRecord();
                },
                });
            }
        }
        
        function Update(id) {

            $('#upidfood').val(id);
            
            
            $.ajax({
                url:"classic/addproduct.php",
                type:'post',
                data: {
                    id:id
                },
                success: function(data, status){
                    var food= JSON.parse(data);
                    $('#up-name').val(food.name);
                    $('#up-price').val(food.price);
                    $('#up-url').val(food.url);
                    $('#upidstore').val(food.IDstall);
                },
                });

            $('#up-myModal').modal("show");
            
        }
        function updatefooddatail() {
            var upname=$('#up-name').val();
            var upurl=$('#up-url').val();
            var upprice=$('#up-price').val();
            var index= $('#upidfood').val();
            var upidstore= $('#upidstore').val();

            $.ajax({
                url:"classic/addproduct.php",
                type:'post',
                data: {
                    index:index,
                    upname:upname,
                    upurl:upurl,
                    upprice:upprice,
                    upidstore:upidstore
                },
                success: function(data, status){
                    alert(data);
                   readRecord();
                },
            });
        }

    </script>
        
<?php
    include 'footer.php';
?>