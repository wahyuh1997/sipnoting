<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Balita_model', 'balita');
    }

    function get_bayi()
    {
        echo json_encode($this->bayi->get_balita(20));
    }
    
    function insert_or_update()
    {
        //
    }
}