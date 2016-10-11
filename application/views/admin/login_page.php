<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eassy Nikah | Login</title>

    <link href="<?php echo base_url();?>resources/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>fontresources/-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>resources/css/admin/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>resources/css/admin/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Easy Nikah</h2>

                <p>
                    Please login to access the admin interface for Easy Nikah Website and App.
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                <?php
                if(isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
	  ?>
	  <div class="alert alert-success"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
	  <?php }?>
	  <?php $msg = $this->session->flashdata('msg'); 
	  if($msg != '') {
	  ?>
	  <div class="alert alert-success"><?php /*echo $msg;*/?></div>
	  <?php }?>
      <?php if(isset($err_msg) && $err_msg != '') {  ?>
		<div class="alert alert-danger fade in">
		<!-- <a class="close" data-dismiss="alert" href="#">&times;</a>
		Error Message --> 
		<ul><?php echo $err_msg; ?></ul>	
		</div>
	  	<?php } ?>
	  	<?php if(isset($info_msg) && $info_msg != '') {  ?>
	  	    <div class="alert alert-info fade in">
	  	    <!-- <a class="close" data-dismiss="alert" href="#">&times;</a> -->
    			<?php echo $info_msg; ?>
    		</div>
    	<?php } ?>
                    <form class="m-t" role="form" id="form" name="frm_login" action="<?php echo base_url('admin/admin_login/check_login'); ?>" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Username" required name="frm_username" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required name="frm_password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <!--<a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Easy Nikah
            </div>
            <div class="col-md-6 text-right">
               <small>© 2015-2020</small>
            </div>
        </div>
    </div>

</body>

</html>