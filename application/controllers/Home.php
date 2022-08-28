<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
      'title'     => 'Home',
      'subtitle'  => 'SIPNOTING',
    ];
    $this->load_template_user('home/page/index', $data);
  }
}
