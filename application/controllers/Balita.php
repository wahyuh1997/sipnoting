<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balita extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'Balita_model' => 'balita'
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->balita->get_all_balita();
    $data = [
      'title'     => 'Data Balita',
      'subtitle'  => 'Data Seluruh Balita',
      'data'      => $res
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

  public function detail($id)
  {
    $res = $this->balita->get_balita($id);
  }
}
