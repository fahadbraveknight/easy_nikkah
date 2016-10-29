
<div class="grid_3">
	<div class="container">
	 <div class="breadcrumb1">
		 <ul>
				<a href="index.html"><i class="fa fa-home home_1"></i></a>
				<span class="divider">&nbsp;|&nbsp;</span>
				<li class="current-page">Regular Search</li>
		 </ul>
	 </div>
	 <!--<script type="text/javascript">
		$(function () {
		 $('#btnRadio').click(function () {
					var checkedradio = $('[name="gr"]:radio:checked').val();
					$("#sel").html("Selected Value: " + checkedradio);
			});
		});
	 </script>-->
<div class="col-md-9 search_left">
	<form action="" method="get" id="search-form">	
	 <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">I am looking for :</label>
	<div class="col-sm-7 form_radios">
		<!-- <input type="radio" class="radio_1" /> Male &nbsp;&nbsp;
		<input type="radio" class="radio_1" checked="checked" /> Female -->
		<span class="bg-danger gender-error"></span>

		<div class="select-block1">
			<select name="gender">
				<option value="">* Select Gender</option>
				<option  <?php echo isset($_GET['gender']) && $_GET['gender']=='female' ? 'selected' : ""; ?> value="female">Bride</option>
				<option <?php echo isset($_GET['gender']) && $_GET['gender']=='male' ? 'selected' : ""; ?> value="male">Groom</option>
			</select>
		</div>
		<!--<hr />
		<p id="sel"></p><br />
		<input id="btnRadio" type="button" value="Get Selected Value" />-->
	</div>
	<div class="clearfix"> </div>
	</div>
	<div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Marital Status : </label>
	<div class="col-sm-7 form_radios">
	<!-- 	<input type="checkbox" class="radio_1" /> Single &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" checked="checked" /> Divorced &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" value="Cheese" /> Widowed &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" value="Cheese" /> Separated &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" value="Cheese" /> Any -->
		<div class="select-block1">
			<select name="marital_status">
				<option value="">* Select Status</option>
				 <option <?php echo isset($_GET['marital_status']) && $_GET['marital_status']=='unmarried' ? 'selected' : ""; ?>  value="unmarried">Unmarried</option>
	            <option  <?php echo isset($_GET['marital_status']) && $_GET['marital_status']=='divorced' ? 'selected' : ""; ?> value="divorced">Divorced</option>
	            <option <?php echo isset($_GET['marital_status']) && $_GET['marital_status']=='widowed' ? 'selected' : ""; ?> value="widowed">Widowed</option>
			</select>
		</div>
	</div>
	<div class="clearfix"> </div>
	</div>
                		
	<div class="form_but1 country">
		<label class="col-sm-5 control-lable1" for="sex">Country : </label>
		<div class="col-sm-7 form_radios">
			<div class="select-block1">
            	<select name="location_country" class="countries-list">
					<option value="">Country</option>
                    <?php foreach ($countries as $key => $country) {
                    	$selected = "";
						if (isset($_GET['location_country']) && $_GET['location_country']==$country['country_id']) {$selected ='selected';}  
                    	echo '<option '.$selected.' value="'.$country['country_id'].'" data-id="'.$country['country_id'].'">'.$country['country_name'].'</option>';
                    }
                    ?>
				</select>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	
	<div class="form_but1 state">
		<span class="bg-danger location-error"></span>
		<label class="col-sm-5 control-lable1" for="sex">State : </label>
		<div class="col-sm-7 form_radios">
			<div class="select-block1">
				<select name="location_state" class="states-list">
                		<option value="">State</option>
                	</select>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="form_but1 city">
		<label class="col-sm-5 control-lable1" for="sex">District / City : </label>
		<div class="col-sm-7 form_radios">
			<div class="select-block1">
				<select name="location_city">
                		<option value="">City</option>
           			</select>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	
	<div class="form_but1">
		<label class="col-sm-5 control-lable1" for="sex">Education Qualification :</label>
		<div class="col-sm-7 form_radios">
			<div class="select-block1">
				<select name="qualification">
					<option value="">* Select Qualification</option>
					<?php foreach ($qualifications as $key => $value) {
						$selected = "";
						if (isset($_GET['qualification']) && $_GET['qualification']==$value['qualification_id']) {$selected ='selected';}  
						echo "<option ".$selected." value=".$value['qualification_id'].">".$value['qualification_name']."</option>";
					} ?>
               </select>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>

<!-- 	<div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Don't Show : </label>
	<div class="col-sm-7 form_radios">
		<input type="checkbox" class="radio_1" /> Ignored Profiles &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" checked="checked" /> Profiles already Contacted
	</div>
	<div class="clearfix"> </div>
	</div> -->
	<div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Age : </label>
	<div class="col-sm-7 form_radios">
		<div class="dropdown"> 
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
			            	$m_select="";
			            	for ($i=14; $i < 80 ; $i++) { 
			            		$checked = ""; 
								if (isset($_GET['age']) && in_array($i, $_GET['age'])) {$checked ='checked'; $m_select.="<span title='".$i.",'>".$i.",</span>";}  
			            		echo '<li><input '.$checked.' type="checkbox" name="age[]" value="'.$i.'" />'.$i.'</li>';
			            	}
			            	?>
			            </ul>
			            <?php if(!empty($_GET['age'])){ ?>
			            <script type="text/javascript">
			            	$(document).ready(function(){
			            		$('.hida').hide();
			            		$('.multiSel').html("<?php echo $m_select ?>");
			            	})
			            </script>
			            <?php } ?>
			        </div>
			    </dd>
			</div>
		</div>
<!-- 	<div class="col-sm-7 form_radios">
		<div class="col-sm-5 input-group1">
				<input class="form-control has-dark-background" name="28" id="slider-name" placeholder="28" type="text" required="">
			</div>
			<div class="col-sm-5 input-group1">
				<input class="form-control has-dark-background" name="40" id="slider-name" placeholder="40" type="text" required="">
			</div>
			<div class="clearfix"> </div>
	</div> -->

	<div class="clearfix"> </div>
		<div class="submit inline-block" style="padding-top: 32px;text-align: right; width: 100%;">
		   <input id="submit-btn" class="hvr-wobble-vertical btn_1" type="button" value="Find Matches">
		</div>
	<div class="clearfix"> </div>
	</div>
 </form>

	<?php if($this->session->userdata('userid')){ ?>
		<div class="paid_people">
			<h1>Search Results</h1>
		<?php if(!empty($result)){ ?>
			   <div class="row_1">
			   		<?php foreach ($result as $key => $value) { ?>
			   		<?php if($value['gender']=='male'){ $_controller = "groom";}elseif($value['gender']=='female'){ $_controller = "bride";} ?>
			   			<div class="col-sm-6">
						 	<ul class="profile_item">
							  <a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">
							   <!-- <li class="profile_item-img">
							   	  
							   </li> -->
							   <li class="profile_item-desc">
							   		<h4><?php echo $value['profile_id'] ?></h4>
							   	  <p><?php echo $value['full_name']; ?></p>
							   	  <p><?php echo $value['age'] ?> Yrs, <?php echo $value['user_height'] ?></p>
							   	  <p><?php echo !empty($value['qualification_name']) ? $value['qualification_name'] : '-'; ?></p>
							   	  <p><?php echo !empty($value['country_name']) ? $value['city_name']." ".$value['state_name']." ".$value['country_name']  : '-'; ?></p>
							   	  <h5><a href="<?php echo base_url('frontend/'.$_controller.'/view_profile/'.$value['id']) ?>">View Full Profile</a></h5>
							   </li>
							   <div class="clearfix"> </div>
							  </a>
						     </ul>
						</div>
			   		<?php } ?>   
				   	<div class="clearfix"> </div>
			   </div>
			
		<?php }else{
				if(isset($_GET['gender'])){
					echo 'No Profiles Found.';
				}
			} ?>
		</div>
	<?php }else{
			if(isset($_GET['gender'])){
				echo '<a href="'.base_url("frontend/user/register").'">Register</a> to search Profiles';
			}
		} ?>
</div>
<div class="col-md-3 match_right">
	<!-- <div class="profile_search1">
		 <form>
			<input type="text" class="m_1" name="ne" size="30" required="" placeholder="Enter Profile ID :">
			<input type="submit" value="Go">
		 </form>
	 </div>
	 <section class="slider">
	 <h3>Happy Marriage</h3>
	 <div class="flexslider">
		<ul class="slides">
			<li>
			<img src="images/s2.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
			</li>
			<li>
			<img src="images/s1.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
			</li>
			<li>
			<img src="images/s3.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
			</li>
			</ul>
		</div>
	 </section>
	 <div class="view_profile view_profile2">
					<h3>View Similar Profiles</h3>
					<ul class="profile_item">
						<a href="view_profile.html">
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
						<a href="view_profile.html">
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
						<a href="view_profile.html">
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
						<a href="view_profile.html">
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
		 </div>
		 <div class="clearfix"> </div>
	</div> -->
</div>
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
			overflow: hidden;
			border: 0;
			width: 92px;
			box-shadow: none;
		    border: 1px solid #ccc;
		    border-radius: 0;
		    outline: 0;
		    background: #ffffff;
		    height: 35px;
		    line-height: 25px;
		    padding: 5px 15px;
		    color: #999;
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

		$(document).on('change','.countries-list',function(){
			var country_id = $(this).find(':selected').attr('data-id');
			var next = $(this).parents('.country').siblings('.state').find('select');
			var next_city = $(this).parents('.country').siblings('.city').find('select');
			var this_name = $(this).attr('name');
			$.ajax({
				url:BASE_URL+"frontend/user/ajax_get_all_states/"+country_id,
				dataType: "JSON",
				type:"POST",
				success:function(response){
					next.html('<option value="">Select</option>');
					next_city.html('<option value="">Select</option>');
					if(response.rc)
					{
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
					next.html('<option value="">Select</option>');

					if(response.rc)
					{
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

	$(document).on('click',"#submit-btn",function(){
		var has_error=false;

		$('.gender-error,.location-error').html('');
		if($('select[name="gender"]').val() == '')
		{
			has_error = true;
			$('.gender-error').html('Please Choose a Gender');
		}

		if($('select[name="location_country"]').find(':selected').text().toLowerCase() == 'india' && ($('select[name="location_state"]').val() == "" || $('select[name="location_city"]').val() == ""))
		{
			has_error = true;
			$('.location-error').html('Please Choose State and City');
		}

		if(!has_error)
		{
			$('#search-form').submit();
		}
	});


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
<!-- FlexSlider -->
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
	$(function(){
		SyntaxHighlighter.all();
	});
	$(window).load(function(){
		$('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
			$('body').removeClass('loading');
		}
		});
	});
	</script>
<!-- FlexSlider -->
</body>
</html>	