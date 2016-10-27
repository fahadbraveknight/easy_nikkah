
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Click on Resend button to get the verification link on email</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
   	  	<?php 
			if($this->session->flashdata('message'))
			{
				echo $this->session->flashdata('message');
			}
		?>
	   <form method="post" action="<?php echo base_url() ?>frontend/user/resend_email_verification_link">
  	    <!-- <div class="form-item form-type-textfield form-item-name">

  	    <input type="text" name="token_id" value="" size="60" class="form-text required">
	      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
	      <input type="text" id="edit-name" name="email" value="<?php echo $token_id; ?>" size="60" maxlength="60" class="form-text required">
	      <span><?php echo form_error('email'); ?></span>
	    </div> -->
	    <div class="form-item form-type-password form-item-email">
	    <input type="hidden" name="verification_id" value="<?php echo $verification_id; ?>" size="60" class="form-text required">
	    <input type="hidden" name="full_name" value="<?php echo $full_name; ?>" size="60" class="form-text required">
	      <label for="edit-email">Email <span class="form-required" title="This field is required.">*</span></label>
	      <input type="text" id="edit-email" name="email" size="60" value="<?php echo $email; ?>" maxlength="128" class="form-text required" required>
	     <span><?php echo form_error('password'); ?></span>

	    </div>
	    <div class="form-actions">
	    	<input type="submit" id="edit-submit" value="Resend" class="btn_1 submit">
	    	<!-- <a href="<?php echo base_url() ?>frontend/user/forgot_password" class="btn_1">Forgot Password</a> -->
	    </div>
	   </form>
	  </div>
	  <div class="col-sm-6">
<!-- 	    <ul class="sharing">
			<li><a href="#" class="facebook" title="Facebook"><i class="fa fa-boxed fa-fw fa-facebook"></i> Share on Facebook</a></li>
		  	<li><a href="#" class="twitter" title="Twitter"><i class="fa fa-boxed fa-fw fa-twitter"></i> Tweet</a></li>
		  	<li><a href="#" class="google" title="Google"><i class="fa fa-boxed fa-fw fa-google-plus"></i> Share on Google+</a></li>
		  	<li><a href="#" class="linkedin" title="Linkedin"><i class="fa fa-boxed fa-fw fa-linkedin"></i> Share on LinkedIn</a></li>
		  	<li><a href="#" class="mail" title="Email"><i class="fa fa-boxed fa-fw fa-envelope-o"></i> E-mail</a></li>
		</ul> -->
	  </div>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
