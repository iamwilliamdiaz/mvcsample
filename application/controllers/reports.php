<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {


    public function index()
    {

        $this->config->set_item('csrf_protection', TRUE);
        $this->load->view('reports');
    }
}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */