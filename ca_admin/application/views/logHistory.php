<!-- Heading -->
<div class="card mb-3">
  <!--Card content-->
  <div class="card-body d-sm-flex justify-content-between">
    <h6 class="mb-sm-0 mt-1">
      <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
      <span>/</span>
      <span>User Log History</span>
      </h4>
      <a class="btn btn-danger btn-sm m-0" href="<?php echo base_url(); ?>backupLogTable" data-toggle="tooltip" data-placement="bottom" title="Backup and Delete">Backup and Delete</a>
  </div>
</div>

<!-- Heading -->
<!--Grid row-->
<div class="row">
  <!--Grid column-->
  <div class="col-md-12">
    <!--Card-->
    <div class="card">
      <div class="card-header white-text primary-color">Your log table size:
        <?php
        if (isset($dbinfo->total_size)) {
          echo $dbinfo->total_size;
        } else {
          echo '0';
        }

        ?>
        MB</div>
      <!--Card content-->
      <div class="card-body table-responsive text-nowrap">
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
              <th>ID</th>
              <th>User Name</th>
              <th>Process</th>
              <th>Process Function</th>
              <th>User Role ID</th>
              <th>User Role</th>
              <th>User IP</th>
              <th>Browser</th>
              <th>Browser All information</th>
              <th>Platform</th>
              <th>Date and Time</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($userRecords)) {
              foreach ($userRecords as $record) {
                ?>
                <tr>
                  <td><?php echo $record->id ?></td>
                  <td><?php echo $record->userName ?></td>
                  <td><?php echo $record->process ?></td>
                  <td><?php echo $record->processFunction ?></td>
                  <td><?php echo $record->userRoleId ?></td>
                  <td><?php echo $record->userRoleText ?></td>
                  <td><?php echo $record->userIp ?></td>
                  <td><?php echo $record->userAgent ?></td>
                  <td><?php echo $record->agentString ?></td>
                  <td><?php echo $record->platform ?></td>
                  <td><?php echo $record->createdDtm ?></td>
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