<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();

    $this->load->model([
      'Balita_model'=>'balita'
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->balita->get_all_balita();
    $data = [
      'title'     => 'Data Grafik',
      'subtitle'  => 'Data Seluruh Grafik',
      'js'        => 'grafik/js/core'
    ];

    $this->load_template('grafik/page/index', $data);
  }
}
