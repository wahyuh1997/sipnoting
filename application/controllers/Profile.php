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
    $res = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);

    $data = [
      'title'     => 'Profile',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res
    ];
    // trace($res);
    $this->load_template_user('profile/page/index', $data);
  }

  public function edit()
  {
    $pos = [];
    /* load Function Model Here to Show All Data*/
    /*
    $update = [
      'bayi_id' => 4
      ,'jenis_kelamin' => "L"
      ,'nama' => 'Sumintul'
      ,'tanggal_lahir' => '2022-03-06'
      ,'ayah' => 'ganti'
      ,'ibu' => 'santi'
      ,'alamat' => 'kepo'
    ];
    $res = $this->balita->get_balita($update);

    // echo json_encode($this->balita->get_balita(4)); //id bayi
    */
    $data = [
      'title'     => 'Ubah Profile',
      'subtitle'  => 'SIPNOTING',
      'js'        => 'profile/js/data'
    ];
    $this->load_template_user('profile/page/edit', $data);
  }

  public function add()
  {
    $data = [
        'jenis_kelamin'=> 'L'
        ,'nama' => 'arel'
        ,'tempat_lahir' => 'Tangerang'??null
        ,'tanggal_lahir' => '2022-03-01'
        ,'ayah' => 'Samian'
        ,'ibu' => 'Masri'
        ,'alamat' => 'gatau'
        ,'user_id' => 7
    ];
    $res = ($this->balita->balita_add($data));
  }
}
