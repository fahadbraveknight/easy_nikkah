<!DOCTYPE HTML>
<html>
<head>
<title>Easy Nikah</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('resources/css/bootstrap-3.1.1.min.css') ?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('resources/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js') ?>"></script>
<!-- Custom Theme files -->
<link href="<?php echo base_url('resources/css/style.css') ?>" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="<?php echo base_url('resources/css/font-awesome.css') ?>" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body>
<!-- ============================  Navigation Start =========================== -->
<script type="text/javascript">
		var BASE_URL = "<?php echo base_url(); ?>";
		var SITE_URL = "<?php echo site_url(); ?>";
	
</script>
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
			   <ul>
				<li class="green">
					<a href="#" class="icon-home"></a>
					<ul>
						<li><a href="#<?php /*echo base_url('frontend/user/login') */?>">Login</a></li>
					    <li><a href="#<?php /*echo base_url('frontend/user/register') */?>">Register</a></li>
					    <li><a href="<?php echo base_url();?>">Logout</a></li>
					</ul>
				</li>
			   </ul>
             </nav>
           </div>
           <a class="brand" href="<?php echo base_url('frontend/user') ?>"><h2 style="display: inline-block;">Easy Nikah</h2></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="<?php echo base_url('frontend/user') ?>">Home</a></li>
		            <li><a href="#">About</a></li>
		    		<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="#">New Matches</a></li>
		                <li><a href="#">Who Viewed my Profile</a></li>
		                <li><a href="#">Viewed & not Contacted</a></li>
		                <li><a href="#">Premium Members</a></li>
		                <li><a href="#">Shortlisted Profile</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="#">Regular Search</a></li>
		                <li><a href="#">Recently Viewed Profiles</a></li>
		                <li><a href="#">Search By Profile ID</a></li>
		                <li><a href="#">Faq</a></li>
		                <li><a href="#">Shortcodes</a></li>
		              </ul>
		            </li>
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Messages<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="#">Inbox</a></li>
		                <li><a href="#">New</a></li>
		                <li><a href="#">Accepted</a></li>
		                <li><a href="#">Sent</a></li>
		                <li><a href="#">Upgrade</a></li>
		              </ul>
		            </li>
		            <li class="last"><a href="#">Contacts</a></li>
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->