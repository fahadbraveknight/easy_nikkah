<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Easy Nikah</title>
        <link href="<?php echo base_url(); ?>resources/css/admin/bootstrap.min.css" rel="stylesheet">
        
        <!-- Data Tables -->
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/chosen/chosen.css" rel="stylesheet">
        
        
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/cropper/cropper.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/datapicker/datepicker3.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/plugins/clockpicker/clockpicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>resources/css/admin/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resources/css/admin/style.css" rel="stylesheet">
        
        <script src="<?php echo base_url(); ?>resources/js/admin/jquery-2.1.1.js" type="text/javascript"></script>
        
        
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span> <img alt="image" class="img-circle" src="<?php echo base_url(); ?>resources/images/profile_small.jpg" /> </span> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('username')?></strong> </span> </span> </a></div>
                            <div class="logo-element"> IN+ </div>
                        </li>
                        <li class="active"> <a href="<?php echo site_url("admin/dashboard"); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Dashboard</span></a> </li>
                        <li>
	                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Masters</span><span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level collapse">
                                <li>
                                	<a href="<?php echo base_url("admin/countries"); ?>">Countries</a> 
	                            </li>
                                <li>
                                	<a href="<?php echo base_url("admin/states"); ?>">States</a> 
	                            </li>
	                            <li>
                                	<a href="<?php echo base_url("admin/cities"); ?>">Cities</a>
	                            </li>
	                            <li>
                                	<a href="<?php echo base_url("admin/qualifications"); ?>">Qualifications</a>
	                            </li>
                            </ul>
	                    </li>
                        <li> <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">Orders </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="#">Generate Invoice</a></li>
                                <li><a href="#">View Invoices</a></li>
                                <li><a href="#">Module 1</a></li>
                                <li><a href="#">Module 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header"> <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                            <form role="search" class="navbar-form-custom" action="search_results.html">
                                <div class="form-group">
                                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li> <span class="m-r-sm text-muted welcome-message">Welcome to Easy Nikah</span> </li>
                            
                            <li> <a href="<?php echo base_url('admin/admin_login/logout'); ?>"> <i class="fa fa-sign-out"></i> Log out </a> </li>
                        </ul>
                    </nav>
                </div>
