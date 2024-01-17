<div class="container mt-3">
    <form id="form_login" action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#form_login').validate({
            rules: {
                email: {
                    required: true,

                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Vui lòng nhập email",
                    email: 'Vui lòng nhập đúng định dạng email'
                },
                password: {
                    required: "Vui lòng nhập mật khẩu"
                }
            },
        })
    });
</script>