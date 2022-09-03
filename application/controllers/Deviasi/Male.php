<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Male extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    /* Load Model Here */
    $this->load->model([
      'Deviasi_model' => 'deviasi'
    ]);
  }

  public function index()
  {
    /* load Function Model Here to Show All Data*/
    $res = '';

    $data = [
      'title'     => 'Standar Deviasi Berat Badan',
      'subtitle'  => 'Anak Laki-Laki',
    ];
    $this->load_template('male/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);
    /* If Need Selection Load Here */
    /** */

    $insert = [
            'jenis_kelamin' => 'L'
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

    if (count($post) == 0) {
      $data = [
        'title'     => 'Tambah Data Standar Deviasi Berat Badan (KG)',
        'subtitle'  => 'Anak Laki-Laki',
      ];
      $this->load_template('male/page/add', $data);
    } else {
      /* Save Data Function */
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Get Data By ID*/
    $res = '';

    if (count($post) == 0) {
      $data = [
        'title'     => 'Tambah Data Standar Deviasi Berat Badan (KG)',
        'subtitle'  => 'Anak Laki-Laki',
      ];
      $this->load_template('male/page/edit', $data);
    } else {
      /* Update Data Function */
    }
  }

  public function delete($id)
  {
    /* Delete Data Function */
  }
}
