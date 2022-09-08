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
    /**
     * $this->dashboard->presentase_stunting_pertahun($tahun); ->untuk tahun optional, default : tahun sekarang
     * $this->dashboard->presentase_stunting() -> buat ngecek presentase stunting
     * $this->dashboard->rata_z_score() -> buat mencari rata2 z_score dan total balita
     */
    $data = [
      'title'     => 'Dashboard',
      'subtitle'  => 'Anak Laki-Laki',
      'js'        => 'dashboard/js/data'
    ];

    $this->load_template('dashboard/page/index', $data);
  }
}
