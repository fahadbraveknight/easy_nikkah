
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Edit Groom</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	     <form method="post">
	  	    <div class="form-group">
		      <label for="edit-name">Full Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="full_name" value="<?php echo $groom['full_name'] ?>" size="60" maxlength="60" class="form-text required">
		    </div>
		    <div class="form-group">
		      <label for="edit-height">Height <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-height" name="user_height" value="<?php echo $groom['user_height'] ?>" size="60" maxlength="60" class="form-text required">
		    </div>
		    <div class="form-group">
		      <label for="edit-namaz-type">Salah - Namaz - Prayer <span class="form-required" title="This field is required.">*</span></label>
		      	<div class="form_box">
                  	<div class="select-block1">
	                    <select name="user_namaz_type">
		                    <option value="">Select</option>
		                    <?php foreach ($groom_traits['namaz_types'] as $key => $value){
		                    	$selected="";
		                    	if($value['id']==$groom['user_namaz_type']){$selected="selected";}
		                    	echo '<option '.$selected.' value="'.$value['id'].'">'.$value['namaz_type_name'].'</option>';
		                    	} ?>
		         
	                    </select>
                  	</div>
            	</div>
		    </div>
		    <div class="form-group">
		      <label for="edit-fasting-type">Fasting  <span class="form-required" title="This field is required.">*</span></label>
		      	<div class="form_box">
                  	<div class="select-block1">
	                    <select name="user_fasting_type">
		                    <option value="">Select</option>
		                    <?php foreach ($groom_traits['fasting_types'] as $key => $value){
		                    	$selected="";
		                    	if($value['id']==$groom['user_fasting_type']){$selected="selected";}
		                    	echo '<option '.$selected.' value="'.$value['id'].'">'.$value['fasting_type_name'].'</option>';
		                    	} ?>
		         
	                    </select>
                  	</div>
            	</div>
		    </div>
		    <div class="form-group">
		      <label for="edit-beard-type">Beard  <span class="form-required" title="This field is required.">*</span></label>
		      	<div class="form_box">
                  	<div class="select-block1">
	                    <select name="user_beard_type">
		                    <option value="">Select</option>
		                    <?php foreach ($groom_traits['beard_types'] as $key => $value){
		                    	$selected="";
		                    	if($value['id']==$groom['user_beard_type']){$selected="selected";}
		                    	echo '<option '.$selected.' value="'.$value['id'].'">'.$value['beard_type_name'].'</option>';
		                    	} ?>
		         
	                    </select>
                  	</div>
            	</div>
		    </div>
		   	<div class="form-group">
		   		<div class="row">
			   		<div class="col-md-6">
					     <label for="edit-marital-status">Marital Status  <span class="form-required" title="This field is required.">*</span></label>
				      	<div class="form_box">
		                  	<div class="select-block1">
			                    <select name="user_marital_status" >
				                    <option value="">Select</option>
				                    <?php foreach ($groom_traits['marital_status'] as $key => $value){
				                    	$selected="";
				                    	if($value['id']==$groom['user_marital_status']){$selected="selected";}
				                    	echo '<option '.$selected.' value="'.$value['id'].'">'.$value['marital_status_name'].'</option>';
				                    	} ?>
				         
			                    </select>
		                  	</div>
		            	</div>
	            	</div>
	            	<div class="col-md-6 hidden user-children">
	            		<label for="edit-children">Children  <span class="form-required" title="This field is required.">*</span></label>
				      	<div class="form_box">
		                  	<div class="select-block1">
			                    <select name="user_children_status">
				                    <option <?php echo $groom['user_children_status']==CHILDREN_NOT_APPLICAPLE ? "selected" : ""  ?>value="<?php echo CHILDREN_NOT_APPLICAPLE ?>"><?php echo get_children_status(CHILDREN_NOT_APPLICAPLE) ?></option>
				                    <option <?php echo $groom['user_children_status']==CHILDREN_YES ? "selected" : ""  ?> value="<?php echo CHILDREN_YES ?>"><?php echo get_children_status(CHILDREN_YES) ?></option>
				                    <option<?php echo $groom['user_children_status']==CHILDREN_NO ? "selected" : ""  ?> value="<?php echo CHILDREN_NO ?>"><?php echo get_children_status(CHILDREN_NO) ?></option>
			                    </select>
		                  	</div>
		            	</div>
	            	</div>
            	</div>
		    </div>
		    <div class="age_select">
		    	<?php 
		   			$age = date('d-m-Y',$groom['age']);
		   			$user_age = explode('-', $age); ?>
		      <label for="edit-pass">Age <span class="form-required" title="This field is required.">*</span></label>
		        <div class="age_grid">
		         <div class="col-sm-4 form_box">
                  <div class="select-block1">
                    <select name="age-date">
	                    <option value="">Date</option>
	                    <?php for($i=1;$i<31;$i++){
	                    	$selected="";
	                    	if($user_age[0]==$i){$selected="selected";}
	                    	echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
	                    	} ?>
	         
                    </select>
                  </div>
            </div>
            <div class="col-sm-4 form_box2">
                   <div class="select-block1">
                    <select name="age-month">
                    <option value="">Month</option>
                   <?php 
                   	$month = array('January','February','March','April','May','June','July','August','September','October','November','December');
                   	foreach ($month as $key => $value) {
                   		$selected="";
	                    if($user_age[1]==$key+1){$selected="selected";}
                   		echo '<option '.$selected.' value="'.($key+1).'">'.$value.'</option>';
                   } ?>
                    </select>
                  </div>
                 </div>
                 <div class="col-sm-4 form_box1">
                   <div class="select-block1">
                    <select name="age-year">
	                    <option value="">Year</option>
	                    <?php
	                    	$current_year = date('Y',time());
	                    	$year = 1980;
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
              </div>
			  <div class="form-actions">
			    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
			  </div>
		 </form>
	  </div>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','select[name="user_marital_status"]',function(){
			marital_status_id = $(this).val();
			$.ajax({
				url:BASE_URL+"frontend/user/check_if_marital_status_has_children/"+marital_status_id,
				dataType: "JSON",
				type:"POST",
				success:function(response){
					if(response.marital_status_has_children)
					{
						$('.user-children').removeClass('hidden');
					}
					else
					{

						$('.user-children').addClass('hidden');
					}
				}
			});
		})
	})
</script>