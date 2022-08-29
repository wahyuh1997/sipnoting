<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
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
      'title'     => 'Profile',
      'subtitle'  => 'SIPNOTING',
    ];
    $this->load_template_user('profile/page/index', $data);
  }

  public function edit()
  {
    $data = [
      'title'     => 'Ubah Profile',
      'subtitle'  => 'SIPNOTING',
      'js'        => 'profile/js/data'
    ];
    $this->load_template_user('profile/page/edit', $data);
  }
}
