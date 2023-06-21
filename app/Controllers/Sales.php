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
}