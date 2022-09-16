<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['sipnoting_user'])) {
      redirect('auth/login');
    }

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

    if (isset($_SESSION['sipnoting_user']['id'])) {
      $res       = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);
      $diagnosis = $this->diagnosis->get_all_diagnosis($_SESSION['sipnoting_user']['id']);
    } else {
      $res = ['status' => false];
    }


    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res,
      'diag'      => $diagnosis,
    ];

    $this->load_template_user('Diagnosis/page/index', $data);
  }

  public function result()
  {
    $post = $this->input->post(null, true);
    $res = $this->diagnosis->diagnosis_bayi($post);

    if ($res['status'] == true) {
      $data = [
        'title'     => 'Hasil Diagnosa',
        'subtitle'  => 'Hasil Diagnosa',
        'js'        => 'diagnosis/js/data',
        'data'      => $res
      ];
      $this->load_template_user('diagnosis/page/result', $data);
    } else {
      $this->session->set_flashdata('alert', $res['message']);
      redirect('diagnosis');
    }
  }
}
