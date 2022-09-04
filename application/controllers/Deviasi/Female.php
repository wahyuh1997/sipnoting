<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Female extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'Deviasi_model' => 'deviasi'
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->deviasi->get_all_deviasi('P');

    $data = [
      'title'     => 'Standar Deviasi Panjang Badan (cm) / Umur',
      'subtitle'  => 'Anak Perempuan',
      'data'      => $res
    ];
    $this->load_template('female/page/index', $data);
  }

  public function add()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      $data = [
        'title'     => 'Tambah Data Standar Deviasi Panjang Badan (cm)',
        'subtitle'  => 'Anak Perempuan',
      ];
      $this->load_template('female/page/add', $data);
    } else {
      echo json_encode($this->deviasi->insert_deviasi($post));
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    /* load Function Model Here to Get Data By ID  */
    $res = $this->deviasi->get_deviasi($id);

    if (
      $res['status'] == true
    ) {
      if (
        count($post) == 0
      ) {
        $data = [
          'title'     => 'Tambah Data Standar Deviasi Panjang Badan (cm)',
          'subtitle'  => 'Anak Perempuan',
          'data'      => $res['data']
        ];

        $this->load_template('female/page/edit', $data);
      } else {
        /* Update Data Function */
        echo json_encode($this->deviasi->edit_deviasi($post));
      }
    } else {
      redirect('deviasi/female');
    }
  }

  public function delete($id)
  {
    /* Delete Data Function */
    echo json_encode($this->deviasi->delete($id));
  }
}
