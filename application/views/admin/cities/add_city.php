<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add City</h2>
    </div>
    <div class="col-lg-2"> </div>
</div>
			<?php if($this->session->flashdata('error') != '') {?>
            	<div class="alert alert-danger alert-dismissable">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <?php echo $this->session->flashdata('error');?>
                </div>
            <?php } ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="">
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">State</label>
                            <div class="col-sm-10">
                                <select class="chosen-select" name="state_id" style="width:150px;" tabindex="2" required="">
                                    <?php foreach ($states as $state) { ?>
                                        <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">City Name</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" required name="city_name" value="<?php echo set_value('city_name'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
							<select class="chosen-select" name="status" style="width:150px;" tabindex="2" required="">
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit" value="add">Save</button>
                            <button class="btn btn-white" type="button" onClick="window.location = '<?php echo base_url();?>admin/cities';" value="cancel">Cancel</button>
                        </div>
                    </div>
                </form>