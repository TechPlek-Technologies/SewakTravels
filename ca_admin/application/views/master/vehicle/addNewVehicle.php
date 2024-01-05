<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>vendorListing">Vendor List</a>
            <span>/</span>
            <span>Add New Vehicle</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="addNewVehicles" action="<?php echo base_url() ?>addNewVehicles" method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-12">
            <?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if ($error) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php }
            $success = $this->session->flashdata('success');
            if ($success) { ?>
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
        <!--Grid column-->
        <div class="col-md-3">

            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Enter New Vehicle Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vehicle_type">Vehicle Type <span class="red-text">*</span></label>
                                        <select class="form-control form-control-sm required" id="vehicle_type" name="vehicle_type">
                                            <option value="">Select Vehicle Type</option>
                                            <?php
                                            if (!empty($vehicle_type)) {
                                                foreach ($vehicle_type as $rl) {
                                                    ?>
                                                    <option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('vehicle_type')) {
                                                                                                        echo "selected=selected";
                                                                                                    } ?>>
                                                        <?php echo $rl->type ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vendor_id">Vendor <span class="red-text">*</span></label>
                                        <select class="form-control form-control-sm required" id="vendor_id" name="vendor_id">
                                            <option value="">Select Vendor</option>
                                            <?php
                                            if (!empty($vendorList)) {
                                                foreach ($vendorList as $rl) {
                                                    ?>
                                                    <option value="<?php echo $rl->id ?>" <?php if ($rl->name == set_value('vendor_id')) {
                                                                                                        echo "selected=selected";
                                                                                                    } ?>>
                                                        <?php echo ucwords(strtolower($rl->name));

                                                                if (!empty($rl->company_name)) {
                                                                    echo ' - ' . ucwords(strtolower($rl->company_name));
                                                                }
                                                                ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vehicle_no">Vehicle Number <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Vehicle Number" value="<?php echo set_value('vehicle_no'); ?>" id="vehicle_no" name="vehicle_no" onkeyup="this.value = this.value.toUpperCase();" maxlength="16">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="tel" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" id="mobile" name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alternate_mobile">Alternate Mobile</label>
                                        <input type="tel" class="form-control form-control-sm" placeholder="Alternate Mobile" value="<?php echo set_value('alternate_mobile'); ?>" id="alternate_mobile" name="alternate_mobile">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

            <div class="card">
                <div class="card-header white-text primary-color">
                    <a class="white-text">
                        Driver Details
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="driver_name">Driver Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Driver Name" value="<?php echo set_value('driver_name'); ?>" id="driver_name" name="driver_name">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mobile_no">Mobile No.</label>
                                <input type="tel" class="form-control form-control-sm" placeholder="Mobile No." value="<?php echo set_value('mobile_no'); ?>" id="mobile_no" name="mobile_no">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="police_verification">Police Verification</label>
                                <select class="form-control form-control-sm required" id="police_verification" name="police_verification">
                                    <option value="0">No</option>
                                    <option value="1" selected>Yes</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="aadhar_card">AADHAR Card</label>
                                <input type="text" class="form-control form-control-sm" placeholder="AADHAR Card" value="<?php echo set_value('aadhar_card'); ?>" id="aadhar_card" name="aadhar_card" onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="12">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="driving_licence">Driving Licence</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Driving Licence" value="<?php echo set_value('driving_licence'); ?>" id="driving_licence" name="driving_licence">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header white-text primary-color">
                    <a class="white-text">
                        Insurance/Polution Expiry Details
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fitness_expiry_date">Fitness Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo set_value('fitness_expiry_date'); ?>" id="fitness_expiry_date" name="fitness_expiry_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="insurance_expiry_date">Insurance Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo set_value('insurance_expiry_date'); ?>" id="insurance_expiry_date" name="insurance_expiry_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="polution_expiry_date">Polution Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo set_value('polution_expiry_date'); ?>" id="polution_expiry_date" name="polution_expiry_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="permit_1_year_expiry_date">Permit 1 Year Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo set_value('permit_1_year_expiry_date'); ?>" id="permit_1_year_expiry_date" name="permit_1_year_expiry_date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="permit_5_year_expiry_date">Permit 5 Year Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo set_value('permit_5_year_expiry_date'); ?>" id="permit_5_year_expiry_date" name="permit_5_year_expiry_date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header white-text primary-color">
                    <a class="white-text">
                        GPS/EMI Charges Details
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gps">GPS <span class="red-text">*</span></label>
                                <select class="form-control form-control-sm required" id="gps" name="gps">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gps_rate">GPS Rate (Monthly)</label>
                                <input type="text" class="form-control form-control-sm" placeholder="GPS Rate" value="<?php echo set_value('gps_rate'); ?>" id="gps_rate" name="gps_rate">
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="emi">EMI <span class="red-text">*</span></label>
                                <select class="form-control form-control-sm required" id="emi" name="emi">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emi_loan_amount">Total Loan Amount</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Total Loan Amount" value="<?php echo set_value('emi_loan_amount'); ?>" id="emi_loan_amount" name="emi_loan_amount">
                            </div>
                        </div> -->
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="emi_years">Emi Years</label>
                                <select class="form-control form-control-sm" id="emi_years" name="emi_years">
                                    <option value="0" selected>No</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                    <option value="6">6 Years</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emi_rate">EMI Rate (Per Month)</label>
                                <input type="text" class="form-control form-control-sm" placeholder="EMI Rate" value="<?php echo set_value('emi_rate'); ?>" id="emi_rate" name="emi_rate">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <input type="reset" class="btn btn-default" value="Reset" />
            </div>


        </div>
    </div>
</form>