<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'User_model'    => 'user',
      'Balita_model'  => 'balita',
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

      if (count($res['data']) > 0) {
        # Admin Section
        if ($res['data']['is_admin'] == 1) {
          $_SESSION['sipnoting_admin'] = [
            'id'        => $res['data']['id'],
            'email'     => $res['data']['email'],
            'nama'      => $res['data']['nama'],
            'no_hp'     => $res['data']['no_hp'],
            'is_admin'  => $res['data']['is_admin'],
            'jabatan'   => $res['data']['jabatan'],
          ];

          redirect('dashboard');
        } else {

          if ($res['data']['verified'] == 1) {
            # User Section
            $_SESSION['sipnoting_user'] = [
              'id'        => $res['data']['id'],
              'email'     => $res['data']['email'],
              'nama'      => $res['data']['nama'],
              'no_hp'     => $res['data']['no_hp'],
              'is_admin'  => $res['data']['is_admin'],
            ];
            $check_baby = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);
            if ($check_baby['status'] == true) {
              redirect('home');
            } else {
              redirect('profile');
            }
          } else {
            $_SESSION['sipnoting_user']['email'] = $res['data']['email'];
            redirect('auth/verif_email');
          }
        }
      } else {
        $this->session->set_flashdata('alert', $res['message']);
        redirect('auth/login');
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
      $res = $this->user->register($post);
      if ($res['status'] == true) {
        $_SESSION['sipnoting_user']['email'] = $post['email'];
      }
      echo json_encode($res);
    }
  }

  public function not_found()
  {
    $this->load->view('errors/html/error_404');
  }

  public function resend_otp()
  {
    /* Paste Send OTP HERE */
    $this->user->refresh_token($_SESSION['sipnoting_user']['email']);
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
        $res = $this->user->verify($_SESSION['sipnoting_user']['email'], $post['kode_otp']);
        if ($res['status'] == true) {
          unset($_SESSION['sipnoting_user']['email']);
        }
        echo json_encode($res);
      }
    } else {
      redirect('');
    }
  }

  public function verify_password()
  {
    if (isset($_GET['email']) && isset($_GET['token'])) {
      # code...
    }
    $post = $this->input->post(null, true);

    if (isset($_SESSION['sipnoting_user']['email'])) {
      if (count($post) == 0) {
        $data = [
          'title'     => 'Verifikasi Email',
          'subtitle'  => 'Daftar Sipnoting',
        ];

        $this->load->view('auth/verif_email', $data);
      } else {
        $res = $this->user->verify($_SESSION['sipnoting_user']['email'], $post['kode_otp']);
        if ($res['status'] == true) {
          unset($_SESSION['sipnoting_user']['email']);
        }
        echo json_encode($res);
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

  /* Forgot Password Area */
  public function forgot_password()
  {
    $post = $this->input->post();

    if (count($post) == 0) {
      $data = [
        'title'     => 'Lupa Password',
        'subtitle'  => 'Daftar Sipnoting',
      ];

      $this->load->view('auth/forgot_password', $data);
    } else {
      $res = $this->user->forgot_password($post['email']);
      if ($res['status'] == true) {
        $_SESSION['sipnoting_user']['email'] = $post['email'];
      }
      echo json_encode($res);
    }
  }

  public function check_otp_reset()
  {
    $post = $this->input->post(null, true);

    if (isset($_SESSION['sipnoting_user']['email'])) {
      if (count($post) == 0) {
        $data = [
          'title'     => 'Verifikasi Email',
          'subtitle'  => 'Daftar Sipnoting',
        ];

        $this->load->view('auth/check_otp_reset', $data);
      } else {
        $res = $this->user->verify_password($_SESSION['sipnoting_user']['email'], $post['kode_otp']);
        if ($res['status'] == true) {
          unset($_SESSION['sipnoting_user']['email']);
        }

        echo json_encode($res);
      }
    } else {
      redirect('');
    }
  }

  public function renew_password()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      $data = [
        'title'     => 'Masukan Password Baru Anda',
        'subtitle'  => 'Daftar Sipnoting',
      ];

      $this->load->view('auth/renew_password', $data);
    } else {
      $res = $this->user->verify_password($_SESSION['sipnoting_user']['email'], $post['kode_otp']);
      if ($res['status'] == true) {
        unset($_SESSION['sipnoting_user']['email']);
      }

      echo json_encode($res);
    }
  }

  /* End Of Forgot Password Area */

  public function logout()
  {
    session_destroy();
  }
}
