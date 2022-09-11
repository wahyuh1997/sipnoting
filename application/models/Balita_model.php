<?php

class Balita_model extends My_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function get_balita($id = null)
  {
    $sql = "
                select a.*, b.no_hp,b.email
                    ,(timestampdiff(year, tanggal_lahir, current_date)) as usia_tahun
                    ,(timestampdiff(month, tanggal_lahir, current_date) - (timestampdiff(year, tanggal_lahir, current_date)*12))  as usia_bulan
                from profile_bayi a
                left join users b on a.user_id = b.id
                where a.id = ?
                order by a.created_at desc
                ";

    $data = $this->db->query($sql, [$id]);

    if ($data->num_rows() < 1) {
      return $this->return_failed('data tidak ada', []);
    }
    return $this->return_success('', $data->row_array());
  }

  function get_balita_by_user($user_id = null)
  {
    $sql = "
                select a.*, b.no_hp,b.email
                    ,(timestampdiff(year, tanggal_lahir, current_date)) as usia_tahun
                    ,(timestampdiff(month, tanggal_lahir, current_date) - (timestampdiff(year, tanggal_lahir, current_date)*12))  as usia_bulan
                
                from profile_bayi a
                left join users b on a.user_id = b.id
                where b.id = ?
                order by a.created_at desc
                ";

    $data = $this->db->query($sql, [$user_id]);

    if ($data->num_rows() < 1) {
      return $this->return_failed('data tidak ada', []);
    }
    return $this->return_success('', $data->result_array());
  }

  function get_all_balita()
  {
    $sql = "
                select a.*, b.no_hp, b.email
                    ,(timestampdiff(year, tanggal_lahir, current_date)) as usia_tahun
                    ,(timestampdiff(month, tanggal_lahir, current_date) - (timestampdiff(year, tanggal_lahir, current_date)*12))  as usia_bulan
                from profile_bayi a
                left join users b on a.user_id = b.id
                ";
    $sql .= "order by created_at desc";
    $data = $this->db->query($sql);

    if ($data->num_rows() < 1) {
      return $this->return_failed('data tidak ada', []);
    }
    return $this->return_success('', $data->result_array());
  }

  function balita_edit($data)
  {
    $user = $this->db->get_where('profile_bayi', ['id' => $data['bayi_id']]);

    if ($user->num_rows() < 1) {
      return $this->return_failed('data bayi tidak ada', []);
    }

    $insert_bayi = [
      'jenis_kelamin' => $data['jenis_kelamin']
      , 'nama' => $data['nama']
      , 'tempat_lahir' => $data['tempat_lahir']
      , 'tanggal_lahir' => $data['tanggal_lahir']
      , 'ayah' => $data['ayah']
      , 'ibu' => $data['ibu']
      , 'alamat' => $data['alamat']
      , 'updated_at' => date('Y-m-d H:i:s')
    ];

    $this->db->update('profile_bayi', $insert_bayi, ['id' => $data['bayi_id']]);

    return $this->return_success('berhasil', []);
  }

  function balita_add($data)
  {
    $user = $this->db->get_where('users', ['id' => $data['user_id']]);

    if ($user->num_rows() < 1) {
      return $this->return_failed('data user tidak ada', []);
    }

    $insert_bayi = [
      'jenis_kelamin' => $data['jenis_kelamin'], 'nama' => $data['nama'], 'tempat_lahir' => $data['tempat_lahir'] ?? null, 'tanggal_lahir' => $data['tanggal_lahir'], 'ayah' => $data['ayah'], 'ibu' => $data['ibu'], 'alamat' => $data['alamat'], 'user_id' => $data['user_id']
    ];
    // return $insert_bayi;

    $this->db->insert('profile_bayi', $insert_bayi);

    return $this->return_success('berhasil', []);
  }

  function delete_balita($id)
  {
    $balita = $this->db->get_where('profile_bayi', ['id' => $id]);

    if ($balita->num_rows() < 1) {
      return $this->return_failed('data bayi tidak ada', []);
    }

    $this->db->delete('profile_bayi', ['id' => $id]);
    return $this->return_success('berhasil', []);
  }
}
