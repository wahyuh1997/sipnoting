<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'User_model', 'user'
    ]);
  }

  /**
   * Login
   */
  public function login()
  {
    $data = [
            'email' => 'andi@gmail.com'
            ,'password' => '12345678'
        ];
    
    $res = $this->user->login($data['email'], $data['password']);
    
    $data = [
      'title'     => 'Login',
      'subtitle'  => 'Login Sipnoting',
    ];

    $this->load->view('auth/login', $data);
  }

  public function register()
  {
    $data = [
      'title'     => 'Daftar',
      'subtitle'  => 'Daftar Sipnoting',
    ];

    $this->load->view('auth/register', $data);
  }

  public function verif_email()
  {
    $data = [
      'title'     => 'Verifikasi Email',
      'subtitle'  => 'Daftar Sipnoting',
    ];

    $this->load->view('auth/verif_email', $data);
  }

  public function verif_success()
  {
    $data = [
      'title'     => 'Verifikasi Berhasil',
      'subtitle'  => 'Daftar Sipnoting',
    ];

    $this->load->view('auth/verif_success', $data);
  }
}
