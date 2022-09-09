<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();

    $this->load->model([
      'Dashboard_model' => 'dashboard'
    ]);
  }

  /**
   * index
   */
  public function index($month = null)
  {
    // trace($res);
    if ($month == null) {
      $month = date('Y-m');
    }

    $data = [
      'title'     => 'Data Grafik',
      'subtitle'  => 'Data Seluruh Grafik',
      'js'        => 'grafik/js/core',
      'data'      => $this->dashboard->report($month)
    ];

    $this->load_template('grafik/page/index', $data);
  }
}
