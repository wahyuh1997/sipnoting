<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Balita_model', 'balita');
        $this->load->model('Deviasi_model', 'deviasi');
        $this->load->model('User_model');
    }

    function get_bayi()
    {
        echo json_encode($this->bayi->get_balita(20));
    }
    
    function insert_or_update()
    {
        $data = [
            'email' => 'andi@gmail.com'
            ,'nama' => 'andi'
            ,'jabatan' => 'direktur'
            ,'no_hp' => '089602584857'
            ,'password' => '12345678'
        ];

        // echo json_encode($this->User_model->insert_anggota($data));
        echo json_encode($this->User_model->get_all_user());
        // echo json_encode($this->deviasi->get_all_deviasi('L'));
    }
}