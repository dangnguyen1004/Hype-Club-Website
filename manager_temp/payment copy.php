<?php
    include 'config/config.php';   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Food Court Management</title>
        <link rel="stylesheet" type="text/css" href="css\homepage.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <script src="https://kit.fontawesome.com/a00706d209.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <link href="css\payment\bootstrap.min.css" rel="stylesheet">
        <link href="css\payment\font-awesome.min.css" rel="stylesheet">
        <link href="css\payment\style.css" rel="stylesheet">
        <link href="css\payment\jquery-ui.min.css" rel="stylesheet">

    </head>
    <body >
    <section id="pos" class="main" role="main">
    
    <nav class="navbar navbar-expand-sm  navbar-dark" style="background: #040b2b ;">
    <button class="btn btn-dark" type="submit" onclick="actionmenu()" style="margin-right:5px;"><i class="fas fa-bars"></i></button>

        <a class="navbar-brand" href="#">VIOFOOD</a>
     <ul class="navbar-nav ml auto">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            
            <li class="nav-item"><a class="nav-link" href="#">
            <i class="fa fa-home" aria-hidden="true" style="margin-right:5px;"></i>Cập nhật đơn hàng</a></li>
            
        </ul>
<?php
    include 'menu.php';
?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 padd-left-0">
                <div class="main-content">
                    
                    <div >
                        <div class="row">
                            <div class="orders-act">
                                <div class="col-md-8">
                                    <div class="order-search" style="margin: 10px 0px; position: relative;">
                                        <input type="text" class="form-control"
                                               placeholder="Nhập mã sản phẩm hoặc tên sản phẩm"
                                               id="search-pro-box">
                                    </div>
                                    <div class="product-results">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th>Mã hàng</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center">Số lượng</th>
                                                <th class="text-center">Giá bán</th>
                                                <th class="text-center">Thành tiền</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="pro_search_append">
                                            </tbody>
                                        </table>
                                        <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã hoặc tên sản phẩm vào hộp tìm kiếm để thêm hàng vào đơn hàng
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="morder-info" style="padding: 4px;">
                                                <div class="tab-contents" style="padding: 8px 6px;">
                                                    <div class="form-group marg-bot-10 clearfix">
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
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div style="padding:0px" class="col-md-4">
                                                            <label>Nhân viên bán hàng</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control" id="sale_id">
                                                                <option value="">Lựa chọn nhân viên bán hàng</option>
                                                                <?php foreach ($data['sale'] as $item) { ?>
                                                                    <option
                                                                        value="<?php echo $item['id']; ?>"><?php echo $item['display_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
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
                                                            <div class="total-money">
                                                                0
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label>Giảm giá</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"
                                                                   class="form-control text-right txtMoney discount-order"
                                                                   placeholder="0" style="border-radius: 0 !important;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label>Tổng cộng</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="total-after-discount">
                                                                0
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4 padd-right-0">
                                                            <label>Khách đã thanh toán</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"
                                                                   class="form-control text-right txtMoney customer-pay"
                                                                   placeholder="0" style="border-radius: 0 !important;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group marg-bot-10 clearfix">
                                                        <div class="col-md-4">
                                                            <label class="debt">Khách còn nợ</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="debt">0</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="cms_save_orders(3)"> Lưu 
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                        onclick="cms_save_orders(4)"> Lưu và in
                                                </button>
                                                <a href="home.php">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="cms_javascript_redirect( cms_javascrip_fullURL() )">
                                                        Trở về
													</button>
                                                </a>
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
<?php
    include 'footer.php';
?>