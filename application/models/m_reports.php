<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_reports extends CI_Model

{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    /**
     * @author William Diaz
     * @since  Nov 28, 2014
     * @param  n/a
     * @return Json [Return the patient list with songs assigned to the controller]
     */
    function getPatientList()
    {

        $queryString = "SELECT patient_id, patient_uid, patient_phone, patient_age, patient_gender, song_name (SELECT song_name FROM songs WHERE songs.song_id = patients.favorite_song_id) as song_name FROM  patients  WHERE favorite_song_id IS NOT NULL";
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
     * @param  n/a
     * @return Json [Return the song list to the controller]
     */
    function getSongList()
    {

        $queryString = "SELECT song_name, song_artist, song_track_id, artworkUrl60, previewUrl, song_data, song_hash  FROM  songs  WHERE 1";
        $query = $this->db->query($queryString);
        $feed[] = array();
        $e = 0;
        if (count($query->result()) != "0") {
            foreach($query->result() as $row) {
                // $song_data = $row->song_data;
                $json = json_decode($row->song_data);
                $song_data = $json;
                $feed[$e] = array(
                    'song_name' => $row->song_name,
                    'DT_RowId' => $row->song_track_id,
                    'song_artist' => $row->song_artist,
                    'song_artwork' => "<img src='$song_data->artworkUrl60'>",
                    'song_preview_url' => "<audio controls><source src='$song_data->previewUrl' type='audio/ogg'><source src='$song_data->previewUrl' type='audio/mpeg'>Your browser does not support the audio element.</audio>",
                    'song_data' => $row->song_data,
                    'song_hash' => $row->song_hash
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
}