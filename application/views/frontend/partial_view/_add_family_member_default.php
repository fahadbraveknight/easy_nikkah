<div class="family-member-view" family-data-key="<?php echo $family_data_key  ?>">
	<input type="hidden" name="family_info[<?php echo $family_data_key ?>][id]" value="0">
  	<div class="form-group">
	    <label for="edit-contact-person-name">Family Member Full Name <span class="form-required" title="This field is required.">*</span></label>
	    <input type="text" id="edit-family-member-name" name="family_info[<?php echo $family_data_key  ?>][family_member_name]" value="" size="60" maxlength="60" class="form-text required">
    </div>
    <div class="form-group">
	    <label for="edit-family-member-relation">Family Member Relation <span class="form-required" title="This field is required.">*</span></label>
	    <input type="text" id="edit-family-member-relation" name="family_info[<?php echo $family_data_key  ?>][family_member_relation]" value="" size="60" maxlength="60" class="form-text required">
    </div>
    <div class="form-group">
	    <label for="edit-name">Family Member Marital Status <span class="form-required" title="This field is required.">*</span></label>
		<div class="form_box">
          	<div class="select-block1">
                <select id="edit-family-member-marital-status" name="family_info[<?php echo $family_data_key  ?>][family_member_marital_status]">
                    <option value="">Select</option>
                    <?php foreach ($groom_traits['marital_status'] as $key => $value){
                    	$selected="";
                    	if($value['id']==$family['family_member_marital_status']){$selected="selected";}
                    	echo '<option '.$selected.' value="'.$value['id'].'">'.$value['marital_status_name'].'</option>';
                    	} ?>
         
                </select>
          	</div>
    	</div>
	</div>
</div>