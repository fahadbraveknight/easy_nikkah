
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
	    <form method="post">
	  		<div class="col-sm-6 login_left">
		  	    <div class="form-group">
			      <label for="edit-name">Full Name <span class="form-required" title="This field is required.">*</span></label>
			      <input type="text" id="edit-name" name="full_name" value="<?php echo isset($_POST['full_name'])? $_POST['full_name'] : $groom['full_name']; ?>" size="60" maxlength="60" class="form-text required">
			      <span><?php echo form_error('full_name'); ?></span>
			    </div>
			    <div class="form-group">
			      <label for="edit-height">Height <span class="form-required" title="This field is required.">*</span></label>
			      <div class="form_box">
	                  	<div class="select-block1">
		                    <select name="user_height">
			                    <option value="">Select</option>
			                    <?php for($i=4;$i<=6;$i++){
			                    	for($j=1;$j<=12;$j++){
			                    		$k="$i&#39;$j&quot;";
			                    		$l="$i'$j\"";
			                    		$selected="";
			                    		if($l===$groom['user_height']){$selected="selected";}
			                    		echo "<option ".$selected." value='$k'>$k</option>";
			                    		}
			                    	} ?>
			         
		                    </select>
	                  	</div>
	            	</div>
			      	<span><?php echo form_error('user_height'); ?></span>
			    </div>
			    <div class="form-group">
			      <label for="edit-namaz-type">Salah - Namaz - Prayer <span class="form-required" title="This field is required.">*</span></label>
			      	<div class="form_box">
	                  	<div class="select-block1">
		                    <select name="user_namaz_type">
			                    <option value="">Select</option>
			                    <option <?php echo "sometime"==$groom['user_namaz_type'] ? "selected" : "" ?>  value="sometime"><?php echo get_namaz_type('sometime') ?></option>
			                    <option <?php echo "regular"==$groom['user_namaz_type'] ? "selected" : "" ?>  value="regular"><?php echo get_namaz_type('regular') ?></option>
			                    <option <?php echo "friday"==$groom['user_namaz_type'] ? "selected" : "" ?>  value="friday"><?php echo get_namaz_type('friday') ?></option>
		                    </select>
	                  	</div>
	            	</div>

			      	<span><?php echo form_error('user_namaz_type'); ?></span>
			    </div>
			    <div class="form-group">
			      <label for="edit-fasting-type">Fasting  <span class="form-required" title="This field is required.">*</span></label>
			      	<div class="form_box">
	                  	<div class="select-block1">
		                    <select name="user_fasting_type">
			                    <option value="">Select</option>
			                    <option <?php echo "ramzan"==$groom['user_fasting_type'] ? "selected" : "" ?>  value="ramzan"><?php echo get_fasting_type('ramzan') ?></option>
			                    <option <?php echo "ramzan_sunnah"==$groom['user_fasting_type'] ? "selected" : "" ?>  value="ramzan_sunnah"><?php echo get_fasting_type('ramzan_sunnah') ?></option>
			                    <option <?php echo "ramzan_sunnah_nawafil"==$groom['user_fasting_type'] ? "selected" : "" ?>  value="ramzan_sunnah_nawafil"><?php echo get_fasting_type('ramzan_sunnah_nawafil') ?></option>
			         
		                    </select>
	                  	</div>
	            	</div>

			      	<span><?php echo form_error('user_fasting_type'); ?></span>
			    </div>
			    <div class="form-group">
			      <label for="edit-beard-type">Beard  <span class="form-required" title="This field is required.">*</span></label>
			      	<div class="form_box">
	                  	<div class="select-block1">
		                    <select name="user_beard_type">
			                    <option value="">Select</option>
			                    
			                    <option <?php echo "yes_sunnah"==$groom['user_beard_type'] ? "selected" : "" ?>  value="yes_sunnah"><?php echo get_beard_type('yes_sunnah') ?></option>
			                    <option <?php echo "no_sunnah"==$groom['user_beard_type'] ? "selected" : "" ?>  value="no_sunnah"><?php echo get_beard_type('no_sunnah') ?></option>
			                    <option <?php echo "no_beard"==$groom['user_beard_type'] ? "selected" : "" ?>  value="no_beard"><?php echo get_beard_type('no_beard') ?></option>
			         
		                    </select>
	                  	</div>
	            	</div>
			      	<span><?php echo form_error('user_beard_type'); ?></span>
			    </div>
			   	<div class="form-group">
			   		<div class="row">
				   		<div class="col-md-6">
						     <label for="edit-marital-status">Marital Status  <span class="form-required" title="This field is required.">*</span></label>
					      	<div class="form_box">
			                  	<div class="select-block1">
				                    <select name="user_marital_status" >
					                    <option value="">Select</option>
					                    <option <?php echo "unmarried"==$groom['user_marital_status'] ? "selected" : "" ?>  value="unmarried">Unmarried</option>
					                    <option <?php echo "divorced"==$groom['user_marital_status'] ? "selected" : "" ?>  value="divorced">Divorced</option>
					                    <option <?php echo "widowed"==$groom['user_marital_status'] ? "selected" : "" ?>  value="widowed">Widowed</option>
					                     <option <?php echo "married"==$groom['user_marital_status'] ? "selected" : "" ?>  value="married">Married</option>
				                    </select>
			                  	</div>
			            	</div>
			      			<span><?php echo form_error('user_marital_status'); ?></span>
		            	</div>
		            	<div class="col-md-6 <?php if(!$groom['user_children']){echo 'hidden';} ?> user-children">
		            		<label for="edit-children">Children  <span class="form-required" title="This field is required.">*</span></label>
					      	<div class="form_box">
			                  	<div class="select-block1">
				                    <select name="user_children">
				                    	<?php 
				                    		for ($i=0; $i <= 10; $i++) { 
				                    		$selected="";
				                    		if($groom['user_children']==$i) { $selected = "selected";}else{ $selected =  "";}
				                    		echo "<option ".$selected." value=".$i.">".$i."</option>";
				                    	} ?>
				                    </select>
			                  	</div>
			            	</div>
			      			<span><?php echo form_error('user_children'); ?></span>
		            	</div>
	            	</div>
			    </div>
			    <div class="form-group">
				    <div class="country-select">
				      <label for="edit-location">Location <span class="form-required" title="This field is required.">*</span>
				      	<?php  echo $groom['city_name'] .' '.$groom['state_name'] .' '.$groom['country_name']; ?> </label>
				        <div class="age_grid">
				         <div class="col-sm-4 country form_box">
		                  <div class="select-block1">
		                    <select name="user_location_country" class="countries-list">
			                    <option value="">Country</option>
			                    <?php foreach ($countries as $key => $country) {
			                    	echo '<option '.$selected.' value="'.$country['country_id'].'" data-id="'.$country['country_id'].'">'.$country['country_name'].'</option>';

			                    	}
			                    	if(!empty($groom['country_name']) && !empty($groom['user_location_country'])){
			                    		echo '<option value="'.$groom['user_location_country'].'"  selected style="display:none;">'.$groom['country_name'].'</option>';
			                    	}
			                    ?>
			         
		                    </select>
		                  </div>
		            	</div>
		            	<div class="col-sm-4 state form_box2">
		                   <div class="select-block1">
			                    <select name="user_location_state" class="states-list">
			                    	<option value="">State</option>
			                    	<?php if(!empty($groom['state_name']) && !empty($groom['user_location_state'])){
			                    		echo '<option value="'.$groom['user_location_state'].'" selected style="display:none;">'.$groom['state_name'].'</option>';
			                    		} ?>
			                    </select>
		                  	</div>
		                </div>
		                <div class="col-sm-4 city form_box1">
		                   <div class="select-block1">
		                    <select name="user_location_city">
			                    <option value="">City</option>
			               		<?php if(!empty($groom['city_name']) && !empty($groom['user_location_city'])){
			                    		echo '<option value="'.$groom['user_location_city'].'" selected style="display:none;">'.$groom['city_name'].'</option>';
			                    		} ?>
		                    </select>
		                   </div>
		                  </div>
		                 </div>
		              </div>
						<span><?php echo form_error('user_location_country'); ?></span>
						<span><?php echo form_error('user_location_state'); ?></span>
						<span><?php echo form_error('user_location_city'); ?></span>
	              </div>
	              <div class="age_select">
			    	<?php 
			   			$age = date('d-m-Y',$groom['user_birthday']);
			   			$user_age = explode('-', $age);
			   			 ?>
			      <label for="edit-pass">Date of Birth <span class="form-required" title="This field is required.">*</span></label>
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
		                    	$year = 1936;
		                     	while($year != $current_year)
		                     	{
		                     		$selected="";
		                     		if($user_age[2]==$year){$selected="selected";}
		                     		echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
		                     		$year++;
		                     	} ?>
	                    </select>
	                   </div>
	                  </div>
	                 </div>
	                 <span><?php echo form_error('age-date'); ?></span>
	                 <span><?php echo form_error('age-month'); ?></span>
	                 <span><?php echo form_error('age-year'); ?></span>
	              </div>
	            
	              </div>
				  	<div class="col-sm-6" >
					  	<div class="form-group">
					      <label for="edit-education-qualification">Educational Qualification  <span class="form-required" title="This field is required.">*</span></label>
					      	<div class="form_box">
						      	<div class="select-block1">
				                    <select name="user_qualification">
					                    <option value="">Select</option>
					                    <?php foreach ($qualifications as $key => $value){
					                    	$selected="";
					                    	if($groom['user_qualification']==$value['qualification_id']){$selected='selected';}
				                     		echo '<option '.$selected.' value="'.$value['qualification_id'].'">'.$value['qualification_name'].'</option>';
					                    	} ?>
					     			</select>
					     		</div>
			            	</div>
				            <span><?php echo form_error('user_qualification'); ?></span>
					    </div>

						<div class="form-group">
					      <label for="edit-profession">Profession  <span class="form-required" title="This field is required.">*</span></label>
					      	<div class="form_box">
						      	<div class="select-block1">
				                    <select name="user_profession">
					                    <option value="">Select</option>
					                    <?php foreach ($professions as $key => $value){
					                    	$selected="";
					                    	if($groom['user_profession']==$value['id']){$selected='selected';}
				                     		echo '<option '.$selected.' value="'.$value['id'].'">'.$value['profession_name'].'</option>';
					                    	} ?>
					     			</select>
					     		</div>
			            	</div>
				            <span><?php echo form_error('user_profession'); ?></span>
					    </div>
						
	              		<div class="form-group">
							<div class="country-select">
							    <label for="edit-location">Work Location <span class="form-required" title="This field is required.">*</span>
							    <?php echo str_replace("~", " ", $groom['user_work_location']);
							    			$work_location = explode("~" , $groom['user_work_location']);  ?></label>
						        <div class="age_grid">
						         	<div class="col-sm-4 country form_box">
				                  		<div class="select-block1">
				                    		<select name="user_work_location_country" class="countries-list">
					                    		<option value="">Country</option>
						                    <?php foreach ($countries as $key => $country) {
						                    	echo '<option value="'.$country['country_name'].'" data-id="'.$country['country_id'].'">'.$country['country_name'].'</option>';
						                    }
						                     if(!empty($work_location[2]) ){
						                    		echo '<option value="'.$work_location[2].'" selected style="display:none;">'.$work_location[2].'</option>';
						                    	} 
						                    ?>
				                    		</select>
				                  		</div>
				            		</div>
				            		<div class="col-sm-4 state form_box2">
				                   		<div class="select-block1">
					                    	<select name="user_work_location_state" class="states-list">
					                    		<option value="">State</option>
					                    		<?php 
					                    		 if(!empty($work_location[1]) ){
						                    		echo '<option value="'.$work_location[1].'"  selected style="display:none;">'.$work_location[1].'</option>';
						                    	}  ?>

					                    	</select>
				                  		</div>
				                	</div>
				                	<div class="col-sm-4 city form_box1">
				                   		<div class="select-block1">
				                    		<select name="user_work_location_city">
					                    		<option value="">City</option>
					                    		<?php 
					                    		 if(!empty($work_location[0]) ){
						                    		echo '<option value="'.$work_location[0].'" selected style="display:none;">'.$work_location[0].'</option>';
						                    	} 
						                    	 ?>
					               			</select>
				                   		</div>
				                  	</div>
				                </div>
					        </div>
			      			<span><?php echo form_error('user_work_location_country'); ?></span>
			      			<span><?php echo form_error('user_work_location_state'); ?></span>
			      			<span><?php echo form_error('user_work_location_city'); ?></span>

					    </div>

	              		<div class="form-group">
						    <div class="country-select">
							    <label for="edit-location">Native Place <span class="form-required" title="This field is required.">*</span>
							    	<?php echo str_replace("~", " ", $groom['user_native_location']);
							    			$native_location = explode("~" , $groom['user_native_location']);  ?>
							    </label>
						        <div class="age_grid">
						         	<div class="col-sm-4 country form_box">
				                  		<div class="select-block1">
				                    		<select name="user_native_location_country" class="countries-list">
					                    		<option value="">Country</option>
						                    <?php foreach ($countries as $key => $country) {
						                    	echo '<option value="'.$country['country_name'].'" data-id="'.$country['country_id'].'">'.$country['country_name'].'</option>';
						                    }
						                     if(!empty($native_location[2]) ){
						                    		echo '<option value="'.$native_location[2].'" selected style="display:none;">'.$native_location[2].'</option>';
						                    	} 
						                    ?>
				                    		</select>
				                  		</div>
				            		</div>
				            		<div class="col-sm-4 state form_box2">
				                   		<div class="select-block1">
					                    	<select name="user_native_location_state" class="states-list">
					                    		<option value="">State</option>
					                    		<?php 
					                    		 if(!empty($native_location[1]) ){
						                    		echo '<option value="'.$native_location[1].'" selected style="display:none;">'.$native_location[1].'</option>';
						                    	} 
						                    	 ?>
					                    	</select>
				                  		</div>
				                	</div>
				                	<div class="col-sm-4 city form_box1">
				                   		<div class="select-block1">
				                    		<select name="user_native_location_city">
					                    		<option value="">City</option>
					                    		<?php 
					                    		 if(!empty($native_location[0]) ){
						                    		echo '<option value="'.$native_location[0].'" selected style="display:none;">'.$native_location[0].'</option>';
						                    	} 
						                    	 ?>
					               			</select>
				                   		</div>
				                  	</div>
				                </div>
					        </div>
						    <span><?php echo form_error('user_native_location_country'); ?></span>
						    <span><?php echo form_error('user_native_location_state'); ?></span>
						    <span><?php echo form_error('user_native_location_city'); ?></span>
					        <br clear="all">
					    </div>
					     <div class="form-group">
					         <div class="col-sm-6 form_box">
						         <label for="edit-father-name">Father's Name <span class="form-required" title="This field is required.">*</span></label>
				                 <input type="text" id="edit-name" name="user_father_name" value="<?php echo $groom['user_father_name'] ?>" size="60" maxlength="60" class="form-text required">
			     				 <span><?php echo form_error('user_father_name'); ?></span>
			            	</div>
				            	
			                <div class="col-sm-6  form_box1">
			                   <label for="edit-father-profession">Father's Profession <span class="form-required" title="This field is required.">*</span></label>
				                 <div class="select-block1">
				                    <select name="user_father_profession">
					                    <option value="">Select</option>
					                    <?php foreach ($professions as $key => $value){
					                    	$selected="";
					                    	if($groom['user_father_profession']==$value['profession_name']){$selected='selected';}
				                     		echo '<option '.$selected.' value="'.$value['profession_name'].'">'.$value['profession_name'].'</option>';
					                    	} ?>
					     			</select>
					     		</div>
			     				 <span><?php echo form_error('user_father_profession'); ?></span>
			                 </div>
	              		</div>

	              		<div class="form-group">
					         <div class="col-sm-6 form_box">
						         <label for="edit-mother-name">Mother's Name <span class="form-required" title="This field is required.">*</span></label>
				                 <input type="text" id="edit-name" name="user_mother_name" value="<?php echo $groom['user_mother_profession'] ?>" size="60" maxlength="60" class="form-text required">
			     				 <span><?php echo form_error('user_mother_name'); ?></span>
			            	</div>
				            	
			                <div class="col-sm-6  form_box1">
			                   <label for="edit-mother-profession">Mother's Profession <span class="form-required" title="This field is required.">*</span></label>
				                 <div class="select-block1">
				                    <select name="user_mother_profession">
					                    <option value="">Select</option>
					                    <?php foreach ($professions as $key => $value){
					                    	$selected="";
					                    	if($groom['user_mother_profession']==$value['profession_name']){$selected='selected';}
				                     		echo '<option '.$selected.' value="'.$value['profession_name'].'">'.$value['profession_name'].'</option>';
					                    	} ?>
					     			</select>
					     		</div>
			     				 <span><?php echo form_error('user_mother_profession'); ?></span>
			                 </div>
	              		</div>

				  	<div class="form-group">
				         <div class="col-sm-6 form_box">
					         <label for="edit-brother">Number of Brothers<span class="form-required" title="This field is required.">*</span></label>
			                 <div class="select-block1">
			                    <select name="user_brothers">
				                    <option value="">Select</option>
				                    <?php for ($i=0; $i<=10 ; $i++){
				                    	$selected="";
				                    	if($groom['user_brothers']==$i){$selected='selected';}
			                     		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
				                    	} ?>
				     			</select>
				     		</div>
		     				 <span><?php echo form_error('user_brothers'); ?></span>
		            	</div>
				            	
		                <div class="col-sm-6  form_box1">
		                   <label for="edit-brother-married">Number of Brothers (Married)<span class="form-required" title="This field is required.">*</span></label>
			                 <div class="select-block1">
			                    <select name="user_married_brothers">
				                    <option value="">Select</option>
				                    <?php for ($i=0; $i<=10 ; $i++){
				                    	$selected="";
				                    	if($groom['user_married_brothers']==$i){$selected='selected';}
			                     		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
				                    	} ?>
				     			</select>
				     		</div>
		     				 <span><?php echo form_error('user_married_brothers'); ?></span>
		                 </div>
	              	</div>

	              	<div class="form-group">
				         <div class="col-sm-6 form_box">
					         <label for="edit-sister">Number of Sister<span class="form-required" title="This field is required.">*</span></label>
			                 <div class="select-block1">
			                    <select name="user_sisters">
				                    <option value="">Select</option>
				                    <?php for ($i=0; $i<=10 ; $i++){
				                    	$selected="";
				                    	if($groom['user_sisters']==$i){$selected='selected';}
			                     		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
				                    	} ?>
				     			</select>
				     		</div>
		     				 <span><?php echo form_error('user_sisters'); ?></span>
		            	</div>
				            	
		                <div class="col-sm-6  form_box1">
		                   <label for="edit-sister-married">Number of Sister (Married)<span class="form-required" title="This field is required.">*</span></label>
			                 <div class="select-block1">
			                    <select name="user_married_sisters">
				                    <option value="">Select</option>
				                    <?php for ($i=0; $i<=10 ; $i++){
				                    	$selected="";
				                    	if($groom['user_married_sisters']==$i){$selected='selected';}
			                     		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
				                    	} ?>
				     			</select>
				     		</div>
		     				 <span><?php echo form_error('user_married_sisters'); ?></span>
		                 </div>
	              	</div>
				  	</div>
				  </div>
				  <div class="col-sm-12 login_left" >
				  	<div class="contact-persons-details">
					  	<?php $contact_data_key=0;
					  		if(!empty($groom_contact_persons)){
					  			foreach ($groom_contact_persons as $key => $groom_contact) { ?>
					  		<div class="contact-person">
						  		<input id="edit-contact-person-id" type="hidden" name="contact_person[<?php echo $contact_data_key ?>][id]" value="<?php echo $groom_contact['id'] ?>">
							  	<div class="form-group">
								    <label for="edit-contact-person-name">Contact Person Full Name <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-name" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_name]" value="<?php echo $groom_contact['contact_person_name'] ?>" size="60" maxlength="60" class="form-text required">
									<span><?php echo form_error('contact_person['. $contact_data_key .'][contact_person_name]'); ?></span>
							    </div>
							    <div class="form-group">
								    <label for="edit-contact-person-email">Contact Person Email <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-email" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_email]" value="<?php echo $groom_contact['contact_person_email'] ?>" size="60" maxlength="60" class="form-text required">
								    <span><?php echo form_error('contact_person['. $contact_data_key .'][contact_person_email]'); ?></span>
							    </div>
							    <div class="form-group">
								    <label for="edit-name">Contact Person Phone Number <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-phone-no" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_phone_no]" value="<?php echo $groom_contact['contact_person_phone_no'] ?>" size="60" maxlength="60" class="form-text required">
			      					<span><?php echo form_error('contact_person['. $contact_data_key .'][contact_person_phone_no]'); ?></span>
							    </div>
							    <div class="form-group">
								    <label for="edit-contact-person-relation">Contact Person Relation <span class="form-required" title="This field is required.">*</span></label>
								    <div class="form_box">
					                  	<div class="select-block1">
						                    <select id="edit-contact-person-relation" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_relation]">
							                    <option value="">Select</option>
							                    <option <?php echo "father"==$groom_contact['contact_person_relation'] ? "selected" : "" ?>  value="father">Father</option>
							                    <option <?php echo "mother"==$groom_contact['contact_person_relation'] ? "selected" : "" ?>  value="mother">Mother</option>
							                    <option <?php echo "brother"==$groom_contact['contact_person_relation'] ? "selected" : "" ?>  value="brother">Brother</option>
							         			<option <?php echo "sister"==$groom_contact['contact_person_relation'] ? "selected" : "" ?>  value="sister">Sister</option>
							         			<option <?php echo "other"==$groom_contact['contact_person_relation'] ? "selected" : "" ?>  value="other">Other</option>
						                    </select>
					                  	</div>
					            	</div>
					            	<span><?php echo form_error('contact_person['. $contact_data_key .'][contact_person_relation]'); ?></span>
							    </div>
							    <div class="display-inline">
									<i class="fa fa-trash-o delete-contact"></i>
							    </div>

						    </div>
					    <?php  $contact_data_key++;
								}
					    	} 
					    	$data['contact_data_key'] = $contact_data_key;
					    	$this->load->view('frontend/partial_view/_add_contact_person_default.php',$data);
					    	?>
						</div>

						<div class="add-contact hidden">
							<div class="text-center">
								<i class="fa fa-plus add-contact-img"></i>
							</div>    	
					    </div>

						<div class="family-details hidden">
					  	<?php $family_data_key=0;
					  		if(!empty($groom_family)){
					  			foreach ($groom_family as $key => $family) { ?>
					  		<div class="family">
						  		<input id="family-id" type="hidden" name="family_info[<?php echo $family_data_key ?>][id]" value="<?php echo $family['id'] ?>">
							  	<div class="form-group">
								    <label for="edit-contact-person-name">Family Member Full Name <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-family-member-name" name="family_info[<?php echo $family_data_key  ?>][family_member_name]" value="<?php echo $family['family_member_name'] ?>" size="60" maxlength="60" class="form-text required">
							    </div>
							    <div class="form-group">
								    <label for="edit-family-member-relation">Family Member Relation <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-family-member-relation" name="family_info[<?php echo $family_data_key  ?>][family_member_relation]" value="<?php echo $family['family_member_relation'] ?>" size="60" maxlength="60" class="form-text required">
							    </div>
							    <div class="form-group">
								    <label for="edit-name">Family Member Marital Status <span class="form-required" title="This field is required.">*</span></label>
								    <div class="form_box">
					                  	<div class="select-block1">
						                    <select id="edit-family-member-marital-status" name="family_info[<?php echo $family_data_key  ?>][family_member_marital_status]">
							                    <option value="">Select</option>
							                    <option <?php echo "unmarried"==$family['family_member_marital_status'] ? "selected" : "" ?>  value="unmarried">Unmarried</option>
							                    <option <?php echo "divorced"==$family['family_member_marital_status'] ? "selected" : "" ?>  value="divorced">Divorced</option>
							                    <option <?php echo "widowed"==$family['family_member_marital_status'] ? "selected" : "" ?>  value="widowed">Widowed</option>
							         			<option <?php echo "married"==$family['family_member_marital_status'] ? "selected" : "" ?>  value="married">Married</option>
						                    </select>
					                  	</div>
					            	</div>
							    </div>
							    <div class="display-inline">
									<i class="fa fa-trash-o delete-family"></i>
							    </div>
						    </div>
					    <?php  $family_data_key++;
								}
					    	} 
					    	$data['family_data_key'] = $family_data_key;
					    	$this->load->view('frontend/partial_view/_add_family_member_default.php',$data);
					    	?>
						</div>
					 
					    <div class="add-family hidden">
							<div class="text-center">
								<i class="fa fa-plus add-family-img"></i>
							</div>    	
					    </div>
				  </div>
				  <div class="clearfix"> </div>
				  <div class="form-actions">
				    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
				    <a href="<?php echo base_url('frontend/user/') ?>" class="btn_1 submit"> Cancel </a>
				  </div>
			</div>  
		 </form>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>

<style type="text/css">
	.display-inline{
		display: inline-block;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		
		$(document).on('click','.delete-contact',function(){
			contact_person = $(this).parents('.contact-person');
			contact_person_id = contact_person.find('#edit-contact-person-id').val();
			if(contact_person_id == 0 || contact_person_id == undefined ){
				contact_person.hide();
				console.log(contact_person);
			}
			else
			{
				$.ajax({
					url:BASE_URL+"frontend/user/ajax_delete_contact_person/"+contact_person_id,
					dataType: "JSON",
					type:"POST",
					success:function(response){
						if(response.rc){
							// contact_person.hide();
							contact_person.find('input').val('');
							contact_person.find('select').val('');
							// $('.contact-person-view').last().removeClass('hidden');
						}	
						else
						{
							alert('Failed to Delete Contact');
						}
					}
				})
			}
		})

		$(document).on('click','.delete-family',function(){
			family = $(this).parents('.family');
			family_id = family.find('#family-id').val();
			if(family_id == 0 || family_id == undefined ){
				family.hide();
			}
			else
			{
				$.ajax({
					url:BASE_URL+"frontend/user/ajax_delete_family/"+family_id,
					dataType: "JSON",
					type:"POST",
					success:function(response){
						if(response.rc){
							// family.hide();
							family.find('input').val('');
							family.find('select').val('');
							// $('.family-member-view').last().removeClass('hidden');
						}	
						else
						{
							alert('Failed to Delete Family');
						}
					}
				})
			}
		})



		$(document).on('change','select[name="user_marital_status"]',function(){
			marital_status = $(this).val();
			if(marital_status == "unmarried"){	
				$('.user-children').addClass('hidden');
				$('select[name="user_children"]').val('');
			}
			else
			{
				$('.user-children').removeClass('hidden');
			}

		})


		$(document).on('change','.countries-list',function(){
			var country_id = $(this).find(':selected').attr('data-id');
			var next = $(this).parents('.country').siblings('.state').find('select');
			var this_name = $(this).attr('name');
			$.ajax({
				url:BASE_URL+"frontend/user/ajax_get_all_states/"+country_id,
				dataType: "JSON",
				type:"POST",
				success:function(response){
					if(response.rc)
					{
						next.html('<option value="">Select</option>');
						if( this_name =="user_location_country")
						{
							$.each(response.states,function(index,data){
								next.append( '<option data-id="'+data.state_id+'" value="'+data.state_id+'">'+data.state_name+'</option>');
							})
						}
						else
						{						
							$.each(response.states,function(index,data){
								next.append( '<option data-id="'+data.state_id+'" value="'+data.state_name+'">'+data.state_name+'</option>');
							})
						}
					}
				}
			});
		})

		$(document).on('change','.states-list',function(){
			var state_id = $(this).find(':selected').attr('data-id');
			var next = $(this).parents('.state').siblings('.city').find('select');
			var this_name = $(this).attr('name');
			$.ajax({
				url:BASE_URL+"frontend/user/ajax_get_all_cities/"+state_id,
				dataType: "JSON",
				type:"POST",
				success:function(response){
					if(response.rc)
					{
						next.html('<option value="">Select</option>');
						if( this_name =='user_location_state')
						{
							$.each(response.cities,function(index,data){
								next.append( '<option data-id="'+data.city_id+'" value="'+data.city_id+'">'+data.city_name+'</option>');
							})
						}
						else
						{						
							$.each(response.cities,function(index,data){
								next.append( '<option data-id="'+data.city_id+'" value="'+data.city_name+'">'+data.city_name+'</option>');
							})
						}
					}
				}
			});
		})		
		$(document).on('click','.add-contact-img',function(){
			// var contact_data_key = $('.contact-person').length+1;
			var contact_data_key = $('.contact-person-view').last().attr('contact-data-key');
			var new_contact_data_key= parseInt(contact_data_key)+1;
			var new_html = $('.contact-person-view').last().html();
			$('.contact-person-view[contact-data-key="'+contact_data_key+'"]').after('<div class="contact-person-view contact-person" contact-data-key="'+new_contact_data_key+'"></div');
			new_contact =$('.contact-person-view[contact-data-key="'+new_contact_data_key+'"]');
			new_contact.html(new_html).fadeIn();
			new_contact.find('#edit-contact-person-id').attr('name','contact_person['+new_contact_data_key+'][id]');
			new_contact.find('#edit-contact-person-name').attr('name','contact_person['+new_contact_data_key+'][contact_person_name]');
			new_contact.find('#edit-contact-person-email').attr('name','contact_person['+new_contact_data_key+'][contact_person_email]');
			new_contact.find('#edit-contact-person-phone-no').attr('name','contact_person['+new_contact_data_key+'][contact_person_phone_no]');
			new_contact.find('#edit-contact-person-relation').attr('name','contact_person['+new_contact_data_key+'][contact_person_relation]');
			$('.contact-person-view[contact-data-key="'+contact_data_key+'"]').find('.display-inline').html('<i class="fa fa-trash-o delete-contact"></i>');
 		});

 		$(document).on('click','.add-family-img',function(){
			// var contact_data_key = $('.contact-person').length+1;
			var family_data_key = $('.family-member-view').last().attr('family-data-key');
			var new_family_data_key= parseInt(family_data_key)+1;
			var new_html = $('.family-member-view').last().html();
			$('.family-member-view[family-data-key="'+family_data_key+'"]').after('<div class="family-member-view family" family-data-key="'+new_family_data_key+'"></div');
			new_family =$('.family-member-view[family-data-key="'+new_family_data_key+'"]');
			new_family.html(new_html).fadeIn();
			new_family.find('#edit-family-member-id').attr('name','family_info['+new_family_data_key+'][id]');
			new_family.find('#edit-family-member-name').attr('name','family_info['+new_family_data_key+'][family_member_name]');
			new_family.find('#edit-family-member-relation').attr('name','family_info['+new_family_data_key+'][family_member_relation]');
			new_family.find('#edit-family-member-marital-status').attr('name','family_info['+new_family_data_key+'][family_member_marital_status]');
			$('.family-member-view[family-data-key="'+family_data_key+'"]').find('.display-inline').html('<i class="fa fa-trash-o delete-family"></i>');
 		});
	})
</script>