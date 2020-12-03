<?php
    include 'config/config.php';
    if ($_SESSION['object']=='3' || $_SESSION['object']=='2') header('Location: homepage.php');
    include 'header.php';
    
    
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-store" style="margin-right:5px;"></i>
            Cửa hàng</a></li>
            
        </ul>

<?php
    include 'menu.php';
?>


    
<div class="container">
  <!-- Button to Open the Modal -->
  <h2></h2>
  
  <div class="d-fex justify-content-end" style="text-align: right;">
      
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  <i class="fas fa-plus-circle"></i> Thêm cửa hàng
  </button>
  </div>
  <div>
  <h4>Danh sách cửa hàng:</h4>
  <div id="records-contant"></div>
  
  </div>
  
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm cửa hàng mới</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
        <!--
          <form class="form-group" action="">
              <label> Mã cửa hàng:</label>
              <input type="text" class="form-control" name="idstore" id="idstore" placeholder="Ví dụ: L001">

          </form>
          -->
          <form class="form-group" action="">
              <label> Tên cửa hàng:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Ví dụ: KFC">

          </form>
          <form class="form-group" action="">
              <label> Đường dẫn (URL):</label>
              <input type="url" class="form-control" name="url" id="url" placeholder="Ví dụ: http://www.kfc.com/home">

          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Lưu</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
        
      </div>
    </div>
  </div>



  <!--Update -->



  <!-- The Modal -->
  <div class="modal" id="up-myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chỉnh sửa thông tin cửa hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
        <!--
          <form class="form-group" action="">
              <label for="up-idstore"> Mã cửa hàng:</label>
              <input type="text" class="form-control" name="idstore" id="up-idstore" placeholder="Ví dụ: L001">

          </form>
          -->
          <form class="form-group" action="">
              <label for="up-name"> Tên cửa hàng:</label>
              <input type="text" class="form-control" name="name" id="up-name" placeholder="Ví dụ: KFC">

          </form>
          <form class="form-group" action="">
              <label for="up-url"> Đường dẫn (URL):</label>
              <input type="url" class="form-control" name="url" id="up-url" placeholder="Ví dụ: http://www.kfc.com/home">

          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updatestoredatail()">Cập nhật</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <input type="hidden" name="" id="hidden-store">
        </div>
        
      </div>
    </div>
  </div>


  
</div>
       
    <script type="text/javascript">
    
        $(document).ready(function(){readRecord();});

        function readRecord(){
            var readrecord= "readrecord";

            $.ajax({
                url:"classic/adddata.php",
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
            
            var name= $('#name').val();
            var url= $('#url').val();
            
            $.ajax({
                url:"classic/adddata.php",
                type:'post',
                data: {
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
                url:"classic/adddata.php",
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

            $('#hidden-store').val(id);
            
            
            $.ajax({
                url:"classic/adddata.php",
                type:'post',
                data: {
                    id:id
                },
                success: function(data, status){
                    var user= JSON.parse(data);
                    $('#up-name').val(user.name);
                    $('#up-url').val(user.urlStall);
                },
                });

            $('#up-myModal').modal("show");
            
        }
        function updatestoredatail() {
            var upname=$('#up-name').val();
            var upurl=$('#up-url').val();
            var index=$('#hidden-store').val();

            $.ajax({
                url:"classic/adddata.php",
                type:'post',
                data: {
                    index:index,
                    upname:upname,
                    upurl:upurl
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