<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['sipnoting_user'])) {
      redirect('auth/login');
    }
    $this->load->model([
      'Diagnosis_model' => 'diagnosis'
    ]);
  }

  /**
   * index
   */
  public function index($id = null)
  {
    $res = $this->diagnosis->get_all_diagnosis($_SESSION['sipnoting_user']['id']);
    $data = [
      'title'     => 'Riwayat',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res
    ];

    if ($id != null) {
      $data['id'] = $id;
    }

    $this->load_template_user('riwayat/page/index', $data);
  }
}
