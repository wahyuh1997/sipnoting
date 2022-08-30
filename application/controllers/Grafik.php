<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends MY_Controller
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
      'title'     => 'Data Grafik',
      'subtitle'  => 'Data Seluruh Grafik',
    ];

    $this->load_template('grafik/page/index', $data);
  }
}
