<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Male extends MY_Controller
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
      'subtitle'  => 'Anak Laki-Laki',
    ];
    $this->load_template('male/page/index', $data);
  }

  public function add()
  {
    $data = [
      'title'     => 'Tambah Data Standar Deviasi Berat Badan (KG)',
      'subtitle'  => 'Anak Laki-Laki',
    ];
    $this->load_template('male/page/add', $data);
  }
}
