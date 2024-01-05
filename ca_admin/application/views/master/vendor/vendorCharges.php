<!-- Heading -->
<div class="card mb-3">
  <!--Card content-->
  <div class="card-body d-sm-flex justify-content-between">
    <h6 class="mb-sm-0 mt-1">
      <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
      <span>/</span>
      <span>Vendor Master</span>
    </h6>
    <div class="col-md-6 text-right">
      <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewVehicle" data-toggle="tooltip" data-placement="bottom" title="Add New Vehicle">
        <i class="fas fa-plus"></i> Add New Vehicle
      </a>
      <a class="btn btn-secondary btn-sm m-0" href="<?php echo base_url(); ?>addNewVendor" data-toggle="tooltip" data-placement="bottom" title="Add New Vendor">
        <i class="fas fa-plus"></i> Add New Vendor
      </a>
    </div>
  </div>
</div>
<!-- Heading -->


<!--Grid row-->
<div class="row">
  <!--Grid column-->
  <div class="col-md-12">
    <!--Card-->
    <div class="card">
      <div class="card-header white-text primary-color">Vehicle's List</div>
      <!--Card content-->
      <div class="card-body">
        <div class="table-responsive text-nowrap">
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
          <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Company Name</th>
                <!-- <th>Email</th> -->
                <th>Mobile</th>
                <th>City</th>
                <th>State</th>
                <th>Status</th>
                <th>Total Vehicles</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($vendorRecords)) {
                $i = 0;
                foreach ($vendorRecords as $record) {
					$vehicle = getVehicle($record->id);
					
					
                  ?>
                  <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo ucwords(strtolower($record->name)); ?></td>
                    <td><?php echo $record->company_name; ?></td>
                    <!-- <td><?php echo $record->email; ?></td> -->
                    <td><?php echo $record->mobile ?></td>
                    <td><?php echo $record->city; ?></td>
                    <td><?php echo $record->statename; ?></td>
                    <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                    <td><span class="badge badge-primary" data-toggle="tooltip" data-placement="right" title="<?php foreach ($vehicle as $row){
						echo $vehicles[] = $row->vehicle_no.', ';
					} ?>"><?php echo $record->total_vehicles; ?></span></td>
                    <td>
                      <a class="btn-sm btn-outline-primary btn-rounded material-tooltip-main" href="<?php echo base_url() . 'viewVendor/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="View Vendor Details">
                        <i class="fas fa-eye"></i>
                      </a>&nbsp;
                      <a class="btn-sm btn-outline-info btn-rounded" href="<?php echo base_url() . 'editOldVendor/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Vendor">
                        <i class="fas fa-pencil-alt"></i>
                      </a>&nbsp;
                      <a class="btn-sm btn-outline-danger btn-rounded deleteVendor" href="#" data-id="<?php echo $record->id; ?>" title="Delete Vendor" data-toggle="tooltip" data-placement="bottom" title="Delete Vendor">
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