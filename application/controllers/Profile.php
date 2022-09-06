<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Balita_model', 'balita');
  }

  /**
   * index
   */
  public function index()
  {
    /* load Function Model Here to Show All Data*/
    $user_id = 1;
    $res = $this->balita->get_balita($user_id);

    $data = [
      'title'     => 'Profile',
      'subtitle'  => 'SIPNOTING',
    ];
    
    $this->load_template_user('profile/page/index', $data);
  }

  public function edit()
  {
    $pos=[];
    /* load Function Model Here to Show All Data*/
    /*
    $update = [
      'user_id' => $pos['user_id']  
      ,'jenis_kelamin'=> $pos['jenis_kelamin']
      ,'tempat_lahir' => $pos['tempat_lahir']
      ,'tanggal_lahir' => $pos['tanggal_lahir']??''
      ,'ayah' => $pos['ayah']
      ,'ibu' => $pos['ibu']
      ,'alamat' => $pos['alamat']
      ,'nama'=> $pos['nama']
      ,'no_hp' => $pos['no_hp']??''
    ];
    $res = $this->balita->get_balita($update);
    */
    $data = [
      'title'     => 'Ubah Profile',
      'subtitle'  => 'SIPNOTING',
      'js'        => 'profile/js/data'
    ];
    $this->load_template_user('profile/page/edit', $data);
  }
}
