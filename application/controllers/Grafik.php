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
    // trace($this->dashboard->report($month));


    $data = [
      'title'     => 'Data Laporan ' . monthFormat($month),
      'subtitle'  => 'Data Seluruh Grafik',
      'js'        => 'grafik/js/core',
      'date'      => $month,
      'data'      => $this->dashboard->report($month)
    ];

    $this->load_template('grafik/page/index', $data);
  }

  public function get_statistic()
  {
    echo json_encode($this->dashboard->detail_report($_GET['month'], $_GET['id']));
  }
}
