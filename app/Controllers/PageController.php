<?php

// namespace App\Controllers;

class PageController extends CoreController
{
    protected $product;
    public function __construct()
    {
        $this->product = $this->loadModel('Product');
    }

    public function index()
    {
        $title = "Trang chủ";
        $data['title'] = $title;
        $data['product_all'] = $this->product->get_all_product();
        $data['product_views'] = $this->product->get_product_views();
        $data['product_pin'] = $this->product->get_product_pin();
        $this->loadview('page_home', $data);
    }

    public function about()
    {
        $data['title'] = "Giới thiệu";
        $this->loadview('page_about', $data);
    }

    public function contact()
    {
        $data['title'] = "Liên hệ";
        $this->loadview('page_contact', $data);
    }
}
