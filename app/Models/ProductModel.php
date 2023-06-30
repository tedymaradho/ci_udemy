<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'tb_product';

    public function searchBarcode($barcode)
    {
        return $this->table('tb_product')->where('product_id', $barcode)->get()->getRowArray();
    }
}