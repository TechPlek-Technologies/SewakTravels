<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>vehicleReports">Vehicle Reports</a>
            <span>/</span>
            <span>View Vehicle Report</span>
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
            <div class="card-header white-text primary-color">Vehicle Reports List</div>  
	        <!--Card content-->
	        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
						<div class="table-responsive text-nowrap">

							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							  <thead>
										<tr>
											<th>Id</th>
											<th>Company Name</th>
											<th>Trip</th>
											<th>Rate</th>
											<th>Amount</th>
										</tr>
							  </thead>
							  <tbody>
								<?php
								//pre($vehicleReport);
								//pre($vehicleCompany);
								
								$sub_amount = 0;
								$total = 0;
								
								if(!empty($vehicleCompany))
								{
									$i=0;
									foreach($vehicleCompany as $record)
									{
										$sub_amount = ($record->total_trip*$record->cab_rate_vendor);
										
										$total += $sub_amount;
								?>
									<tr>
										<td><?php echo ++$i; ?></td>
										<td><?php echo $record->company_name; ?></td>
										<td><?php echo $record->total_trip; ?></td>
										<td><?php echo $record->cab_rate_vendor; ?></td>
										<td><?php echo $sub_amount; ?></td>
									</tr>
									<tr>
									<td colspan="2" class="text-right"><strong>Total:</strong></td>
									<td>---</td>
									<td>---</td>
									<td><i class="fas fa-rupee-sign"></i> <?php echo $total; ?>/-</td>
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
    </div>
</div>