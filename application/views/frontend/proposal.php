
<div class="grid_3">
  <div class="container">
<!--    <div class="breadcrumb1">
     <ul>
        <a href="#"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Proposal</li>
     </ul>
   </div> -->

<style type="text/css">
	.proposal-text{
		 padding: 10px 0px;
	    font-size: 14px;
	    line-height: 1.5;
	    word-spacing: 2px;
	}
	.proposal-text strong{
		color: grey;
	}
	.proposal-text .note{
		color: red;
		font-weight: 500;
	}
	.proposal-text .note > strong{
		color: red;
	}
</style>
   <div class="col-md-12 members_box2">
   	   <h3>Proposals</h3>
   	   <div  class="proposal-text">
	   	   	<div> <strong>Proposal Received </strong>: has all the new proposal which you have received and not responded yet.</div> 
			<div> <strong>Proposal Sent </strong> : has all the proposals which you have sent and the status of the proposal is beside the Profile id </div>
			<div> <strong> Proposal Accepted</strong> : has all the proposals which you have accepted and you can see their contact details in the Profile's Family Details tab</div>
			<div> <strong>Proposal Needs time</strong> : has all the proposal on which you need time to think and respond them. They wont be able to see your contact details unless you Accept them.</div>
			<div> <strong>Proposal Declined</strong> : has all proposals which were declined by you. </div>
			<div class="note"> <strong>Note</strong> : 

			Your contact details will be visible only to those proposals whom you have accepted or to the ones who have accepted your proposal. 
			Your contact details wont be visible to the ones whom you have declined or they have declined or you have selected Need More time or they have selected Need more time.
			</div>
   	   </div>
       <div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Proposal Recieved</a></li>
				  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Sent</a></li>
				  <li role="presentation"><a href="#profile1" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Accepted</a></li>
				  <li role="presentation"><a href="#profile2" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Needs time</a></li>
				  <li role="presentation"><a href="#profile3" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Declined</a></li>
			   </ul>
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    <!-- <ul class="pagination pagination_1">
				 	  <li class="active"><a href="#">1</a></li>
				 	  <li><a href="#">2</a></li>
				 	  <li><a href="#">3</a></li>
				 	  <li><a href="#">4</a></li>
				 	  <li><a href="#">5</a></li>
				 	  <li><a href="#">...</a></li>
				 	  <li><a href="#">Next</a></li>
	                </ul> -->
	                <div class="clearfix"> </div>
	                <?php if(!empty($proposal_requests)){ ?>
	                	<?php foreach ($proposal_requests as $key => $value) {
	                	if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			                <div class="jobs-item with-thumb">
			                   <div class="thumb_top">
								    <div class="jobs_right">
										<h6 class="title">
											<a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">
												<?php echo $value['profile_id']; ?>	

											</a>
			    							<div class="profile-parent inline-block">
												<div class="submit  proposal">
											   		<input  class="hvr-wobble-vertical rel-button btn_1" data-status="accepted" data-id="<?php echo $value['id'] ?>" type="button" value="Accepted">
												   <input  class="rel-button btn_1" data-status="need_more_time" data-id="<?php echo $value['id'] ?>" type="button" value="Need More Time">
					          						<input  class="rel-button btn_1" data-status="declined" data-id="<?php echo $value['id'] ?>" type="button" value="Decline Proposal">
											   	  <div class="clearfix"> </div>
											   </div>
											 </div>
										</h6>
										<p class="description">
										<span class="m_1">Name</span> : <?php echo $value['full_name']; ?> | <span class="m_1">Age</span> : <?php echo $value['age']; ?> years, <?php echo $value['user_height']; ?>  | <span class="m_1">Marital Status</span> : <?php echo $value['user_marital_status']; ?> | <span class="m_1">Education</span> : <?php echo $value['qualification_name']; ?>  | <span class="m_1">Occupation</span> : <?php echo $value['profession_name']; ?><br><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>" class="read-more">view full profile</a></p>
									</div>
								<div class="clearfix"> </div>
							   </div>
							</div>
	                	<?php } ?>
	                <?php } ?>  
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
				  <?php if(!empty($proposal_sent)){ ?>
	                	<?php foreach ($proposal_sent as $key => $value) {
	                	if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			                <div class="jobs-item with-thumb">
			                   <div class="thumb_top">
								    <div class="jobs_right">
										<h6 class="title">
											<a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>"><?php echo $value['profile_id']; ?></a>
			    							<div class="profile-parent inline-block">
												<div class="submit  proposal">
											   		<?php 
													switch ($value['status']) {
														case 'awaiting_response':
															echo $value['full_name'].' has not yet responded to your proposal.';
															break;
														case 'need_more_time':
															echo $value['full_name'].' needs more time to think about the Proposal.';
															break;
														case 'declined':
															echo $value['full_name'].' has declined your proposal.';
															break;
														
														default:
															# code...
															break;
													}
												 ?>	
											   	  <div class="clearfix"> </div>
											   </div>
											 </div>
										</h6>
										<p class="description"><span class="m_1">Name</span> : <?php echo $value['full_name']; ?> | <span class="m_1">Age</span> :<?php echo $value['age']; ?> years, <?php echo $value['user_height']; ?>  | <span class="m_1">Marital Status</span> : <?php echo $value['user_marital_status']; ?> | <span class="m_1">Education</span> : <?php echo $value['qualification_name']; ?>  | <span class="m_1">Occupation</span> : <?php echo $value['profession_name']; ?><br><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>" class="read-more">view full profile</a></p>
									</div>
								<div class="clearfix"> </div>
							   </div>
							</div>
	                	<?php } ?>
	                <?php } ?>  				 
				  </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab">
				  <?php if(!empty($proposal_accepted)){ ?>
	                	<?php foreach ($proposal_accepted as $key => $value) {
	                	if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			                <div class="jobs-item with-thumb">
			                   <div class="thumb_top">
								    <div class="jobs_right">
										<h6 class="title">
											<a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>"><?php echo $value['profile_id']; ?></a>
			    							<div class="profile-parent inline-block">
												<div class="submit  proposal">
											   		Contact Details is now visible to each other.
											   	  <div class="clearfix"> </div>
											   </div>
											 </div>
										</h6>
										<p class="description"><span class="m_1">Name</span> : <?php echo $value['full_name']; ?> | <span class="m_1">Age</span> :<?php echo $value['age']; ?> years, <?php echo $value['user_height']; ?>  | <span class="m_1">Marital Status</span> : <?php echo $value['user_marital_status']; ?> | <span class="m_1">Education</span> : <?php echo $value['qualification_name']; ?>  | <span class="m_1">Occupation</span> : <?php echo $value['profession_name']; ?><br><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>" class="read-more">view full profile</a></p>
									</div>
								<div class="clearfix"> </div>
							   </div>
							</div>
	                	<?php } ?>
	                <?php } ?>  
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile2" aria-labelledby="profile-tab">
				    <?php if(!empty($proposal_needed_time)){ ?>
	                	<?php foreach ($proposal_needed_time as $key => $value) {
	                	if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			                <div class="jobs-item with-thumb">
			                   <div class="thumb_top">
								    <div class="jobs_right">
										<h6 class="title">
											<a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">
												<?php echo $value['profile_id']; ?>	

											</a>
			    							<div class="profile-parent inline-block">
												<div class="submit  proposal">
											   		<input  class="hvr-wobble-vertical rel-button btn_1" data-status="accepted" data-id="<?php echo $value['id'] ?>" type="button" value="Accepted">
					          						<input  class="rel-button btn_1" data-status="declined" data-id="<?php echo $value['id'] ?>" type="button" value="Decline Proposal">
											   	  <div class="clearfix"> </div>
											   </div>
											 </div>
										</h6>
										<p class="description"><span class="m_1">Name</span> : <?php echo $value['full_name']; ?> | <span class="m_1">Age</span> :<?php echo $value['age']; ?> years, <?php echo $value['user_height']; ?>  | <span class="m_1">Marital Status</span> : <?php echo $value['user_marital_status']; ?> | <span class="m_1">Education</span> : <?php echo $value['qualification_name']; ?>  | <span class="m_1">Occupation</span> : <?php echo $value['profession_name']; ?><br><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>" class="read-more">view full profile</a></p>
									</div>
								<div class="clearfix"> </div>
							   </div>
							</div>
	                	<?php } ?>
	                <?php } ?>
	                </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile3" aria-labelledby="profile-tab">
				  <?php if(!empty($proposal_declined)){ ?>
	                	<?php foreach ($proposal_declined as $key => $value) {
	                	if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			                <div class="jobs-item with-thumb">
			                   <div class="thumb_top">
								    <div class="jobs_right">
										<h6 class="title">
											<a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">
												<?php echo $value['profile_id']; ?>	

											</a>
			    							<div class="profile-parent inline-block">
												<div class="submit  proposal">
											   		<input  class="hvr-wobble-vertical rel-button btn_1" data-status="remove_relationship" data-id="<?php echo $value['id'] ?>" type="button" value="Change Mind">
												  
											   </div>
											 </div>
										</h6>
										<p class="description"><span class="m_1">Name</span> : <?php echo $value['full_name']; ?> | <span class="m_1">Age</span> :<?php echo $value['age']; ?> years, <?php echo $value['user_height']; ?>  | <span class="m_1">Marital Status</span> : <?php echo $value['user_marital_status']; ?> | <span class="m_1">Education</span> : <?php echo $value['qualification_name']; ?>  | <span class="m_1">Occupation</span> : <?php echo $value['profession_name']; ?><br><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>" class="read-more">view full profile</a></p>
									</div>
								<div class="clearfix"> </div>
							   </div>
							</div>
	                	<?php } ?>
	                <?php } ?>
				 </div>
			 </div> 
		  </div>
	   </div>
    </div>
   <div class="clearfix"> </div>
  </div>
</div>

<script type="text/javascript">

	$( document ).ready(function() {
		$(document).on('click',".rel-button",function(){
			var status = $(this).attr('data-status');
			var relationship_id = $(this).attr('data-id');
			var profile_parent = $(this).parents('.profile-parent');
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
						profile_parent.html(response.html);
					}
				}
			});
		})
	});
</script>