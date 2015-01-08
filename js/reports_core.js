/**
 * Created by williamdiaz on 11/28/14.
 * Enviroment:  Development
 * Author: William Diaz
 * Date: 11/23/2014
 */
$(function() {

    var selected = [];

    $('#patientslist').dataTable( {
        "processing": false,
        "serverSide": false,
        "responsive": true,
        "ajax": {
            "url": "/ajax_controller/getPatientListReport",
            "dataType": "json"
        },
        "rowCallback": function( row, data ) {
            if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        },
        "columns": [
            { "data": "patient_name" },
            { "data": "patient_phone" },
            { "data": "patient_age" },
            { "data": "patient_gender" },
            { "data": "favorite_song_id" },

        ]


    } );

    $('#songslist').dataTable( {
        "processing": false,
        "serverSide": false,
        "responsive": true,
        "ajax": {
            "url": "/ajax_controller/getSongListReport",
            "dataType": "json"
        },
        "rowCallback": function( row, data ) {
            if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        },
        "columns": [
            { "data": "song_name" },
            { "data": "song_artist" },
            { "data": "song_artwork" },
            { "data": "song_preview_url" }

        ]


    } );



});