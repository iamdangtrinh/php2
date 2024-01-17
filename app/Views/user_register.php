<div class="container mt-3">
    <h3 class="text-center">Đăng ký tài khoản</h3>
    <?php
    if (isset($_SESSION['error']['emailcotontai'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']['emailcotontai']; ?>
        </div>
    <?php endif; unset($_SESSION['error']['emailcotontai']); ?>

    <form id="form_login" action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" name="fullname" class="form-control" id="fullname">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="address" name="address" class="form-control" id="address">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="number" name="phone" class="form-control" id="phone">
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#form_login').validate({
            rules: {
                email: {
                    required: true,
                    
                },
                fullname: {
                    required: true,
                },
                password: {
                    required: true
                },
                phone: {
                    required: true,
                    number: true
                },
                address: {
                    required: true,
                }
            },
            messages: {
                fullname: {
                    required: 'Vui lòng nhập họ và tên'
                },
                email: {
                    required: "Vui lòng nhập email",
                    email: 'Vui lòng nhập đúng định dạng email'
                },
                password: {
                    required: "Vui lòng nhập mật khẩu"
                },
                phone: {
                    required: 'Vui lòng nhập số điện thoại',
                    number: true
                },
                address: {
                    required: 'Vui lòng nhập địa chỉ',
                }
            },

            SubmitHandler: function(data) {
                console.log(data);
            }
        })
    });
</script>