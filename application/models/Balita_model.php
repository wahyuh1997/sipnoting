<?php

class Balita_model extends My_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_balita($user_id = null)
    {
        $sql = "
                select a.*, b.nama, b.no_hp,b.email
                from profile_bayi a
                left join users b on a.user_id = b.id
                where b.id = ?
                ";
        
        $data = $this->db->query($sql, [$user_id]);

        if ($data->num_rows() < 1) {
            return $this->return_failed('data tidak ada', []);
        }
        return $this->return_success('', $data->row_array());
    }
    
    function get_all_balita()
    {
        $sql = "
                select a.*, b.nama, b.no_hp, b.email
                from profile_bayi a
                left join users b on a.user_id = b.id
                ";
        
        $data = $this->db->query($sql);

        if ($data->num_rows() < 1) {
            return $this->return_failed('data tidak ada', []);
        }
        return $this->return_success('', $data->result_array());
    }

    function balita_edit($data)
    {
        $user = $this->db->get_where('users',['id'=>$data['user_id']]);

        if ($user->num_row() < 1) {
            return $this->return_failed('data user tidak ada', []);
        }

        $insert_user = [
            'nama'=> $data['nama']
            ,'no_hp' => $data['no_hp']??''
        ];
        
        $insert_bayi = [
            'jenis_kelamin'=> $data['jenis_kelamin']
            ,'tempat_lahir' => $data['tempat_lahir']
            ,'tanggal_lahir' => $data['tanggal_lahir']??''
            ,'ayah' => $data['ayah']
            ,'ibu' => $data['ibu']
            ,'alamat' => $data['alamat']
        ];

        $this->db->update('users',$insert_user,['id'=>$data['user_id']]);
        $this->db->update('profile_bayi',$insert_user,['user_id'=>$data['user_id']]);

        return $this->return_success('berhasil',[]);
    }

    
}