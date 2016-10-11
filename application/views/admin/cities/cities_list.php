<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cities</h2>

    </div>
    <div class="col-sm-3"><a href="<?php echo base_url("admin/cities/add_city"); ?>" class="btn btn-primary ">Add City</a></div>
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
                            <th>City Id</th>
                            <th>Cities</th>
                            <th>State</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cities as $city):
                            ?>
                            <tr>
                                <td><?php echo $city['city_id']; ?></td>
                                <td><a href="<?php echo base_url() . "admin/cities/edit_city/" . $city['city_id']; ?>" title="Edit"><?php echo $city['city_name']; ?></a></td>
                                <td><?php echo $city['state_name']; ?></td>
                                <td><?php echo (($city['city_status'] == 'active') ? 'Active' : 'Inactive');?></td>
                                <td>
                                	<a href="<?php echo base_url() . "admin/cities/edit_city/" . $city['city_id']; ?>" title="Edit"><span class="fa fa-pencil-square-o"></span></a>
                                	|<a href="<?php echo base_url() . "admin/cities/change_status?id=" . $city['city_id']."&status=".$city['city_status']; ?>">Change Status</a>
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