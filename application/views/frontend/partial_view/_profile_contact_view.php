<?php 
      foreach ($user_contact_persons as $key => $value) { ?>
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