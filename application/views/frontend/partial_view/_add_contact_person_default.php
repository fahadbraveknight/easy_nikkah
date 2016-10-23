<div class="contact-person-view  contact-person <?php if(!empty($groom_contact_persons) || !empty($bride_contact_persons)){ echo "hidden";} ?>" contact-data-key="<?php echo $contact_data_key  ?>">
<input id="edit-contact-person-id" type="hidden" name="contact_person[<?php echo $contact_data_key  ?>][id]" value="0">
<div class="form-group">
    <label for="edit-contact-person-name">Contact Person Full Name <span class="form-required" title="This field is required.">*</span></label>
    <input type="text" id="edit-contact-person-name" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_name]" value="" size="60" maxlength="60" class="form-text required">
              <span><?php echo form_error('contact_person['.$contact_data_key.'][contact_person_name]'); ?></span>
</div>
<div class="form-group">
    <label for="edit-contact-person-email">Contact Person Email <span class="form-required" title="This field is required.">*</span></label>
    <input type="text" id="edit-contact-person-email" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_email]" value="" size="60" maxlength="60" class="form-text required">
              <span><?php echo form_error('contact_person['.$contact_data_key.'][contact_person_email]'); ?></span>
</div>
<div class="form-group">
    <label for="edit-name">Contact Person Phone Number <span class="form-required" title="This field is required.">*</span></label>
    <input type="text" id="edit-contact-person-phone-no" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_phone_no]" value="" size="60" maxlength="60" class="form-text required">
              <span><?php echo form_error('contact_person['.$contact_data_key.'][contact_person_phone_no]'); ?></span>
</div>
<div class="form-group">
    <label for="edit-contact-person-relation">Contact Person Relation <span class="form-required" title="This field is required.">*</span></label>
    <div class="form_box">
      	<div class="select-block1">
            <select id="edit-contact-person-relation" name="contact_person[<?php echo $contact_data_key  ?>][contact_person_relation]">
                <option value="">Select</option>
                <option value="father">Father</option>
                <option value="mother">Mother</option>
                <option value="brother">Brother</option>
     			<option value="sister">Sister</option>
     			<option value="other">Other</option>
            </select>
      	</div>
	</div>
              <span><?php echo form_error('contact_person['.$contact_data_key.'][contact_person_relation]'); ?></span>
</div>
<div class="display-inline"></div>
</div>