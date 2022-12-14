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
      echo json_encode($this->user->insert_by_admin($post));
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Show All Data*/
    $user = $this->user->get_user($id);
    // trace($user);
    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
        'js'        => 'profile/js/data',
        'data'      => $user
      ];
      $this->load_template('user_data/page/edit', $data);
    } else {
      /* Copy Function Here */
      // $data = [
      //   'email' => 'andi@gmail.com', 'nama' => 'andi rifaldi', 'no_hp' => '089602584857', 'user_id' => 3, 'password' => '12345678'
      // ];
      $post['user_id'] = $id;
      echo json_encode($this->user->edit_by_admin($post));
    }
  }

  public function delete($id)
  {
    echo json_encode($this->user->delete_by_admin($id));
  }

  public function reset_pass()
  {
    echo json_encode($this->user->change_password($_GET['email'], 'qwerty'));
  }
}
