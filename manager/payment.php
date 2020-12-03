<?php
    include 'config/config.php';
    $money=0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Court Management</title>
    <link href="css\payment\bootstrap.min.css" rel="stylesheet">
    <link href="css\payment\font-awesome.min.css" rel="stylesheet">
    <link href="css\payment\style.css" rel="stylesheet">
    <link href="css\payment\jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\homepage.css">

        <script src="https://kit.fontawesome.com/a00706d209.js" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        

    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap');
        .title{
            font-family: 'Josefin Sans', sans-serif;
            margin-left:20px;
            font-size: 25px;
            margin-right:50px;
        }
        .text{
            font-family: 'Josefin Sans', sans-serif;
            margin-left:20px;
            font-size: 20px;
            color: rgb(132, 134, 168);
        }
    </style>
	
</head>
<body>

<section id="pos" class="main" role="main">
    <div class="showipayment">
        <div class="header-payment" >
            <a class="title">VIOFOOD</a>
            <a class="text"><i class="fa fa-cash-register" aria-hidden="true" style="margin-right:5px;"></i>Thanh toán</a>
            <a href="homepage.php">
                <button type="button" class="btn btn-primary"
                onclick="cms_javascript_redirect( cms_javascrip_fullURL() )" style="position: absolute; right:10px;">Trở về
				</button>
            </a>
        </div>     
         
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 padd-left-0">
                <div class="main-content">
                    
                    <div >
                        <div class="row">
                            <div class="orders-act">
                                <div class="col-md-8">
                                    <div class="order-search" style="margin: 10px 0px; position: relative;">
                                        <input type="text" class="form-control" onkeyup="showResult(this.value)"
                                               placeholder="Nhập mã đơn hàng"
                                               id="search-pro-box">
                                               
                                               
                                    </div>
                                    <div class="product-results">
                                    <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                            <th >STT</th>
                                            <th>#</th>
                                            <th>Tên món ăn</th>
                                            <th >Số lượng</th>
                                            <th >Giá bán</th>
                                            <th >Thành tiền</th>
            
                                            </tr>
                                            </thead>
                                            <tbody id="pro_search_append">
                                            </tbody>
                                            </table>
                                        
                                        
                                        
                                        <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã đơn hàng hộp tìm kiếm để tiến hành thanh toán
                                        </div>

                                        <div>
                                            <h2></h2>
                                            <div>
                                            
                                            <label style="font-size:20px;">Đơn hàng đã hoàn thành (call):</label>
                                            <button type="submit" onclick="CheckPager()" class="btn btn-primary">Cập nhật trạng thái</button>
                                            
                                            <div id="records-contant"></div>
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="morder-info" style="padding: 4px;">
                                                <div class="tab-contents" style="padding: 8px 6px;">
                                                    <div class="form-group marg-bot-10 clearfix">
                                                    <!--
                                                        <div style="padding:0px" class="col-md-4">
                                                            <label>Khách hàng</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="col-md-10 padd-0" style="position: relative;">
                                                                <input id="search-box-cys" class="form-control"
                                                                       type="text"
                                                                       placeholder="Tìm khách hàng (SĐT)"
                                                                       style="border-radius: 3px 0 0 3px !important;"><span
                                                                    style="color: red; position: absolute; right: 5px; top:5px; "
                                                                    class="del-cys"></span>

                                                                <div id="cys-suggestion-box"
                                                                     style="border: 1px solid #444; display: none; overflow-y: auto;background-color: #fff; z-index: 2 !important; position: absolute; left: 0; width: 100%; padding: 5px 0px; max-height: 400px !important;">
                                                                    <div class="search-cys-inner"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 padd-0">
                                                                <button type="button" data-toggle="modal"
                                                                        data-target="#create-cust"
                                                                        class="btn btn-primary"
                                                                        style="border-radius: 0 3px 3px 0; box-shadow: none; padding: 7px 11px;">
                                                                    +KH Mới
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                -->

                                                <div class="form-group marg-bot-10 clearfix">
                                                        <div style="padding:0px" class="col-md-4">
                                                            <label>Nhân viên bán hàng</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control" id="sale_id">
                                                                
                                                               
                                                                    <option value=""><?php echo $_SESSION['uname']; ?></option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group marg-bot-10 clearfix">
                                                    <div style="padding:0px" class="col-md-4">
                                                            <label>ID Pager</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="idpager" 
                                                                   class="form-control "
                                                                   placeholder="Nhập ID Pager" style="border-radius: 0 !important;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div style="padding:0px" class="col-md-4">
                                                            <label>Ghi chú</label>
                                                        </div>
                                                        <div class="col-md-8">
                                    <textarea id="note-order" cols="" class="form-control" rows="3"
                                              style="border-radius: 0;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h4 class="lighter" style="margin-top: 0;">
                                                * Thông tin thanh toán
                                            </h4>

                                            <div class="morder-info" style="padding: 4px;">
                                                <div class="tab-contents" style="padding: 8px 6px;">
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label>Hình thức</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="radio" class="payment-method"
                                                                       name="method-pay" value="1" checked>
                                                                Tiền mặt &nbsp;
                                                                
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label>Tiền hàng</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="total-money">
                                                            0
                                                            </div>
                                                            <input type="hidden" name="" id="hidden-price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label>Giảm giá</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="voucher" onkeyup="Less(this.value)"
                                                                   class="form-control text-right txtMoney discount-order"
                                                                   placeholder="0" style="border-radius: 0 !important;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label>Tổng cộng</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="total-after-discount">
                                                                0
                                                            </div>
                                                            <input type="hidden" name="" id="total">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4 padd-right-0">
                                                            <label>Khách đã thanh toán</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="payment" onkeyup="Plus(this.value)"
                                                                   class="form-control text-right txtMoney customer-pay"
                                                                   placeholder="0" style="border-radius: 0 !important;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label id="debtlabel">Khách còn nợ</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="debt">0</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="save()"> Lưu 
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                        onclick="cms_save_orders(4)"> Lưu và in
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

        $(document).ready(function(){showResult();});

        function showResult(readrecord){
            $.ajax({
                url:"classic/addpayment.php",
                type:'post',
                data: {
                    readrecord:readrecord
                },
                success: function(data, status){
                    $('#pro_search_append').html(data);
                },
            });

            
            var kh=0;
            $.ajax({
                url:"classic/addpayment.php",
                type:'post',
                data: {
                    total1:readrecord
                },
                success: function(data, status){
                    
                    $('#hidden-price').val(data);
                    $('#voucher').val(kh);
                    $('#payment').val(kh);
                    $('#total').val(data);
                    $('#total-after-discount').html(data);
                    $('#debt').html(data);
                    $('#debtlabel').html("Khách còn nợ");
                    if (data=="") $('#total-money').html("0"); else $('#total-money').html(data);
                    
                },
            });
            
            
        }

        function CheckPager(){
            var readrecord="dfdg";
        $.ajax({
                url:"classic/addpayment.php",
                type:'post',
                data: {
                    pager:readrecord
                },
                success: function(data, status){
                    $('#records-contant').html(data);
                },
            });
        }

        function Less(value) {

            var data1=$('#hidden-price').val()-value;
            if (data1<0) data1=0;
            $('#total').val(data1);
            $('#total-after-discount').html(data1);
            $('#debt').html(data1);
        }
        function Plus(value) {

            var data2=value-$('#total').val();
            if (data2 < 0) $('#debt').html(-data2); else {
            $('#debt').html(data2);
            $('#debtlabel').html("Khách thừa");
            }
        }

        function Update(dataid) {
            var conf= confirm("Khách đã nhận đơn? ");
            if (conf==true){
                $.ajax({
                url:"classic/addpayment.php",
                type:'post',
                data: {
                    dataid:dataid
                },
                success: function(data, status){
                    CheckPager();
                },
                });
            }
        }

        function save() {
            var save=$('#search-pro-box').val();
            var idpager=$('#idpager').val();
            
            $.ajax({
                url:"classic/addpayment.php",
                type:'post',
                data: {
                    save:save,
                    idpager:idpager
                },
                success: function(data, status){
                    alert(data);
                },
                });
        }

    </script>

</body>
</html>