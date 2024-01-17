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
            <div class="card-header white-text primary-color">Vendor Reports List</div>  
	        <!--Card content-->
	        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
						<div class="table-responsive text-nowrap">

							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							  <thead>
								<tr>
									<th>Id</th>
									<th>Vendor Name</th>
									<th>Company Name</th>
									<th>Total Trip</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
								if(!empty($vendorReport))
								{
									$i=0;
									foreach($vendorReport as $record)
									{
								?>
									<tr>
										<td><?php echo ++$i; ?></td>
										<td><?php echo $record->name; ?></td>
										<td><?php echo ucwords(strtolower($record->company_name)); ?></td>										
										<td><?php echo $record->total_trip; ?></td>
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