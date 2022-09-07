<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnose extends MY_Controller
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
    $res = $this->diagnosis->get_all_diagnosis();
    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'Data Diagnosis Semua Balita',
    ];

    $this->load_template('diagnose/page/index', $data);
  }

  public function add()
  {
    $diagnosis=[
      'balita_id' => 4
      ,'usia_melahirkan' => 20
      ,'berat_lahir' => 5
      ,'tinggi_badan' => 30
      ,'jarak_kehamilan' => 2
      ,'created_by' => 7
    ];
    
    $res = $this->diagnosis->diagnosis_bayi($diagnosis);

    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'Tambah Data Diagnosis',
    ];
    $this->load_template('diagnose/page/add', $data);
  }
}
