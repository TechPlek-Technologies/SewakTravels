<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>vendorListing" data-toggle="tooltip" data-placement="bottom" title="Vendor List">Vendor List</a>
            <span>/</span>
            <span>Vendor Details</span>
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
            <div class="card-header white-text primary-color">Vendor Details</div>  
	        <!--Card content-->
	        <div class="card-body">
			
			
			<div class="col-md-12">                    
						<div class="row">
							<div class="col-md-4">
								<label class="font-weight-bold">Name: </label>
								<?php echo $vendorRecords[0]->salutation.' '.$vendorRecords[0]->name; ?>										
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">Company Name: </label>
								<?php echo $vendorRecords[0]->company_name; ?>
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">Email: </label>
								<?php echo $vendorRecords[0]->email; ?>
							</div>							 
						</div>
						<div class="row">
							<div class="col-md-4">
								<label class="font-weight-bold">Mobile</label>
								<?php echo $vendorRecords[0]->mobile; ?>
							</div>						
							<div class="col-md-4">
								<label class="font-weight-bold">Pincode: </label>
								<?php echo $vendorRecords[0]->pincode; ?>
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">Bank Name: </label>
								<?php echo $vendorRecords[0]->bank_name; ?>
							</div>
						</div>
							
						<div class="row">							                                
							<div class="col-md-4">
								<label class="font-weight-bold">PAN: </label>
								<?php echo $vendorRecords[0]->pan; ?>							
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">Address: </label>
								<?php echo $vendorRecords[0]->address; ?>
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">A/C No.: </label>
								<?php echo $vendorRecords[0]->account_number; ?>
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-4">
								<label class="font-weight-bold">GSTIN: </label>
								<?php echo $vendorRecords[0]->gstin; ?> 
							</div>	
							<div class="col-md-4">
								<label class="font-weight-bold">City: </label>
								<?php echo $vendorRecords[0]->city; ?>
							</div>
							
							<div class="col-md-4">
								<label class="font-weight-bold">Branch: </label>
								<?php echo $vendorRecords[0]->branch_name; ?>
							</div>							
							
						</div>
						<div class="row">
							
							
							
							
							<div class="col-md-4">
								<label class="font-weight-bold">Office Charge: </label>
								<?php echo $vendorRecords[0]->office_charge; ?> 
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">State: </label>
								<?php echo $vendorRecords[0]->statename; ?>
							</div>
							<div class="col-md-4">
								<label class="font-weight-bold">IFSC: </label>
								<?php echo $vendorRecords[0]->ifsc_code; ?>
							</div>							
						</div>
					</div>
					
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="card">
            <div class="card-header white-text primary-color">Vehicle Details</div>  
	        <!--Card content-->
	        <div class="card-body">
			
			<div class="table-responsive text-nowrap">
                <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                  <thead>
                            <tr>
                                <th>Id</th>                              
                                <th>Vehicle No.</th>
								<th>Mobile</th>
								<th>Fitness Doc</th>								
								<th>Fitness Exp. Date</th>
								<th>Insurance Doc</th>
								<th>Insurance Exp. Date</th>
								<th>Polution Doc</th>
								<th>Polution Exp. Date</th>
								<th>ARCY Doc</th>
                                <th>GPS Rate</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                  </thead>
                  <tbody>
                   <?php 
                    if(!empty($vehicleRecords))
                    {
						$i=0;
                        foreach($vehicleRecords as $record)
                        {
                    ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
									<td><?php echo $record->vehicle_no; ?></td>
									<td><?php echo $record->mobile; ?></td>
									<td>
									<?php if(!empty($record->fitness_image)){ ?>
										<a href="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->fitness_image; ?>" data-lightbox="roadtrip">
											<img src="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->fitness_image; ?>" alt="Fitness Doc" class="img-fluid"/>
										</a>
									<?php } ?>
									</td>
                                    <td><?php echo $record->fitness_expiry_date; ?></td>
									<td>
									<?php if(!empty($record->insurance_image)){ ?>
										<a href="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->insurance_image; ?>" data-lightbox="roadtrip">
											<img src="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->insurance_image; ?>" alt="Insurance Doc" class="img-fluid"/>
										</a>
									<?php } ?>
									</td>
									<td><?php echo $record->insurance_expiry_date ?></td>
									<td>
									<?php if(!empty($record->polution_image)){ ?>
										<a href="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->polution_image; ?>" data-lightbox="roadtrip">
											<img src="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->polution_image; ?>" alt="Polution Doc" class="img-fluid"/>
										</a>
									<?php } ?>
									</td>
                                    <td><?php echo $record->polution_expiry_date; ?></td>
									<td>
									<?php if(!empty($record->arcy_image)){ ?>
										<a href="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->arcy_image; ?>" data-lightbox="roadtrip">
											<img src="<?php echo base_url(); ?>upload/vehicle/images/<?php echo $record->arcy_image; ?>" alt="ARCY Doc" class="img-fluid"/>
										</a>
									<?php } ?>
									</td>
                                    <td><?php echo $record->gps_rate; ?></td>
                                    <td><?=($record->statusId==1)?'Active':'In-Active'; ?></td>

                                    <td class="text-center">
										<!-- <a class="btn btn-sm btn-primary" href="<?php echo base_url().'viewVendor/'.$record->id; ?>" title="Edit">
                                            <i class="fas fa-eye"></i>
                                        </a> -->
										<a class="btn btn-sm btn-primary" href="<?php echo base_url().'uploadVehicleLogo/'.$record->id; ?>" data-vehicle-id="<?=$record->id?>" title="Upload Document" data-toggle="tooltip" data-placement="bottom" title="Upload Document">
                                            <i class="fas fa-upload"></i>
                                        </a>
										<!-- <a class="btn btn-sm btn-primary " href="" data-toggle="modal" data-target="#modalUploadDoc" data-vehicle-id="<?=$record->id?>" title="Upload Document">
                                            <i class="fas fa-upload"></i>
                                        </a> -->
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOldVehicle/'.$record->id; ?>" title="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit Vehicle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url().'deleteVehicle/'.$record->id; ?>" title="Delete" data-toggle="tooltip" data-placement="bottom" title="Delete Vehicle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
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
<!--
<div class="modal fade" id="modalUploadDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Upload Doc Files</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="uploadVehicleLogo">
	  <div class="modal-body mx-3">	
		<div class="form-group">
			<label for="arcyfile">ARCY File</label>
			<input type="file" class="form-control form-control-sm" id="arcyfile" name="arcyfile">
		</div>
		<div class="form-group">
			<label for="insurancefile">Insurance File</label>
			<input type="file" class="form-control form-control-sm" id="insurancefile" name="insurancefile">
		</div>
		<div class="form-group">
			<label for="polutionfile">Polution File</label>
			<input type="file" class="form-control form-control-sm" id="polutionfile" name="polutionfile">
		</div>		

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-indigo" id="btn_upload" type="submit">Upload <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
	  </form>
    </div>
  </div>
</div> -->