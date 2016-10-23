
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Register</li>
        <?php echo $this->session->flashdata('message'); ?>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     <form method="post" id="register-form">
	  	    <div class="form-group">
		      <label for="edit-name">Full Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="full_name" value="" size="60" maxlength="60" class="form-text required">
		      <span><?php echo form_error('full_name'); ?></span>
		    </div>
		    <div class="form-group">
		      <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
		      <input type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text required">
		      <span><?php echo form_error('password'); ?></span>
		    </div>
		    <div class="form-group">
		      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="email" value="" size="60" maxlength="60" class="form-text required">
		      <span><?php echo form_error('email'); ?></span>
		    </div>
		    <div class="age_select">
		      <label for="edit-pass">Date of Birth <span class="form-required" title="This field is required.">*</span></label>
		        <div class="age_grid">
		         <div class="col-sm-4 form_box">
                  <div class="select-block1">
                    <select name="age-date">
	                    <option value="">Date</option>
	                    <?php for($i=1;$i<31;$i++){
	                    	echo '<option value="'.$i.'">'.$i.'</option>';
	                    	} ?>
	         
                    </select>
                  </div>
            </div>
            <div class="col-sm-4 form_box2">
                   <div class="select-block1">
                    <select name="age-month">
	                    <option value="">Month</option>
	                    <option value="1">January</option>
	                    <option value="2">February</option>
	                    <option value="3">March</option>
	                    <option value="4">April</option>
	                    <option value="5">May</option>
	                    <option value="6">June</option>
	                    <option value="7">July</option>
	                    <option value="8">August</option>
	                    <option value="9">September</option>
	                    <option value="10">October</option>
	                    <option value="11">November</option>
	                    <option value="12">December</option>
                    </select>
                  </div>
                 </div>
                 <div class="col-sm-4 form_box1">
                   <div class="select-block1">
                    <select name="age-year">
	                    <option value="">Year</option>
	                     <?php
	                    	$current_year = date('Y',time());
	                    	$year = 1936;
	                     	while($year != $current_year)
	                     	{
	                     		if($user_age[2]==$year){$selected="selected";}
	                     		echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
	                     		$year++;
	                     	} ?>
                    </select>
                   </div>
                  </div>
                  <div class="clearfix"> </div>
                 </div>
                 <span><?php echo form_error('age-date'); ?></span><span><?php echo form_error('age-month'); ?></span><span><?php echo form_error('age-year'); ?></span>
              </div>
              <div class="form-group form-group1">
                <label class="col-sm-1 control-lable" for="sex">Sex : </label>
                <div class="col-sm-11">
                    <div class="radios">
				        <label for="radio-01" class="label_radio">
				            <input type="radio" name="gender" checked="" value="male"> Male
				        </label>
				        <label for="radio-02" class="label_radio">
				            <input type="radio" name="gender" value="female"> Female
				        </label>
	                </div>
                </div>
                <div class="clearfix"> </div>
             </div>
             <div class="form-group">
             	<label for="accept-terms" class="">
					By clicking on Submit you Agree to the <a href="<?php echo base_url('frontend/privacy') ?>" onclick="window.open('<?php echo base_url('frontend/privacy') ?>', 'newwindow', 'width=1000, height=600'); return false;">Privacy</a> and <a href="<?php echo base_url('frontend/terms') ?>" onclick="window.open('<?php echo base_url('frontend/terms') ?>', 'newwindow', 'width=1000, height=600'); return false;">Terms</a> of Easy Nikah.
				</label>
             </div>
			  <div class="form-actions">
			    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
			  </div>
		 </form>
	  </div>
<!-- 	  <div class="col-sm-6">
	     <ul class="sharing">
			<li><a href="#" class="facebook" title="Facebook"><i class="fa fa-boxed fa-fw fa-facebook"></i> Share on Facebook</a></li>
		  	<li><a href="#" class="twitter" title="Twitter"><i class="fa fa-boxed fa-fw fa-twitter"></i> Tweet</a></li>
		  	<li><a href="#" class="google" title="Google"><i class="fa fa-boxed fa-fw fa-google-plus"></i> Share on Google+</a></li>
		  	<li><a href="#" class="linkedin" title="Linkedin"><i class="fa fa-boxed fa-fw fa-linkedin"></i> Share on LinkedIn</a></li>
		  	<li><a href="#" class="mail" title="Email"><i class="fa fa-boxed fa-fw fa-envelope-o"></i> E-mail</a></li>
		 </ul>
	  </div> -->
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
