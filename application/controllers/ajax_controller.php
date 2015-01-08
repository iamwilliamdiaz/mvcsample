<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_controller extends CI_Controller {


	public function index()
	{




    }

    public function  getPatientList(){

        $this->config->set_item('csrf_protection', TRUE);
        $this->load->helper('form');



        $this->load->model('M_Patients');
        $patientsdata = $this->M_Patients->getPantientList();

        $data = array(
            'data'=> $patientsdata

        );


        $this->data['output'] = $data;
        $this->load->view('json_view',$this->data);

    }

    public function  getPatientListReport(){

        $this->config->set_item('csrf_protection', TRUE);
        $this->load->helper('form');



        $this->load->model('M_Reports');
        $patientsdata = $this->M_Reports->getPatientList();

        $data = array(
            'data'=> $patientsdata

        );


        $this->data['output'] = $data;
        $this->load->view('json_view',$this->data);

    }




    public function  getSongListReport(){

        $this->config->set_item('csrf_protection', TRUE);
        $this->load->helper('form');



        $this->load->model('M_Reports');
        $songdata = $this->M_Reports->getSongList();

        $data = array(
            'data'=> $songdata

        );



        $this->data['output'] = $data;
        $this->load->view('json_view',$this->data);

    }

}

/* End of file Invest.php */
/* Location: ./application/controllers/Invest.php */