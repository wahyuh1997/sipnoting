<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends MY_Controller
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
      'title'     => 'Riwayat',
      'subtitle'  => 'SIPNOTING',
    ];
    $this->load_template_user('riwayat/page/index', $data);
  }
}
