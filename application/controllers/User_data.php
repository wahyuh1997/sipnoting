<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_data extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'User_model'   => 'user',
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->user->get_all_user();
    // trace($res);
    $data = [
      'title'     => 'Data Pengguna',
      'subtitle'  => 'Data Seluruh Pengguna',
      'js'        => 'user_data/js/core',
      'data'      => $res
    ];

    $this->load_template('user_data/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      $data = [
        'title'    => 'Data Pengguna',
        'subtitle' => 'Tambah Data Pengguna',
      ];
      $this->load_template('user_data/page/add', $data);
    } else {
      /* Copy Function Here */
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Show All Data*/
    $user = $this->user->get_all_user();

    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
        'js'        => 'profile/js/data',
        'user'      => $user
      ];
      $this->load_template('user_data/page/edit', $data);
    } else {
      /* Copy Function Here */
    }
  }

  public function delete($id)
  {
    // echo json_encode($this->balita->delete_balita($id));
  }

  public function reset_pass()
  {
    echo json_encode($this->user->change_password($_GET['email'], 'qwerty'));
  }
}
