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
    $res = $this->deviasi->get_all_deviasi('L');

    $data = [
      'title'     => 'Standar Deviasi Panjang Badan (cm) / Umur',
      'subtitle'  => 'Anak Laki-Laki',
      'data'      => $res
    ];

    $this->load_template('male/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);
    /* If Need Selection Load Here */

    if (count($post) == 0) {
      $data = [
        'title'     => 'Tambah Data Standar Deviasi Panjang Badan (cm)',
        'subtitle'  => 'Anak Laki-Laki',
      ];
      $this->load_template('male/page/add', $data);
    } else {
      echo json_encode($this->deviasi->insert_deviasi($post));
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Get Data By ID*/
    $res = '';

    if (count($post) == 0) {
      $data = [
        'title'     => 'Tambah Data Standar Deviasi Panjang Badan (cm)',
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
