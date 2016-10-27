
<div class="grid_3">
  <div class="container">
<!--    <div class="breadcrumb1">
     <ul>
        <a href="#"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Proposal</li>
     </ul>
   </div> -->

   <div class="col-md-12 members_box2">
   	   <h3>Proposals</h3>
       <div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Proposal Requests</a></li>
				  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Sent</a></li>
				  <li role="presentation"><a href="#profile1" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Accepted</a></li>
				  <li role="presentation"><a href="#profile2" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Needed Time</a></li>
				  <li role="presentation"><a href="#profile2" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Proposal Declined</a></li>
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
	                <?php if(!empty($proposal_sent)){ ?>
	                	<?php foreach ($proposal_sent as $key => $value) {
	                	if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			                <div class="jobs-item with-thumb">
			                   <div class="thumb_top">
							    <div class="jobs_right">
									<h6 class="title"><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>"><?php echo $value['profile_id']; ?></a></h6>
									<p class="description"><?php echo $value['age']; ?> years, <?php echo $value['user_height']; ?>  | <span class="m_1">Marital Status</span> : <?php echo $value['user_marital_status']; ?> | <span class="m_1">Education</span> : <?php echo $value['qualification_name']; ?>  | <span class="m_1">Occupation</span> : <?php echo $value['profession_name']; ?><br><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>" class="read-more">view full profile</a></p>
								</div>
								<div class="clearfix"> </div>
							   </div>
							   <div class="thumb_bottom">
							   		<input  class="hvr-wobble-vertical rel-button btn_1" data-status="accepted" data-id="<?php echo $value['id'] ?>" type="button" value="Accepted">
								   <input  class="rel-button btn_1" data-status="need_more_time" data-id="<?php echo $value['id'] ?>" type="button" value="Need More Time">
	          						<input  class="rel-button btn_1" data-status="declined" data-id="<?php echo $value['id'] ?>" type="button" value="Decline Proposal">
							   	  <div class="clearfix"> </div>
							   </div>
							</div>
	                	<?php } ?>
	                <?php } ?>  
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
				    				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab">
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile2" aria-labelledby="profile-tab">
				    <div class="jobs-item with-thumb">
	                   <div class="thumb_top">
				        <div class="thumb"><a href="view_profile.html"><img src="images/s3.jpg" class="img-responsive" alt=""/></a></div>
					    <div class="jobs_right">
							<h6 class="title"><a href="view_profile.html">Lorem (2547189)</a></h6>
							<ul class="top-btns">
							  <li><a href="#" class="fa fa-facebook"></a></li>
							  <li><a href="#" class="fa fa-twitter"></a></li>
							  <li><a href="#" class="fa fa-google-plus"></a></li>
							</ul>
							<ul class="login_details1">
							  <li>Last Login : 5 days ago</li>
							</ul>
							<p class="description">30 years, 5 Ft 7 In / 170 Cms | <span class="m_1">Reliogion</span> : Hindu | <span class="m_1">Education</span> : B.Tech | <span class="m_1">Occupation</span> : Software Professional<br><a href="view_profile.html" class="read-more">view full profile</a></p>
						</div>
						<div class="clearfix"> </div>
					   </div>
					   <div class="thumb_bottom">
					   	  <div class="thumb"><a href="view_profile.html" class="photo_view">Add Photo</a></div>
					   	   <div class="thumb_but"><a href="view_profile.html" class="photo_view">Send Mail</a></div>
					   	  <div class="clearfix"> </div>
					   </div>
					  </div>
					  <div class="jobs-item with-thumb">
	                   <div class="thumb_top">
				        <div class="thumb"><a href="view_profile.html"><img src="images/s3.jpg" class="img-responsive" alt=""/></a></div>
					    <div class="jobs_right">
							<h6 class="title"><a href="view_profile.html">Lorem (2547189)</a></h6>
							<ul class="top-btns">
							  <li><a href="#" class="fa fa-facebook"></a></li>
							  <li><a href="#" class="fa fa-twitter"></a></li>
							  <li><a href="#" class="fa fa-google-plus"></a></li>
							</ul>
							<ul class="login_details1">
							  <li>Last Login : 5 days ago</li>
							</ul>
							<p class="description">30 years, 5 Ft 7 In / 170 Cms | <span class="m_1">Reliogion</span> : Hindu | <span class="m_1">Education</span> : B.Tech | <span class="m_1">Occupation</span> : Software Professional<br><a href="view_profile.html" class="read-more">view full profile</a></p>
						</div>
						<div class="clearfix"> </div>
					   </div>
					   <div class="thumb_bottom">
					   	  <div class="thumb"><a href="view_profile.html" class="photo_view">Add Photo</a></div>
					   	   <div class="thumb_but"><a href="view_profile.html" class="photo_view">Send Mail</a></div>
					   	  <div class="clearfix"> </div>
					   </div>
					  </div>
					  <div class="jobs-item with-thumb">
	                   <div class="thumb_top">
				        <div class="thumb"><a href="view_profile.html"><img src="images/s3.jpg" class="img-responsive" alt=""/></a></div>
					    <div class="jobs_right">
							<h6 class="title"><a href="view_profile.html">Lorem (2547189)</a></h6>
							<ul class="top-btns">
							  <li><a href="#" class="fa fa-facebook"></a></li>
							  <li><a href="#" class="fa fa-twitter"></a></li>
							  <li><a href="#" class="fa fa-google-plus"></a></li>
							</ul>
							<ul class="login_details1">
							  <li>Last Login : 5 days ago</li>
							</ul>
							<p class="description">30 years, 5 Ft 7 In / 170 Cms | <span class="m_1">Reliogion</span> : Hindu | <span class="m_1">Education</span> : B.Tech | <span class="m_1">Occupation</span> : Software Professional<br><a href="view_profile.html" class="read-more">view full profile</a></p>
						</div>
						<div class="clearfix"> </div>
					   </div>
					   <div class="thumb_bottom">
					   	  <div class="thumb"><a href="view_profile.html" class="photo_view">Add Photo</a></div>
					   	   <div class="thumb_but"><a href="view_profile.html" class="photo_view">Send Mail</a></div>
					   	  <div class="clearfix"> </div>
					   </div>
					  </div>
					  <div class="jobs-item with-thumb">
	                   <div class="thumb_top">
				        <div class="thumb"><a href="view_profile.html"><img src="images/s3.jpg" class="img-responsive" alt=""/></a></div>
					    <div class="jobs_right">
							<h6 class="title"><a href="view_profile.html">Lorem (2547189)</a></h6>
							<ul class="top-btns">
							  <li><a href="#" class="fa fa-facebook"></a></li>
							  <li><a href="#" class="fa fa-twitter"></a></li>
							  <li><a href="#" class="fa fa-google-plus"></a></li>
							</ul>
							<ul class="login_details1">
							  <li>Last Login : 5 days ago</li>
							</ul>
							<p class="description">30 years, 5 Ft 7 In / 170 Cms | <span class="m_1">Reliogion</span> : Hindu | <span class="m_1">Education</span> : B.Tech | <span class="m_1">Occupation</span> : Software Professional<br><a href="view_profile.html" class="read-more">view full profile</a></p>
						</div>
						<div class="clearfix"> </div>
					   </div>
					   <div class="thumb_bottom">
					   	  <div class="thumb"><a href="view_profile.html" class="photo_view">Add Photo</a></div>
					   	   <div class="thumb_but"><a href="view_profile.html" class="photo_view">Send Mail</a></div>
					   	  <div class="clearfix"> </div>
					   </div>
					  </div>
				 </div>
				 <div role="tabpanel" class="tab-pane fade" id="profile3" aria-labelledby="profile-tab">
				  
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