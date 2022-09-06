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
    /* Check if already login */
    if (isset($_SESSION['sipnoting_admin'])) {
      redirect('dashboard');
    }

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

          if ($res['data']['verified'] == 1) {
            # code...
            $_SESSION['sipnoting_user'] = [
              'email'     => $res['data']['email'],
              'nama'      => $res['data']['nama'],
              'no_hp'     => $res['data']['no_hp'],
              'is_admin'  => $res['data']['is_admin'],
            ];
            redirect('home');
          } else {
            $_SESSION['sipnoting_user']['email'] = $res['data']['email'];
            redirect('auth/verif_email');
          }
        }
      } else {
        $this->session->set_flashdata('alert', $res['message']);
        redirect('home');
      }
    }
  }

  public function register()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      $data = [
        'title'     => 'Daftar',
        'subtitle'  => 'Daftar Sipnoting',
      ];

      $this->load->view('auth/register', $data);
    } else {
      if ($post['no_hp'] != '') {
        $str = $post['no_hp'];
        preg_match_all('!\d+!', $str, $matches);
        $post['no_hp'] = $matches[0][0] . $matches[0][1] . $matches[0][2];
      }
      echo json_encode($this->user->register($post));
    }
  }

  public function verif_email()
  {
    $post = $this->input->post(null, true);

    if (isset($_SESSION['sipnoting_user']['email'])) {
      if (count($post) == 0) {
        $data = [
          'title'     => 'Verifikasi Email',
          'subtitle'  => 'Daftar Sipnoting',
        ];

        $this->load->view('auth/verif_email', $data);
      } else {
        echo json_encode($this->user->verify($_SESSION['sipnoting_user']['email'], $post['kode_otp']));
        unset($_SESSION['sipnoting_user']['email']);
      }
    } else {
      redirect('');
    }
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
