<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Patients extends CI_Controller

{
    public function index()
    {
        $this->config->set_item('csrf_protection', TRUE);
        $this->load->view('patients');
    }
    /**
     * @author William Diaz
     * @since  Dec 18, 2014
     * @param  patientHash [This the unique patient token to avoid using primary keys
     * @return Json [Return the patient information including the favorite song if was assigned]
     */
    public function patientinfo($patientHash)
    {
        $this->load->model('M_Patients');
        $patientsdata = $this->M_Patients->getPatientInfo($patientHash);
        $data = array(
            'data' => $patientsdata
        );
        if (count($data) == 0) {
            echo count($data);
        }

        $this->data['output'] = $data;
        $this->load->view('json_view', $this->data);
    }
    /**
     * @author William Diaz
     * @since  Dec 28, 2014
     * @param  n/a
     * @return Json [Return true after song selection by the user to the patient  ]
     */
    public function assignsong()
    {
        if (!isset($_POST['patienthash'])) {
            return false;
        }
        else {
            $patientHash = $this->input->post('patienthash', TRUE);
            $song_id = $this->input->post('songid', TRUE);
            $previousSongId = $this->input->post('songcurrentid', TRUE);
            $song_track_id = $this->input->post('song_track_id', TRUE);
            $song_name = $this->input->post('songname', TRUE);
            $song_artist = $this->input->post('songartist', TRUE);
            $song_data = json_encode($this->getSongData($song_track_id));
            $this->load->model('M_Songs');
            $songssdata = $this->M_Songs->assignSong($patientHash, $previousSongId, $song_track_id, $song_name, $song_artist, $song_data);
            if ($songssdata) {
                echo "success";
            }
        }

        return true;
    }
    /**
     * @author William Diaz
     * @since  Dec 28, 2014
     * @param  trackid [This parameter receive the track id provided by itunes]
     * @return Json [Return a json object with all the track information]
     */
    private function getSongData($trackid)
    {
        $this->load->library('curl');
        $url = "https://itunes.apple.com/lookup";
        $post_data = array(
            "id" => $trackid
        );
        $output = $this->curl->simple_post($url, $post_data);
        $json = json_decode($output);
        $song_data = $json->results;
        return $song_data[0];
    }
}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */