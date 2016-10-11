<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Qualifications</h2>

    </div>
    <div class="col-sm-3"><a href="<?php echo base_url("admin/qualifications/add_qualification"); ?>" class="btn btn-primary ">Add Qualification</a></div>
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
                            <th>Qualification Id</th>
                            <th>Qualification</th>
                            <!-- <th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($qualifications as $qualification):
                            ?>
                            <tr>
                                <td><?php echo $qualification['qualification_id']; ?></td>
                                <td><a href="<?php echo base_url() . "admin/qualifications/edit_qualification/" . $qualification['qualification_id']; ?>" title="Edit"><?php echo $qualification['qualification_name']; ?></a></td>
                                <!-- <td>
                                	<a href="<?php echo base_url() . "admin/qualifications/edit_qualification/" . $qualification['qualification_id']; ?>" title="Edit"><span class="fa fa-pencil-square-o"></span></a>
                                </td> -->
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