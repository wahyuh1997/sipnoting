<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Dashboard_model' => 'dashboard']);
  }

  /**
   * index
   */
  public function index()
  {

    $data = [
      'title'     => 'Dashboard',
      'subtitle'  => 'Anak Laki-Laki',
      'js'        => 'dashboard/js/data',
      'balita'    => $this->dashboard->total_balita(),
      'data'      => $this->dashboard->rata_z_score(),
      'percent'   => $this->dashboard->presentase_stunting(),
      'report'    => $this->dashboard->report(date('Y-m'))
    ];


    $this->load_template('dashboard/page/index', $data);
  }

  public function statistic()
  {
    $data = [
      'percent'     => $this->dashboard->presentase_stunting_pertahun(),
      'comparison'  => $this->dashboard->perbandingan_kelamin()
    ];

    echo json_encode($data);
  }
}
