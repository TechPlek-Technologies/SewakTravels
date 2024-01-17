<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>companyListing" data-toggle="tooltip" data-placement="bottom" title="Company Master">Company Master</a>
            <span>/</span>
            <span>Branch List</span>
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
            <div class="card-header white-text primary-color">Branch List</div>  
	        <!--Card content-->
	        <div class="card-body">
			<div class="table-responsive text-nowrap">
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

                <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
                  <thead>
                            <tr>
                                <th>Id</th>
								<th>Branch Name</th>
                                <th>Company Name</th>
								<th>Contact Person</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Landline</th>
								<!-- <th>PAN</th>
								<th>GSTIN</th> -->
								<th>Pincode</th>
								<th>Address</th>
								<th>City</th>
                                <th>State</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                  </thead>
                  <tbody>
                            <?php
                    if(!empty($branchRecords))
                    {
						$i=0;
                        foreach($branchRecords as $record)
                        {
                    ?>
							<tr>
								<td><?php echo ++$i; ?></td>
								<td><?php echo $record->name; ?></td>
								<td><?php echo $record->company_name; ?></td>
								<td><?php echo $record->contact_person; ?></td>
								<td><?php echo $record->email; ?></td>
								<td><?php echo $record->mobile; ?></td>
								<td><?php echo $record->landline; ?></td>
								<!-- <td><?php echo $record->pan; ?></td>
								<td><?php echo $record->gstin; ?></td> -->
								<td><?php echo $record->pincode; ?></td>
								<td><?php echo $record->address; ?></td>
								<td><?php echo $record->city; ?></td>
								
								<td><?php echo $record->statename; ?></td>
								<td><?=($record->statusId==1)?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">In-Active</span>'; ?></td>

								<td>
									<a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url().'editOldCompanyBranch/'.$record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
										<i class="fas fa-pencil-alt"></i>
									</a>&nbsp;
									<a class="btn-sm btn-outline-danger btn-rounded deleteCompanyBranch" href="#" data-id="<?php echo $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
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