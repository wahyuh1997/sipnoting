<?php

class MY_Controller extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }


  /**
   * load_template function
   *
   * @return view
   */
  public function load_template($view = null, $data_view)
  {
    if (!isset($_SESSION['sipnoting_admin'])) {
      redirect();
    }

    $this->load->view("templates/header", $data_view);
    $this->load->view("templates/sidebar", $data_view);
    $this->load->view($view, $data_view);
    $this->load->view("templates/footer", $data_view);
    if (isset($data_view['js'])) {
      $this->load->view($data_view['js'], $data_view);
    }
  }

  public function load_template_user($view = null, $data_view)
  {
    // if (!isset($_SESSION['pos_order'])) {
    //   redirect('login');
    // }

    $this->load->view("templates/user/header", $data_view);
    $this->load->view($view, $data_view);
    $this->load->view("templates/user/footer", $data_view);
    if (isset($data_view['js'])) {
      $this->load->view($data_view['js'], $data_view);
    }
  }
}
