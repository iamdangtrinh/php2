<!-- ----------------------New -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                <table class="table table-cart">
                    <thead>
                        <tr>
                            <!-- <th class="thumbnail-col"></th> -->
                            <th colspan="2" class="product-col">Sản Phẩm</th>
                            <th class="price-col text-center">Đơn Giá</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-right" style="width:125px">Số Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_order_user as $key => $value) :
                            extract($value) ?>
                            <tr class="product-row total_product_parent">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="<?= APPURL ?>product/product_detail/<?= $MaSP ?>" class="product-image">
                                            <img width="80px" height="80px" src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" alt="<?= $TenSP ?>">
                                        </a>

                                        <a href="<?= APPURL ?>delete_cart/<?= $MaSP ?>" class="btn-remove" title="Xóa sản phẩm"><i class="fa-solid fa-xmark"></i></a>
                                    </figure>
                                </td>
                                <td class="product-col text-left">
                                    <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="name_cart">
                                        <?= $TenSP ?>
                                    </a>
                                </td>
                                <td class="m-auto" style="width:115px">
                                    <?php
                                    if (!$GiaGiam) {
                                        echo number_format($Gia, 0, '.', '.') . " VND";
                                    } else {
                                        echo number_format($GiaGiam, 0, '.', '.') . " VND";
                                    }
                                    ?>

                                </td>
                                <td class="" style="width: 100px">
                                    <p data-quantity="<?= $MaSP ?>"></p>
                                    <p data-quantity_product_warehouse="<?= $SoLuong ?>"></p>
                                    <p data-quantity_product="<?= $SoLuongSP ?>"></p>
                                    <div class="product-single-qty">
                                        <button type="button" class="minusJS">
                                            <i class="fa fa-minus"></i>
                                        </button>

                                        <?php
                                        echo (!$GiaGiam) ? '<input type="hidden" class="price_product" value="' . $Gia . '">' : '<input type="hidden" class="price_product" value="' . $GiaGiam . '">';
                                        ?>
                                        <input type="text" name="quantity" value="<?= $SoLuongSP ?>" class="quantity_product">

                                        <button type="button" class="plusJS">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-right m-auto" style="width:115px">
                                    <span class="subtotal-price">
                                        <div class="total_price"></div>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="5" class="">
                                <div class="cart-discount">
                                    <form id="coupon" action="#" method="post">
                                        <div class="d-flex justify-content-between input-group">
                                            <input type="text" class="coupon_code " id="coupon_code" placeholder="Mã giảm giá" name="couponcode">
                                            <div class="input-group-append">
                                                <input type="hidden" name="btn_coupon" value="btn_coupon">
                                                <input class="btn btn-primary" id="coupon_code_btn" type="submit" name="" value="Áp dụng phiếu mua hàng">
                                            </div>
                                        </div>
                                        <!-- hiển thị kết quả của coupon -->
                                        <div class="result_coupon"></div>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3>TỔNG GIỎ HÀNG</h3>
                <table class="table table-totals">
                    <tfoot>
                        <tr>
                            <td>Tổng cộng</td>
                            <td class="total_cart"></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <form action="<?= APPURL ?>page/checkout" method="post">
                        <input type="hidden" class="total_cart_input" value="" name="total_cart">
                        <input type="hidden" class="" value="<?= $has_cart['MaHD'] ?>" name="MaHD">
                        <input type="submit" class="btn btn-block btn-primary" name="btn_cart" value="Tiến hành thanh toán">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        function updateTotal() {
            var total_cart = 0
            var total_product_parent = $('.total_product_parent');
            for (const product of total_product_parent) {
                var price = product.querySelector('.price_product').value;
                var quantity = product.querySelector('.quantity_product').value;
                total = parseInt(price) * quantity
                product.querySelector('.total_price').innerText = total.toLocaleString('vi-VN') + ' VND';
                total_cart += total;
            }
            var coupon_value = $('.coupon_value').val();
            var input_total_cart = document.querySelector('.total_cart_input');
            total_cart -= (coupon_value) ? coupon_value : 0;
            document.querySelector('.total_cart').innerText = total_cart.toLocaleString('vi-VN') + ' VND';
            input_total_cart.value = total_cart;
        }
        updateTotal()

        $('.minusJS').click(function() {
            var product_box = this.closest('.product-single-qty');
            var quantity_input = product_box.querySelector('.quantity_product');
            var currentQuantity = parseInt(quantity_input.value);
            if (currentQuantity > 1) {
                quantity_input.value = currentQuantity - 1;
                $(quantity_input).trigger('change');
            }
        });

        $('.plusJS').click(function() {
            var product_box = this.closest('.product-single-qty');
            var quantity_input = product_box.querySelector('.quantity_product');
            var currentQuantity = parseInt(quantity_input.value);
            quantity_input.value = currentQuantity + 1;
            $(quantity_input).trigger('change');
        });

        $('input[name="quantity"]').on('change', function update_quantity() {
            // e.preventDefault();
            var newQuantity = $(this).val();
            newQuantity = newQuantity.replace(/[^0-9]/g, "");
            if (newQuantity == null && newQuantity == isNaN && newQuantity == undefined) {
                newQuantity = "1";
            } else {
                if (newQuantity < 1) {
                    newQuantity = "1";
                }
                var closestProductRow = this.closest('.product-row');
                var quantity_product_warehouse = closestProductRow.querySelector('[data-quantity_product_warehouse]').dataset.quantity_product_warehouse;
                if (parseInt(newQuantity) >= quantity_product_warehouse) {
                    $(this).val(quantity_product_warehouse);
                } else {
                    $(this).val(newQuantity);
                }
            }
            var MaSP = closestProductRow.querySelector('[data-quantity]').dataset.quantity;
            $.ajax({
                type: "POST",
                url: '<?= APPURL ?>cart/update_cart/<?= $MaSP?>',
                data: {
                    quantity: newQuantity,
                    MaSP: MaSP,
                },
                success: function(data) {
                    $('#toast').html(data)
                },
                error: function(data) {
                    console.log(data);
                }
            });
            updateTotal()

        });

        // ---------------- Mã giảm giá -------------------------------
        var coupon_old = '';
        $('#coupon').on('submit', function(e) {
            e.preventDefault();
            var coupon_new = $('#coupon_code').val();

            if (coupon_new === coupon_old) {
                $(".result_coupon").text("Bạn đã nhập mã giảm này")
            } else {
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "<?= APPURL ?>cart/coupon",
                    data: data,
                    success: function(data) {
                        if (data === "error_coupon_null") {
                            $(".result_coupon").text("Vui lòng nhập mã giảm giá")
                        } else if (data === "error_coupon_false") {
                            $(".result_coupon").text("Mã giảm giá không đúng")
                        } else {
                            $(".result_coupon").html(data);
                            coupon_old = coupon_new;
                        }
                        updateTotal();
                    },

                    error:function() {
                        $(".result_coupon").html("Áp dụng mã giảm giá không thành công");
                    }
                })
            }

        })
    })
</script>