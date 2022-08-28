<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends MY_Controller
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
      'subtitle'  => 'SIPNOTING',
    ];
    $this->load_template_user('Diagnosis/page/index', $data);
  }

  public function result()
  {
    $data = [
      'title'     => 'Hasil Diagnosa',
      'subtitle'  => 'Hasil Diagnosa',
    ];
    $this->load_template_user('Diagnosis/page/result', $data);
  }
}
