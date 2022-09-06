<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Balita_model', 'balita');
  }

  /**
   * index
   */
  public function index()
  {
    /* load Function Model Here to Show All Data*/
    if (isset($_SESSION['sipnoting_user']['id'])) {
      $res = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);
    } else {
      $res = ['status' => false];
    }

    $data = [
      'title'     => 'Profile',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res
    ];
    // trace($res);
    $this->load_template_user('profile/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
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
    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Profile',
        'subtitle'  => 'SIPNOTING',
        'js'        => 'profile/js/data',
        'data'      => $res['data']
      ];
      $this->load_template_user('profile/page/edit', $data);
    } else {
      echo json_encode($this->balita->get_balita($id)); //id bayi
    }
  }

  public function delete($id)
  {
    /* Add Function here */
    $res = $this->balita->delete_balita(3); //id balita
    echo json_encode($id);
  }
}
