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
        'User_model'=> 'user'
        ]);
    }

    function get_bayi()
    {
        echo json_encode($this->bayi->get_balita(20));
    }
    
    function insert_or_update()
    {
        $data = [
            'email' => 'andi@gmail.com'
            ,'nama' => 'andi rifaldi'
            ,'jabatan' => 'direktur'
            ,'no_hp' => '089602584857'
            // ,'user_id' => 3
            ,'password' => '12345678'
        ];

        $data = [
            'email' => 'andi@gmail.com'
            ,'password' => '12345678'
        ];

        // echo json_encode($this->User_model->insert_anggota($data));
        // echo json_encode($this->User_model->get_all_user());
        // echo json_encode($this->User_model->edit($data));
        // echo json_encode($this->User_model->get_user(3));
        // echo json_encode($this->user->login($data['email'], $data['password']));
        echo json_encode($this->user->token());
        // echo json_encode($this->deviasi->get_all_deviasi('L'));
    }
    function register()
    {
        $data = [
            'email' => 'andi1@gmail.com'
            ,'no_hp' => '08976565'
            ,'password' => '12345678'
        ];

        echo json_encode($this->user->verify('andi1@gmail.com', '751056'));
    }

    function edit_deviasi()
    {
        $insert = [
            'jenis_kelamin' => 'L'
            ,'usia' => 5
            ,'minus_1_sd' => -2
            ,'minus_2_sd' => -1
            ,'minus_3_sd' => -0.5
            ,'median' => 1
            ,'1_sd' => 2
            ,'2_sd' => 3
            ,'3_sd' => 4
        ];
    
        echo json_encode( $this->deviasi->edit_deviasi($insert));
        // echo json_encode( $this->deviasi->insert_deviasi($insert));
        
    }

    function detail()
    {
        $data = [
            'jenis_kelamin' => 'L' //P = Perempuan, L= Laki2
            ,'usia' => 0 //bulan
            ];
        // echo json_encode( $this->deviasi->get_deviasi($data));
        echo json_encode( $this->deviasi->get_deviasi($data));
    }
}