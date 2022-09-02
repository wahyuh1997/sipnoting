<?php

class Bayi_model extends My_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function insert_or_update_bayi($data=null)
    {
        
        return $this->return_success('berhasil',[]);
    }

    function get_bayi($user_id = null)
    {
        $sql = "
                select a.*, b.nama
                from profile_bayi a
                left join users b on a.user_id = b.id
                where b.id = ?
                ";
        
        try {
            return $this->return_success('',$this->db->query($sql, [$user_id])->row_array());
        } catch (\Throwable $th) {
            return $this->return_failed('data tidak ada',[]);
        }
    }
}