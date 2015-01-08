<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_Songs extends CI_Model

{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    /**
     * @author William Diaz
     * @since  Nov 28, 2014
     * @param  patientHash [This the unique patient token to avoid using primary keys]
     * @param  previousSongId [This the previous soong id assigned to the patient (if applicable)]
     * @param  song_track_id [This the song track id selected by the user for the patient]
     * @param  song_name [This the song name]
     * @param  song_artist [This the song artist]
     * @param  song_data [This the json wrapper song data]
     * @return Json [Return a boolean after the song was assigned or failed]
     */
    function assignSong($patientHash, $previousSongId, $song_track_id, $song_name, $song_artist, $song_data)
    {
        $this->load->helper('security');
        if ($previousSongId != 0) {
            $queryString = "DELETE FROM songs WHERE songs.song_id =$previousSongId";
            $query = $this->db->query($queryString);
            echo $queryString;
        }
        $datasong = array(
            'song_track_id' => $song_track_id,
            'song_name' => $song_name,
            'song_artist' => $song_artist,
            'song_data' => $song_data,
            'song_hash' => do_hash($song_track_id, 'md5')
        );
        $this->db->insert('songs', $datasong);
        $id = $this->db->insert_id();
        $datapatients = array(
            'favorite_song_id' => $id
        );
        $this->db->where('patient_uid', $patientHash);
        $this->db->update('patients', $datapatients);
        if ($id) {
            return true;
        }
        else {
            return false;
        }
    }
    /**
     * @author William Diaz
     * @since  Nov 28, 2014
     * @return Json [Return the song list]
     */
    function getSongList()
    {

        $queryString = "SELECT song_name, song_track_id, artworkUrl60, previewUrl, song_data, song_hash FROM  songs  WHERE 1";
        $query = $this->db->query($queryString);
        $feed[] = array();
        $e = 0;
        if (count($query->result()) != "0") {
            foreach($query->result() as $row) {
                $json = json_decode($row->song_data);
                $song_data = $json;
                $feed[$e] = array(
                    'song_name' => $row->song_name,
                    'DT_RowId' => $row->song_track_id,
                    'song_artist' => $row->song_artist,
                    'song_artwork' => "<img src='$song_data->artworkUrl60'>",
                    'song_preview_url' => $song_data->previewUrl,
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