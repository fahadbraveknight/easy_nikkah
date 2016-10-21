
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
			      <input type="text" id="edit-name" name="full_name" value="<?php echo $groom['full_name'] ?>" size="60" maxlength="60" class="form-text required">
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
			         
		                    </select>s
	                  	</div>
	            	</div>
			    </div>
			    <div class="form-group">
			      <label for="edit-namaz-type">Salah - Namaz - Prayer <span class="form-required" title="This field is required.">*</span></label>
			      	<div class="form_box">
	                  	<div class="select-block1">
		                    <select name="user_namaz_type">
			                    <option value="">Select</option>
			                    <option <?php echo "sometime"==$groom['user_namaz_type'] ? "selected" : "" ?>  value="sometime">Sometime</option>
			                    <option <?php echo "regular"==$groom['user_namaz_type'] ? "selected" : "" ?>  value="regular">Regular</option>
			                    <option <?php echo "friday"==$groom['user_namaz_type'] ? "selected" : "" ?>  value="friday">Friday</option>
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
			                    <option <?php echo "ramzan"==$groom['user_fasting_type'] ? "selected" : "" ?>  value="ramzan">Ramzan</option>
			                    <option <?php echo "ramzan_sunnah"==$groom['user_fasting_type'] ? "selected" : "" ?>  value="ramzan_sunnah">Ramzn And Sunnah</option>
			                    <option <?php echo "ramzan_sunnah_nawafil"==$groom['user_fasting_type'] ? "selected" : "" ?>  value="ramzan_sunnah_nawafil">Friday</option>
			         
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
			                    
			                    <option <?php echo "yes_sunnah"==$groom['user_beard_type'] ? "selected" : "" ?>  value="yes_sunnah">Yes with Sunnah</option>
			                    <option <?php echo "no_sunnah"==$groom['user_beard_type'] ? "selected" : "" ?>  value="no_sunnah">Yes but without Sunnah</option>
			                    <option <?php echo "no_beard"==$groom['user_beard_type'] ? "selected" : "" ?>  value="no_beard">No Beard</option>
			         
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
					                    <option <?php echo "unmarried"==$groom['user_beard_type'] ? "selected" : "" ?>  value="unmarried">Unmarried</option>
					                    <option <?php echo "divorced"==$groom['user_beard_type'] ? "selected" : "" ?>  value="divorced">Divorced</option>
					                    <option <?php echo "widowed"==$groom['user_beard_type'] ? "selected" : "" ?>  value="widowed">Widowed</option>
				                    </select>
			                  	</div>
			            	</div>
		            	</div>
		            	<div class="col-md-6 <?php if(!$groom['user_children']){echo 'hidden';} ?> user-children">
		            		<label for="edit-children">Children  <span class="form-required" title="This field is required.">*</span></label>
					      	<div class="form_box">
			                  	<div class="select-block1">
				                    <select name="user_children">
				                    	<?php 
				                    		for ($i=0; $i <= 9; $i++) { 
				                    		$selected="";
				                    		if($groom['user_children']==$i) { $selected = "selected";}else{ $selected =  "";}
				                    		echo "<option ".$selected." value=".$i.">".$i."</option>";
				                    	} ?>
				                    </select>
			                  	</div>
			            	</div>
		            	</div>
	            	</div>
			    </div>
			    <div class="form-group">
				    <div class="country-select">
				      <label for="edit-location">Location <span class="form-required" title="This field is required.">*</span></label>
				        <div class="age_grid">
				         <div class="col-sm-4 country form_box">
		                  <div class="select-block1">
		                    <select name="user_location_country" class="countries-list">
			                    <option value="">Country</option>
			                    <?php foreach ($countries as $key => $country) {
						                echo '<option value="'.$country['id'].'" data-id="'.$country['id'].'">'.$country['country_name'].'</option>';
			                    	}
			                    ?>
			         
		                    </select>
		                  </div>
		            	</div>
		            	<div class="col-sm-4 state form_box2">
		                   <div class="select-block1">
			                    <select name="user_location_state" class="states-list">
			                    	<option value="">State</option>
			                    </select>
		                  	</div>
		                </div>
		                <div class="col-sm-4 city form_box1">
		                   <div class="select-block1">
		                    <select name="user_location_city">
			                    <option value="">City</option>
			               
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
	                 </div>
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
					                    	if($groom['user_qualification']==$value['id']){$selected='selected';}
				                     		echo '<option '.$selected.' value="'.$value['id'].'">'.$value['qualification_name'].'</option>';
					                    	} ?>
					     			</select>
					     		</div>
			            	</div>
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
					    </div>
						
	              		<div class="form-group">
							<div class="country-select">
							    <label for="edit-location">Work Location <span class="form-required" title="This field is required.">*</span></label>
						        <div class="age_grid">
						         	<div class="col-sm-4 country form_box">
				                  		<div class="select-block1">
				                    		<select name="user_work_location_country" class="countries-list">
					                    		<option value="">Country</option>
						                    <?php foreach ($countries as $key => $country) {
						                    	echo '<option value="'.$country['country_name'].'" data-id="'.$country['id'].'">'.$country['country_name'].'</option>';
						                    }
						                    ?>
				                    		</select>
				                  		</div>
				            		</div>
				            		<div class="col-sm-4 state form_box2">
				                   		<div class="select-block1">
					                    	<select name="user_work_location_state" class="states-list">
					                    		<option value="">State</option>
					                    	</select>
				                  		</div>
				                	</div>
				                	<div class="col-sm-4 city form_box1">
				                   		<div class="select-block1">
				                    		<select name="user_work_location_city">
					                    		<option value="">City</option>
					               			</select>
				                   		</div>
				                  	</div>
				                </div>
					        </div>
					    </div>

	              		<div class="form-group">
						    <div class="country-select">
							    <label for="edit-location">Native Place <span class="form-required" title="This field is required.">*</span></label>
						        <div class="age_grid">
						         	<div class="col-sm-4 country form_box">
				                  		<div class="select-block1">
				                    		<select name="user_native_location_country" class="countries-list">
					                    		<option value="">Country</option>
						                    <?php foreach ($countries as $key => $country) {
						                    	echo '<option value="'.$country['country_name'].'" data-id="'.$country['id'].'">'.$country['country_name'].'</option>';
						                    }
						                    ?>
				                    		</select>
				                  		</div>
				            		</div>
				            		<div class="col-sm-4 state form_box2">
				                   		<div class="select-block1">
					                    	<select name="user_native_location_state" class="states-list">
					                    		<option value="">State</option>
					                    	</select>
				                  		</div>
				                	</div>
				                	<div class="col-sm-4 city form_box1">
				                   		<div class="select-block1">
				                    		<select name="user_native_location_city">
					                    		<option value="">City</option>
					               			</select>
				                   		</div>
				                  	</div>
				                </div>
					        </div>
					        <br clear="all">
					    </div>
					    
					    
					   
					     <div class="form-group">
					      <label for="edit-personal-description">Description your self<span class="form-required" title="This field is required.">*</span></label>
					      <textarea  id="edit-personal-description" name="user_personal_description" class="form-text"><?php echo $groom['user_personal_description'] ?></textarea>
					    </div>
				  	</div>
				  <div class="col-sm-12 login_left" >
				  	<div class="contact-persons-details">
					  	<?php $contact_data_key=0;
					  		if(!empty($groom_contact_persons)){
					  			foreach ($groom_contact_persons as $key => $groom_contact) { ?>
					  		<div class="contact-person">
						  		<input type="hidden" name="contact_person[<?php echo $contact_data_key ?>][id]" value="<?php echo $groom_contact['id'] ?>">
							  	<div class="form-group">
								    <label for="edit-contact-person-name">Contact Person Full Name <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-name" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_name]" value="<?php echo $groom_contact['contact_person_name'] ?>" size="60" maxlength="60" class="form-text required">
							    </div>
							    <div class="form-group">
								    <label for="edit-contact-person-email">Contact Person Email <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-email" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_email]" value="<?php echo $groom_contact['contact_person_email'] ?>" size="60" maxlength="60" class="form-text required">
							    </div>
							    <div class="form-group">
								    <label for="edit-name">Contact Person Phone Number <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-phone-no" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_phone_no]" value="<?php echo $groom_contact['contact_person_phone_no'] ?>" size="60" maxlength="60" class="form-text required">
							    </div>
							    <div class="form-group">
								    <label for="edit-contact-person-relation">Contact Person Relation <span class="form-required" title="This field is required.">*</span></label>
								    <input type="text" id="edit-contact-person-relation" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_relation]" value="<?php echo $groom_contact['contact_person_relation'] ?>" size="60" maxlength="60" class="form-text required">
							    </div>

						    </div>
					    <?php  $contact_data_key++;
								}
					    	} 
					    	$data['contact_data_key'] = $contact_data_key;
					    	$this->load->view('frontend/partial_view/_add_contact_person_default.php',$data);
					    	?>
						</div>

						<div class="add-contact">
							<div class="text-center">
								<i class="fa fa-plus add-contact-img"></i>
							</div>    	
					    </div>

						<div class="family-details">
					  	<?php $family_data_key=0;
					  		if(!empty($groom_family)){
					  			foreach ($groom_family as $key => $family) { ?>
					  		<div class="family">
						  		<input type="hidden" name="family_info[<?php echo $family_data_key ?>][id]" value="<?php echo $family['id'] ?>">
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
							         
						                    </select>
					                  	</div>
					            	</div>
							    </div>
						    </div>
					    <?php  $family_data_key++;
								}
					    	} 
					    	$data['family_data_key'] = $family_data_key;
					    	$this->load->view('frontend/partial_view/_add_family_member_default.php',$data);
					    	?>
						</div>
					 
					    <div class="add-family">
							<div class="text-center">
								<i class="fa fa-plus add-family-img"></i>
							</div>    	
					    </div>
				  </div>
				  <div class="clearfix"> </div>
				  <div class="form-actions">
				    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
				  </div>
			</div>  
		 </form>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','select[name="user_marital_status"]',function(){
			marital_status = $(this).val();
			if(marital_status == "divorced" ||  marital_status == "widowed"){
				$('.user-children').removeClass('hidden');
			}
			else
			{
				$('.user-children').addClass('hidden');
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
						next.html('<option>Select</option>');
						if( this_name =="user_location_country")
						{
							$.each(response.states,function(index,data){
								next.append( '<option data-id="'+data.id+'" value="'+data.id+'">'+data.state_name+'</option>');
							})
						}
						else
						{						
							$.each(response.states,function(index,data){
								next.append( '<option data-id="'+data.id+'" value="'+data.state_name+'">'+data.state_name+'</option>');
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
						next.html('<option>Select</option>');
						if( this_name =='user_location_state')
						{
							$.each(response.cities,function(index,data){
								next.append( '<option data-id="'+data.id+'" value="'+data.id+'">'+data.city_name+'</option>');
							})
						}
						else
						{						
							$.each(response.cities,function(index,data){
								next.append( '<option data-id="'+data.id+'" value="'+data.city_name+'">'+data.city_name+'</option>');
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
			$('.contact-person-view[contact-data-key="'+contact_data_key+'"]').after('<div class="contact-person-view" contact-data-key="'+new_contact_data_key+'"></div');
			new_contact =$('.contact-person-view[contact-data-key="'+new_contact_data_key+'"]');
			new_contact.html(new_html).fadeIn();
			new_contact.find('#edit-contact-person-id').attr('name','contact_person['+new_contact_data_key+'][id]');
			new_contact.find('#edit-contact-person-name').attr('name','contact_person['+new_contact_data_key+'][contact_person_name]');
			new_contact.find('#edit-contact-person-email').attr('name','contact_person['+new_contact_data_key+'][contact_person_email]');
			new_contact.find('#edit-contact-person-phone-no').attr('name','contact_person['+new_contact_data_key+'][contact_person_phone_no]');
			new_contact.find('#edit-contact-person-relation').attr('name','contact_person['+new_contact_data_key+'][contact_person_relation]');
 		});

 		$(document).on('click','.add-family-img',function(){
			// var contact_data_key = $('.contact-person').length+1;
			var family_data_key = $('.family-member-view').last().attr('family-data-key');
			var new_family_data_key= parseInt(family_data_key)+1;
			var new_html = $('.family-member-view').last().html();
			$('.family-member-view[family-data-key="'+family_data_key+'"]').after('<div class="family-member-view" family-data-key="'+new_family_data_key+'"></div');
			new_family =$('.family-member-view[family-data-key="'+new_family_data_key+'"]');
			new_family.html(new_html).fadeIn();
			new_family.find('#edit-family-member-id').attr('name','family_info['+new_family_data_key+'][id]');
			new_family.find('#edit-family-member-name').attr('name','family_info['+new_family_data_key+'][family_member_name]');
			new_family.find('#edit-family-member-relation').attr('name','family_info['+new_family_data_key+'][family_member_relation]');
			new_family.find('#edit-family-member-marital-status').attr('name','family_info['+new_family_data_key+'][family_member_marital_status]');
 		});
	})
</script>