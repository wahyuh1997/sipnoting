<?php

class My_Model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function return_success($message, $data)
  {
    $return = [
      'message' => $message, 'data' => $data, 'status' => true
    ];
    return $return;
  }

  function return_failed($message, $data)
  {
    $return = [
      'message' => $message, 'data' => $data, 'status' => false
    ];
    return $return;
  }

  protected function _sendEmail($token, $type, $email)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'efendygajalis@gmail.com',
      'smtp_pass' => 'efendy123',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];
    $this->load->library()('email');
    $this->email->initialize($config);

    $this->email->from($config['email'], 'Web Programming UNPAS');
    $this->email->to($this->input->post('email'));

    $this->email->subject('Account Verification');
    $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function token()
  {
    $token = rand(1, 999999);
    return sprintf("%06d", $token);
  }
}
