<?php
    include_once 'inc/header_orderDetail.php';
    extract($order);
    $tongtien = number_format($tongtien,0,"",".");
?>
<div class="container-bottom">
    <div class="container-content-left">
        <div class="container-content-left-user">
            <b><?=$customer["tenTK"]?></b>
        </div>
        <a class="container-content-left-userInfo">
            <i class="fa-regular fa-user"></i>
            Thông tin cá nhân
        </a>
        <a href="?page=order" class="container-content-left-order">
            <i class="fa-regular fa-clipboard"></i>
            Lịch sử đơn hàng
        </a>
    </div>
    <div class="container-content-right">
        <div class="container-content-right-row3"> <!-- productList -->
            <div class="container-content-right-row3-Orders">
                <div class="container-content-right-row3-Orders-status">
                    <div class="container-content-right-row3-Orders-status-item1">
                        <strong>Trạng thái đơn hàng</strong>
                    </div>
                    <div class="container-content-right-row3-Orders-status-item2">
                        <?php
                            // $trangthaiDH = $result[0]["trangthaiDH"];
                            if($trangthai == 0) echo '<span class="green"><i class="fa-solid fa-truck"></i> Đang chờ duyệt</span>';
                            else if($trangthai == 1) echo '<span class="green"><i class="fa-solid fa-truck"></i> Đang vận chuyển</span>';
                            else if($trangthai == 2) echo '<span class="green"><i class="fa-solid fa-truck"></i> Đã giao thành công</span>';
                            else if($trangthai == 3) echo '<span class="red"><i class="fa-solid fa-truck"></i> Hủy bởi bạn</span>';
                            else if($trangthai == 4) echo '<span class="red"><i class="fa-solid fa-truck"></i> Hủy bởi người bán</span>';
                        ?>
                    </div>
                </div>
                <div class="container-content-right-row3-Orders-customerInfo">
                    <p><i class="fa-regular fa-compass"></i> Thông tin nhận hàng</p>
                    <div id="customer-name">
                        <?=$customer['tenTK']?>
                    </div>
                    <div id="customer-phone">
                        <?=$customer['dienthoai']?>
                    </div>
                    <div id="customer-address">
                        <?=$diachigiao?>
                    </div>
                </div>
                <div class="container-content-right-row3-Orders-productList">
                    <?php
                        foreach($detail as $item){
                            extract($item);
                            $gialucdat = number_format($gialucdat,0,"",".");
                            if($trangthaiSach == 1){
                    ?>
                    <a href="?page=productDetail&idSach=<?=$idSH?>" class="container-content-right-row3-Orders-productOrder">
                        <div class="container-content-right-row3-Orders-productOrder-img">
                            <img src="uploads/uploads_product/<?=$hinhanh?>" alt="">
                        </div>
                        <div class="container-content-right-row3-Orders-productOrder-detail">
                            <div class="container-content-right-row3-Orders-productOrder-detail-title">
                                <?=$tuasach?>
                            </div>
                            <div class="container-content-right-row3-Orders-productOrder-detail-author">
                                Tác giả: <span id="author"><?=$tacgia?></span>
                            </div>
                            <div class="container-content-right-row3-Orders-productOrder-detail-quantity">
                                x<span id="quantity"><?=$soluong?></span>
                            </div>
                            <div class="container-content-right-row3-Orders-productOrder-detail-price">
                                <span id="price"><?=$gialucdat?></span> đ
                            </div>
                        </div>
                    </a>
                    <?php
                            }
                            else{
                                ?>
                                    <a class="container-content-right-row3-Orders-productOrder error">
                                        <div class="container-content-right-row3-Orders-productOrder-img">
                                            <img src="uploads/uploads_product/product.png" alt="">
                                        </div>
                                        <div class="container-content-right-row3-Orders-productOrder-detail">
                                            <div class="container-content-right-row3-Orders-productOrder-detail-title">
                                                Sản phẩm đã bị ẩn
                                            </div>
                                        </div>
                                    </a>
                                <?php
                            }
                        }
                    ?>
                </div>
                <div class="container-content-right-row3-Orders-productOrder-totalPrice">
                    <div class="container-content-right-row3-Orders-productOrder-totalPrice-text">
                        Thành tiền:
                    </div>
                    <div class="container-content-right-row3-Orders-productOrder-totalPrice-price">
                        <strong><?=$tongtien?>đ</strong>
                    </div>
                </div>
            </div>
            <?php  
                if($trangthai == 0){
            ?>
            <form action="?page=cancelOrder&idDH=<?=$idDH?>" method="post">
                <button type="submit" name="cancel">Hủy đơn hàng</button>
            </form>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<?php
    include_once 'inc/footer.php';
?>    
