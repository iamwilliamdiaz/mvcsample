/**
 * Created by williamdiaz on 11/28/14.
 * Enviroment:  Development
 * Author: William Diaz
 * Date: 11/23/2014
 * Set the label name and last name of the patient on the modal windows
 * Set the patiend hash id
 */
$(function() {
    var selected = [];
    var patientHash;
    var patient_song_id;
    var inprocess = false;
    $('#patients').dataTable({
        "processing": false,
        "serverSide": false,
        "responsive": true,
        "bAutoWidth": true,
        "ajax": {
            "url": "/ajax_controller/getPatientList",
            "dataType": "json"
        },
        "rowCallback": function(row, data) {
            if ($.inArray(data.DT_RowId, selected) !== -1) {
                $(row).addClass('selected');
            }
        },
        "columns": [{
            "data": "patient_name"
        }, {
            "data": "patient_phone"
        }, {
            "data": "patient_age"
        }, {
            "data": "patient_gender"
        }, {
            "data": "favorite_song_id"
        }]
    });
    $('#patients tbody').on('click', 'tr', function() {
        patientHash = this.id;
        var index = $.inArray(patientHash, selected);
        var patientname = $(this).find("td:first").html();
        //Set the patient name table label
        $(".patient-name").html(patientname);
        if (index === -1) {
            selected.push(patientHash);
        } else {
            selected.splice(index, 1);
        }
        //Highlight the patient selected
        $(this).toggleClass('selected');
        //Check if the patient has song selection
        getPatientInfo();
        //Show the song list window
        $('#myModal').modal('toggle');
    });
    var term_input = $('#songTerm');
    var result_wrapper = $('table#songList tbody');
    $('#searchSong').click(function(e) {
        e.preventDefault();
        getSongList();
    });
    $('#songTerm').keyup(function(e) {
        if (e.keyCode == 13) {
            getSongList();
        }
    });
    $('#songList tbody').on('click', 'tr', function() {
        var songTrackID = this.id;
        var index = $.inArray(songTrackID, selected);
        var songid = $(this).find("td:first").html();
        var songname = $(this).find("td:nth-child(2)").html();
        var songartist = $(this).find("td:nth-child(3)").html();
        if (index === -1) {
            selected.push(songTrackID);
        } else {
            selected.splice(index, 1);
        }
        //Highlight the row selected by the user
        $(this).toggleClass('selected');
        $("#add-status-alert").show();
        $('#myLargeModalLabelName').text(songname);
        if (!inprocess) {
            //Avoid double posting or flooding
            inprocess = true;
            //Assign song selection to the patient
            $.ajax({
                url: '/patients/assignsong/',
                async: true,
                type: "POST",
                data: {
                    patienthash: patientHash,
                    songcurrentid: patient_song_id,
                    songid: songid,
                    songname: songname,
                    songartist: songartist,
                    song_track_id: songTrackID
                },
                success: function(result) {
                    if (result) {
                        //Redirect the user to the patient page
                        setTimeout(redirectUser(),
                            3000);
                    }
                }
            });
        }
    });
    //
    function getSongList() {
        var term = term_input.val();
        $.ajax({
            url: 'https://itunes.apple.com/search',
            jsonpCallback: 'jsonCallback',
            async: false,
            contentType: "application/json",
            dataType: 'jsonp',
            data: {
                country: 'US',
                term: term,
                entity: 'song',
                limit: 100
            },
            success: function(data) {
                var songs = data.results;
                console.log(songs);
                var dataSetRow = []
                var e = 0;
                for (var s in songs) {
                    var song = songs[s];
                    dataSetRow[e++] = {
                        DT_RowId: song.trackId,
                        song_name: song.trackName,
                        artist: song.artistName,
                        explicit: song.trackExplicitness
                    };
                }
                $('#songList').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": true,
                    "data": dataSetRow,
                    "responsive": true,
                    "bDestroy": true,
                    "rowCallback": function(row,
                                            data) {
                        if ($.inArray(data.DT_RowId,
                            selected) !==
                            -1) {
                            $(row).addClass(
                                'selected'
                            );
                        }
                    },
                    "columns": [{
                        "data": "DT_RowId",
                        "class": "hiddencolumn"
                    }, {
                        "data": "song_name"
                    }, {
                        "data": "artist"
                    }, {
                        "data": "explicit"
                    }]
                });
            }
        });
    }

    function getPatientInfo() {
        var term = term_input.val();
        $.ajax({
            url: '/patients/patientinfo/' + patientHash,
            async: false,
            type: "GET",
            contentType: "application/json",
            dataType: 'json',
            success: function(result) {
                var song_data = $.parseJSON(result.data[
                    0].patient_songdata);
                var song_id = result.data[0].patient_song_id;
                if (typeof song_data === 'object' &&
                    song_data !== null) {
                    //Get the current song id assigned to the patient
                    patient_song_id = song_id;
                    $("#track-name").text(song_data.trackName);
                    $("#collection-name").text(
                        song_data.collectionName);
                    $("#artist-name").text(song_data.artistName);
                    $('#cover-photo img').attr("src",
                        song_data.artworkUrl60);
                    $("#song-track-info").show();
                } else {
                    //Set the song id to zero when the patient doesn't has song selected
                    patient_song_id = 0;
                    $("#song-track-info").hide();
                }
            }
        });
    }

    function redirectUser() {
        return function() {
            location.href = "/";
        }
    }
});