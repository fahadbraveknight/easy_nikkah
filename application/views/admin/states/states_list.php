<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>States</h2>

    </div>
    <div class="col-sm-3"><a href="<?php echo base_url("admin/states/add_state"); ?>" class="btn btn-primary ">Add State</a></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
            	<?php if($this->session->flashdata('success') != '') {?>
	            	<div class="alert alert-success alert-dismissable">
	                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
	                    <?php echo $this->session->flashdata('success');?>
	                </div>
	            <?php } ?>
                <table class="table table-striped table-bordered table-hover"  >
                    <thead>
                        <tr>
                            <th>State Id</th>
                            <th>States</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($states as $state):
                            ?>
                            <tr>
                                <td><?php echo $state['state_id']; ?></td>
                                <td><a href="<?php echo base_url() . "admin/states/edit_state/" . $state['state_id']; ?>" title="Edit"><?php echo $state['state_name']; ?></a></td>
                                <td><?php echo $state['country_name']; ?></td>
                                <td><?php echo (($state['state_status'] == 'active') ? 'Active' : 'Inactive');?></td>
                                <td>
                                	<a href="<?php echo base_url() . "admin/states/edit_state/" . $state['state_id']; ?>" title="Edit"><span class="fa fa-pencil-square-o"></span></a>
                                	|<a href="<?php echo base_url() . "admin/states/change_status?id=" . $state['state_id']."&status=".$state['state_status']; ?>">Change Status</a>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>