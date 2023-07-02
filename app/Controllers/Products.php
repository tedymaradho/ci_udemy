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
        $length = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $keyword = $this->request->getVar('search')['value'];
        $order = $this->request->getVar('order')['0']['column'];
        $dir = $this->request->getVar('order')['0']['dir'];

        if ($keyword) {
            $data = $this->productModel->orLike('product_id', $keyword)
                ->orLike('product_name', $keyword)->orderBy($order, $dir)->findAll($length, $start);
        } else {
            $data = $this->productModel->orderBy($order, $dir)->findAll($length, $start);
        }

        $res = [];
        $no = $start + 1;

        foreach ($data as $d) {
            $arr = [];
            $arr[] = $no;
            $arr[] = $d['product_id'];
            $arr[] = $d['product_name'];
            $arr[] = $d['price'];
            $arr[] = "<a href='#' class='btn-warning btn-sm'>Ubah</a>&nbsp; <a href='#' class='btn-danger btn-sm'>Hapus</a>";
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

    public function findByBarcode()
    {
        $barcode = $this->request->getPost('barcode');
        $res = $this->productModel->searchBarcode($barcode);

        $data = array();
        if ($res) {
            $data = [
                'product_id' => $res['product_id'],
                'product_name' => $res['product_name'],
                'price' => $res['price']
            ];
        }

        echo json_encode($data);
    }
}