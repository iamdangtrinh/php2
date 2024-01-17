<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= APPURL ?>asset/image/banner/slide_1.jpg" class="d-block w-100" alt="...">
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container mt-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#new" class="nav-link active" data-bs-toggle="tab">Sản phẩm mới</a>
        </li>
        <li class="nav-item">
            <a href="#views" class="nav-link" data-bs-toggle="tab">Sản phẩm xem nhiều</a>
        </li>
        <li class="nav-item">
            <a href="#pin" class="nav-link" data-bs-toggle="tab">Sản phẩm được ghim</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="new">
            <div class="row mt-3">
                <h2>Sản phẩm mới</h2>
                <!-- show data -->
                <?php foreach ($product_all as $value) : ?>
                    <?php extract($value) ?>
                    <!-- show imgage -->
                    <div class="col-sm-6 col-md-3 col-xl-3 mt-3">
                        <div class="card">
                            <img src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" class="card-img-top product-height" alt="<?= $TenSP ?>">
                            <div class="card-body card-content">
                                <h5 class="card-title">
                                    <?= $TenSP ?>
                                </h5>
                                <p class="card-text">
                                    <?php if (isset($GiaGiam)) : ?>
                                        <del><?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?></del>
                                        <?php echo ($GiaGiam) ? number_format($GiaGiam, 0, ',', '.') . ' VNĐ' : '' ?>
                                    <?php else : ?>
                                        <?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?>
                                    <?php endif ?>
                                </p>
                                <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row mt-3">
                <h2>Sản phẩm xem nhiều</h2>
                <?php foreach ($product_views as $value) :
                    extract($value) ?>
                    <div class="col-sm-6 col-md-3 col-xl-3 mt-3">
                        <div class="card">
                            <img src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" class="card-img-top product-height" alt="<?= $TenSP ?>">
                            <div class="card-body card-content">
                                <h5 class="card-title">
                                    <?= $TenSP ?>
                                </h5>
                                <p class="card-text">
                                    <?php if (isset($GiaGiam)) : ?>
                                        <del><?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?></del>
                                        <?php echo ($GiaGiam) ? number_format($GiaGiam, 0, ',', '.') . ' VNĐ' : '' ?>
                                    <?php else : ?>
                                        <?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?>
                                    <?php endif ?>
                                </p>
                                <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="row mt-3">
                <h2>Sản phẩm được ghim</h2>
                <?php foreach ($product_pin as $value) :
                    extract($value) ?>
                    <div class="col-sm-6 col-md-3 col-xl-3 mt-3">
                        <div class="card">
                            <img src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" class="card-img-top product-height" alt="<?= $TenSP ?>">
                            <div class="card-body card-content">
                                <h5 class="card-title">
                                    <?= $TenSP ?>
                                </h5>
                                <p class="card-text">
                                    <?php if (isset($GiaGiam)) : ?>
                                        <del><?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?></del>
                                        <?php echo ($GiaGiam) ? number_format($GiaGiam, 0, ',', '.') . ' VNĐ' : '' ?>
                                    <?php else : ?>
                                        <?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?>
                                    <?php endif ?>
                                </p>
                                <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>


        <div class="tab-pane fade" id="views">
            <div class="row mt-3">
                <h2>Sản phẩm xem nhiều</h2>
                <?php foreach ($product_views as $value) :
                    extract($value) ?>
                    <div class="col-sm-6 col-md-3 col-xl-3 mt-3">
                        <div class="card">
                            <img src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" class="card-img-top product-height" alt="<?= $TenSP ?>">
                            <div class="card-body card-content">
                                <h5 class="card-title">
                                    <?= $TenSP ?>
                                </h5>
                                <p class="card-text">
                                    <?php if (isset($GiaGiam)) : ?>
                                        <del><?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?></del>
                                        <?php echo ($GiaGiam) ? number_format($GiaGiam, 0, ',', '.') . ' VNĐ' : '' ?>
                                    <?php else : ?>
                                        <?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?>
                                    <?php endif ?>
                                </p>
                                <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="tab-pane fade" id="pin">
            <div class="row mt-3">
                <h2>Sản phẩm được ghim</h2>
                <?php foreach ($product_pin as $value) :
                    extract($value) ?>
                    <div class="col-sm-6 col-md-3 col-xl-3 mt-3">
                        <div class="card">
                            <img src="<?= APPURL ?>asset/image/sanpham/<?= $AnhSP ?>" class="card-img-top product-height" alt="<?= $TenSP ?>">
                            <div class="card-body card-content">
                                <h5 class="card-title">
                                    <?= $TenSP ?>
                                </h5>
                                <p class="card-text">
                                    <?php if (isset($GiaGiam)) : ?>
                                        <del><?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?></del>
                                        <?php echo ($GiaGiam) ? number_format($GiaGiam, 0, ',', '.') . ' VNĐ' : '' ?>
                                    <?php else : ?>
                                        <?= number_format($Gia, 0, ',', '.') . ' VNĐ' ?>
                                    <?php endif ?>
                                </p>
                                <a href="<?= APPURL ?>product/detail/<?= $MaSP ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>



</div>