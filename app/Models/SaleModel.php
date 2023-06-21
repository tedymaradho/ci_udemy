<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'tb_sale';

    public function getFaktur()
    {
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur, 4)) AS no_urut FROM tb_sale WHERE DATE(tgl_sale)='$tgl'");
        $hasil = $query->getRowArray();

        if ($hasil['no_urut'] > 0) {
            $tmp = $hasil['no_urut'] + 1;
            $kd = sprintf("%04s", $tmp);
        } else {
            $kd = "0001";
        }

        $no_faktur = date("Ymd") . $kd;

        return $no_faktur;
    }

}