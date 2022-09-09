<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'Diagnosis_model' => 'diagnosis'
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->diagnosis->get_all_diagnosis($_SESSION['sipnoting_user']['id']);
    // trace($res);
    $data = [
      'title'     => 'Riwayat',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res
    ];
    $this->load_template_user('riwayat/page/index', $data);
  }
}
