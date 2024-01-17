<div class="container mt-4">

    <?php if (isset($_SESSION['delete_comment'])) : ?>
        <div class="alert alert-success" role="alert">
        <?= $_SESSION['delete_comment'] ?>
        </div>
    <?php endif; unset($_SESSION['delete_comment']) ?>

    <div class="row">
        <div class="col-md-12 col-xl-4 col-sm-12">
            <img class="img_product_detail p-4 btn-outline-danger" src="<?= APPURL ?>asset/image/sanpham/<?= $product_detail['AnhSP'] ?>" alt="">
        </div>
        <div class="col-md-12 col-xl-8 col-sm-12">
            <div class="mb-2">
                <h2><?= $product_detail['TenSP'] ?></h2>
            </div>
            <div class="row mt-3">
                <div class="col-4"><strong><i class="fa-regular fa-eye"></i> Lượt xem: </strong> <?= $product_detail['LuotXem'] ?></div>
                <div class="col-4"><strong><i class="fa-solid fa-list"></i> Danh mục: </strong> <?= $product_detail['TenDM'] ?></div>
                <div class="col-4"><strong><i class="fa-solid fa-plus"></i> Số lượng: </strong> <?= $product_detail['SoLuong'] ?></div>
            </div>

            <div class="row mt-3">
                <?php
                if (empty($product_detail['GiaGiam'])) : ?>
                    <h3 class="text-danger"><?= number_format($product_detail['Gia'], 0, '.', '.'); ?> VND</h3>
                <?php else : ?>
                    <del><?= number_format($product_detail['Gia'], 0, '.', '.'); ?> VND</del>
                    <h3 class="text-danger"><?= number_format($product_detail['GiaGiam'], 0, '.', '.'); ?> VND</h3>
                <?php endif ?>
            </div>

            <form action="" id="add_to_cart" method="post" class="mt-3">
                <input type="hidden" name="MaSP" value="<?= $product_detail['MaSP'] ?>">
                <div class="d-flex">
                    <p class="prev" id="prev"><i class="fa-solid fa-minus"></i> </p>
                    <input type="text" class="quantity form-control quantity-detail" name="quantity-detail" value="1">
                    <p class="next" id="next"><i class="fa-solid fa-plus"></i></p>
                </div>
                <input type="submit" class="btn btn-primary" name="add_to_cart" value="Thêm vào giỏ hàng">
                <!-- <button class="btn btn-primary">Mua ngay</button> -->
            </form>

            <div class="row mt-3 mota_sanpham">
                <p><strong>Mô tả: </strong> <?= $product_detail['MoTa'] ?></p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <?php foreach ($product_detail_comment as $value) : extract($value) ?>
            <div class="mt-4 col-1">

                <img src="<?= APPURL ?>/asset/image/<?= $HinhAnh ?>" class="product_avatar_user" alt="">
            </div>
            <div class="col-11 mt-4">
                <div class="card text-start">
                    <div class="card-body">
                        <h6 class="card-title"><strong>Khách hàng: <?= $HoTen ?></strong></h6>
                        <span class="card-text"><strong>Nội dung: </strong><?= $NoiDung ?></span>
                        <?php if (isset($_SESSION['user']['MaTK']) && $_SESSION['user']['MaTK'] === $MaTK) : ?>
                            <a href="<?= APPURL ?>product/delete_comment/<?= $MaBL ?>/<?= $MaSP ?>" class="text-danger">Xóa bình luận</a>
                        <?php else : ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="row mt-4">
        <form action="" method="post">
            <label for="comment">Nhập bình luận tại đây:</label>
            <input type="hidden" name="MaSP" value="<?= $product_detail['MaSP'] ?>">
            <textarea class="form-control mt-2 w-100" name="comment_content" id="comment" cols="" rows="2"></textarea>
            <input type="submit" class="btn btn-primary mt-2" value="Gửi bình luận" name="btn_comment">
        </form>

    </div>

    <div class="row">
        <div class="row mt-3">
            <h2>Sản phẩm liên quan</h2>
            <?php foreach ($product_rela as $value) :
                extract($value) ?>
                <div class="col-sm-6 col-md-6 col-xl-3 mt-3">
                    <div class="card">
                        <img src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" class="card-img-top product-height" alt="<?= $TenSP ?>">
                        <div class="card-body card-content">
                            <h5 class="card-title">
                                <?= $TenSP ?>
                            </h5>
                            <p class="card-text">
                                <?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?>
                                <?php echo ($GiaGiam) ? number_format($GiaGiam, 0, ',', '.') . ' VNĐ' : '' ?>
                            </p>
                            <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#next').on('click', function() {
            let next_value = $('.quantity-detail').val();
            $('.quantity-detail').val(Number(next_value) + 1);
        })
        $('#prev').on('click', function() {
            let prev_value = $('.quantity-detail').val();
            if (prev_value > 1) {
                $('.quantity-detail').val(Number(prev_value) - 1);
            } else {
                $('.quantity-detail').val();

            }
        })
    })
</script>