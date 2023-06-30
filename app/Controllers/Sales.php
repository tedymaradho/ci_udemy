<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SaleModel;

class Sales extends BaseController
{
    protected $saleModel;

    public function __construct()
    {
        $this->saleModel = new SaleModel;
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
        $cart = \Config\Services::cart();
        $cart->insert(
            array(
                'id' => $this->request->getVar('product_id'),
                'qty' => 1,
                'price' => $this->request->getVar('price'),
                'name' => $this->request->getVar('product_name'),
                'options' => array('Size' => 'L', 'Color' => 'Red')
            )
        );

    }

    public function viewCart()
    {
        $cart = \Config\Services::cart();
        $data = $cart->contents();
    }
}