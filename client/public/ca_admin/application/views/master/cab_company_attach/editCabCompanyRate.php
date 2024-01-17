<?php
$id = '';
$company_id = '';
$vendor_id = '';
$zone_id = '';
$zone_type_id = '';
$guard_price = '';
$statusId = '';
$all_vehicle_id = array();

if (!empty($cabCompanyInfo)) {
    $i = 0;
    foreach ($cabCompanyInfo as $uf) {
        $id = $uf->id;
        $company_id = $uf->company_id;
        $vendor_id = $uf->vendor_id;
        $zone_id = $uf->zone_id;
        $zone_type_id = $uf->zone_type_id;
        $guard_price = $uf->guard_price;
        $statusId = $uf->statusId;
        $i++;
    }
}


?>

<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>cabCompanyListing" data-toggle="tooltip" data-placement="bottom" title="Cab Rate Master">Cab Rate Master</a>
            <span>/</span>
            <span>Edit Cab Rate</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card mb-3">
            <div class="card-header white-text primary-color">Enter Cab Rate Information</div>
            <!--Card content-->
            <div class="card-body">
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
                        <?php } ?>
                        <?php
                        $success = $this->session->flashdata('success');
                        if ($success) {
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
                        <form role="form" id="editNewCabCompany" name="editNewCabCompany" method="post" autocomplete="off">
                            <input type="hidden" name="cabCompanyId" id="cabCompanyId" value="<?php echo $id; ?>">
                            <div class="row">
                                <div class="col-md-3" id="vendor_check_id">
                                    <div class="form-group">
                                        <label for="vendor_id">Vendor Name</label>
                                        <select class="form-control form-control-sm required vendor_id" id="vendor_id" name="vendor_id" required readonly>
                                            <option value="<?php echo $cabCompanyInfo[0]->vendor_id; ?>">
                                                <?php echo $cabCompanyInfo[0]->vendor_name; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="vehicle_id">Vehicle No.</label>
                                        <select class="form-control form-control-sm" id="vehicle_id" name="vehicle_id" multiple="multiple" readonly>
                                            <?php
                                            if (!empty($vehicleList)) {
                                                foreach ($vehicleList as $rl) {
                                                    ?>
                                                    <option value="<?php echo $rl->id ?>">
                                                        <?php echo $rl->vehicle_no; ?>
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
                                        <label for="company_id">Company Name</label>
                                        <select class="form-control form-control-sm required" id="company_id" name="company_id" readonly>
                                            <option value="<?php echo $cabCompanyInfo[0]->company_id ?>">
                                                <?php echo $cabCompanyInfo[0]->company_name; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header white-text primary-color" role="tab">
                <a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo1">Add Company Rate for <?= $cabCompanyInfo[0]->company_name ?><i class="fas fa-angle-up rotate-icon ml-2"></i></a>
            </div>
            <div id="collapseTwo1" class="collapse show" role="tabpanel">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive text-nowrap" id="company_wise">
                                <table width="100%" class="table table-striped table-bordered table-hover cabCompanyTable table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>S.No</th>
                                            <th>Zone Name <span class="red-text">*</span></th>
                                            <th>Zone Type <span class="red-text">*</span></th>
                                            <?php
                                            if (!empty($vehicleTypeList)) {
                                                foreach ($vehicleTypeList as $rl) { ?>
                                                    <th>Cab Rate - <?php echo ucwords(strtolower($rl->type)); ?> <span class="red-text">*</span></th>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <th>Guard Price <span class="red-text">*</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>






                                        <?php

                                        if (!empty($cab_rates)) {
                                            $i = 0;
                                            $kl = 0;


                                            $tatal_cab_rates = count($cab_rates['cab_rates']);
                                            $y = 1;

                                            for ($i = 0; $i < $tatal_cab_rates; $i++) {
                                                foreach ($cab_rates as $rl) { ?>



                                                    <?php

                                                                foreach ($rl[$kl]['zones'] as $r2) {
                                                                    //pre($r2);
                                                                    //pre($r2['itms']);

                                                                    ?>

                                                        <tr class="company_tr" data-row-id="<?php echo $y; ?>" id="company_tr_<?php echo $y; ?>">


                                                            <?php if ($y == 1) { ?>


                                                                <td>
                                                                    <a class="addcabCompanyCabRate green-text" onclick="addNewRowRate();">
                                                                        <i class="fas fa-plus-circle"></i>
                                                                    </a>
                                                                </td>


                                                            <?php } else { ?>

                                                                <td>
                                                                    <a class="deleteCabCompanyRate red-text" data-invoice-id="<?php echo $y; ?>" href="javascript:void(0)">
                                                                        <i class="fas fa-trash deleteicon"></i>
                                                                    </a>
                                                                </td>

                                                            <?php } ?>



                                                            <td class="text-center">
                                                                <span id="company_tr_<?php echo $y; ?>_id"><?php echo $y; ?></span>

                                                                <input type="hidden" id="company_tr_<?php echo $y; ?>_vendor_company_id" name="vendor_company_id[]" class="form-control form-control-sm" data-bind="content" value="<?= $r2['vendor_company_id'] ?>" />
                                                            </td>

                                                            <td>
                                                                <select class="form-control form-control-sm addzone1 required" id="company_tr_<?php echo $y; ?>_zone" name="company_zone[]" data-bind="content" style="width:150px;">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                                    if (!empty($zoneList)) {
                                                                                        foreach ($zoneList as $zl) {
                                                                                            ?>
                                                                            <option value="<?php echo $zl->zone_id ?>" <?php if ($zl->zone_id == $r2['zone_id']) {
                                                                                                                                                    echo "selected=selected";
                                                                                                                                                } ?>>
                                                                                <?php echo strtoupper($zl->zone_name); ?>
                                                                            </option>
                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                </select>
                                                            </td>

                                                            <td>


                                                                <select class="form-control form-control-sm addzonetype required" id="company_tr_<?php echo $y; ?>_zone_type" name="company_zone_type[]" data-bind="content" style="width:150px;">
                                                                    <option value="" id="loading_zone_type">Select</option>

                                                                    <?php
                                                                                    $zoneTypeList = $this->zone_model->getAttachedZoneListById($r2['zone_id']);
                                                                                    if (!empty($zoneTypeList)) {
                                                                                        foreach ($zoneTypeList as $ztl) {
                                                                                            ?>
                                                                            <option value="<?php echo $ztl->zone_type_id; ?>" <?php if ($ztl->zone_type_id == $r2['zone_type_id']) {
                                                                                                                                                            echo "selected=selected";
                                                                                                                                                        } ?>>
                                                                                <?php echo strtoupper($ztl->zone_type . ' (' . $ztl->description . ')'); ?>
                                                                            </option>
                                                                    <?php

                                                                                        }
                                                                                    }
                                                                                    ?>




                                                                </select>
                                                            </td>




                                                            <?php
                                                                            // if (!empty($vehicleTypeList)) {
                                                                            //     $jk = 0;
                                                                            //     foreach ($vehicleTypeList as $rl) {
                                                                            if (!empty($r2['itms'])) {
                                                                                $jk = 0;
                                                                                // pre($r2['itms']);
                                                                                foreach ($r2['itms'] as $rl) {

                                                                                    ?>
                                                                    <td>
                                                                        <input type="hidden" id="company_tr_<?php echo $y; ?>_vendor_company_price_id_<?= $jk ?>" name="vendor_company_price_id_<?= $jk ?>[]" class="form-control form-control-sm" value="<?= $rl['vendor_company_price_id'] ?>" />

                                                                        <input type="text" id="company_tr_<?php echo $y; ?>_cab_rate_<?= $jk ?>" name="company_cab_rate_<?= $jk ?>[]" class="form-control form-control-sm required" data-bind="decimal" placeholder="0" value="<?= $rl['rt'] ?>" />

                                                                        <!-- <input type="hidden" id="company_tr_<?php echo $y; ?>_vehicle_type_name_<?= $jk ?>" name="company_vehicle_type_name_<?= $jk ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->type); ?>" />

            <input type="hidden" id="company_tr_<?php echo $y; ?>_vehicle_type_slug_<?= $jk ?>" name="company_vehicle_type_slug_<?= $jk ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->slug); ?>" /> -->

                                                                        <input type="hidden" id="company_tr_<?php echo $y; ?>_vehicle_type_id_<?= $jk ?>" name="company_vehicle_type_id_<?= $jk ?>[]" class="form-control form-control-sm" value="<?php echo $rl['vehicle_type_id']; ?>" />


                                                                    </td>

                                                            <?php
                                                                                    $jk++;
                                                                                }
                                                                            }
                                                                            ?>
                                                            <td>
                                                                <input type="text" id="company_tr_<?php echo $y; ?>_guard_rate required" name="company_guard_rate[]" class="form-control form-control-sm" data-bind="decimal" placeholder="0" value="<?php echo $r2['guard_price']; ?>" />
                                                            </td>
                                                        </tr>

                                        <?php
                                                        $y++;
                                                    }

                                                    $kl++;
                                                }
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>


        <div class="card-footer text-center">
            <!-- <input type="submit" class="btn btn-primary" value="Submit" /> -->
            <a href="javascript:void(0);" class="btn btn-info" id="save_edit_cabrate">Edit Cab Rate</a>
            <input type="reset" class="btn btn-default" value="Reset" />
        </div>
        </form>


    </div>
</div>