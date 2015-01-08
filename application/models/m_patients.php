<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_Patients extends CI_Model

{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function addPatientInfo()
    {
        // Future use
    }
    /**
     * @author William Diaz
     * @since  Nov 28, 2014
     * @param  n/a
     * @return Json [Return the patient list to the controller]
     */
    function getPantientList()
    {

        $queryString = "SELECT patient_id, patient_uid, patient_phone, patient_age, patient_gender, song_name , (SELECT song_name FROM songs WHERE songs.song_id = patients.favorite_song_id) as song_name FROM  patients  WHERE 1 ORDER BY patient_name DESC";
        $query = $this->db->query($queryString);
        $feed[] = array();
        $e = 0;
        if (count($query->result()) != "0") {
            foreach($query->result() as $row) {
                $feed[$e] = array(
                    'patient_id' => $row->patient_id,
                    'DT_RowId' => $row->patient_uid,
                    'patient_name' => $row->patient_name,
                    'patient_phone' => $row->patient_phone,
                    'patient_age' => $row->patient_age,
                    'patient_gender' => $row->patient_gender,
                    'favorite_song_id' => $row->song_name,
                );
                $e++;
            }
            return $feed;
        }
        else {
            return array();
        }
        return array();
    }
    /**
     * @author William Diaz
     * @since  Nov 28, 2014
     * @param  patientHash [This the unique patient token to avoid using primary keys
     * @return Json [Return the patient information to the controller]
     */
    function getPatientInfo($patientHash)
    {
        $queryString = "SELECT patient_id, patient_uid, patient_name, patient_phone, patient_age, patient_gender, song_id, song_data ,  (SELECT song_id FROM songs WHERE songs.song_id = patients.favorite_song_id) as song_id, (SELECT song_data FROM songs WHERE songs.song_id = patients.favorite_song_id) as song_data FROM  patients  WHERE patient_uid = '$patientHash'";
        $query = $this->db->query($queryString);
        $feed[] = array();
        if (count($query->result()) != "0") {
            $row = $query->result();
            $feed[0] = array(
                'patient_id' => $row[0]->patient_id,
                'DT_RowId' => $row[0]->patient_uid,
                'patient_name' => $row[0]->patient_name,
                'patient_phone' => $row[0]->patient_phone,
                'patient_age' => $row[0]->patient_age,
                'patient_gender' => $row[0]->patient_gender,
                'patient_song_id' => $row[0]->song_id,
                'patient_songdata' => $row[0]->song_data,
            );
            return $feed;
        }
        else {
            return array();
        }
        return array();
    }
    function updatePatientInfo()
    {
        // Future use
    }
}