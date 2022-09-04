<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->user->get_all_user();
    // trace($res);
    // dataView
    $dataView = [
      'title'     => 'Data Anggota',
      'subtitle'  => 'Seluruh Data Anggota',
      'data'      => $res
    ];

    // view
    $this->load_template('user/page/index', $dataView);
  }

  public function add()
  {
    $post = $this->input->post(null, true);

    if (
      count($post) == 0
    ) {
      // dataView
      $dataView = [
        'title'     => 'Data Anggota',
        'subtitle'  => 'Tambah Data Anggota',
      ];

      // view
      $this->load_template('user/page/add', $dataView);
    } else {
      echo json_encode($this->user->insert_anggota($post));
    }
  }


  public function edit($username = null)
  {

    if ($username == null) {
      $user_name = $_SESSION['pos_order']['username'];
    } else {
      $user_name = $username;
    }

    // get body
    $post = $this->input->post(null, true);

    $data = [
      'email' => 'andi@gmail.com', 'nama' => 'andi rifaldi', 'jabatan' => 'direktur', 'no_hp' => '089602584857', 'user_id' => 3
    ];

    $res = $this->user->insert_anggota($data);

    // check body
    $user = $this->lib_curl->curl_request($this->pos_service_v1 . 'auth/get_user/' . $user_name);
    if (count($post) == 0) {
      // get menu category details data
      // response check
      if ($user['status'] == true) {
        // dataView
        $dataView = [
          'title'       => 'Master Data',
          'subtitle'    => 'Edit Profile User',
          'data'        => $user['data']
        ];

        // view
        $this->load_template('user/page/edit', $dataView);
      } else {
        // redirect
        redirect('user');
      }
    } else {
      $user = $this->lib_curl->curl_request($this->pos_service_v1 . 'auth/update_user/' . $user['data']['id'], "PUT", $post);

      if ($username == null) {
        $_SESSION['pos_order']['name'] = $user['data']['name'];
        $_SESSION['pos_order']['username'] = $user['data']['username'];
        $_SESSION['pos_order']['role'] = $user['data']['role'];
      }

      echo json_encode($user);
    }
  }

  public function change_password()
  {
    $post = $this->input->post(null, true);


    if (count($post) == 0) {
      // dataView
      $dataView = [
        'title'     => 'User',
        'subtitle'  => 'Ubah Kata Sandi'
      ];

      // view
      $this->load_template('user/page/change', $dataView);
    } else {
      $response = $this->lib_curl->curl_request($this->pos_service_v1 . 'auth/change_password', 'POST', $_POST);
      echo json_encode($response);
    }
  }

  /**
   * delete
   */
  public function delete($username)
  {
    // get params
    $_POST['username'] = $username;
    $response = $this->lib_curl->curl_request($this->pos_service_v1 . 'auth/delete_user', 'POST', $_POST);
    echo json_encode($response);
  }


  /**
   * Reset Password
   */
  public function reset_password($username)
  {
    $_POST['username'] = $username;
    echo json_encode($this->lib_curl->curl_request($this->pos_service_v1 . 'auth/reset_password', 'POST', $_POST));
  }

  /**
   * Reset Password
   */
  public function change_user($id)
  {
  }
}
