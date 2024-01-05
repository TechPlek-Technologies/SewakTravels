<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>cabListing">Cab/Vehicle List</a>
            <span>/</span>
            <span>Add New Cab/Vehicle</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="addNewCabs" action="<?php echo base_url() ?>addNewCabs" method="post" autocomplete="off" enctype="multipart/form-data" name="addNewCabs">
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
        <div class="col-md-4">
            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Enter New Cab/Vehicle Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">                          
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vehicle_name">Vehicle Name <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Vehicle Name" value="<?php echo set_value('vehicle_name'); ?>" id="vehicle_name" name="vehicle_name" maxlength="16">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="red-text">*</span></label>
										<textarea id="description" name="description" class="form-control form-control-sm"><?php echo set_value('description'); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passengers">Passengers <span class="red-text">*</span></label>
                                        <input type="number" class="form-control form-control-sm" placeholder="Passengers" value="4" id="passengers" name="passengers">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="luggage">Luggage <span class="red-text">*</span></label>
                                        <input type="number" class="form-control form-control-sm" placeholder="Luggage" value="2" id="luggage" name="luggage">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_fee">Start fee <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Start Fee" value="<?php echo set_value('start_fee'); ?>" id="start_fee" name="start_fee">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fee_per_person">Fee Per Person <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Fee Per Person" value="<?php echo set_value('fee_per_person'); ?>" id="fee_per_person" name="fee_per_person">
                                    </div>
                                </div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="file">Vehicle Image <span class="red-text">*</span></label>
										<input type="file" name="upl_files0" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png">
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>		
		<div class="col-md-8">
			<div class="card">
				<div class="card-header white-text primary-color">
					Add Price's for City Taxi
				</div>
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover cabtable table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>S.No</th>
											<th>From (km) <span class="red-text">*</span></th>
											<th>To (km) <span class="red-text">*</span></th>
											<th>One Way Price/km <span class="red-text">*</span></th>
											<th>Round Trip Price/km <span class="red-text">*</span></th>
											<th>Additional km fare (After)<span class="red-text">*</span></th>
											<th>Additional Ride Time fare (After)<span class="red-text">*</span></th>
											<th>Driver Allowance <span class="red-text">*</span></th>
											<th>Night Charges <span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr class="cab_tr" data-cab-id="1" id="cab_tr_1">
											<td>
												<a class="addMoreVehicle green-text" href="javascript:void(0);">
													<i class="fas fa-plus-circle"></i>
												</a>
											</td>
											<td class="text-center">
												<span id="cab_city_1_id">1</span>
											</td>
											<td>
												<input type="number" class="form-control form-control-sm" placeholder="From (km)" id="cab_city_1_from" name="cab_city_from[]">
											</td>

											<td>
												<input type="number" id="cab_city_1_to" name="cab_city_to[]" class="form-control form-control-sm" data-bind="number" placeholder="To (km)" />
											</td>
											<td>
												<input type="number" id="cab_city_1_amount_one_way" name="cab_city_amount_one_way[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_city_1_amount_two_way" name="cab_city_amount_two_way[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_city_<?php echo $counter; ?>_additional_amount" name="cab_city_additional_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0.00" />
											</td>
											<td>
												<input type="number" id="cab_city_<?php echo $counter; ?>_time_amount" name="cab_city_time_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0.00" />
											</td>
											<td>
												<input type="number" id="cab_city_1_driver_amount" name="cab_city_driver_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_city_1_night_amount" name="cab_city_night_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header white-text primary-color">
					Add Price's for Outstation Taxi
				</div>
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover cabtable table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>S.No</th>
											<th>From (km) <span class="red-text">*</span></th>
											<th>To (km) <span class="red-text">*</span></th>
											<th>One Way Price/km <span class="red-text">*</span></th>
											<th>Round Trip Price/km <span class="red-text">*</span></th>
											<th>Additional km fare (After)<span class="red-text">*</span></th>
											<th>Additional Ride Time fare (After)<span class="red-text">*</span></th>
											<th>Driver Allowance <span class="red-text">*</span></th>
											<th>Night Charges <span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr class="cab_outstation_tr" data-outstation-id="1" id="cab_outstation_tr_1">
											<td>
												<a class="addOutstationVehicle green-text" href="javascript:void(0);">
													<i class="fas fa-plus-circle"></i>
												</a>
											</td>
											<td class="text-center">
												<span id="cab_outstation_1_id">1</span>
											</td>
											<td>
												<input type="number" class="form-control form-control-sm" placeholder="From (km)" id="cab_outstation_1_from" name="cab_outstation_from[]">
											</td>

											<td>
												<input type="number" id="cab_outstation_1_to" name="cab_outstation_to[]" class="form-control form-control-sm" data-bind="number" placeholder="To (km)" />
											</td>
											<td>
												<input type="number" id="cab_outstation_1_one_way_amount" name="cab_outstation_one_way_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_outstation_1_two_way_amount" name="cab_outstation_two_way_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_outstation_1_additional_amount" name="cab_outstation_additional_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0.00" />
											</td>
											<td>
												<input type="number" id="cab_outstation_1_time_amount" name="cab_outstation_time_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0.00" />
											</td>
											<td>
												<input type="number" id="cab_outstation_1_driver_amount" name="cab_outstation_driver_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_outstation_1_night_amount" name="cab_outstation_night_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header white-text primary-color">
					Add Price's for Rental's Taxi
				</div>
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover cabtable table-sm">
									<thead>
										<tr>
											<th>S.No</th>
											<th>From (km) <span class="red-text">*</span></th>
											<th>To (km) <span class="red-text">*</span></th>
											<th>Price/km <span class="red-text">*</span></th>
											<th>Additional km fare (After)<span class="red-text">*</span></th>
											<th>Additional Ride Time fare (After)<span class="red-text">*</span></th>
											<th>Driver Allowance <span class="red-text">*</span></th>
											<th>Night Charges<span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr class="cab_rental_tr" data-rental-id="1" id="cab_rental_tr_1">
											<td class="text-center">
												<span id="cab_rental_1_id">4H-40KM</span>
											</td>
											<td>
												<input type="hidden" class="form-control form-control-sm" id="cab_rental_1_pick" name="cab_rental_pick[]" value="half_day">
												<input type="number" class="form-control form-control-sm" placeholder="From (km)" id="cab_rental_1_from" name="cab_rental_from[]" value="0">
											</td>

											<td>
												<input type="number" id="cab_rental_1_to" name="cab_rental_to[]" class="form-control form-control-sm" data-bind="number" placeholder="To (km)" value="40" />
											</td>
											<td>
												<input type="number" id="cab_rental_1_amount" name="cab_rental_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="18" />
											</td>
											<td>
												<input type="number" id="cab_rental_1_additional_amount" name="cab_rental_additional_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="12" />
											</td>
											<td>
												<input type="number" id="cab_rental_1_time_amount" name="cab_rental_time_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="2" />
											</td>
											<td>
												<input type="number" id="cab_rental_1_driver_amount" name="cab_rental_driver_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_rental_1_night_amount" name="cab_rental_night_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
										</tr>
										<tr class="cab_rental_tr" data-rental-id="2" id="cab_rental_tr_2">
											<td class="text-center">
												<span id="cab_rental_2_id">8H-80KM</span>
											</td>
											<td>
												<input type="hidden" class="form-control form-control-sm" id="cab_rental_2_pick" name="cab_rental_pick[]" value="full_day">
												<input type="number" class="form-control form-control-sm" placeholder="From (km)" id="cab_rental_2_from" name="cab_rental_from[]" value="0" />
											</td>

											<td>
												<input type="number" id="cab_rental_2_to" name="cab_rental_to[]" class="form-control form-control-sm" data-bind="number" placeholder="To (km)" value="80" />
											</td>
											<td>
												<input type="number" id="cab_rental_2_amount" name="cab_rental_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="16" />
											</td>
											<td>
												<input type="number" id="cab_rental_2_additional_amount" name="cab_rental_additional_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="12" />
											</td>
											<td>
												<input type="number" id="cab_rental_2_time_amount" name="cab_rental_time_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="2" />
											</td>
											<td>
												<input type="number" id="cab_rental_2_driver_amount" name="cab_rental_driver_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_rental_2_night_amount" name="cab_rental_night_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header white-text primary-color">
					Add Price's for Airport Taxi
				</div>
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover cabtable table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>S.No</th>
											<th>From (km) <span class="red-text">*</span></th>
											<th>To (km) <span class="red-text">*</span></th>
											<th>Price/km <span class="red-text">*</span></th>
											<th>Additional km fare (After)<span class="red-text">*</span></th>
											<th>Additional Ride Time fare (After)<span class="red-text">*</span></th>
											<th>Driver Allowance <span class="red-text">*</span></th>
											<th>Night Charges <span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr class="cab_tr" data-cab-id="1" id="cab_tr_1">
											<td>
												<a class="addMoreVehicle green-text" href="javascript:void(0);">
													<i class="fas fa-plus-circle"></i>
												</a>
											</td>
											<td class="text-center">
												<span id="cab_city_1_id">1</span>
											</td>
											<td>
												<input type="number" class="form-control form-control-sm" placeholder="From (km)" id="cab_city_1_from" name="cab_city_from[]">
											</td>

											<td>
												<input type="number" id="cab_city_1_to" name="cab_city_to[]" class="form-control form-control-sm" data-bind="number" placeholder="To (km)" />
											</td>
											<td>
												<input type="number" id="cab_city_1_amount_one_way" name="cab_city_amount_one_way[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_city_<?php echo $counter; ?>_additional_amount" name="cab_city_additional_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0.00" />
											</td>
											<td>
												<input type="number" id="cab_city_<?php echo $counter; ?>_time_amount" name="cab_city_time_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0.00" />
											</td>
											<td>
												<input type="number" id="cab_city_1_driver_amount" name="cab_city_driver_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="number" id="cab_city_1_night_amount" name="cab_city_night_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="col-md-12">
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                <input type="reset" class="btn btn-default btn-sm" value="Reset" />
            </div>
        </div>
    </div>
</form>