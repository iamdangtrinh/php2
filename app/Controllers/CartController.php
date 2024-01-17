<?php
// namespace App\Controllers;
class CartController extends CoreController
{
    protected $cart;

    public function __construct()
    {
        $this->cart = $this->loadModel('Cart');
    }

    public function order()
    {
        if (isset($_SESSION['user'])) {
            $data['title'] ="Giỏ hàng";
            $data['cart_order_user'] = $this->cart->get_cart_by_user($_SESSION['user']['MaTK']);
            $this->loadview('cart_order', $data);
        } else {
            $data['title'] ="Không tìm thấy sản phẩm";
            $this->loadview('cart_not_found',$data);
        }
    }

    public function update_cart()
    {
        $this->cart->update_quantity_cart($_POST['quantity'],$_POST['MaSP']);
    }

    public function coupon() {
        $this->cart->get_coupon($_POST['couponcode']);
    }
}
