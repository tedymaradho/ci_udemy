<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';

    public function login($email, $password)
    {
        return $this->db->table('tb_user')->where([
            'email' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }
}