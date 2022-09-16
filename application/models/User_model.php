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
    if ($data_user !== NULL) {
      //cek password
      if (password_verify($password, $data_user['password'])) {
        return return_success('login berhasil', $data_user);
      } else {
        return return_failed('password salah', []);
      }
    } else {
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
      return $this->return_failed('email, nama, dan password silahkan diisi!', []);
    }

    if ($this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('email sudah digunakan!', []);
    }

    $save = [
      'email' => $email, 'nama' => $nama, 'no_hp' => $no_hp, 'password' => password_hash($password, PASSWORD_DEFAULT), 'kode_otp' => null, 'verified' => 1, 'is_admin' => 1, 'jabatan' => $jabatan
    ];

    $simpan = $this->db->insert('users', $save);

    return $this->return_success('Data berhasil disimpan!', $simpan);
  }

  function insert_by_admin($data)
  {
    $email = $data['email'];
    $nama = $data['nama'];
    $no_hp = $data['no_hp'];
    $password = $data['password'];

    if (strlen($email) < 1 && strlen($nama) < 1 && strlen($password) < 1) {
      return $this->return_failed('email, nama, dan password silahkan diisi!', []);
    }

    if ($this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('email sudah digunakan!', []);
    }

    $save = [
      'email' => $email, 'nama' => $nama, 'no_hp' => $no_hp, 'password' => password_hash($password, PASSWORD_DEFAULT), 'kode_otp' => null, 'verified' => 1, 'is_admin' => 0
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

  function edit_by_admin($data)
  {
    $user_id = $data['user_id'];
    $email = $data['email'];
    $nama = $data['nama'];
    $no_hp = $data['no_hp'];

    $user = $this->db->get_where('users', ['id' => $user_id])->row_array();

    if (!$user) {
      return $this->return_failed('user tidak ada', []);
    }

    if ($this->db->get_where('users', ['email' => $email, 'email !=' => $user['email']])->row_array()) {
      return $this->return_failed('email sudah ada.', []);
    }
    $save = [
      'email' => $email, 'nama' => $nama, 'no_hp' => $no_hp
    ];

    $simpan = $this->db->update('users', $save, ['id' => $user_id]);

    return $this->return_success('Data berhasil disimpan!', $simpan);
  }

  function edit($data)
  {
    $user_id = $data['user_id'];
    $email = $data['email'];
    $nama = $data['nama'];
    $jabatan = $data['jabatan'] ?? null;
    $no_hp = $data['no_hp'];

    $user = $this->db->get_where('users', ['id' => $user_id])->row_array();

    if (!$user) {
      return $this->return_failed('user tidak ada', []);
    }

    if ($this->db->get_where('users', ['email' => $email, 'email !=' => $user['email']])->row_array()) {
      return $this->return_failed('email sudah ada.', []);
    }
    $save = [
      'email'     => $email,
      'nama'      => $nama,
      'no_hp'     => $no_hp,
      'jabatan'   => $jabatan,
      'ayah'      => $data['ayah'],
      'ibu'       => $data['ibu']
    ];

    $simpan = $this->db->update('users', $save, ['id' => $user_id]);

    return $this->return_success('Data berhasil disimpan!', $simpan);
  }

  function get_user($user_id)
  {
    $sql = "
                    select * from users
                    where id = ?";
    return $this->db->query($sql, [$user_id])->row_array();
  }

  function register($data)
  {
    $email = $data['email'];
    $no_hp = $data['no_hp'];
    $password = $data['password'];

    if ($this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('email sudah ada!', []);
    }

    $save = [
      'email' => $email, 'no_hp' => $no_hp, 'password' => password_hash($password, PASSWORD_DEFAULT), 'kode_otp' => $this->token(), 'is_admin' => 0
    ];

    $mail = $this->_sendEmail($save['kode_otp'], $email);

    if (!$mail['status']) {
      return $this->return_failed('', $mail['data']);
    }

    $this->db->insert('users', $save);

    return $this->return_success('Kode OTP sudah dikirim, silahkan cek email anda', []);
  }

  function verify($email, $kode_otp)
  {
    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    if (!$this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('Email tidak terdaftar atau user sudah terhapus. silahkan daftar kembali!', []);
    }

    if ($user['verified'] == 1) {
      return $this->return_failed('Akun sudah diaktifkan!', []);
    }

    if (!$this->db->get_where('users', ['email' => $email, 'kode_otp' => $kode_otp])->row_array()) {
      return $this->return_failed('Kode OTP tidak berlaku!', []);
    }

    $this->db->update('users', ['verified' => 1], ['email' => $email]);

    return $this->return_success('Verifikasi berhasil! Silahkan lengkapi profil anda!', []);
  }

  function change_password($email, $password)
  {
    if (!$this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('Email tidak terdaftar!', []);
    }

    $this->db->update('users', ['password' => password_hash($password, PASSWORD_DEFAULT)], ['email' => $email]);

    return $this->return_success('Perubahan password berhasil!', []);
  }

  function reset_password($email)
  {
    if (!$this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('Email tidak terdaftar!', []);
    }

    $this->db->update('users', ['password' => password_hash('12345678', PASSWORD_DEFAULT)], ['email' => $email]);

    return $this->return_success('Reset password berhasil!', []);
  }

  function refresh_token($email)
  {
    // $user = $this->db->get_where('users', ['email' => $email])->row_array();
    if (!$this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('Email tidak terdaftar atau user sudah terhapus. silahkan daftar kembali!', []);
    }

    $save = [
      'kode_otp' => $this->token()
    ];

    $mail = $this->_sendEmail($save['kode_otp'], $email);

    $this->db->update('users', $save, ['email' => $email]);

    return $this->return_success('Token berhasil di refresh, silahkan cek email anda!', []);
  }

  function delete_by_admin($id)
  {
    if (strlen($id) < 1) {
      return $this->return_failed('Silahkan masukkan id user', []);
    }
    if (!$this->db->get_where('users', ['id' => $id])->row_array()) {
      return $this->return_failed('User tidak ditemukan!', []);
    }

    $this->db->delete('users', ['id' => $id]);
    return $this->return_success('User berhasil dihapus!', []);
  }

  function forgot_password($email)
  {
    if (!$this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('Email tidak terdaftar atau user sudah terhapus. silahkan daftar kembali!', []);
    }

    $kode_otp =  $this->token();

    if (!$this->_sendEmailVerify($kode_otp, $email)['status']) {
      return $this->return_failed('Proses Gagal. Silahkan coba lagi', []);
    }

    $this->db->update('users', ['kode_otp' => $kode_otp], ['email' => $email]);
    return $this->return_success('Email sudah dikirim! Silahkan cek inbox atau spam!', []);
  }

  function verify_password($email, $kode_otp)
  {
    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    if (!$this->db->get_where('users', ['email' => $email])->row_array()) {
      return $this->return_failed('Email tidak terdaftar atau user sudah terhapus. silahkan daftar kembali!', []);
    }

    if (!$this->db->get_where('users', ['email' => $email, 'kode_otp' => $kode_otp])->row_array()) {
      return $this->return_failed('Kode OTP tidak berlaku!', []);
    }

    $reset = $this->reset_password($email);

    if (!$reset['status']) {
      return $this->return_failed('Reset password gagal! Silahkan hubungi admin!', []);
    }

    return $this->return_success('Password berhasil di reset ke 12345678 . Silahkan login untuk mengubah password!', []);
  }
}
