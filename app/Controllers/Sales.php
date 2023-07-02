<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SaleModel;
use App\Models\CartModel;

class Sales extends BaseController
{
    protected $saleModel;
    protected $cartModel;

    public function __construct()
    {
        $this->saleModel = new SaleModel;
        $this->cartModel = new CartModel;
    }

    public function index()
    {
        $data = [
            'judul' => 'Penjualan',
            'no_faktur' => $this->saleModel->getFaktur()
        ];

        return view('pages/sales/index', $data);
    }

    public function addCart()
    {
        $this->cartModel->save([
            'no_faktur' => $this->request->getPost('no_faktur'),
            'barcode' => $this->request->getPost('barcode'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'price' => $this->request->getVar('price'),
            'qty' => 1,
            'options' => array('Size' => 'L', 'Color' => 'Red'),
        ]);

    }

    public function viewCart()
    {
        return $this->cartModel->findAll();
    }
}