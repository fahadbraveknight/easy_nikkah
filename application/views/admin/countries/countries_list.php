<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Countries</h2>

    </div>
    <div class="col-sm-3"><a href="<?php echo base_url("admin/countries/add_country"); ?>" class="btn btn-primary ">Add Country</a></div>
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
                            <th>Country Id</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($countries as $country):
                            ?>
                            <tr>
                                <td><?php echo $country['country_id']; ?></td>
                                <td><a href="<?php echo base_url() . "admin/countries/edit_country/" . $country['country_id']; ?>" title="Edit"><?php echo $country['country_name']; ?></a></td>
                                <td><?php echo (($country['country_status'] == 'active') ? 'Active' : 'Inactive');?></td>
                                <td>
                                	<a href="<?php echo base_url() . "admin/countries/edit_country/" . $country['country_id']; ?>" title="Edit"><span class="fa fa-pencil-square-o"></span></a>
                                	|<a href="<?php echo base_url() . "admin/countries/change_status?id=" . $country['country_id']."&status=".$country['country_status']; ?>">Change Status</a>
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