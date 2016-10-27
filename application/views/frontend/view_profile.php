<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	<h2>Profile Id : <?php echo $groom['profile_id'] ?></h2>
   	 	<div class="col_3">
			<div class="col-sm-12 row_1">
				<table class="table_working_hours">
		        	<tbody>
		        		<tr class="opened_1">
							<td class="day_label">Age / Height :</td>
							<td class="day_value"><?php echo $groom['age']." / ".$groom['user_height']; ?></td>
						</tr>
					    <tr class="opened">
							<td class="day_label">Marital Status :</td>
							<td class="day_value"><?php echo $groom['user_marital_status'] ?></td>
						</tr>
					    <tr class="opened">
							<td class="day_label">Location :</td>
							<td class="day_value"><?php echo $groom['city_name'] .' '.$groom['state_name'] .' '.$groom['country_name']; ?></td>
						</tr>
					    <tr class="closed">
							<td class="day_label">Education :</td>
							<td class="day_value closed"><span><?php echo $groom['qualification_name'] ?></span></td>
						</tr>
				    </tbody>
				</table>
<!-- 				<ul class="login_details">
			      <li>Already a member? <a href="login.html">Login Now</a></li>
			      <li>If not a member? <a href="register.html">Register Now</a></li>
			    </ul> -->
			    <div class="profile-parent">
			    <?php if($this->session->userdata('userid') != $groom['id']){ ?>
			    	
				    <?php 
				    	$data_status = '';
				    	$data_value = '';
				    	$data_message ='';
				    	$button = '';
			    		if(!empty($relationship)){
					    	switch ($relationship['status']) {
					    	case 'awaiting_response':
					    	 	if($this->session->userdata('userid') == $relationship['from_id']){
					    			$data_message = 'Awaiting Response';
					    		}
					    		elseif($this->session->userdata('userid') == $relationship['to_id']){
									$data_status = 'accepted';
					    			$data_value = 'Accept';
					    			$button = '<input  class="rel-button btn_1" data-status="need_more_time" data-id="'.$groom['id'].'" type="button" value="Need More Time">
					    				<input  class="rel-button btn_1" data-status="declined" data-id="'.$groom['id'].'" type="button" value="Decline Proposal">';
					    		}
					    		break;
					    	case 'need_more_time':
					    	 	if($this->session->userdata('userid') == $relationship['from_id']){
					    			$data_message = 'Need More Time';
					    		}
					    		elseif($this->session->userdata('userid') == $relationship['to_id']){
									$data_status = 'accepted';
					    			$data_value = 'Accept';
					    			$button = '<input  class="rel-button btn_1" data-status="declined" data-id="'.$groom['id'].'" type="button" value="Decline Proposal">';
					    		}
					    		break;
					    	case 'accepted':
								$data_message = 'Can View Contact Details.';
					    		break;
					    	case 'declined':
								if($this->session->userdata('userid') == $relationship['from_id']){
					    			$data_message = 'Proposal Declined';
					    		}
					    		elseif($this->session->userdata('userid') == $relationship['to_id']){
									$data_status = 'remove_relationship';
					    			$data_value = 'Changed Mind';
					    		}

					    		break;
					    	default:
					    		# code...
					    		break;
					    	}
					    }else{
							$data_status = 'awaiting_response';
				    		$data_value = 'Send Proposal';
				    	}
				     ?>

					<div class="submit inline-block proposal" style="padding-top: 32px; width: 100%;">
				    <div><?php echo $data_message ?></div>
				    <?php if(!empty($data_status)){ ?>
						   <input  class="<?php echo $data_status=='awaiting_response'? 'hvr-wobble-vertical' : ''; ?> rel-button btn_1" data-status="<?php echo $data_status ?>" data-id="<?php echo $groom['id'] ?>" type="button" value="<?php echo $data_value ?>">
						   <?php echo $button ?>
					<?php } ?>
					</div>
				<?php } ?>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
				  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
				  <!-- <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li> -->
			   </ul>
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    <div class="basic_1">
				    	<h3>Basics & Lifestyle</h3>
				    	<div class="col-md-12 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">Name :</td>
									<td class="day_value"><?php echo $groom['full_name']; ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Marital Status :</td>
									<td class="day_value"><?php echo $groom['user_marital_status']; ?></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Children :</td>
									<td class="day_value"><?php echo $groom['user_children']==0 ? "No Children" :$groom['user_children']; ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Height :</td>
									<td class="day_value"><?php echo $groom['user_height']; ?></td>
								</tr>
								<tr class="opened_1">
									<td class="day_label">Age :</td>
									<td class="day_value"><?php echo $groom['age']; ?> Yrs</td>
								</tr>
								<tr class="opened_1">
									<td class="day_label">Work Locatiom :</td>
									<td class="day_value"><?php echo str_replace("~", " ", $groom['user_work_location']); ?> </td>
								</tr>
								<tr class="opened_1">
									<td class="day_label">Native Locatiom :</td>
									<td class="day_value"><?php echo str_replace("~", " ", $groom['user_native_location']); ?> </td>
								</tr>
						    </tbody>
				          </table>
				         </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1">
				    	<h3>Religious Background</h3>
				    	<div class="col-md-12 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">Beard :</td>
									<td class="day_value"><?php echo  get_beard_type($groom['user_beard_type']); ?></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">Namaz :</td>
									<td class="day_value"><?php echo get_namaz_type($groom['user_namaz_type']); ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Date of Birth :</td>
									<td class="day_value closed"><span><?php echo date('d/m/Y',$groom['user_birthday']); ?></span></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Fasting :</td>
									<td class="day_value closed"><span><?php echo  get_fasting_type($groom['user_fasting_type']);  ?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1 basic_2">
				    	<h3>Education & Career</h3>
				    	<div class="basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">Education   :</td>
									<td class="day_value"><?php echo $groom['qualification_name'] ?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Occupation  :</td>
									<td class="day_value closed"><span><?php echo $groom['profession_name'] ?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				         <div class="clearfix"> </div>
				    </div>
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
				    <div class="basic_1 basic_3">
				    	<h4>Family Details</h4>
				    	<div class="basic_1 basic_2">
				    	<h3>Basics</h3>
				    	<div class="col-md-12 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<?php 
				        			foreach ($groom_family as $key => $value) { ?>
				        			<tr class="opened">
										<td class="day_label">Relation :</td>
										<td class="day_value"><?php echo $value['family_member_relation'] ?></td>
										<td class="day_label">Name :</td>
										<td class="day_value"><?php echo $value['family_member_name'] ?> </td>
									</tr>
				        		<?php } ?>
				        		<tr class="opened">
				        			<td class="day_label">Father's Name</td>
				        			<td class="day_value"><?php echo !empty($groom['user_father_name']) ? $groom['user_father_name'] : "-"; ?></td>
				        			<td class="day_label">Father's Profession</td>
				        			<td class="day_value"><?php echo !empty($groom['user_father_profession']) ? $groom['user_father_profession'] : "-"; ?></td>
				        		</tr>
				        		<tr class="opened">
				        			<td class="day_label">Mother's Name</td>
				        			<td class="day_value"><?php echo !empty($groom['user_mother_name']) ? $groom['user_mother_name'] : "-"; ?></td>

				        			<td class="day_label">Mother's Profession</td>
				        			<td class="day_value"><?php echo !empty($groom['user_mother_profession']) ? $groom['user_mother_profession'] : "-"; ?></td>
				        		</tr>
				        		<tr class="opened">
				        			<td class="day_label">Number of Brothers</td>
				        			<td class="day_value"><?php echo $groom['user_brothers']; ?></td>

				        			<td class="day_label">Number of Brothers Married</td>
				        			<td class="day_value"><?php echo $groom['user_married_brothers']; ?></td>
				        		</tr>
				        		<tr class="opened">
				        			<td class="day_label">Number of Sisters</td>
				        			<td class="day_value"><?php echo $groom['user_sisters']; ?></td>

				        			<td class="day_label">Number of Sisters Married</td>
				        			<td class="day_value"><?php echo $groom['user_married_sisters']; ?></td>
				        		</tr>
							 </tbody>
				          </table>
				         </div>
				         <div class="clearfix"> </div>
				       </div>
				    </div>
				    
				    <div class="basic_3 contact">
				    	<h4>Contact Person Details</h4>
				    	<div class="basic_1 basic_2">
				    	<div class="col-md-12 basic_1-left">
				    	<?php if($this->session->userdata('userid')==$groom['id'] ||(!empty($relationship) && $relationship['status']=='accepted')){ ?>
			        		<?php 
			        			foreach ($groom_contact_persons as $key => $value) { ?>
			        			<div class="opened contact-person">
									<div class="day_label">Relation :</div>
									<div class="day_value"><?php echo $value['contact_person_relation'] ?></div>
									<div class="day_label">Name :</div>
									<div class="day_value"><?php echo $value['contact_person_name'] ?> </div>
									<br clear="all">
									<div class="day_label">Email :</div>
									<div class="day_value"><?php echo $value['contact_person_email'] ?></div>
									<div class="day_label">Phone Number :</div>
									<div class="day_value"><?php echo $value['contact_person_phone_no'] ?> </div>
								</div>
			        		<?php } ?>
			        	 <?php } ?>
				         </div>
				       </div>
				    </div>
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
				    <div class="basic_1 basic_2">
				       <div class="basic_1-left">
				    	  
				        </div>
				     </div>
				 </div>
		     </div>
		  </div>
	   </div>
   	 </div>
     <div class="col-md-4 profile_right">
     	<!-- <div class="newsletter">
		   <form>
			  <input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
			  <input type="submit" value="Go">
		   </form>
        </div>
        <div class="view_profile">
        	<h3>View Similar Profiles</h3>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p5.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p6.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p7.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p8.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
       </div>
       <div class="view_profile view_profile1">
        	<h3>Members who viewed this profile also viewed</h3>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p9.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p10.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p11.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p12.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
         </div>
        </div>
       <div class="clearfix"> </div>
    </div>-->
  </div> 
</div>

<script type="text/javascript">

	$( document ).ready(function() {
		$(document).on('click',".rel-button",function(){
			var status = $(this).attr('data-status');
			var relationship_id = $(this).attr('data-id');
			if(status == 'remove_relationship')
			{
				var action = 'ajax_delete_proposal';
			}
			else
			{
				var action = 'ajax_send_proposal';
			}
			$.ajax({
				url:BASE_URL+"frontend/proposal/"+action,
				dataType: "JSON",
				type:"POST",
				data:{"status":status,"relationship_id":relationship_id},
				success:function(response){
					if(response.rc)
					{
						$('.profile-parent').html(response.html);
						if(response.contact_html.length > 0)
						{
							$('.contact > .basic_2 >.basic_1-left').html(response.contact_html);
						}
					}
				}
			});
		})
	});
</script>