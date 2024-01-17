<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>guardListing">Guard Master</a>
            <span>/</span>
            <span>Add New Guard</span>
        </h6>
    </div>
</div>
<!-- Heading -->
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Guard Information</div>  
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
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewGuard" action="<?php echo base_url() ?>addNewGuards" method="post" role="form">
                            <div class="row">
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="salutaion">Salutaion <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="salutation" name="salutation">
                                            <option value="">Select Salutaion</option>      <option value="Mr." selected="">Mr.</option>       <option value="Ms.">Ms.</option>
											<option value="Mrs.">Mrs.</option>         
                                        </select>
										
                                    </div>
                                </div>                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="full_name">Full Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Full Name" value="<?php echo set_value('full_name'); ?>" id="full_name" name="full_name">								
                                    </div>
                                </div>                                
                            
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
										<input type="text" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo set_value('email'); ?>" id="email" name="email">
										
                                    </div>
                                </div>  
							</div>
							<div class="row">								
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
										<input type="text" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" id="mobile" name="mobile">								
                                    </div>
                                </div>                                
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pan">PAN</label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo set_value('pan'); ?>" id="pan" name="pan">
										
                                    </div>
                                </div>                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
											<input type="text" class="form-control datepicker" id="datepicker" name="dob" maxlength="20" placeholder="dd/mm/yyyy" >							
									</div>  
								</div> 								
                            </div>
							<div class="row">
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo set_value('pincode'); ?>" id="pincode" name="pincode">
										
                                    </div>
                                </div>                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Address</label>
										<input type="text" class="form-control form-control-sm" placeholder="Address" value="<?php echo set_value('address'); ?>" id="address" name="address">								
                                    </div>
                                </div>                                
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label>
										<input type="text" class="form-control form-control-sm" placeholder="City" value="<?php echo set_value('city'); ?>" id="city" name="city">
										
                                    </div>
                                </div> 
							</div>
							<div class="row">								
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state">State</label>
										<select class="form-control form-control-sm" id="state" name="state">
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
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
										<input type="text" class="form-control form-control-sm" placeholder="Company Name" value="<?php echo set_value('company_name'); ?>" id="company_name" name="company_name">
										
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                </div>                                
                            </div>
                            <!-- /.box-body -->

                            <div class="card-footer text-center">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                            </div>
                    </form>
                </div>
                
				</div>				
			</div>
		</div>
	</div>
</div>