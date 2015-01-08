<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {


	public function index()
	{



        $data = array();
        $this->load->view('index',$data);

    }




}

/* End of file Invest.php */
/* Location: ./application/controllers/index.php */