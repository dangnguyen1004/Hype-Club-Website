<?php
    include 'config/config.php';
    if ($_SESSION['object']=='3') header('Location: homepage.php');
    include 'header.php';

    
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-id-card" style="margin-right:5px;"></i>
            Nhân viên</a></li>
            
        </ul>
        <?php
    include 'menu.php';
?>


    
<div class="container">
  <!-- Button to Open the Modal -->
  <h2></h2>
  
  <div class="d-fex justify-content-end" style="text-align: right;">
      
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  <i class="fas fa-plus-circle"></i> Thêm thành viên
  </button>
  </div>
  <div>
  <h4>Danh sách nhân viên:</h4>
  <div id="records-contant"></div>
  
  </div>
  
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm thành viên</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >

          <form class="form-group" action="">
              <label> Tên nhân viên:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Ví dụ: Nguyên Văn A">

          </form>
          <form class="form-group" action="">
              <label> Email:</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Ví dụ: A@gmail.com">

          </form>
          <form class="form-group" action="">
              <label> Mật khẩu:</label>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Ví dụ: abc456">
          </form>
          <form class="form-group" action="">
              <label>Nhập lại mật khẩu:</label>
              <input type="password" class="form-control" name="confpass" id="confpass" placeholder="Ví dụ: abc456">

          </form>
          <form class="form-group" action="">
              <label> Số điện thoại:</label>
              <input type="text" class="form-control" name="ph" id="ph" placeholder="Ví dụ: 0998645">

          </form>
          <form class="form-group" action="">
            <label> Vị trí:</label>
            <select class="form-control" id="ob">
            <option value="1">Admin</option>
            <option value="2">Quản lí</option>
            <option value="3">Nhân viên</option>
            
            </select>

          </form>
          <form class="form-group" action="">
          <label> Cửa hàng làm việc:</label>
            <select class="form-control" id="idstore">
            <?php $result = mysqli_query($con,"SELECT * FROM sto1");
             while($rowstore = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $rowstore['IDstall']; ?>"><?php echo $rowstore['name']; ?></option>
            <?php } ?>
            </select>
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
  <div class="modal" id="up-myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thay đổi thông tin thành viên</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
        <form class="form-group" action="">
              <label> Tên nhân viên:</label>
              <input type="text" class="form-control" name="up-name" id="up-name" placeholder="Ví dụ: Nguyên Văn A">

          </form>
          <form class="form-group" action="">
              <label> Email:</label>
              <input type="email" class="form-control" name="up-email" id="up-email" placeholder="Ví dụ: A@gmail.com">

          </form>
          <form class="form-group" action="">
              <label> Mật khẩu:</label>
              <input type="password" class="form-control" name="up-pass" id="up-pass" placeholder="Ví dụ: abc456">
          </form>
          <form class="form-group" action="">
              <label> Số điện thoại:</label>
              <input type="text" class="form-control" name="up-ph" id="up-ph" placeholder="Ví dụ: 0998645">

          </form>
          <form class="form-group" action="">
            <label> Vị trí:</label>
            <select class="form-control" id="up-ob">
            <option value="1">Admin</option>
            <option value="2">Quản lí</option>
            <option value="3">Nhân viên</option>
            </select>

          </form>
          <form class="form-group" action="">
          <label> Cửa hàng làm việc:</label>
            <select class="form-control" id="up-idstore">
            <?php $result = mysqli_query($con,"SELECT * FROM sto1");
             while($rowstore = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $rowstore['IDstall']; ?>"><?php echo $rowstore['name']; ?></option>
            <?php } ?>
            </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateuserdatail()">Cập nhật</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <input type="hidden" name="" id="iduser">
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
                url:"classic/addstaff.php",
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
            var email= $('#email').val();
            var pass= $('#pass').val();
            var cofpass= $('#confpass').val();
            var ob= $('#ob').val();
            var idstore= $('#idstore').val();
            var ph= $('#ph').val();
            if (pass == cofpass) {
            $.ajax({
                url:"classic/addstaff.php",
                type:'post',
                data: {
                    name:name,
                    email:email,
                    pass:pass,
                    ob:ob,
                    idstore:idstore,
                    ph:ph
                },
                success: function(data, status){
                    alert(data);
                    readRecord();
                }, 
            });
            } else alert('Nhập lại mật khẩu không trùng khớp');
        }

        function Delete(dataid) {
            var conf= confirm("Bạn có chắc chắn muốn xóa? ");
            if (conf==true){
                $.ajax({
                url:"classic/addstaff.php",
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

            $('#iduser').val(id);
            
            
            $.ajax({
                url:"classic/addstaff.php",
                type:'post',
                data: {
                    id:id
                },
                success: function(data, status){
                    var user= JSON.parse(data);
                    $('#up-name').val(user.name);
                    $('#up-email').val(user.email);
                    $('#up-pass').val(user.password);
                    $('#up-ph').val(user.phone);
                    $('#up-idstore').val(user.IDstall);
                    $('#up-ob').val(user.Object);
                },
                });

            $('#up-myModal').modal("show");
            
        }
        function updateuserdatail() {
            var upname=$('#up-name').val();
            var upemail=$('#up-email').val();
            var uppass=$('#up-pass').val();
            var upph=$('#up-ph').val();
            var upob=$('#up-ob').val();
            var upidstore=$('#up-idstore').val();
            var index=$('#iduser').val();

            $.ajax({
                url:"classic/addstaff.php",
                type:'post',
                data: {
                    index:index,
                    upob:upob,
                    upidstore:upidstore,
                    upph:upph,
                    upname:upname,
                    uppass:uppass,
                    upemail:upemail
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