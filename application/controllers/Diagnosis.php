<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends MY_Controller
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
    $post = $this->input->post(null, true);
    if (isset($_SESSION['sipnoting_user']['id'])) {
      $res = $this->balita->get_balita_by_user($_SESSION['sipnoting_user']['id']);
    } else {
      $res = ['status' => false];
    }

    $data = [
      'title'     => 'Diagnosis',
      'subtitle'  => 'SIPNOTING',
      'data'      => $res
    ];
    $this->load_template_user('Diagnosis/page/index', $data);
  }

  public function result()
  {
    $post = $this->input->post(null, true);

    if (count($post) > 0) {
      $res = $this->diagnosis->diagnosis_bayi($post);
      // trace($res);
      $data = [
        'title'     => 'Hasil Diagnosa',
        'subtitle'  => 'Hasil Diagnosa',
        'data'      => $res
      ];
      $this->load_template_user('Diagnosis/page/result', $data);
    } else {
      redirect('diagnosis');
    }
  }
}
