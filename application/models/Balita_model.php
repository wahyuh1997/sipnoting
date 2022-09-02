<?php

class Balita_model extends My_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function insert_or_update_bayi($data=null)
    {
        
        return $this->return_success('berhasil',[]);
    }

    function get_balita($user_id = null)
    {
        $sql = "
                select a.*, b.nama
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
                select a.*, b.nama
                from profile_bayi a
                left join users b on a.user_id = b.id
                ";
        
        $data = $this->db->query($sql);

        if ($data->num_rows() < 1) {
            return $this->return_failed('data tidak ada', []);
        }
        return $this->return_success('', $data->result_array());
    }

    function get_all_diagnosis($user_id = null)
    {
        $sql = "
                select a.*, b.nama
                from profile_bayi a
                left join users b on a.user_id = b.id
                ";

        if (strlen($user_id) > 0) {
            $sql .= "where user_id = ?";
            $data = $this->db->query($sql, [$user_id]);
        } else {
            $data = $this->db->query($sql);
        }
        

        if ($data->num_rows() < 1) {
            return $this->return_failed('data tidak ada', []);
        }
        
        return $this->return_success('', $data->result_array());
    }
}