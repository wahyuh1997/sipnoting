<?php

class Deviasi_model extends My_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert_deviasi($data)
    {
        if (!$data) {
            return $this->return_failed('Harap data diisi!',[]);
        }
        
        $cek = $this->db->get_where('standar_deviasi',['jenis_kelamin' => $data['jenis_kelamin'], 'usia' => $data['usia']]);
        
        if ($cek->num_rows() > 0) {
            return $this->return_failed('data sudah ada',[]);
        }

        $insert = [
            'jenis_kelamin' => $data['jenis_kelamin']
            ,'usia' => $data['usia']
            ,'minus_1_sd' => $data['minus_1_sd']
            ,'minus_2_sd' => $data['minus_2_sd']
            ,'minus_3_sd' => $data['minus_3_sd']
            ,'median' => $data['median']
            ,'1_sd' => $data['1_sd']
            ,'2_sd' => $data['2_sd']
            ,'3_sd' => $data['3_sd']
        ];

        $simpan = $this->db->insert('standar_deviasi', $insert);

        return $this->return_success('data berhasil disimpan!', $simpan);
    }
}