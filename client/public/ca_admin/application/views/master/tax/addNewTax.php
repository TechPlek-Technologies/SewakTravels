<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>taxs" data-toggle="tooltip" data-placement="bottom" title="Tax Master">Tax Master</a>
            <span>/</span>
            <span>Add New Tax</span>
        </h6>
    </div>
</div>
<!-- Heading -->
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Tax Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-8">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewTax" action="<?php echo base_url() ?>addNewTaxs" method="post" autocomplete="off">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control form-control-sm required" id="state" name="state">
                                            <option value="">Select State</option>
                                            <?php
                                            if(!empty($states))
                                            {
                                                foreach ($states as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == set_value('state')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->state ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
								
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price">Tax Rate (Monthly)</label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="0.00" value="<?php echo set_value('price'); ?>" id="price" name="price">
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price_per_trip">Tax Rate (Per Trip)</label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="0.00" value="<?php echo set_value('price_per_trip'); ?>" id="price_per_trip" name="price_per_trip">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="card-footer text-center">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                            </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php } ?>
                        <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                            </div>
                        </div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>