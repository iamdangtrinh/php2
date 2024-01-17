<?php
// namespace App\Controllers;
class ProductController extends CoreController
{
    protected $product;
    public function __construct()
    {
        $this->product = $this->loadModel('Product');
    }

    public function detail($id)
    {
        $data['title'] ="Chi tiết sản phẩm";
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['add_to_cart']) && $_POST['add_to_cart']) {

                // xử lí người dùng mua hàng
                // kiểm tra người dùng đã có giỏ hàng chưa
                // nếu người dùng có giỏ hàng rồi thì cho thêm sản phẩm và số lượng vào bảng chi tiết sản phẩm
                echo 'đc';
                // người lại nếu người dùng chưa có giỏ hàng 
                // tạo giỏ hàng cho người dùng
                // sau đó thêm sản phẩm vào trong chi tiết hóa đơn

            } 
            if(isset($_POST['btn_comment']) && $_POST['btn_comment']) {
                if(isset($_SESSION['user']) && $_SESSION['user']) {
                    if(!$_POST['comment_content']) {
                        header('location: '.APPURL.'product/detail/'.$_POST['MaSP'].'?comment=error');
                    }
                } else {
                    header('location: '.APPURL.'user/login');
                }

                if(!$_POST['comment_content']) {
                    header('location: '.APPURL.'product/detail/'.$_POST['MaSP'].'?comment=error');
                }

                $this->product->insert_comment($_SESSION['user']['MaTK'],$_POST['MaSP'], $_POST['comment_content']);
                header('location: '.APPURL.'product/detail/'.$_POST['MaSP'].'?comment=success');
            } 
        }
        $this->product->update_view_porduct($id);
        // Show sản phẩm chi tiết
        $data['product_detail'] = $this->product->get_product_by_id($id);
        // Quản lí bình luận
        $data['product_detail_comment'] = $this->product->get_comment_by_product($id);
        // show sản phẩm có cùng danh mục
        $data['product_rela'] = $this->product->get_product_by_id_type($data['product_detail']['MaDM']);
        $this->loadview('product_detail', $data);
    }

    public function delete_comment($MaBL,$MaSP) {
        $this->product->delete_comment($MaBL);
        $_SESSION['delete_comment'] = 'Xóa bình luận thành công';
        header('location: '.APPURL.'product/detail/'.$MaSP);
    }
}
