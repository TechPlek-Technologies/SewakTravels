<?php

$id = '';
$vehicle_type_id = '';
$vendor_id = '';
$mobile = '';
$vehicle_no = '';
$is_insurance = '';

$driver_name = '';
$mobile_no = '';
$driving_licence = '';
$aadhar_card = '';
$police_verification = '';


$insurance_number = '';
$fitness_expiry_date = '';
$insurance_expiry_date = '';
$insurance_verify = '';
$polution_expiry_date = '';
$polution_verify = '';
$permit_1_year = '';
$permit_1_year_expiry_date = '';
$permit_5_year = '';
$permit_5_year_expiry_date = '';
$insurance = '';
$gps = '';
$gps_rate = '';
$emi = '';
$emi_loan_amount = '';
$emi_years = '';
$emi_rate = '';
$statusId = '';

if (!empty($vehicle_list)) {



    foreach ($vehicle_list as $uf) {
        $id = $uf->id;
        $vehicle_type_id = $uf->vehicle_type_id;
        $vendor_id = $uf->vendor_id;
        $mobile = $uf->mobile;
        $alternate_mobile = $uf->alternate_mobile;
        $vehicle_no = $uf->vehicle_no;

        $driver_name = $uf->driver_name;
        $mobile_no = $uf->mobile_no;
        $driving_licence = $uf->driving_licence;
        $aadhar_card = $uf->aadhar_card;
        $police_verification = $uf->police_verification;

        $fitness_expiry_date = $uf->fitness_expiry_date;
        $is_insurance = $uf->is_insurance;
        $insurance_number = $uf->insurance_number;
        $insurance_expiry_date = $uf->insurance_expiry_date;
        $insurance_verify = $uf->insurance_verify;
        $polution_expiry_date = $uf->polution_expiry_date;
        $polution_verify = $uf->polution_verify;
        $permit_1_year = $uf->permit_1_year;
        $permit_1_year_expiry_date = $uf->permit_1_year_expiry_date;
        $permit_5_year = $uf->permit_5_year;
        $permit_5_year_expiry_date = $uf->permit_5_year_expiry_date;
        $insurance = $uf->insurance;
        $gps = $uf->gps;
        $gps_rate = $uf->gps_rate;
        $emi = $uf->emi;
        $emi_loan_amount = $uf->emi_loan_amount;
        $emi_years = $uf->emi_years;
        $emi_rate = $uf->emi_rate;
        $statusId = $uf->statusId;
    }
}


?>

<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>vendorListing" data-toggle="tooltip" data-placement="bottom" title="Vendor List">Vendor List</a>
            <span>/</span>
            <span>Edit Vehicle</span>
        </h6>
    </div>
</div>
<!-- Heading -->
<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editVehicle" action="<?php echo base_url() ?>editVehicle" method="post" autocomplete="off">
    <input type="hidden" value="<?php echo $id; ?>" id="id" name="id">
    <!--Grid row-->
    <div class="row">
        <!--Grid column-->
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
        <div class="col-md-3 mb-3">

            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Edit Vehicle Information</div>
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
                                                    <option value="<?php echo $rl->id ?>" <?php if ($rl->id == $vehicle_type_id) {
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
                                                    <option value="<?php echo $rl->id ?>" <?php if ($rl->id == $vendor_id) {
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
                                        <input type="text" class="form-control form-control-sm required" placeholder="Vehicle Number" value="<?php echo $vehicle_no; ?>" id="vehicle_no" name="vehicle_no" onkeyup="this.value = this.value.toUpperCase();" maxlength="16">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="tel" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo $mobile; ?>" id="mobile" name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alternate_mobile">Mobile</label>
                                        <input type="tel" class="form-control form-control-sm" placeholder="Alternate Mobile" value="<?php echo $alternate_mobile; ?>" id="alternate_mobile" name="alternate_mobile">
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
                                <input type="text" class="form-control form-control-sm" placeholder="Driver Name" value="<?php echo $driver_name; ?>" id="driver_name" name="driver_name">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mobile_no">Mobile No.</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Mobile No." value="<?php echo $mobile_no; ?>" id="mobile_no" name="mobile_no">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="police_verification">Police Verification</label>
                                <select class="form-control form-control-sm required" id="police_verification" name="police_verification">
                                    <option value="0" <?= ($police_verification == 0) ? 'selected' : '' ?>>No</option>
                                    <option value="1" <?= ($police_verification == 0) ? 'selected' : '' ?>>Yes</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="aadhar_card">AADHAR Card</label>
                                <input type="text" class="form-control form-control-sm" placeholder="AADHAR Card" value="<?php echo $aadhar_card; ?>" id="aadhar_card" name="aadhar_card" onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="12">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="driving_licence">Driving Licence</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Driving Licence" value="<?php echo $driving_licence; ?>" id="driving_licence" name="driving_licence">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header white-text primary-color">
                    <a class="collapsed white-text">
                        Insurance/Polution Details
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fitness_expiry_date">Fitness Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $fitness_expiry_date; ?>" id="fitness_expiry_date" name="fitness_expiry_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="insurance_expiry_date">Insurance Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $insurance_expiry_date; ?>" id="insurance_expiry_date" name="insurance_expiry_date">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="polution_expiry_date">Polution Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $polution_expiry_date; ?>" id="polution_expiry_date" name="polution_expiry_date">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="permit_1_year_expiry_date">Permit 1 Year Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo $permit_1_year_expiry_date; ?>" id="permit_1_year_expiry_date" name="permit_1_year_expiry_date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="permit_5_year_expiry_date">Permit 5 Year Expiry Date</label>
                                <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" value="<?php echo $permit_5_year_expiry_date; ?>" id="permit_5_year_expiry_date" name="permit_5_year_expiry_date">
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
                                    <option value="0" <?= ($gps == 0) ? 'selected' : '' ?>>No</option>
                                    <option value="1" <?= ($gps == 1) ? 'selected' : '' ?>>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gps_rate">GPS Rate (Monthly)</label>
                                <input type="text" class="form-control form-control-sm" placeholder="GPS Rate" value="<?php echo $gps_rate; ?>" id="gps_rate" name="gps_rate">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status <span class="red-text">*</span></label>
                                <select class="form-control form-control-sm required" id="status" name="status">
                                    <option value="0" <?= ($statusId == 0) ? 'selected' : '' ?>>In-Active</option>
                                    <option value="1" <?= ($statusId == 1) ? 'selected' : '' ?>>Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emi">EMI <span class="red-text">*</span></label>
                                    <select class="form-control form-control-sm required" id="emi" name="emi">
                                        <option value="0" <?= ($emi == 0) ? 'selected' : '' ?>>No</option>
                                        <option value="1" <?= ($emi == 1) ? 'selected' : '' ?>>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emi_loan_amount">Total Loan Amount</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Total Loan Amount" value="<?php echo $emi_loan_amount; ?>" id="emi_loan_amount" name="emi_loan_amount">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emi_years">Emi Years</label>
                                    <select class="form-control form-control-sm" id="emi_years" name="emi_years">
                                        <option value="0" <?= ($emi_years == 0) ? 'selected' : '' ?>>No</option>
                                        <option value="1" <?= ($emi_years == 1) ? 'selected' : '' ?>>1 Year</option>
                                        <option value="2" <?= ($emi_years == 2) ? 'selected' : '' ?>>2 Years</option>
                                        <option value="3" <?= ($emi_years == 3) ? 'selected' : '' ?>>3 Years</option>
                                        <option value="4" <?= ($emi_years == 4) ? 'selected' : '' ?>>4 Years</option>
                                        <option value="5" <?= ($emi_years == 5) ? 'selected' : '' ?>>5 Years</option>
                                        <option value="6" <?= ($emi_years == 6) ? 'selected' : '' ?>>6 Years</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emi_rate">EMI Rate (Per Month)</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="EMI Rate" value="<?php echo $emi_rate; ?>" id="emi_rate" name="emi_rate">
                                </div>
                            </div>
                        </div> -->
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