<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (isset($title)) ? $title : 'Trang chủ' ?></title>
    <link rel="stylesheet" href="<?= APPURL ?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= APPURL ?>asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <header>
        <nav class="pt-3 pb-3 navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="<?= APPURL?>"><img class="img_logo" src="<?= APPURL?>public/asset/image/logo.jpg" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= APPURL ?>">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= APPURL ?>page/about">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= APPURL ?>page/contact">Liên hệ</a>
                        </li>
                    </ul>

                    <div class="d-flex" role="search">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <div class="d-flex align-items-center nav-item dropdown">
                                <img src="<?= APPURL ?>asset/image/<?= $_SESSION['user']['HinhAnh']?>" style="width: 60px; height: 60px" class="product_avatar_user" alt="">
                                <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['user']['HoTen'] ?></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= APPURL ?>user/info">Thông tin</a></li>
                                    <li><a class="dropdown-item" href="<?= APPURL ?>cart/order">Đơn hàng</a></li>
                                    <hr class="m-0">
                                    <li><a class="dropdown-item" href="<?= APPURL ?>user/logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <div class="d-flex">
                                <div class="btn text-primary"><a class="text-primary" href="<?= APPURL ?>user/login">Đăng nhập</a></div>
                                <div class="btn btn-primary"><a href="<?= APPURL ?>user/register">Đăng ký</a></div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <body>