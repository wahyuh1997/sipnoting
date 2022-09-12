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

  private function config_mail($email, $body, $subject)
  {
    $config = Array(
    'useragent' => "CodeIgniter",
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.mailtrap.io',
    'smtp_port' => 2525,
    'smtp_user' => '25e88afae7d376',
    'smtp_pass' => 'd76f88700c4e00',
    'crlf' => "\r\n",
    'charset'   => 'utf-8',
    'mailtype'  => 'html',
    'newline' => "\r\n"
    );
    $this->load->library('email');
    $this->email->initialize($config);

    $this->email->from("efendygajalis@gmail.com", "Sipnoting");
    $this->email->to($email);

    $this->email->subject($subject);
    $this->email->message($body);
    
    if ($this->email->send()) {
      return ['status' => true];
    } else {
        $data = ['status' =>false, 'data' => $this->email->print_debugger(array('headers'))];
      return $data;
    }
  }

  protected function _sendEmail($token, $email)
  {
    $body = 'Your Code : '.$token.' <br> Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>';
    $subject = 'Account Verification';

    return $this->config_mail($email, $body, $subject);
  }
  
  protected function _sendEmailVerify($token, $email)
  {
    $body = 'Your Code : '.$token.' <br> Click this link to change your password : <a href="' . base_url() . 'auth/verify_password?email=' . $email . '&token=' . urlencode($token) . '">Click Here</a>';
    $subject = 'Forgot Password';

    return $this->config_mail($email, $body, $subject);
  }

  public function token()
  {
    $token = rand(1, 999999);
    return sprintf("%06d", $token);
  }

  public function get_kesimpulan($stunting)
  {
    $keterangan = [
            'HK01' => ['Penuhi nutrisi bunda dimasa menyusui','Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)','Konsultasikan ke Dokter anak untuk penanganan lebih lanjut']
            ,'HK02' => ['Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang', 'Latihan peregangan','Pantau tumbuh kembang anak']
        ];
    return $keterangan[$stunting];
    
  }
}
