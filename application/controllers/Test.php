<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Balita_model', 'balita');
    $this->load->model('Deviasi_model', 'deviasi');
    $this->load->model([
      'User_model' => 'user',
      'Balita_model' => 'balita'
    ]);
  }

  function get_bayi()
  {
    echo json_encode($this->bayi->get_balita(20));
  }

  function insert_or_update()
  {
    // $data = [
    //   'email' => 'andi@gmail.com', 'nama' => 'andi rifaldi', 'jabatan' => 'direktur', 'no_hp' => '089602584857'
    //   // ,'user_id' => 3
    //   , 'password' => '12345678'
    // ];

    // $data = [
    //   'email' => 'andi@gmail.com', 'password' => '12345678'
    // ];

    // echo json_encode($this->User_model->insert_anggota($data));
    // echo json_encode($this->User_model->get_all_user());
    // echo json_encode($this->User_model->edit($data));
    // echo json_encode($this->User_model->get_user(3));
    // echo json_encode($this->user->login($data['email'], $data['password']));
    // echo json_encode($this->user->token());
    // echo json_encode($this->deviasi->get_all_deviasi('L'));
    $data = [
        'email' => 'andi44@gmail.com'
        , 'nama' => 'andi rifaldi'
        , 'no_hp' => '089602584857'
        // ,'user_id' => 3
        , 'password' => '12345678'
      ];
    echo json_encode($this->user->insert_by_admin($data));
  }
  function register()
  {
    $data = [
      'email' => 'efendygajalis@gmail.com', 'no_hp' => '08976565', 'password' => '12345678'
    ];

    echo json_encode($this->user->register($data));
    // echo json_encode($this->user->verify('andi2@gmail.com', '853002'));
  }

  function edit_deviasi()
  {
    $insert = [
      'jenis_kelamin' => 'L', 'usia' => 5, 'minus_1_sd' => -2, 'minus_2_sd' => -1, 'minus_3_sd' => -0.5, 'median' => 1, '1_sd' => 2, '2_sd' => 3, '3_sd' => 4
    ];

    echo json_encode($this->deviasi->edit_deviasi($insert));
  }

  function detail()
  {
    $data = [
      'jenis_kelamin' => 'L' //P = Perempuan, L= Laki2
      , 'usia' => 0 //bulan
    ];
    // echo json_encode( $this->deviasi->get_deviasi($data));
    echo json_encode($this->deviasi->get_deviasi($data));
  }

  function balita()
  {
    // echo json_encode($this->balita->get_all_balita());
    // echo json_encode($this->balita->get_balita(7));

    $update = [
      'user_id' => 7, 'jenis_kelamin' => 'L', 'tempat_lahir' => 'Tangerang', 'tanggal_lahir' => '2022-07-02', 'ayah' => 'mian', 'ibu' => 'maun', 'alamat' => 'lolo', 'nama' => 'naim', 'no_hp' => '00000'
    ];
    $res = $this->balita->balita_edit($update);
    echo json_encode($res);
  }

  function add_balita()
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
    echo json_encode($this->balita->balita_add($data));
     // buat nambah
    echo json_encode($this->balita->get_balita_by_user(7)); 
    // echo json_encode($this->balita->get_balita(4)); 
    // echo json_encode($this->balita->get_all_balita()); 
    
    $data_edit = [
      'bayi_id' => 4
      ,'jenis_kelamin' => "L"
      ,'nama' => 'Sumintul'
      ,'tanggal_lahir' => '2022-03-06'
      ,'ayah' => 'ganti'
      ,'ibu' => 'santi'
      ,'alamat' => 'kepo'
    ];
    // echo json_encode($this->balita->balita_edit($data_edit));
    
  }

  function diagnosis()
  {
    $this->load->model('Diagnosis_model','diagnosis');
    
    $diagnosis=[
      'balita_id' => 4
      ,'usia_melahirkan' => 20
      ,'berat_lahir' => 5
      ,'tinggi_badan' => 30
      ,'jarak_kehamilan' => 2
      ,'created_by' => 7
    ];
    
    // echo json_encode($this->diagnosis->diagnosis_bayi($diagnosis));
    // echo json_encode($this->diagnosis->get_all_diagnosis());
    echo json_encode($this->diagnosis->get_all_diagnosis(7));
  }
  
  function dashboard()
  {
    $this->load->model('Dashboard_model','dashboard');

    // echo json_encode($this->dashboard->presentase_stunting());
    // echo json_encode($this->dashboard->rata_z_score());
    // echo json_encode($this->dashboard->perbandingan_kelamin());
    echo json_encode($this->dashboard->report('2022-09'));
  }
}
