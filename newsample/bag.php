<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bag.css">
        <title>Hype Club</title>
        <link rel="icon" href="images/iconTitle.svg" type="image/svg">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div>
            <h1 style="justify-content: center; display: flex; font-size:50px;">Hype Club</h1>
        </div>
        <div class="container">
            <h2>Your shopping bag</h2>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">Item</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">QTY</th>
                    <th style="width:22%" class="text-center">Price</th>
                    <th style="width:10%"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 "><img src="images/gucci.jpg" alt="Sản phẩm 1" width="100" class="img-responsive"></div>
                        <div class="col-sm-10">
                        <h4 class="nomargin">Gucci</h4>
                        <p>Mô tả của Gucci</p>
                        </div>
                    </div>
                    </td>
                    <td data-th="Price">200.000 đ</td>
                    <td data-th="Quantity"><input type="number" class="form-control text-center" value="1"></td>
                    <td data-th="Subtotal" class="text-center">200.000 đ</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                
                <tr>
                    <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2"><img src="images/mlb.jpg" alt="Sản phẩm 1" width="100" class="img-responsive"></div>
                        <div class="col-sm-10">
                        <h4 class="nomargin">MLB</h4>
                        <p>Mô tả của MLB</p>
                        </div>
                    </div>
                    </td>
                    <td data-th="Price">300.000 đ</td>
                    <td data-th="Quantity"><input type="number" class="form-control text-center" value="1"></td>
                    <td data-th="Subtotal" class="text-center">300.000 đ</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                </tbody>

                <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Tổng 200.000 đ</strong></td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td><a href="shoes_shop.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong></td>
                    <td><a type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Đặt hàng<i class="fa fa-angle-right"></i></a></td>
                </tr>
                </tfoot>
            </table>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Thông tin nhận hàng</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Người nhận: </label>
                            <input type="text" class="form-control" id="name" placeholder="Eg:Nguyễn Văn A"/>
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại: </label>
                            <input type="text" class="form-control" id="phone" placeholder="Eg:0964023545"/>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ: </label>
                            <input type="text" class="form-control" id="address" placeholder="Eg:Ktx khu A DHQG, Đông hòa, Dĩ an, Bình dương"/></div>
                        <div class="form-group">
                            <label for="note">Ghi chú: </label>
                            <textarea class="form-control" id="note" cols="90" rows="2" >
                            </textarea>
                        </div>
                        <div>
                            <label class="luuy"><i>Lưu ý: Thanh toán khi nhận hàng</i></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Đặt hàng</button>
                    </div>
                  </div>
                  
                </div>
              </div>
                    
        </div>
        <!-- The Modal add-->
        
        
        
    </body>
</html>