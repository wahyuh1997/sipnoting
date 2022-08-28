<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Login
   */
  public function login()
  {
    $data = [
      'title'     => 'Login',
      'subtitle'  => 'Login Sipnoting',
    ];

    $this->load->view('balita/page/index', $data);
  }
}
