<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        $data['path'] = $this->request->getPath() ? $this->request->getPath() : '';
        return view('pages/products/index', $data);
    }

    public function getDataTables()
    {
        $length = $this->request->getGet('length');
        $start = $this->request->getGet('start');
        $keyword = $this->request->getGet('search')['value'];
        $order = $this->request->getGet('order')['0']['column'];
        $dir = $this->request->getGet('order')['0']['dir'];

        if ($keyword) {
            $data = $this->productModel->orLike('product_id', $keyword)
                ->orLike('product_name', $keyword)->limit($length, $start)->orderBy($order, $dir)->find();
        } else {
            $data = $this->productModel->limit($length, $start)->orderBy($order, $dir)->find();
        }

        $res = array();
        $no = $start + 1;
        foreach ($data as $d) {
            $arr['no'] = $no;
            $arr['product_id'] = $d['product_id'];
            $arr['product_name'] = $d['product_name'];
            $arr['price'] = $d['price'];
            $arr['options'] = "<a href='#' class='btn-warning btn-sm'>Ubah</a>&nbsp; <a href='#' class='btn-danger btn-sm'>Hapus</a>";
            $res[] = $arr;
            $no++;
        }

        $output = [
            "draw" => intval($this->request->getGet('draw')),
            "recordsTotal" => $this->productModel->countAll(),
            "recordsFiltered" => $this->productModel->countAll(),
            "data" => $res,
        ];

        echo json_encode($output);
    }
}