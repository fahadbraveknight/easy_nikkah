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
    	padding: 0 450px;
}

</style>
<div class="comingsoon">
	<img src="<?php echo base_url() ?>resources/images/COMINGSOON.gif">
</div>
<section class="regular slider">
    <div>
      <img src="<?php echo base_url() ?>resources/images/Easy Nikah 1.jpg">
    </div>
    <div>
      <img src="<?php echo base_url() ?>resources/images/Easy Nikah 4.jpg">
    </div>
    <div>
      <img src="<?php echo base_url() ?>resources/images/Easy Nikah 6.jpg">
    </div>
  </section>
<?php /*?><div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3>Coming Soon!!!</h3>
      <a href="<?php echo base_url('frontend/user/register') ?>" class="hvr-shutter-out-horizontal">Create your Profile</a>*/ ?>
    </div>
  </div>
 <div class="profile_search">  	<div class="container wrap_1">
	  <form action="<?php echo base_url('frontend/user/search') ?>" method="post">
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="gender_1">I am looking for :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="gender">
					<option value="">* Select Gender</option>
					<option value="female">Bride</option>
					<option value="male">Groom</option>
				</select>
		   </div>
	    </div>
        <div class="inline-block">
		  <label class="gender_1">Located In :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select>
					<option value="">* Select State</option>
					<option value="Washington">Washington</option>
					<option value="Texas">Texas</option>
					<option value="Georgia">Georgia</option>
					<option value="Virginia">Virginia</option>
					<option value="Colorado">Colorado</option>
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
	 <div class="inline-block">
	   <div class="age_box2" style="max-width: 220px;">
	   	<label class="gender_1">Age :</label>
	   		<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="age">
					<option value="">* Select Age Group</option>
					<?php foreach ($age_groups as $key => $value) {
						echo  "<option value='".$value['min_age']." AND ".$value['max_age']."'>".$value['age_group']."</option>";
					}?>
				</select>
		 	</div>
		</div>
	 </div>
       <div class="inline-block">
		  <label class="gender_1">Status :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="marital_status">
					<option value="">* Select Status</option>
					<?php foreach ($marital_statuses as $key => $value) {
						echo  "<option value=".$value['id'].">".$value['marital_status_name']."</option>";
					}?>
				</select>
		  </div>
	    </div>
		<div class="submit inline-block">
		   <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
		</div>
     </form>
    </div>
  </div> 
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
});
</script>