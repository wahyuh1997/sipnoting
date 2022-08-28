<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnose extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * index
   */
  public function index()
  {
    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'Data Diagnosis Semua Balita',
    ];

    $this->load_template('diagnose/page/index', $data);
  }

  public function add()
  {
    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'Tambah Data Diagnosis',
    ];
    $this->load_template('diagnose/page/add', $data);
  }
}
