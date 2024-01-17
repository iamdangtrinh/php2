<?php
// namespace App\Models;
// use App\Libraries\Database;
class CartModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function __destruct()
    {
        unset($this->db);
    }
    public function get_cart_by_user($MaTK)
    {
        return $this->db->pdo_query("SELECT * FROM chitiethoadon cthd INNER JOIN hoadon hd ON hd.MaHD = cthd.MaHD INNER JOIN sanpham sp ON sp.MaSP = cthd.MaSP WHERE hd.MaTK = ?", $MaTK);
    }

    public function update_quantity_cart($SoLuongSP,$MaSP) {
        return $this->db->pdo_execute("UPDATE chitiethoadon SET SoLuongSP = ? WHERE MaSP = ?",$SoLuongSP, $MaSP);
    }

    public function get_coupon($CodeKM) {
        return $this->db->pdo_query_one("SELECT * FROM khuyenmai WHERE CodeKM= ?",$CodeKM);
    }
}
