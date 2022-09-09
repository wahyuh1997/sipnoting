<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnose extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'Balita_model'    => 'balita',
      'Diagnosis_model' => 'diagnosis'
    ]);
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->diagnosis->get_all_diagnosis();

    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'Data Diagnosis Semua Balita',
      'data'      => $res
    ];

    $this->load_template('diagnose/page/index', $data);
  }

  public function add()
  {
    $res = $this->balita->get_all_balita();

    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      $data = [
        'title'     => 'Diagnosis',
        'subtitle'  => 'Tambah Data Diagnosis',
        'data'      => $res
      ];
      $this->load_template('diagnose/page/add', $data);
    } else {
      echo json_encode($this->diagnosis->diagnosis_bayi($post));
    }
  }

  public function delete($id)
  {
    /* Copy Here */
    // echo json_encode($this->diagnosis->diagnosis_bayi($id));
  }
}
