 <?php
    include 'config/config.php';
    if ($_SESSION['object']=='3') header('Location: homepage.php');
    include 'header.php';
?>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#"> <i class="fa fa-file-text-o" aria-hidden="true" style="margin-right:5px;"></i>
            Báo cáo</a></li>
            
        </ul>
<?php
    include 'menu.php';
?>
<div class="container">
<form class="form-inline" action="" style="margin-top:10px;">
  
  <select class="form-control mr-sm-2" id="show-store"  >
        <option value="">Cửa hàng</option>
        <?php   $result = mysqli_query($con,"SELECT * FROM sto1");
        while($row = mysqli_fetch_array($result)){ ?>
        <option
        value="<?php echo $row['IDstall']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
   </select>
   <button type="button" class="btn btn-primary" onclick="readRecord()">Cập nhật</button>
</form>
    <div>
    <h4 style="text-align: center; text-decoration: black;">Hoạt động hôm nay</h4>
    <div class="row">
    <button class="col-sm btn-success" style="width: 30px; border-radius: 0.5rem;">Tiền bán hàng (vnđ)
    <br>
    <div id="money">0</div>
    </button>
    <button class="col-sm btn-primary" style="width: 30px; margin-left:10px; border-radius:  0.5rem;">Số đơn hàng
    <br>
    <div id="totalorder">0</div>
    </button>
    <button class="col-sm btn-danger" style="width: 30px; margin-left:10px; border-radius:  0.5rem;">Số hàng lỗi
    <br>
    <div id="error">0</div>
    </button>
    <button class="col-sm btn-warning" style="width: 30px; margin-left:10px; border-radius:  0.5rem;  color: aliceblue;">Đơn hàng App
    <br>
    <div id="Apporder">0</div>
    </button>
    </div>
    </div>
           
    <div>
    <form class="form" action="" style="margin-top:30px; text-align: center;" >
    <span style="text-align: center; text-decoration: black;">Hoạt động từ ngày</span>
    <input type="date" class="control" id="beginday" >
    <span style="text-align: center; text-decoration: black;">đến ngày</span> 
    <input type="date" class="control" id="endday">
    
    </form>
    <div class="row" style="margin-top:10px;">
    <button class="col-sm btn-success" style="width: 30px; border-radius: 0.5rem;">Tiền bán hàng (vnđ)
    <br>
    <div id="money2">0</div>
    </button>
    <button class="col-sm btn-primary" style="width: 30px; margin-left:10px; border-radius:  0.5rem;">Số đơn hàng
    <br>
    <div id="totalorder2">0</div>
    </button>
    <button class="col-sm btn-danger" style="width: 30px; margin-left:10px; border-radius:  0.5rem;">Số hàng lỗi
    <br>
    <div id="error2">0</div>
    </button>
    <button class="col-sm btn-warning" style="width: 30px; margin-left:10px; border-radius:  0.5rem;  color: aliceblue;">Đơn hàng App
    <br>
    <div id="Apporder2">0</div>
    </button>
    </div>
    </div>
</div>

<script type="text/javascript">
    
        $(document).ready(function(){readRecord();});

        function readRecord(){

            var readrecord= $('#show-store').val();
            var beginday= $('#beginday').val();
            var endday= $('#endday').val();
            $.ajax({
                url:"classic/addreport.php",
                type:'post',
                data: {
                    readrecord:readrecord,
                    beginday:beginday,
                    endday: endday
                },
                success: function(data, status){
                   
                    var report= JSON.parse(data);
                    
                    $('#money').html(report.t1);
                    $('#totalorder').html(report.t2);
                    $('#Apporder').html(report.t3);
                    $('#money2').html(report.t4);
                    $('#totalorder2').html(report.t5);
                    $('#Apporder2').html(report.t6);
                },
            });
        }

        

    </script>

<?php
    include 'footer.php';
?>