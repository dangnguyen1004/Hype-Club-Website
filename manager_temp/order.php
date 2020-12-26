<?php
    include 'config/config.php';
   
    include 'header.php';
    
    
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-file-text-o" aria-hidden="true" style="margin-right:5px;"></i>
            Đơn hàng</a></li>
            
        </ul>
<?php
    include 'menu.php';
?>


    
    <div class="container">
  <!-- Button to Open the Modal -->
  <div>
  <h2></h2>
  <div>
  <form class="form-inline" action="">
  <h4 style="margin-right:20px;">Đơn hàng chưa hoàn thành:</h4>
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
  <div id="notrecords-contant"  style="margin-top:10px;"></div>
  
  </div>
  </div>
  <div>
  <h2></h2>
  <div>
  <h4>Đơn hàng đã hoàn thành:</h4>
  <div id="records-contant"></div>
  
  </div>
  </div>

  <div class="modal" id="myModal"  > 
    <div class="modal-dialog modal-lg" >
      <div class="modal-content"  >
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Xem chi tiết đơn hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          
             <div id="show-order"></div>

        </div>

          
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="UpdateOK2()">Hoàn Thành</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <input type="hidden" name="" id="id-order">
        </div>
        
      </div>
    </div>
  </div>


  </div>
  
  

       
    <script type="text/javascript">
    
        $(document).ready(function(){
            readRecord();}
            );


        function readRecord(){
            
            var readrecord = $('#show-store').val();

            $.ajax({
                url:"classic/addorder.php",
                type:'post',
                data: {
                    notreadrecord:readrecord
                },
                success: function(data, status){
                    $('#notrecords-contant').html(data);
                },
            });

            $.ajax({
                url:"classic/addorder.php",
                type:'post',
                data: {
                    readrecord:readrecord
                },
                success: function(data, status){
                    $('#records-contant').html(data);
                },
            });

        }

        function Seen(id) {

            $('#id-order').val(id);
            
            
            $.ajax({
                url:"classic/addorder.php",
                type:'post',
                data: {
                    id:id
                },
                success: function(data, status){
                    $('#show-order').html(data);
                },
                });

            $('#myModal').modal("show");
            
        }


        function Delete(dataid) {
            var conf= confirm("Bạn có chắc chắn muốn xóa? ");
            if (conf==true){
                $.ajax({
                url:"classic/addorder.php",
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
        
        function UpdateOK2() {

            var idorder=$('#id-order').val();

            $.ajax({
                url:"classic/addorder.php",
                type:'post',
                data: {
                    idorder:idorder
                },
                success: function(data, status){
                    alert(data);
                   readRecord();
                },
            });
        }

        function UpdateOK(idordernew) {

            $.ajax({
                url:"classic/addorder.php",
                type:'post',
                data: {
                    idorder:idordernew
                },
                success: function(data, status){
                    alert(data);
                   readRecord();
                },
            });
        }

        function UpdateNot(idordernot) {

            $.ajax({
                url:"classic/addorder.php",
                type:'post',
                data: {
                    idordernot:idordernot
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