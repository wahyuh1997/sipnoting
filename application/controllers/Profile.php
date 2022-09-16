<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['sipnoting_user'])) {
      redirect('auth/login');
    }

    $this->load->model([
      'Balita_model' => 'balita',
      'User_model'   => 'user'
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    /* load Function Model Here to Show All Data*/
    if (isset($_SESSION['sipnoting_user']['id'])) {
      $res = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);
      $parent = $this->user->get_user($_SESSION['sipnoting_user']['id']);
    } else {
      $res = ['status' => false];
    }

    $data = [
      'title'     => 'Profile',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res,
      'parent'    => $parent,
    ];

    $this->load_template_user('profile/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);
    $parent = $this->user->get_user($_SESSION['sipnoting_user']['id']);

    if (count($post) == 0) {
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
        'parent'    => $parent,
        'js'        => 'profile/js/data'
      ];
      $this->load_template_user('profile/page/add', $data);
    } else {
      echo json_encode($this->balita->balita_add($post));
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Show All Data*/
    $res = $this->balita->get_balita($id);
    $parent = $this->user->get_user($_SESSION['sipnoting_user']['id']);
    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
        'js'        => 'profile/js/data',
        'data'      => $res['data'],
        'parent'    => $parent
      ];
      $this->load_template_user('profile/page/edit', $data);
    } else {
      echo json_encode($this->balita->balita_edit($post));
    }
  }

  public function edit_user()
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Show All Data*/
    $res = $this->user->get_user($_SESSION['sipnoting_user']['id']);

    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
        'data'      => $res
      ];
      $this->load_template_user('profile/page/edit_user', $data);
    } else {
      $post['user_id'] = $_SESSION['sipnoting_user']['id'];
      $post['jabatan'] = null;
      $res = $this->user->edit($post);

      if ($res['status'] == true) {
        $_SESSION['sipnoting_user']['email']  = $post['email'];
        $_SESSION['sipnoting_user']['nama']   = $post['nama'];
        $_SESSION['sipnoting_user']['no_hp']  = $post['no_hp'];
      }

      echo json_encode($res);
    }
  }

  public function change_pass()
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Show All Data*/

    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Password',
        'subtitle'  => 'SIPNOTING',
      ];
      $this->load_template_user('profile/page/change_pass', $data);
    } else {
      /* Write Your Function Here */
      $post['email'] = $_SESSION['sipnoting_user']['email'];
      echo json_encode($this->user->change_password($post['email'], $post['password']));
    }
  }

  public function delete($id)
  {
    echo json_encode($this->balita->delete_balita($id));
  }
}
