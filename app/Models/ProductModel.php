<?php

// namespace App\Models;

// use App\Libraries\Database;

class ProductModel
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

    public function get_all_product()
    {
        return $this->db->pdo_query("SELECT * FROM sanpham limit 0,4");
    }
    public function get_product_views()
    {
        return $this->db->pdo_query("SELECT * FROM sanpham order by LuotXem desc limit 0,4");
    }

    public function get_product_pin()
    {
        return $this->db->pdo_query("SELECT * FROM sanpham where ghim = 1 limit 0,4");
    }
    public function get_product_by_id($id)
    {
        return $this->db->pdo_query_one("SELECT * FROM sanpham sp inner join danhmuc dm on sp.MaDM = dm.MaDM  where sp.MaSP = ?", $id);
    }

    public function get_product_by_id_type($id)
    {
        return $this->db->pdo_query("SELECT * FROM sanpham where MaDM = ? ORDER BY rand() limit 0,4", $id);
    }

    public function update_view_porduct($MaSP)
    {
        return $this->db->pdo_execute("UPDATE sanpham SET LuotXem = LuotXem + 1 WHERE MaSP = ?", $MaSP);
    }
    public function get_comment_by_product($MaSP)
    {
        return $this->db->pdo_query("SELECT * FROM binhluan bl INNER JOIN taikhoan tk ON bl.MaTK = tk.MaTK WHERE MaSP = ?", $MaSP);
    }

    public function insert_comment($MaTK,$MaSP, $NoiDung) {
        return $this->db->pdo_execute("INSERT INTO binhluan(MaTK, MaSP, NoiDung) VALUES (?,?,?)", $MaTK,$MaSP, $NoiDung);
    }

    public function delete_comment($MaBL) {
        return $this->db->pdo_execute("DELETE FROM binhluan WHERE MaBL = ?", $MaBL);
    }

    

}
