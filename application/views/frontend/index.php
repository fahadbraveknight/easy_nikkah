<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/slick/slick-theme.css">
<style>
.slider {
        width: 95%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    height:500px;
    }

    .slick-slide img {
      width: 100%;
    height:600px;
    }
.slick-dotted.slick-slider{
	margin-top: 10px;
}
    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
    .comingsoon{
    	font-family: FontAwesome;
    	padding: 5px 0 0;
    	font-size: 20px;
    	color: #f90404;
    }

</style>
<div class="banner">
	<div class="comingsoon">
		<marquee>"SubhanAllah Matrimony is now Easy Nikah"</marquee>
	</div>
	<div class="home_title">
		Easy Nikah - Striving to Make Nikah Easy and Zina very difficult!!!
	</div>
	<div class="salam">
		<img src="<?php echo base_url() ?>resources/images/Salaam.png">
	</div>
	<div class="centre_part">
		<div class="first_para">
			Hope you are doing good by the grace, mercy and blessings of Allah (Glorified and Exalted be He).
		</div>
		<h3 class="second_para">
			Easy Nikah is glad to introduce you to the world of Match Making for Indian Muslim families based in India or abroad. We try our best to assist you in finding suitable match for you and complete half of your deen.
		</h3>
		<h3 class="second_para">
			With Easy Nikah say Good Bye to all professional AGENTS, CO ORDINATORS, NewsPaper advertisements and other traditional way of finding the match and welcome the latest means to contact directly the families of your potential match Insha Allah.
		</h3>
		<h3 class="second_para">
			Easy Nikah is "<b><u>COMPLETELY FREE</u></b>" with no charges or fees for registration, during profile search or after finding the right MATCH. There are absolutely no hidden charges and you can easily reject anyone who claims to be part of Easy Nikah and demands any fees/money from you.
		</h3>
		<h4 class="third_para">
			This service is extended to all Muslim families of all backgrounds, ethnicity, cast, maslaks and madhabs.
		</h4>
		<div style="clear: both;"></div><br>
		<h3 class="second_para">
			We hope your journey with us in searching life partner meets your set expectations and we make dua to Allah (Glorified & Exalted be He) that the search gets complete soon In sha Allah. 
		</h3>
	</div>
	<?php /*?><section class="regular slider">
	    <div>
	      <img src="<?php echo base_url() ?>resources/images/Easy Nikah 1.jpg">
	    </div>
	    <div>
	      <img src="<?php echo base_url() ?>resources/images/Easy Nikah 4.jpg">
	    </div>
	    <div>
	      <img src="<?php echo base_url() ?>resources/images/Easy Nikah 6.jpg">
	    </div>
	</section>*/?>
<?php /*?><div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3>Coming Soon!!!</h3>
      <a href="<?php echo base_url('frontend/user/register') ?>" class="hvr-shutter-out-horizontal">Create your Profile</a>*/ ?>
    </div>
  </div>
 <div class="profile_search">  	<div class="container wrap_1">
	  <form action="" method="get">
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="gender_1">I am looking for :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
 				<span class="bg-danger"><?php echo form_error('gender'); ?></span>
				<select name="gender">
					<option value="">* Select Gender</option>
					<option value="female">Bride</option>
					<option value="male">Groom</option>
				</select>
		   </div>
	    </div>
       	<div class="inline-block">
		  <label class="gender_1">Status :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="marital_status">
					<option value="">* Select Status</option>
					 <option  value="unmarried">Unmarried</option>
                    <option   value="divorced">Divorced</option>
                    <option  value="widowed">Widowed</option>
				</select>
		  </div>
	    </div>
        <div class="inline-block">
		  <label class="gender_1">Education Qualification :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="qualification">
					<option value="">* Select Qualification</option>
					<?php foreach ($qualifications as $key => $value) {
						echo "<option value=".$value['id'].">".$value['qualification_name']."</option>";
					} ?>
               </select>
          </div>
       </div>
     </div>
     <div class="inline-block location">
		  <label class="gender_1">Located In :</label>
			<div class="age_box1 country" style="max-width: 100%; display: inline-block;">
				<div class="form_box">
            		<select name="location_country" class="countries-list">
                		<option value="">Country</option>
                    <?php foreach ($countries as $key => $country) {
                    	echo '<option value="'.$country['id'].'" data-id="'.$country['id'].'">'.$country['country_name'].'</option>';
                    }
                    ?>
            		</select>
        		</div>
        	</div>
        	<div class="age_box1 state" style="max-width: 100%; display: inline-block; padding-left: 1%;">
        		<div class="form_box2">
                	<select name="location_state" class="states-list">
                		<option value="">State</option>
                	</select>
            	</div>
            </div>
            <div class="age_box1 city" style="max-width: 100%; display: inline-block; padding-left: 1%;">
            	<div class="form_box1">
            		<select name="location_city">
                		<option value="">City</option>
           			</select>
              	</div>
            </div>
	 	<br clear="all">
 		<span class="bg-danger"><?php echo form_error('location_state'); ?><?php echo form_error('location_city'); ?></span>
        </div>
	 <div class="inline-block">
	   	<label class="gender_1">Age :</label>
   		<div class="age_box1" style="max-width: 100%; display: inline-block;">
			<div class="dropdown" style="margin: 0; top:7px"> 
			    <dt>
			    <a href="#asd">
			      <span class="hida">Select</span>    
			      <p class="multiSel"></p>  
			    </a>
			    </dt>
			  
			    <dd>
			        <div class="mutliSelect">
			            <ul>
			            	<?php 
			            	for ($i=14; $i < 80 ; $i++) { 
			            		echo '<li><input type="checkbox" name="age[]" value="'.$i.'" />'.$i.'</li>';
			            	}
			            	?>
			            </ul>
			        </div>
			    </dd>
			</div>
	 	</div>
	 	<br clear="all">
	 </div>
		<div class="submit inline-block">
		   <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
		</div>
     </form>
    </div>
  </div> 
  <?php if(!empty($result)){ ?>
  	<div class="container">
		<div class="paid_people">
		   <h1>Search Results</h1>
		   <div class="row_1">
		   		<?php foreach ($result as $key => $value) { ?>
		   		<?php if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
		   			<div class="col-sm-6">
					 	<ul class="profile_item">
						  <a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">
						   <li class="profile_item-img">
						   	  <h4><?php echo $value['profile_id'] ?></h4>
						   </li>
						   <li class="profile_item-desc">
						   	  <p><?php echo $value['full_name']; ?></p>
						   	  <p><?php echo $value['age'] ?> Yrs, 5Ft 5in Christian</p>
						   	  <h5><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">View Full Profile</a></h5>
						   </li>
						   <div class="clearfix"> </div>
						  </a>
					     </ul>
					</div>
		   		<?php } ?>   
			   	<div class="clearfix"> </div>
		   </div>
		</div>
	</div>
  <?php } ?>
<!--
<div class="grid_1">
      <div class="container">
      	<h1>Featured Profiles</h1>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
        <ul id="flexiselDemo3">
	      <li><div class="col_1"><a href="view_profile.html">
			<img src="images/1.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Him</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="images/2.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Her</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="images/3.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Him</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="images/4.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Her</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="images/5.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Him</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="images/6.jpg" alt="" class="hover-animation image-zoom-in img-responsive"/>
             <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                <div class="center-middle">About Her</div>
             </div>
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
	    </ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay:false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	   </script>
	   <script type="text/javascript" src="<?php echo base_url('resources/js/jquery.flexisel.js') ?>"></script>
    </div>
</div>
<div class="grid_2">
	<div class="container">
		<h2>Success Stories</h2>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
        <div class="row_1">
	     <div class="col-md-8 suceess_story">
	         <ul> 
			   <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/7.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/8.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/9.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/10.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/11.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/12.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	            <li>
				  	<div class="suceess_story-date">
						<span class="entry-1">Dec 20, 2015</span>
					</div>
					<div class="suceess_story-content-container">
						<figure class="suceess_story-content-featured-image">
						   <img width="75" height="75" src="images/13.jpg" class="img-responsive" alt=""/>				            
					    </figure>
						<div class="suceess_story-content-info">
				        	<h4><a href="#">Lorem & Ipsum</a></h4>				        	
				        	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,.<a href="#">More...</a></p>
				        </div>
				    </div>
				</li>
	        </ul>
	    </div>
	    <div class="col-md-4 row_1-right">
	      <h3>News & Events</h3>
	        <div class="box_1">
		      <figure class="thumbnail1"><img width="170" height="155" src="images/14.jpg" class="img-responsive" alt=""/></figure>
			  <div class="extra-wrap">
				<div class="post-meta">
					<span class="day">
					<time datetime="2014-05-25T10:15:43+00:00">25</time>
					</span>
					<span class="month">
					<time datetime="2014-05-25T10:11:51+00:00">May</time>
					</span>
				</div>
				<h4 class="post-title"><a href="#">There are many variations of passages</a></h4>
				<div class="clearfix"> </div>
				<div class="post-content">The standard chunk of Lorem Ipsum used since the 1500s..</div>
				<a href="#" class="vertical">Read More</a>
			  </div>
	        </div>
	        <div class="box_1">
		      <figure class="thumbnail1"><img width="170" height="155" src="images/15.jpg" class="img-responsive" alt=""/></figure>
			  <div class="extra-wrap">
				<div class="post-meta">
					<span class="day">
					<time datetime="2014-05-25T10:15:43+00:00">25</time>
					</span>
					<span class="month">
					<time datetime="2014-05-25T10:11:51+00:00">May</time>
					</span>
				</div>
				<h4 class="post-title"><a href="#">There are many variations of passages</a></h4>
				<div class="clearfix"> </div>
				<div class="post-content">The standard chunk of Lorem Ipsum used since the 1500s..</div>
				<a href="#" class="vertical">Read More</a>
			  </div>
	        </div>
	        <div class="box_2">
		      <figure class="thumbnail1"><img width="170" height="155" src="images/1.jpg" class="img-responsive" alt=""/></figure>
			  <div class="extra-wrap">
				<div class="post-meta">
					<span class="day">
					<time datetime="2014-05-25T10:15:43+00:00">25</time>
					</span>
					<span class="month">
					<time datetime="2014-05-25T10:11:51+00:00">May</time>
					</span>
				</div>
				<h4 class="post-title"><a href="#">There are many variations of passages</a></h4>
				<div class="clearfix"> </div>
				<div class="post-content">The standard chunk of Lorem Ipsum used since the 1500s..</div>
				<a href="#" class="vertical">Read More</a>
			  </div>
	        </div>
	        <div class="religion">
               <div class="religion_1-title">Religion :</div>
			   <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Hindu</a>
			    <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Muslim</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Christian</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Sikh</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Inter Religion</a>
	        </div>
	        <div class="religion">
               <div class="religion_1-title">Country :</div>
			   <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">India</a>
			    <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Australia</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Russia</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">India</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Kuwait</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Uk</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
	        </div>
	        <div class="religion">
               <div class="religion_1-title">Caste :</div>
			   <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Brahmin</a>
			    <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Kapu</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Kamma</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Padmasali</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Reddy</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
	        </div>
	        <div class="religion">
               <div class="religion_1-title">Regional :</div>
			   <a href="#" target="_blank" class="religion_1" title="Hindu Matrimonial" style="padding-left:0px !important;">Urdu</a>
			    <span>|</span><a href="#" target="_blank" class="religion_1" title="Muslim Matrimonial">Hindi</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Christian Matrimonial">Telugu</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Sikh Matrimonial">Marwadi</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">Oriya</a>
			 	<span>|</span><a href="#" target="_blank" class="religion_1" title="Inter Religion Matrimonial">View All</a>
	        </div>
	     </div>
	     <div class="clearfix"> </div>
	   </div> 
	  </div>
    </div>
    <div class="bg">
		<div class="container"> 
			<h3>Guest Messages</h3>
			<div class="heart-divider">
				<span class="grey-line"></span>
				<i class="fa fa-heart pink-heart"></i>
				<i class="fa fa-heart grey-heart"></i>
				<span class="grey-line"></span>
            </div>
            <div class="col-sm-6">
            	<div class="bg_left">
            		<h4>But I must explain</h4>
            		<h5>Friend of Bride</h5>
            		<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="col-sm-6">
            	<div class="bg_left">
            		<h4>But I must explain</h4>
            		<h5>Friend of Groom</h5>
            		<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="clearfix"> </div>
		</div>
	</div>
	<div class="map">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
    </div>
    -->
    <style type="text/css">
    	.location .age_box1 select{
    		width: 90px;
    	}

    	.age_box1 dt{
    		font-weight: normal;
    	}
		.dropdown dd,
		.dropdown dt {
		  margin: 0px;
		  padding: 0px;
		}

		.dropdown ul {
		  margin: -1px 0 0 0;
		}

		.dropdown dd {
		  position: relative;
		}

		.dropdown a,
		.dropdown a:visited {
		  color: black;
		  text-decoration: none;
		  outline: none;
		  font-size: 12px;
		}

		.dropdown dt a {
		  background-color: #fff;
		  display: block;
		  padding: 8px 20px 5px 10px;
		  min-height: 25px;
		  line-height: 10px;
		  overflow: hidden;
		  border: 0;
		  width: 92px;
		}

		.dropdown dt a span,
		.multiSel span {
		  cursor: pointer;
		  display: inline-block;
		  padding: 0 3px 2px 0;
		}

		.dropdown dd ul {
		  background-color: #fff;
		  border: 0;
		  color: black;
		  display: none;
		  left: 0px;
    	  font-size: 11px;
		  padding: 2px 15px 2px 5px;
		  position: absolute;
		  top: 2px;
		  width: 92px;
		  list-style: none;
		  height: 100px;
		  overflow: auto;
		}

		.dropdown span.value {
		  display: none;
		}

		.dropdown dd ul li a {
		  /*padding: 5px;*/
		  display: block;
		}

		.dropdown dd ul li a:hover {
		  background-color: #fff;
		}
    </style>
<script>
$( document ).ready(function() {
	$(".regular").slick({
        dots: true,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
		autoplay: true,
  autoplaySpeed: 2000
      });
    
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85002299-1', 'auto');
  ga('send', 'pageview');


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
					if( this_name =="location_country")
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
					if( this_name =='location_state')
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
});
$(".dropdown dt a").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});
</script>