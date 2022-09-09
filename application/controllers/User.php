<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
  }

  /**
   * index
   */
  public function index()
  {
    // dataView
    $dataView = [
      'title'     => 'Data Pengguna',
      'subtitle'  => '',
    ];

    // view
    $this->load_template('user/page/index', $dataView);
  }

  public function add()
  {
    $post = $this->input->post(null, true);

    if (
      count($post) == 0
    ) {
      // dataView
      $dataView = [
        'title'     => 'Data Anggota',
        'subtitle'  => 'Tambah Data Anggota',
      ];

      // view
      $this->load_template('user/page/add', $dataView);
    } else {
      echo json_encode($this->user->insert_anggota($post));
    }
  }


  public function edit()
  {

    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      // dataView
      $dataView = [
        'title'     => 'Data Anggota',
        'subtitle'  => 'Tambah Data Anggota',
      ];

      // view
      $this->load_template('user/page/edit', $dataView);
    } else {
      $post['user_id'] = $_SESSION['sipnoting_admin']['id'];
      $res = $this->user->edit($post);

      if ($res['status'] == true) {
        $_SESSION['sipnoting_admin']['email']   = $post['email'];
        $_SESSION['sipnoting_admin']['nama']    = $post['nama'];
        $_SESSION['sipnoting_admin']['no_hp']   = $post['no_hp'];
        $_SESSION['sipnoting_admin']['jabatan'] = $post['jabatan'];
      }

      echo json_encode($res);
    }
  }

  public function change_password()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      // dataView
      $dataView = [
        'title'     => 'User',
        'subtitle'  => 'Ubah Kata Sandi'
      ];

      // view
      $this->load_template('user/page/change', $dataView);
    } else {
      $post['email'] = $_SESSION['sipnoting_admin']['email'];
      echo json_encode($this->user->change_password($post['email'], $post['password']));
    }
  }
}
