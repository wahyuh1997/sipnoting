<?php

    class User_model extends My_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function login($email, $password)
        {
            // cek user dengan username
            $data_user = $this->db->get_where('users', ['email' => $email])->row_array();

            // cek jika data tidak NULL / KOSONG
            if($data_user !== NULL)
            {
                //cek password
                if(password_verify($password, $data_user['password']))
                {
                    return return_success('login berhasil', $data_user);
                }
                else
                {
                    return return_success('password salah', []);
                }
            }
            else
            {
                return return_success('email tidak ditemukan', []);
            }
        }

        function insert_anggota($data)
        {
            $email = $data['email'];
            $nama = $data['nama'];
            $jabatan = $data['jabatan'];
            $no_hp = $data['no_hp'];
            $password = $data['password'];

            if (strlen($email) < 1 && strlen($nama) < 1 && strlen($password) < 1) {
                return $this->return_failed('email, nama, dan password silahkan diisi!',[]);
            }
            
            if ($this->db->get_where('users', ['email' => $email])->row_array()) {
                return $this->return_failed('email sudah digunakan!',[]);
            }

            $save = [
                'email' => $email
                ,'nama' => $nama
                ,'no_hp' => $no_hp
                ,'password' => password_hash($password, PASSWORD_DEFAULT)
                ,'kode_otp' => null
                ,'verified' => 1
                ,'is_admin' => 1
                ,'jabatan' => $jabatan
            ];

            $simpan = $this->db->insert('users', $save);

            return $this->return_success('Data berhasil disimpan!', $simpan);
        }

        function get_all_user()
        {
            $sql = "
                    select * from users
                    order by id asc";
            
            return $this->db->query($sql)->result_array();
        }

        function edit($data)
        {
            $user_id = $data['user_id'];
            $email = $data['email'];
            $nama = $data['nama'];
            $jabatan = $data['jabatan']??null;
            $no_hp = $data['no_hp'];

            $user = $this->db->get_where('users', ['id' => $user_id])->row_array();
            
            if (!$user) {
                return $this->return_failed('user tidak ada',[]);
            }
            
            if ($this->db->get_where('users', ['email' => $email, 'email !=' => $user['email']])->row_array()) {
                return $this->return_failed('email sudah ada.',[]);
            }
            $save = [
                'email' => $email
                ,'nama' => $nama
                ,'no_hp' => $no_hp
                ,'jabatan' => $jabatan
            ];

            $simpan = $this->db->update('users', $save, ['id' =>$user_id]);

            return $this->return_success('Data berhasil disimpan!', $simpan);
        }

        function get_user($user_id)
        {
            $sql = "
                    select * from users
                    where id = ?";
            return $this->db->query($sql,[$user_id]);
        }

        function register($data)
        {
            $email = $data['email'];
            $no_hp = $data['no_hp'];
            $password = $data['password'];

            if($this->db->get_where('users', ['email' => $email])->row_array()){
                return $this->return_failed('email sudah ada!',[]);
            }

            $save = [
                'email' => $email
                ,'no_hp' => $no_hp
                ,'password' => password_hash($password, PASSWORD_DEFAULT)
                ,'kode_otp' => $this->token()
                ,'is_admin' => 0
            ];

            $this->db->insert('users',$save);
            
            return $this->return_success('Kode OTP sudah dikirim, silahkan cek email anda',[]);
        }

        function verify($email, $kode_otp)
        {
            if(!$this->db->get_where('users', ['email' => $email])->row_array()){
                return $this->return_failed('Email tidak terdaftar atau user sudah terhapus. silahkan daftar kembali!',[]);
            }
            
            if (!$this->db->get_where('users', ['email' => $email, 'kode_otp'=> $kode_otp])->row_array()) {
                return $this->return_failed('Kode OTP tidak berlaku!',[]);
            }

            $this->db->update('users', ['verified' => 1],['email' => $email]);

            return $this->return_success('Verifikasi berhasil! Silahkan lengkapi profil anda!',[]);
        }
        // return $this->token();
    }
?>