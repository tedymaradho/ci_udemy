<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'tb_product';
    protected $returnType = 'array';
    protected $protectFields = false;

    public function searchBarcode($barcode)
    {
        return $this->table('tb_product')->where('product_id', $barcode)->get()->getRowArray();
    }
}