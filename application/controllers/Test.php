<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bayi_model', 'bayi');
    }

    function get_bayi()
    {
        echo json_encode($this->bayi->get_bayi(1));
    }
    
    function insert_or_update()
    {
        echo json_encode($this->bayi->get_bayi());
    }
}