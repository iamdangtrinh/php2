<?php
// namespace App\Controllers;
class UserController extends CoreController
{
    protected $user;

    public function __construct()
    {
        $this->user = $this->loadModel('User');
    }

    public function index()
    {
        $data['title'] ="Thông tin tài khoản";
        $data['userlist'] = $this->user->get_all_user();
        $this->loadview('user_list', $data);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kq = $this->user->user_login($_POST['email'], $_POST['password']);
            if ($kq) {
                $_SESSION['user'] = $kq;
                header('location: ' . APPURL);
            } else {
                echo 'sai';
            }
        }
        $this->loadview('user_login',);
    }

    public function register()
    {
        $data['title'] ="Đăng ký tài khoản";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check isset account
            $has_account = $this->user->check_has_account($_POST['email']);
            if($has_account) {
                $_SESSION['error']['emailcotontai'] = 'Tài khoản này đã được đăng ký! Vui lòng chọn tài khoản khác';
            } else {
                $this->user->user_register($_POST['fullname'],$_POST['email'], $_POST['password'],$_POST['phone'],$_POST['address']);
                header('location: '.APPURL.'user/login');
            }
        } else {

        }
        $this->loadview('user_register',$data);
    }

    // logout done
    public function logout() {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('location: '.APPURL.'');
        } else {
            header('location: '.APPURL.'');
        }
    }

    public function info() {
        $data['title'] ="Thông tin tài khoản";
        $data['user_info'] = $this->user->get_user_by_id($_SESSION['user']['MaTK']);
        $this->loadview('info_user', $data);
    }
}
