<?php

class Diagnosis_model extends My_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_diagnosis($user_id = null)
    {
        $sql = "
                select a.*, b.nama, b.jenis_kelamin, (timestampdiff(month, b.tanggal_lahir, current_date)) as usia
                from diagnosis a
                inner join profile_bayi b on a.bayi_id = b.id
                ";

        if (strlen($user_id) > 0) {
            $sql .= "where created_by = ?";
            $data = $this->db->query($sql, [$user_id]);
        } else {
            $data = $this->db->query($sql);
        }
        

        if ($data->num_rows() < 1) {
            return $this->return_failed('data tidak ada', []);
        }
        
        return $this->return_success('', $data->result_array());
    }

    function diagnosis_bayi($data)
    {
        $id = $data['balita_id'];
        $usia_melahirkan = floatval($data['usia_melahirkan']);
        $berat_lahir = floatval($data['berat_lahir']) * 1000;
        $tinggi_badan = floatval($data['tinggi_badan']);
        $jarak_kehamilan = floatval($data['jarak_kehamilan']);

        $sql = "
                select id, jenis_kelamin, (timestampdiff(month, tanggal_lahir, current_date)) as usia
                from profile_bayi
                where id = ?
        ";
        $balita = $this->db->query($sql, [$id]);

        if ($balita->num_rows() < 0) {
            return $this->return_failed('data tidak ada!',[]);
        }

        $balita = $balita->row_array();

        $data_z_score = [
            'tinggi_badan' => $tinggi_badan
            ,'usia' => $balita['usia']
            ,'jenis_kelamin' => $balita['jenis_kelamin']
        ];
        $z_score = $this->z_score($data_z_score);
        
        /*
        $data_stunting = [
            'umur_ibu' => $usia_melahirkan
            ,'berat_lahir' => $berat_lahir
            ,'jarak_kehamilan' => $jarak_kehamilan
            ,'z_score' => $z_score
        ];
        $stunting = $this->stunting($data_stunting);
        */

        $simpan = [
            'bayi_id' => $balita['id']
            ,'usia_ibu' => $usia_melahirkan
            ,'berat_balita' => $berat_lahir
            ,'jarak_kehamilan' => $jarak_kehamilan
            ,'tinggi_balita' => $tinggi_badan
            ,'z_score' => $z_score['z_score']
            ,'created_by' => $data['created_by']
            ,'kesimpulan' => $z_score['stunting']
        ];

        $this->db->insert('diagnosis', $simpan);

        return $this->return_success('Proses diagnosis berhasil',$simpan);
    }

    function stunting($data)
    {
        $umur_ibu = $data['umur_ibu']; //tahun
        $berat_lahir = $data['berat_lahir']; //gram
        $jarak_kehamilan = $data['jarak_kehamilan']; //tahun
        $z_score = floatval($data['z_score']);

        $hasil = ''; // HK01 = stunting, HK02 = tidak stunting

        if ($umur_ibu < 21 && $berat_lahir < 2500 && $jarak_kehamilan < 1) { //1
            $hasil = 'HK01';
        } elseif ($umur_ibu < 21 && $berat_lahir < 2500 && $jarak_kehamilan > 1) { //2
            $hasil = 'HK01';
        } elseif ($umur_ibu < 21 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan < 1) { //3
            $hasil = 'HK01';
        } elseif ($umur_ibu < 21 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan > 1) { //4
            $hasil = 'HK02';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && $berat_lahir < 2500 && $jarak_kehamilan < 1) { //5
            $hasil = 'HK01';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && $berat_lahir < 2500 && $jarak_kehamilan > 1) { //6
            $hasil = 'HK02';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan < 1) { //7
            $hasil = 'HK02';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan > 1) { //8
            $hasil = 'HK02';
        } elseif ($umur_ibu > 35 && $berat_lahir < 2500 && $jarak_kehamilan < 1) { //9
            $hasil = 'HK01';
        } elseif ($umur_ibu > 35 && $berat_lahir < 2500 && $jarak_kehamilan > 1) { //10
            $hasil = 'HK01';
        } elseif ($umur_ibu > 35 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan < 1) { //11
            $hasil = 'HK01';
        } elseif ($umur_ibu > 35 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan > 1) { //12
            $hasil = 'HK02';
        } 
        
        if ($umur_ibu < 21 && $berat_lahir < 2500 && $jarak_kehamilan < 1 && $z_score < 0) { //13
            $hasil = 'HK01';
        } elseif ($umur_ibu < 21 && $berat_lahir < 2500 && $jarak_kehamilan > 1 && $z_score < 0) { //14
            $hasil = 'HK01';
        } elseif ($umur_ibu < 21 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan < 1 && $z_score < 0) { //15
            $hasil = 'HK01';
        } elseif ($umur_ibu < 21 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan > 1 && ($z_score > 0 || $z_score < 100)) { //16
            $hasil = 'HK02';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && $berat_lahir < 2500 && $jarak_kehamilan < 1 && $z_score < 0) { //17
            $hasil = 'HK01';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && $berat_lahir < 2500 && $jarak_kehamilan > 1 && $z_score < 0) { //18
            $hasil = 'HK02';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan < 1 && $z_score < 0) { //19
            $hasil = 'HK02';
        } elseif (($umur_ibu >= 21 || $umur_ibu <=35) && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan > 1 && $z_score < 0) { //20
            $hasil = 'HK02';
        } elseif ($umur_ibu > 35 && $berat_lahir < 2500 && $jarak_kehamilan < 1 && $z_score < 0) { //21
            $hasil = 'HK01';
        } elseif ($umur_ibu > 35 && $berat_lahir < 2500 && $jarak_kehamilan > 1 && $z_score < 0) { //22
            $hasil = 'HK01';
        } elseif ($umur_ibu > 35 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan < 1 && $z_score < 0) { //23
            $hasil = 'HK01';
        } elseif ($umur_ibu > 35 && ($berat_lahir >= 2500 || $berat_lahir <= 3000) && $jarak_kehamilan > 1 && $z_score < 0) { //24
            $hasil = 'HK01';
        }

        return $hasil;
    }

    function z_score($data)
    {
        $usia = (int)$data['usia'];
        $tinggi_badan = $data['tinggi_badan'];
        $jenis_kelamin = $data['jenis_kelamin'];

        $standar_deviasi = $this->db->get_where('standar_deviasi', ['jenis_kelamin' => $jenis_kelamin, 'usia' => $usia]);

        if ($standar_deviasi->num_rows() < 0) {
            return $this->return_failed('data tidak ada', []);
        }
        $standar_deviasi = $standar_deviasi->row_array();
        $z_score = 0;
        $stunting = '';

        if ($tinggi_badan >= $standar_deviasi['median']) {
            $z_score = ($tinggi_badan - $standar_deviasi['median'])/($standar_deviasi['1_sd'] - $standar_deviasi['median']);
            $stunting = 'HK02';
        } else {
            $z_score = ($tinggi_badan - $standar_deviasi['median'])/($standar_deviasi['median'] - $standar_deviasi['minus_1_sd']);
            $stunting = 'HK01';
        }

        $return = 
        [
            'z_score' => floatval($z_score)
            ,'stunting' => $stunting
        ];

        return $return;
    }
}