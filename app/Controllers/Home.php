<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel;
    }

    public function index()
    {
        return view('pages/login/index');
    }

    public function cekLogin()
    {
        if (
            $this->validate(
                [
                    'email' => [
                        'label' => 'Email',
                        'rules' => 'required|valid_email',
                        'errors' => [
                            'required' => '{field} cannot be empty',
                            'valid_email' => '{field} is not valid'
                        ]
                    ]
                ],
                [
                    'password' => [
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]',
                        'errors' => [
                            'required' => '{field} cannot be empty',
                            'min_length' => '{field} minimum 6 characters'
                        ]
                    ]
                ]
            )
        ) {
            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password'));
            $cek_login = $this->userModel->login($email, $password);

            if ($cek_login) {
                session()->set('email', $cek_login['email']);
                session()->set('name', $cek_login['name']);
                session()->set('authority', $cek_login['authority']);
                return redirect()->to(base_url('products'));
            } else {
                session()->setFlashdata('errors', 'Wrong email or password');
                return redirect()->to(base_url('home'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('home'));
        }
    }
}