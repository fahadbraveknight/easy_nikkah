
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="<?php echo base_url();?>"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Delete Profile</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
		<?php 
			if($this->session->flashdata('message'))
			{
				echo "<br>";
				echo $this->session->flashdata('message');
			}
		?>
	   <form method="post" action="<?php echo base_url('frontend/'.$this->session->userdata('user_detail').'/delete_profile/'.$this->session->userdata('userid'));?>">
  	    
		 <div class="radio">
			<label><input type="radio" class="chng_btn" name="delete_profile" value="I have found my match at Easy Nikah">&nbsp;I have found my match at Easy Nikah</label>
		</div>
		<div class="radio">
			<label><input type="radio" class="chng_btn" name="delete_profile" value="I have found my match from other means (relatives, friends etc)">&nbsp;I have found my match from other means (relatives, friends etc)</label>
		</div>
		<div class="radio">
			<label><input type="radio" class="chng_btn" name="delete_profile" value="I am currently not interested in search due to personal reasons">&nbsp;I am currently not interested in search due to personal reasons</label>
		</div>
		<div class="radio">
			<label><input type="radio" class="chng_btn" name="delete_profile" value="I didn't find Easy Nikah website useful for search">&nbsp;I didn't find Easy Nikah website useful for search</label>
		</div>
		
	    
	    <div class="form-actions">
	    	<input type="submit" name="delete-profile" value="Delete Profile" onclick="return confirm('Do you really want to delete Easy Nikah profile')" id="delete-profile" class="btn_2" disabled>
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

<script type="text/javascript">
	
	$(document).ready(function(){
		$('.chng_btn').click(function(){
			$('#delete-profile').prop('disabled', false);
			$('#delete-profile').removeClass('btn_2');
			$('#delete-profile').addClass('btn_1');
		});
	});

</script>