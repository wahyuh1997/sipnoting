<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Female extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');

  }

  /**
   * index
   */
  public function index()
  {
    $data = [
      'title'     => 'Standar Deviasi Berat Badan',
      'subtitle'  => 'Anak Perempuan',
    ];
    $this->load_template('female/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);
    /* If Need Selection Load Here */
    /** */

    $insert = [
            'jenis_kelamin' => 'P'
            ,'usia' => $post['usia']
            ,'minus_1_sd' => $post['minus_1_sd']
            ,'minus_2_sd' => $post['minus_2_sd']
            ,'minus_3_sd' => $post['minus_3_sd']
            ,'median' => $post['median']
            ,'1_sd' => $post['1_sd']
            ,'2_sd' => $post['2_sd']
            ,'3_sd' => $post['3_sd']
        ];
    
    $res = $this->deviasi->insert_deviasi($insert);

    $data = [
      'title'     => 'Tambah Data Standar Deviasi Berat Badan (KG)',
      'subtitle'  => 'Anak Perempuan',
    ];
    $this->load_template('female/page/add', $data);
  }
}
