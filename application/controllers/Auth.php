<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'User_model' => 'user'
    ]);
  }

  /**
   * Login
   */
  public function login()
  {
    $post = $this->input->post(null, true);
    if (count($post) == 0) {
      $data = [
        'title'     => 'Login',
        'subtitle'  => 'Login Sipnoting',
      ];

      $this->load->view('auth/login', $data);
    } else {
      $res = $this->user->login($post['email'], $post['password']);

      if ($res['status'] == true) {
        if ($res['data']['is_admin'] == 1) {
          $_SESSION['sipnoting_admin'] = [
            'email'     => $res['data']['email'],
            'nama'      => $res['data']['nama'],
            'no_hp'     => $res['data']['no_hp'],
            'is_admin'  => $res['data']['is_admin'],
            'jabatan'   => $res['data']['jabatan'],
          ];

          redirect('dashboard');
        } else {
          $_SESSION['sipnoting_user'] = [
            'email'     => $res['data']['email'],
            'nama'      => $res['data']['nama'],
            'no_hp'     => $res['data']['no_hp'],
            'is_admin'  => $res['data']['is_admin'],
          ];
          redirect('home');
        }
      } else {
        $this->session->set_flashdata('alert', $res['message']);
        redirect('home');
      }
    }
  }

  public function register()
  {
    $data = [
            'email' => 'andi1@gmail.com'
            ,'no_hp' => '08976565'
            ,'password' => '12345678'
        ];
    $res = $this->user->register($data);

    $data = [
      'title'     => 'Daftar',
      'subtitle'  => 'Daftar Sipnoting',
    ];

    $this->load->view('auth/register', $data);
  }

  public function verif_email()
  {
    $res = $this->user->verify('andi1@gmail.com', '751056');
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

  public function logout()
  {
    session_destroy();
  }
}
