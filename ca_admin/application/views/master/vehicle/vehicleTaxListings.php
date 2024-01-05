<!-- Heading -->
<div class="card mb-3">
  <!--Card content-->
  <div class="card-body d-sm-flex justify-content-between">
    <h6 class="mb-sm-0 mt-1">
      <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
      <span>/</span>
      <span>Vehicle MCD/TAX Master</span>
    </h6>
    <div class="col-md-6 text-right">
      <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewVehicleTax" data-toggle="tooltip" data-placement="bottom" title="Add New MCD/TAX">
        <i class="fas fa-plus mr-1"></i> MCD/TAX
      </a>
    </div>
  </div>
</div>
<!-- Heading -->


<!--Grid row-->
<div class="row">
  <!--Grid column-->
  <div class="col-md-6 mb-3">
    <!--Card-->
    <div class="card">
      <div class="card-header white-text primary-color">Vehicle's MCD List</div>
      <!--Card content-->
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
            <thead>
              <tr>
                <th>Id</th>
                <th>Vehicle No.</th>
                <th>State</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($mcdRecords)) {
                $i = 0;
                foreach ($mcdRecords as $record) {
                  $vehicle = getVehicle($record->id);
                  ?>
                  <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $record->vehicle_no; ?></td>
                    <td><?php
                            foreach ($states as $rl) {
                              if ($rl->id == $record->state_id) {
                                echo ucwords(strtolower($rl->state));
                              }
                            }
                            ?>
                    </td>
                    <td><?php echo ($record->type == 1) ? 'Per Trip' : 'Monthly'; ?></td>
                    <td><?php echo $record->amount; ?></td>
                    <td><?php echo $record->start_date; ?></td>
                    <td><?php echo $record->end_date; ?></td>
                    <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                    <td>
                      <a class="btn-sm btn-outline-info btn-rounded" href="<?php echo base_url() . 'editOldVehicleMcd/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit MCD">
                        <i class="fas fa-pencil-alt"></i>
                      </a>&nbsp;
                      <a class="btn-sm btn-outline-danger btn-rounded deleteVehicleMcd" href="#" data-id="<?php echo $record->id; ?>" title="Delete MCD" data-toggle="tooltip" data-placement="bottom" title="Delete MCD">
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
  <div class="col-md-6">
    <!--Card-->
    <div class="card">
      <div class="card-header white-text primary-color">Vehicle's TAX List</div>
      <!--Card content-->
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
            <thead>
              <tr>
                <th>Id</th>
                <th>Vehicle No.</th>
                <th>State</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($taxRecords)) {
                $i = 0;
                foreach ($taxRecords as $record) {
                  $vehicle = getVehicle($record->id);
                  ?>
                  <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $record->vehicle_no; ?></td>
                    <td><?php
                            foreach ($states as $rl) {
                              if ($rl->id == $record->state_id) {
                                echo ucwords(strtolower($rl->state));
                              }
                            }
                            ?>
                    </td>
                    <td><?php echo ($record->type == 1) ? 'Per Trip' : 'Monthly'; ?></td>
                    <td><?php echo $record->amount; ?></td>
                    <td><?php echo $record->start_date; ?></td>
                    <td><?php echo $record->end_date; ?></td>
                    <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                    <td>
                      <a class="btn-sm btn-outline-info btn-rounded" href="<?php echo base_url() . 'editOldVehicleTax/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Tax">
                        <i class="fas fa-pencil-alt"></i>
                      </a>&nbsp;
                      <a class="btn-sm btn-outline-danger btn-rounded deleteVehicleTax" href="#" data-id="<?php echo $record->id; ?>" title="Delete TAX" data-toggle="tooltip" data-placement="bottom" title="Delete TAX">
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