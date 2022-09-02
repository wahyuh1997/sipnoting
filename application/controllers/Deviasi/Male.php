<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Male extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    /* Load Model Here */
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
    $res = '';

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
