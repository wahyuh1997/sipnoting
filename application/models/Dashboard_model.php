<?php

Class Dashboard_model extends My_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function presentase_stunting_pertahun($tahun = null)
    {
        $tahun = $tahun??date('Y');
        for ($i=1; $i <= 12 ; $i++) { 
            $sql = "
                SELECT kesimpulan, cast((COUNT(kesimpulan) / (select count(*) FROM diagnosis)) * 100 as integer) as persentase
                FROM diagnosis a
                where MONTH(created_at) = $i and YEAR(created_at)=$tahun
                and kesimpulan = 'HK01'
                GROUP by kesimpulan;
            " ;
            $bulan[$i] = $this->db->query($sql)->row_array();
        }

        $return = [
            'tahun' => $tahun
            , 'bulan' => $bulan
        ];
        return $this->return_success('',$return);
    }

    function presentase_stunting()
    {
        $sql = "
            SELECT kesimpulan, cast((COUNT(kesimpulan) / (select count(*) FROM diagnosis)) * 100 as integer) as persentase
            FROM diagnosis a
            where kesimpulan = 'HK01'
            GROUP by kesimpulan;
        " ;
        $return = $this->db->query($sql)->row_array();

        return $this->return_success('Presentase stunting',$return);
    }
    
    function rata_z_score()
    {
        $sql = "
            SELECT cast(sum(z_score) / (select count(*) FROM diagnosis) as float) as rerata, count(*) as total_balita
            FROM diagnosis a
        " ;
        $return = $this->db->query($sql)->row_array();

        return $this->return_success('Rata-rata Z Score dan total balita',$return);
    }
    
    function perbandingan_kelamin($tahun=null)
    {
        $tahun = $tahun??date('Y');
        $kelamin = ['L','P'];
        for ($i=1; $i <= 12; $i++) { 
            $sqlx = "
                SELECT jenis_kelamin, sum(z_score) as jumlah_z_score
                FROM diagnosis a
                left join profile_bayi b on a.bayi_id = b.id
                where MONTH(a.created_at) = $i and YEAR(a.created_at)=$tahun
                group by b.jenis_kelamin
            " ;
            for ($b=0; $b <count($kelamin) ; $b++) { 
                $sql = "
                    SELECT sum(a.z_score) as jumlah_z_score
                    FROM profile_bayi b
                    left join diagnosis a on a.bayi_id = b.id
                    where MONTH(a.created_at) = $i and YEAR(a.created_at)=$tahun
                    and b.jenis_kelamin = '".$kelamin[$b]."'
                    group by b.jenis_kelamin
                " ;
                $tarik = $this->db->query($sql);
                if ($tarik->num_rows() < 1) {
                    $tarik = 0;
                } else {
                    $tarik = floatval($tarik->row_array()['jumlah_z_score']);
                }
                $return_kelamin[$kelamin[$b]] = $tarik;
            }
            $bulan[$i] = $return_kelamin;
        }
        $return = [
            'tahun' => $tahun
            , 'bulan' => $bulan
        ];

        return $this->return_success('Perbandingan Laki-laki dan Perempuan',$return);
    }

    function report($param)
    {
        $pemisah = explode('-',$param);
        $tahun = (int)$pemisah[0];
        $bulan = (int)$pemisah[1];
        $sql = "
                select a.bayi_id,b.nama 
                        ,(select berat_balita 
                            from diagnosis 
                            where bayi_id = a.bayi_id and MONTH(created_at) = $bulan and YEAR(created_at) = $tahun
                            order by created_at desc limit 1) as berat_balita
                        , (select tinggi_balita 
                            from diagnosis 
                            where bayi_id = a.bayi_id and MONTH(created_at) = $bulan and YEAR(created_at) = $tahun
                            order by created_at desc limit 1) as tinggi_balita
                        , (select z_score 
                            from diagnosis 
                            where bayi_id = a.bayi_id and MONTH(created_at) = $bulan and YEAR(created_at) = $tahun
                            order by created_at desc limit 1) as z_score
                        , b.jenis_kelamin
                        , (timestampdiff(month, b.tanggal_lahir, current_date)) as usia
                        , ayah, ibu
                        , (select kesimpulan 
                            from diagnosis 
                            where bayi_id = a.bayi_id and MONTH(created_at) = $bulan and YEAR(created_at) = $tahun
                            order by created_at desc limit 1) as kesimpulan
                from diagnosis a
                inner join profile_bayi b on a.bayi_id = b.id
                where MONTH(a.created_at) = $bulan and YEAR(a.created_at) = $tahun
                group by a.bayi_id
                ";
        $data = $this->db->query($sql)->result_array();
        return $this->return_success('Laporan', $data);
    }

    function detail_report($param, $bayi_id)
    {
        
        $pemisah = explode('-',$param);
        $tahun = (int)$pemisah[0];
        $bulan = (int)$pemisah[1];

        
        $bulan_data = [];
        for ($i=1; $i <= $bulan ; $i++) {
            // return $bulan;
            $sql ="
                    select tinggi_balita, z_score, berat_balita
                    from diagnosis a
                    where bayi_id = $bayi_id and MONTH(created_at) = $i and YEAR(created_at) = $tahun
                    order by created_at desc limit 1;
            ";
            $bulan_data[$i] = $this->db->query($sql)->result_array();
        }

        $return = [
            'tahun' => $tahun
            , 'bulan' => $bulan_data
        ];

        return $this->return_success('', $return);
    }
}