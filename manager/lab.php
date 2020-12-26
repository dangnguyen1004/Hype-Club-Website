<?php
session_start();
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "examples");
$con = mysqli_connect(DB_HOST,DB_USER ,DB_PASS ,DB_NAME );
mysqli_set_charset($con, "utf8");

// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
       
        <title>Cars Management</title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        
        <script src="https://kit.fontawesome.com/a00706d209.js" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        
        
    </head>
    <body >
    <div class="center">
            <div class="header">
                <h2>Cars Management</h2>

            </div>
            

    
<div class="container">
  <!-- Button to Open the Modal -->
  
  <div class="d-fex justify-content-end" style="text-align: right; margin: 20px;">
   
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  <i class="fas fa-plus-circle"></i> Add car
  </button>
  </div>

  <div>
  <h4>Cars Dataset:</h4>
  <div id="records-contant"></div>
  
  
    

  
  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Car</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >

            <form class="form-group" >
              <label> ID:</label>
              <input type="number" class="form-control" name="id" id="id" placeholder="Eg: 1">

          </form>
          <form class="form-group" >
              <label> Name car:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Eg: Honda">

          </form>
          
          <form class="form-group" >
              <label> Year:</label>
              <input type="number" class="form-control" name="year" id="year" placeholder="Eg: 2000">

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
  <div class="modal" id="up-myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Car</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >

            <form class="form-group" >
              <label> ID:</label>
              <input type="number" class="form-control" name="upid" id="upid" placeholder="Eg: 1">

          </form>
          <form class="form-group" >
              <label> Name car:</label>
              <input type="text" class="form-control" name="upname" id="upname" placeholder="Eg: Honda">

          </form>
          
          <form class="form-group" >
              <label> Year:</label>
              <input type="number" class="form-control" name="upyear" id="upyear" placeholder="Eg: 2000">

          </form>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateuserdatail()">Cập nhật</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <input type="hidden"  id="idedit">
        </div>
        
      </div>
    </div>
  </div>

  </div>


  </div>

 
  </div> <!--for center class-->
  
    <script >
    
        $(document).ready(function(){readRecord();});

        function readRecord(){
            var readrecord= "readrecord";

            $.ajax({
                url:"classic/data.php",
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
            var id= $('#id').val();
            var year= $('#year').val();
            
            
            $.ajax({
                url:"classic/data.php",
                type:'post',
                data: {
                    name:name,
                    id:id,
                    year:year
                },
                success: function(data, status){
                    $('#name').val("");
                    $('#id').val(null);
                    $('#year').val(null);
                    readRecord();
                    alert(data);
                    
                }, 
            });

        
            
        }

        function Delete(dataid) {
            var conf= confirm("Bạn có chắc chắn muốn xóa? ");
            if (conf==true){
                $.ajax({
                url:"classic/data.php",
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

            $('#idedit').val(id);
            
            
            $.ajax({
                url:"classic/data.php",
                type:'post',
                data: {
                    idup:id
                },
                success: function(data, status){
                    var user= JSON.parse(data);
                    $('#upname').val(user.name);
                    $('#upid').val(user.id);
                    $('#upyear').val(user.year);
                    
                },
                });

            $('#up-myModal').modal("show");
            
        }
        function updateuserdatail() {
            var upname=$('#upname').val();
            var upid=$('#upid').val();
            var upyear=$('#upyear').val();
            var index=$('#idedit').val();
            
            $.ajax({
                url:"classic/data.php",
                type:'post',
                data: {
                    index:index,
                    upname:upname,
                    upid:upid,
                    upyear:upyear
                    
                },
                success: function(data, status){
                    readRecord();
                    alert(data);
                   
                },
            });
            
        }

    </script>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>