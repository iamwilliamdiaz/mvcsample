<!DOCTYPE html>
<html>
<?php $this->load->view('/include/header/header'); ?>

<head>
    <title></title>
</head>

<body class="skin-blue">
<!-- header logo: style can be found in header.less -->

<header class="header">
    <a class="logo" href="/">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        AssistRx</a> <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <?php $this->load->view('/include/profile/profile_cover'); ?>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Right side column. Contains the navbar and content of the page -->

<aside class="right-side fixed">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>Patients <small>Patients List</small></h1>

        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>

            <li>
                <a href="#">Patients</a>
            </li>

            <li class="active">Patients List</li>
        </ol>
    </section><!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Small boxes (Stat box) -->

                <div class="row col-centered">
                    <?php $this->load->view('/include/navigation/top_navigation'); ?>
                </div><!-- /.row -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Patients List</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body table-responsive">
                        <table class=
                               "table table-bordered table-striped" id=
                               "patients" width="100%">
                            <thead>
                            <tr>
                                <th>Patient Name</th>

                                <th>Patient Phone</th>

                                <th>Patient Age</th>

                                <th>Patient Gender</th>

                                <th>Patient Favorite Song</th>
                            </tr>
                            </thead>

                            <tbody></tbody>

                            <tfoot>
                            <tr>
                                <th>Patient Name</th>

                                <th>Patient Phone</th>

                                <th>Patient Age</th>

                                <th>Patient Gender</th>

                                <th>Patient Favorite Song</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->

<div class="modal bs-example-modal-lg" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type=
                "button"><span>×</span><span class=
                                             "sr-only">Close</span></button>

                <h4 class="modal-title" id="myLargeModalLabel">Assign
                    Song - <span class="patient-name"></span></h4>
            </div>

            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group" id="song-track-info">
                        <label for="inputHasSong"><span class=
                                                        "patient-name"></span> has a Song:</label>

                        <table class=
                               "table table-bordered table-hover dataTable"
                               id="hasSong">
                            <thead>
                            <tr>
                                <th>Track Name</th>

                                <th>Collection Name</th>

                                <th>Artist</th>

                                <th>Album Cover</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr class="odd">
                                <td class="dataTables_empty" id=
                                "track-name" valign="top"></td>

                                <td class="dataTables_empty" id=
                                "collection-name" valign="top">
                                </td>

                                <td class="dataTables_empty" id=
                                "artist-name" valign="top"></td>

                                <td class="dataTables_empty" id=
                                "cover-photo" valign="top">
                                    <img src="/img/noimage.png"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="inputSongname">Enter song
                            name:</label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="songTerm"
                               onkeyup="return false;" placeholder=
                        "Enter song name" type="text">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" id="searchSong"
                                type="button">Search Song</button>
                    </div>

                    <div class="alert alert-success" id=
                    "add-status-alert" style="display: none;">
                        <i class="fa fa-check"></i> <button class=
                                                            "close" data-dismiss="alert" type=
                                                            "button">×</button> <b>Alert!</b> Song
                        <strong><span id=
                                      "myLargeModalLabelName"></span></strong> was
                        succesfully added to <strong><span class=
                                                           "patient-name"></span></strong>. Please wait...
                    </div>

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Song List</h3>
                        </div><!-- /.box-header -->

                        <div class=
                             "box-body table-responsive no-padding">
                            <table class=
                                   "table table-bordered table-hover dataTable"
                                   id="songList">
                                <thead>
                                <tr>
                                    <th style="display: none">Track
                                        Id</th>

                                    <th>Song Name</th>

                                    <th>Artist</th>

                                    <th>Explicit</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="odd">
                                    <td class="dataTables_empty"
                                        colspan="3" valign="top">No
                                        songs name entered</td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th style="display: none">Track
                                        Id</th>

                                    <th>Song Name</th>

                                    <th>Artist</th>

                                    <th>Explicit</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <!--button type="submit" class="btn btn-primary">Add Song</button-->
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- ./wrapper -->
<?php $this->load->view('/include/footer/footer'); ?><!-- page script -->
<script src="/js/patients_core.js" type="text/javascript"></script>
</body>
</html>