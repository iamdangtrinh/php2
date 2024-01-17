<style>
    footer {
        background-color: #333;
        /* Dark background for footer */
        color: white;
        /* White text color */
        padding: 20px 0;
        /* Padding around the footer content */
        font-size: 14px;
        /* Base font size */
    }

    .footer-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10%;
    }

    .footer-logo img {
        max-width: 150px;
        /* Logo size */
    }

    .footer-contact p,
    .footer-contact a {
        margin: 5px 0;
        /* Spacing between contact info lines */
    }

    .footer-social a {
        margin-right: 10px;
        /* Spacing between social icons */
    }

    .footer-social img {
        width: 24px;
        /* Size of social icons */
    }

    .footer-payment img {
        margin-right: 10px;
        /* Spacing between payment icons */
        width: 50px;
        /* Size of payment icons */
    }

    .footer-bottom {
        border-top: 1px solid #444;
        /* Separator line */
        padding-top: 20px;
        /* Space above bottom content */
        margin-top: 20px;
        /* Space above separator line */
    }

    .footer-nav ul {
        list-style: none;
        /* Remove default list styling */
        padding: 0;
        /* Remove default padding */
    }

    .footer-nav li a {
        color: white;
        /* Link color */
        text-decoration: none;
        /* Remove underline from links */
        margin-bottom: 5px;
        /* Space between links */
        display: block;
        /* Make links block to occupy full width */
    }

    .footer-copy {
        text-align: center;
        /* Center copyright text */
        margin-top: 20px;
        /* Space above copyright text */
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .footer-top {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-nav {
            margin-top: 20px;
        }
    }
</style>

<footer class="mt-5 p-3">
    <div class="footer-top">
        <div class="footer-logo">
            <img class="img_logo" src="<?= APPURL ?>public/asset/image/logo.jpg" alt="">
        </div>
        <div class="footer-nav">
            <div class="footer-column">
                <p>Hướng dẫn mua hàng</p>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Danh mục</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Hướng dẫn sử dụng</a></li>
                </ul>
            </div>
            <!-- Repeat for other columns -->
        </div>
        <div class="footer-social">
            <p>Thông tin liên hệ: </p>
            <a href="your-facebook-url"><img src="<?= APPURL ?>public/asset/image/logo/Facebook_Logo.png" alt="Facebook"></a>
            <a href="your-twitter-url"><img src="<?= APPURL ?>public/asset/image/logo/Twitter.webp" alt="Twitter"></a>
            <a href="your-youtube-url"><img src="<?= APPURL ?>public/asset/image/logo/youtube.png" alt="YouTube"></a>
            <!-- Add more social icons as needed -->
        </div>
        <div class="footer-payment">
            <p>chấp nhận thanh toán: </p>
            <img src="<?= APPURL ?>public/asset/image/logo/Stripe.png" alt="Stripe">
            <img src="<?= APPURL ?>public/asset/image/logo/Paypal.png" alt="Paypal">
            <img src="<?= APPURL ?>public/asset/image/logo/Visa.png" alt="Visa">
            <!-- Add more payment icons as needed -->
        </div>
    </div>
    <div class="container footer-bottom">
        <div class="footer-contact">
            <p>Bạn cần hỗ trợ</p>
            <p><strong>1900 6750</strong></p>
            <p>Địa chỉ: 70 Lữ Gia, Ward 15, District 11, Ho Chi Minh City</p>
            <p>Email: support@sapovn.com</p>
        </div>
        <div class="footer-copy">
            <p>© Bản quyền thuộc về Đăng Trình | Cung cấp bởi Đăng Trình Design</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="<?= APPURL ?>asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>