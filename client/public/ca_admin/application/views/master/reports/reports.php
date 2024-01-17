<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Report's Master</span>
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
            <div class="card-header white-text primary-color">Reports List</div>  
	        <!--Card content-->
	        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <?php $this->load->helper("form"); ?>
		            <!-- <form role="form" id="getAllReports" action="#" autocomplete="off"> -->

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
								<div class="col-md-2">
                                     <div class="form-group">
                                        <label for="company_id">Company Name </label>
										<select class="form-control form-control-sm" id="company_id" name="company_id">
                                            <option value="">All Company</option>
                                            <?php
                                            if(!empty($companyList))
                                            {
                                                foreach ($companyList as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == set_value('company_id')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->company_name ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
										
                                    </div>
                                </div> 
                                <div class="col-md-2" id="vendor_check_id">
                                     <div class="form-group">
                                        <label for="vendor_id">Vendor</label>
										<select class="form-control form-control-sm vendor_id" id="vendor_id" name="vendor_id">
                                            <option value="">Select Vendor</option>
                                            <?php
											
                                            if(!empty($vendorList))
                                            {
                                                foreach ($vendorList as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == set_value('vendor_id')) {echo "selected=selected";} ?>>
                                                    <?php echo ucwords(strtolower($rl->name)); ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
										
                                    </div>
                                </div>                                
                                <div class="col-md-2">
                                     <div class="form-group">
                                        <label for="vehicle_id">Vehicle No.</label>
										<select class="form-control form-control-sm" id="vehicle_id" name="vehicle_id" autocomplete="off">
										<option value=""></option>
                                        </select>
										
                                    </div>
                                </div>                                
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
										<input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo date('d-m-Y'); ?>" id="start_date1" name="start_date" autocomplete="off">
										
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
										<input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo date('d-m-Y'); ?>" id="end_date1" name="end_date" autocomplete="off">
										
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="clearfix">&nbsp;</div>
										<input type="submit" class="btn btn-primary btn-sm" id="search_report" value="Search" />
										
                                    </div>
                                </div>
							</div>
                            <!-- /.box-body -->

                </div>
                
				</div>				

		
		
		<!-- </form> -->
                    </div>
                    
                </div>


                

            </div>
            
            <div class="card-body" id="staticTemplate">				
			</div>
        </div>
    </div>
</div>
<div id="viewSearchRoster"></div>
<div id="viewSearchRosterDetailsAll"></div>
<div id="viewCompanyRoster"></div>
<div id="viewCompanyWiseRosterAll"></div>