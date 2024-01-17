<?php 
// namespace App\Models;
// use App\Libraries\Database;
class UserModel {

    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function __destruct() {
        unset($this->db);
    }

    public function get_all_user() {
        return $this->db->pdo_query("SELECT * FROM taikhoan");
    }
    public function get_user_by_id($MaTK) {
        return $this->db->pdo_query_one("SELECT * FROM taikhoan WHERE MaTK = ?", $MaTK);
    }
    
    // kiểm tra tài khoản
    public function user_login($email, $password) {
        return $this->db->pdo_query_one("SELECT * FROM taikhoan WHERE Email = '$email' AND MatKhau = '$password'");
    }
    
    public function user_register($fullname, $email, $password,$phone,$address) {
        return $this->db->pdo_execute("INSERT INTO taikhoan(`HoTen`, `Email`, `MatKhau`,`SoDienThoai`,`DiaChi`) VALUES (?,?,?,?,?)", $fullname, $email, $password,$phone,$address);
    }

    public function check_has_account($email) {
        return $this->db->pdo_query_one("SELECT Email FROM taikhoan WHERE Email = ?", $email);
    }
}