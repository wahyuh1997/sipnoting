<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends MY_Controller
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
    if (isset($_SESSION['sipnoting_user']['id'])) {
      $res = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);
    } else {
      $res = ['status' => false];
    }
    // trace($res);
    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res
    ];
    $this->load_template_user('Diagnosis/page/index', $data);
  }

  public function result()
  {
    $data = [
      'title'     => 'Hasil Diagnosa',
      'subtitle'  => 'Hasil Diagnosa',
    ];
    $this->load_template_user('Diagnosis/page/result', $data);
  }
}
