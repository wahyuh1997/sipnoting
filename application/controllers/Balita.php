<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balita extends MY_Controller
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
    $res = 
    $data = [
      'title'     => 'Data Balita',
      'subtitle'  => 'Data Seluruh Balita',
    ];

    $this->load_template('balita/page/index', $data);
  }

  public function add()
  {
    $data = [
      'title' => 'Data Balita',
      'subtitle' => 'Tambah Data Balita',
      'js'       => 'balita/js/core'
    ];
    $this->load_template('balita/page/add', $data);
  }
}
