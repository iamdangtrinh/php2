<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-xl-3">
            <div class="tabs">
                <div class="tab-item active">
                    <i class="fa-solid fa-user"></i> Thông tin tài khoản
                </div>
                <div class="tab-item">
                    <i class="fa-solid fa-cart-shopping"></i> Thông tin đơn hàng
                </div>
                <div class="tab-item">
                    <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-9">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="<?= $user_info['Email']?>" type="email" disabled class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">họ tên</label>
                            <input value="<?= $user_info['HoTen']?>" type="text" class="form-control" id="fullname" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input value="<?= $user_info['DiaChi']?>" type="text" class="form-control" id="address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input value="<?= $user_info['SoDienThoai']?>" type="text" disabled class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input value="<?= $user_info['MatKhau']?>" type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
                <!-- ---------------- -->
                <div class="tab-pane">
                    Thông tin đơn hàng
                </div>
                <div class="tab-pane">Đặt xuất</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let $ = document.querySelector.bind(document);
        let $$ = document.querySelectorAll.bind(document);

        const tab = $$('.tab-item');
        const panes = $$('.tab-pane');

        tab.forEach((tab, index) => {
            const pane = panes[index];

            tab.onclick = function() {
                $('.tab-item.active').classList.remove('active');
                $('.tab-pane.active').classList.remove('active');
                this.classList.add('active');
                pane.classList.add('active');
            }
        });

    })
</script>