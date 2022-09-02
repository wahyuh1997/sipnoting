<?php 

class Login_model extends My_Model
{
	function verify_account($email, $password)
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
}