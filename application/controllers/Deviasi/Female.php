<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Female extends MY_Controller
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
      'title'     => 'Standar Deviasi Berat Badan',
      'subtitle'  => 'Anak Perempuan',
    ];
    $this->load_template('female/page/index', $data);
  }

  public function add()
  {
    $data = [
      'title'     => 'Tambah Data Standar Deviasi Berat Badan (KG)',
      'subtitle'  => 'Anak Perempuan',
    ];
    $this->load_template('female/page/add', $data);
  }
}
