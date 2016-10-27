
<?php if($this->session->userdata('userid') != $user['id']){ ?>

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
        $button = '<input  class="rel-button btn_1" data-status="need_more_time" data-id="'.$user['id'].'" type="button" value="Need More Time">
          <input  class="rel-button btn_1" data-status="declined" data-id="'.$user['id'].'" type="button" value="Decline Proposal">';
      }
      break;
    case 'need_more_time':
      if($this->session->userdata('userid') == $relationship['from_id']){
        $data_message = 'Need More Time';
      }
      elseif($this->session->userdata('userid') == $relationship['to_id']){
      $data_status = 'accepted';
        $data_value = 'Accept';
        $button = '<input  class="rel-button btn_1" data-status="declined" data-id="'.$user['id'].'" type="button" value="Decline Proposal">';
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
   <input  class="<?php echo $data_status=='awaiting_response'? 'hvr-wobble-vertical' : ''; ?> rel-button btn_1" data-status="<?php echo $data_status ?>" data-id="<?php echo $user['id'] ?>" type="button" value="<?php echo $data_value ?>">
   <?php echo $button ?>
<?php } ?>
</div>
<?php } ?>