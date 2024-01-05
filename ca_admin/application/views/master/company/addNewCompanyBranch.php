<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>companyListing" data-toggle="tooltip" data-placement="bottom" title="Company Master">Company Master</a>
            <span>/</span>
            <span>Add New Branch</span>
        </h6>
    </div>
</div>
<!-- Heading -->
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
	<!-- form start -->
		<?php $this->load->helper("form"); ?>
		<form role="form" id="addNewBranch" action="<?php echo base_url() ?>addNewBranch" method="post" autocomplete="off">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Branch Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-12">
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
					<div class="col-md-12">
                            <div class="row">
								<div class="col-md-3">
                                     <div class="form-group">
                                        <label for="company_id">Company Name <span class="red-text">*</span></label>								
										<select class="form-control form-control-sm" id="company_id" name="company_id" required>
                                            <option value="">Select Company</option>
                                            <?php
                                            if(!empty($companyList))
                                            {
                                                foreach ($companyList as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->company_name == set_value('company_id')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->company_name ?>
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
                                        <label for="name">Branch Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm" placeholder="Branch Name" value="<?php echo set_value('name'); ?>" id="name" name="name">
										
                                    </div>
                                </div>                                
                                <div class="col-md-3">
                                     <div class="form-group">
                                        <label for="contact_person">Contact Person</label>
										<input type="text" class="form-control form-control-sm" placeholder="Contact Person" value="<?php echo set_value('contact_person'); ?>" id="contact_person" name="contact_person">
										
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
										<input type="text" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo set_value('email'); ?>" id="email" name="email">
										
                                    </div>
                                </div> 								
								 
							</div>
							<div class="row">	
															
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
										<input type="text" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" id="mobile" name="mobile">								
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="landline">Landline</label>
										<input type="text" class="form-control form-control-sm required" placeholder="Landline" value="<?php echo set_value('landline'); ?>" id="landline" name="landline">
										
                                    </div>
                                </div> 								
								<!--<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pan">PAN</label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo set_value('pan'); ?>" id="pan" name="pan">
										
                                    </div>
                                </div>                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gstin">GSTIN</label>
											<input type="text" class="form-control form-control-sm" id="gstin" name="gstin" maxlength="20" placeholder="GSTIN" >							
									</div>  
								</div> 	
									-->							
                            </div>
							<div class="row">
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo set_value('pincode'); ?>" id="pincode" name="pincode" minlength="6" maxlength="6">
										
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="address">Address</label>
										<input type="text" class="form-control form-control-sm" placeholder="Address" value="<?php echo set_value('address'); ?>" id="address" name="address">								
                                    </div>
                                </div>                                
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="city">City</label>
										<input type="text" class="form-control form-control-sm" placeholder="City" value="<?php echo set_value('city'); ?>" id="city" name="city">
										
                                    </div>
                                </div> 
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="state">State <span class="red-text">*</span></label>
										<select class="form-control form-control-sm" id="state" name="state" required>
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
							</div> 
                            <!-- /.box-body -->

                </div>
                
				</div>				
			</div>
		</div>
              <!-- Accordion card -->
       <div class="card-footer text-center">
			<input type="submit" class="btn btn-primary" value="Submit" />
			<input type="reset" class="btn btn-default" value="Reset" />
		</div>
		</form>
	</div>
</div>