<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Bayi_model', 'bayi');
  }

  /**
   * index
   */
  public function index()
  {
    /* load Function Model Here to Show All Data*/
    $user_id = 1;
    $res = $this->bayi->get_bayi($user_id);

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
