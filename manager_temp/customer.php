<?php
    include 'config/config.php';
    if ($_SESSION['object']=='3') header('Location: homepage.php');
    include 'header.php';
    
    
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-address-book" style="margin-right:5px;"></i>
            Khách hàng</a></li>
            
        </ul>
<?php
    include 'menu.php';
?>


    
<div class="container">
  <!-- Button to Open the Modal -->
  <h2></h2>
  
  <div>
  <h4>Danh sách khách hàng:</h4>
  
  <div id="records-contant">
  
  </div>
  
  </div>
  
  




  
</div>
       
    <script type="text/javascript">
    
        $(document).ready(function(){readRecord();});

        function readRecord(){
            var readrecord= "readrecord";

            $.ajax({
                url:"classic/addcustomer.php",
                type:'post',
                data: {
                    readrecord:readrecord
                },
                success: function(data, status){
                    $('#records-contant').html(data);
                },
            });
        }

        function Delete(dataid) {
            var conf= confirm("Bạn có chắc chắn muốn xóa? ");
            if (conf==true){
                $.ajax({
                url:"classic/addcustomer.php",
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
        
       

    </script>
        
<?php
    include 'footer.php';
?>