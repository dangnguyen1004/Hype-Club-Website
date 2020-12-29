<?php

include "conn.php";

if (isset($_POST['readCartData'])) {
    $sql = "SELECT * FROM cart";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '
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
        ';
        $totalPrice = 0;
        while($item = mysqli_fetch_assoc($result)){
            $item_id = $item['brand_id'];
            $findItem = "SELECT * FROM item WHERE id = '$item_id'";
            $resultFindBrand = mysqli_query($conn, $findItem);


            $itemFound = mysqli_fetch_assoc($resultFindBrand);
            $idItemFound = $itemFound['id'];


            $findImage = "SELECT * FROM item_image WHERE item_id = '$idItemFound'";
            $resultFindImage = mysqli_query($conn, $findImage);


            $imageItem = mysqli_fetch_assoc($resultFindImage);
            $idImageItem = $imageItem['id'];

            $totalPriceItem = 1 * $itemFound['price'] * $item['amount']; 
            $totalPrice = $totalPrice + $totalPriceItem;
            echo '
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 "><img src="fetch_shoes_image.php?id='.$idImageItem.'" alt="Sản phẩm 1" width="100" class="img-responsive"></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin">'.$itemFound['name'].'</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">'.number_format($itemFound['price']).'</td>
            <td data-th="Quantity"><input id="amount'.$item['brand_id'].'" type="number" onchange="updateQuantity('.$item['brand_id'].',this.value);" class="form-control text-center" value="'.$item['amount'].'"></td>
            <td data-th="Subtotal" class="text-center">'.number_format($totalPriceItem).'</td>
            <td class="actions" data-th="">
                <button onclick="deleteItem('.$item['number'].');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
            ';
        }

        echo '
        </tbody>

        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Tổng '.number_format($totalPrice).'</strong></td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td><input type="submit" action="action" class="btn btn-warning" onclick="window.history.go(-1); return false;" value="Continue shopping"></input></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total price '.number_format($totalPrice).'</strong></td>
                <td><input type="button" class="btn btn-success" value="Order" onclick="order();"></input></td>
            </tr>
        </tfoot>
        ';


        
    } else {
        echo '
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

    </tbody>

    <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Tổng 200.000 đ</strong></td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td><input type="submit" action="action" class="btn btn-warning" onclick="window.history.go(-1); return false;" value="Tiếp tục mua hàng"></input></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong></strong></td>
            <td><a type="button" class="btn btn-success">Đặt hàng<i class="fa fa-angle-right"></i></a></td>
        </tr>
    </tfoot>
        ';
    }
}



if (isset($_POST['updateQuantity'])){
    $amount = $_POST['amount'];
    $brand_id = $_POST['updateQuantity'];
    $sql = "UPDATE cart SET amount='$amount' WHERE brand_id='$brand_id'";
    if(mysqli_query($conn, $sql)){
        echo 'success';
    }
    else{
        echo 'fail';
    }
}

if (isset($_POST['deleteItem'])){
    $number = $_POST['deleteItem'];
    $sql = "DELETE FROM cart WHERE number='$number'";
    if(mysqli_query($conn, $sql)){
        echo 'success';
    }
    else{
        echo 'fail';
    }
}


if (isset($_POST['order'])){
    $username = $_POST['order'];
    $sql = "SELECT * FROM cart";
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM orders";
    $countOrder = mysqli_query($conn, $sql);
    $countOrder = mysqli_num_rows($countOrder) + 1;
    $totalPrice = 0;
    $totalItem = 0;
    while($item = mysqli_fetch_assoc($result)){
        $item_id = $item['brand_id'];
        $findItem = "SELECT * FROM item WHERE id = '$item_id'";
        $resultFindBrand = mysqli_query($conn, $findItem);

        $itemFound = mysqli_fetch_assoc($resultFindBrand);
        $idItemFound = $itemFound['id'];
        $amount = $item['amount'];
        $totalItem += $amount;
        $price = $itemFound['price'];

        $totalPriceItem = 1 * $itemFound['price'] * $item['amount']; 
        $totalPrice = $totalPrice + $totalPriceItem;
        
        $addDetail = "INSERT INTO detail_order (order_id, item_id, quantity, price)
        VALUES ('$countOrder', '$idItemFound', '$amount', '$price')";
        mysqli_query($conn, $addDetail);
        $deleteItem = "DELETE FROM cart WHERE brand_id='$item_id'";
        mysqli_query($conn, $deleteItem);
    }
    $addOrder = "INSERT INTO orders (order_id, customer, total_price, total_item, status, date)
    VALUES ('$countOrder', '$username', '$totalPrice', '$totalItem', 'Pending', NULL)";
    mysqli_query($conn, $addOrder);
    $sql = "SELECT * FROM orders";
    $countOrderAfter = mysqli_query($conn, $sql);
    $countOrderAfter = mysqli_num_rows($countOrderAfter);
    if ($countOrder == $countOrderAfter) {
        echo 'success';
    }
    else{
        echo 'fail';
    }
}