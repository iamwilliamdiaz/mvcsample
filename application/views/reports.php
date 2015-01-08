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
            <h1>Report <small>Reports List</small></h1>

            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i> Home</a>
                </li>

                <li>
                    <a href="#">Reports</a>
                </li>

                <li class="active">Reports List</li>
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
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab_1">All
                                        Patients</a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#tab_2">Song
                                        List</a>
                                </li>

                                <li class="pull-right">
                                    <a class="text-muted fa fa-gear" href=
                                    "#" style="font-style: italic"></a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Song
                                                List</h3>
                                        </div><!-- /.box-header -->

                                        <div class=
                                             "box-body table-responsive no-padding">
                                            <table class=
                                                   "table table-bordered table-striped"
                                                   id="patientslist" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Patient
                                                        Name</th>

                                                    <th>Patient
                                                        Phone</th>

                                                    <th>Patient
                                                        Age</th>

                                                    <th>Patient
                                                        Gender</th>

                                                    <th>Patient
                                                        Favorite Song</th>
                                                </tr>
                                                </thead>

                                                <tbody></tbody>

                                                <tfoot>
                                                <tr>
                                                    <th>Patient
                                                        Name</th>

                                                    <th>Patient
                                                        Phone</th>

                                                    <th>Patient
                                                        Age</th>

                                                    <th>Patient
                                                        Gender</th>

                                                    <th>Patient
                                                        Favorite Song</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div><!-- /.box-body -->
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div class="tab-pane" id="tab_2">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Song
                                                List</h3>
                                        </div><!-- /.box-header -->

                                        <div class=
                                             "box-body table-responsive no-padding">
                                            <table class=
                                                   "table table-bordered table-striped"
                                                   id="songslist" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Song Name</th>

                                                    <th>Song
                                                        Artist</th>

                                                    <th>Song Cover</th>

                                                    <th>Song
                                                        Preview</th>
                                                </tr>
                                                </thead>

                                                <tbody></tbody>

                                                <tfoot>
                                                <tr>
                                                    <th>Song Name</th>

                                                    <th>Song
                                                        Artist</th>

                                                    <th>Song Cover</th>

                                                    <th>Song
                                                        Preview</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div><!-- /.box-body -->
                                    </div>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<?php $this->load->view('/include/footer/footer'); ?>
<!-- page script -->
<script src="/js/reports_core.js" type="text/javascript"></script>
</body>
</html>