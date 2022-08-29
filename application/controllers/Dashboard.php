<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
      'title'     => 'Dashboard',
      'subtitle'  => 'Anak Laki-Laki',
    ];

    $this->load_template('dashboard/page/index', $data);
  }
}
