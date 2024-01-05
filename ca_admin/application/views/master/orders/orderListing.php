<!-- Heading -->
<div class="card mb-3">
  <!--Card content-->
  <div class="card-body d-sm-flex justify-content-between">
    <h6 class="mb-sm-0 mt-1">
      <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
      <span>/</span>
      <span>Order Listings</span>
    </h6>
    <div class="col-md-6 text-right">
            <a class="btn btn-info btn-sm m-0" data-toggle="modal" data-target="#downloadOrder"  data-placement="bottom" title="Download Orders">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
    <!-- <div class="col-md-6 text-right">&nbsp;</div> -->
  </div>
</div>
<!-- Heading -->


<!--Grid row-->
<div class="row">
  <!--Grid column-->
  <div class="col-md-12">
    <!--Card-->
    <div class="card">
      <div class="card-header white-text primary-color">Order's List<span style="float:right;"><a href="<?php echo base_url(); ?>orders" data-toggle="tooltip" data-placement="bottom" title="Reload" style="color:#fff"><i class="fas fa-sync-alt"></i></a></span></div>
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
<!-- id="dataTables-example" -->
          <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
            <thead>
              <tr>
                <th>Id</th>
                <th>Order No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
				<th>Email Status</th>
				<th>SMS Status</th>
				<th>Booking Status</th>
				<!--<th>Address</th>
                <th>Pincode</th>
				<th>City</th>
                <th>State</th> -->
				<th>Cab Type</th>
				<th>Pickup Type</th>
				<th>Pickup Location</th>
				<th>Drop Location</th>
				<th>Pickup Date/Time</th>
				<th>Total Amount</th>
				<th>Paid Amount</th>
				<th>Remaining Amount</th>
				
                
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($records)) {
				  
				  //pre($records);
                $i = 0;
                foreach ($records as $record) {
                  ?>
                  <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><a  title="Order No." style="color:#4285F4;"><?php echo strtoupper($record->invoice_no); ?></a></td>
                    <!-- <td><a href="<?php echo base_url(); ?>order_details/<?php echo ucwords(strtolower($record->invoice_no)); ?>" title="Order No." style="color:#4285F4;"><?php echo strtoupper($record->invoice_no); ?></a></td> -->
                    <td><?php echo ucwords(strtolower($record->billing_name)); ?></td>
                    <td><?php echo strtolower($record->billing_email); ?></td>
                    <td><?php echo $record->billing_mobile ?></td>
					<td class="text-left"><?=($record->send_email == 1) ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Failed</span>'; ?> &nbsp;&nbsp;
					<?php
					if(!empty($record->billing_email) && $record->status == 'success'){ ?><span class="text-right">
					<a class="sendOrderEmail" href="javascript:void(0);" data-id="<?php echo $record->id; ?>" title="Send Email" data-toggle="tooltip" data-placement="bottom" title="Send Email">
                        <i class="fas fa-envelope" style="font-size:20px;"></i>
                    </a>
					</span>
					<?php } ?>
					</td>
					<td class="text-left"><?= ($record->send_otp == 1) ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Failed</span>'; ?> &nbsp;&nbsp;
					<?php if($record->status == 'success'){ ?>
					<span class="text-right">
						<a class="sendOrderMessage" href="javascript:void(0);" data-id="<?php echo $record->id; ?>" title="Send Message" data-toggle="tooltip" data-placement="bottom" title="Send Message">
							<i class="fas fa-sms" style="font-size:24px;"></i>
						</a>
					</span>
					<?php } ?>
					
					
					</td>
					<td class="text-center"><?= ($record->status == 'success') ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Failed</span>'; ?></td>
                    <td><?php echo $record->cab_type; ?></td>
                    <td><?php echo $record->pick_type; ?></td>
					<td><?php echo $record->pickup_location; ?></td>
					<td><?php echo $record->drop_location; ?></td>
					<td><?php echo $record->pickup_date.' '.$record->pickup_time; ?></td>
					
					<td><?php echo ($record->base_price - $record->discount) + $record->tax; ?></td>
					<td><?php echo $record->paid_amount; ?></td>
					<td><?php echo ($record->base_price - $record->discount + $record->tax) - $record->paid_amount; ?></td>
					
                    
                    <!-- <td>
                      <a class="btn-sm btn-outline-primary btn-rounded material-tooltip-main" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="View Vendor Details">
                        <i class="fas fa-eye"></i>
                      </a>&nbsp;
                      <a class="btn-sm btn-outline-info btn-rounded" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Edit Vendor">
                        <i class="fas fa-pencil-alt"></i>
                      </a>&nbsp;
                      <a class="btn-sm btn-outline-danger btn-rounded" href="javascript:void(0);" data-id="<?php echo $record->id; ?>" title="Delete Vendor" data-toggle="tooltip" data-placement="bottom" title="Delete Vendor">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td> -->
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

<!-- Download modal order detail start -->
<div class="modal fade" id="downloadOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Download Oders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>download-order" method="post">
      <div class="modal-body">
       <div class="row">
        <div class="col-md-4">
        <label for="exampleFormControlSelect1">Select Status:</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
            <option value="both">Both</option>
            <option value="success">Success</option>
            <option value="Pending">Failed</option>
            
          </select>
        </div>
        <div class="col-md-4">
        <label for="exampleFormControlSelect1">Start Date:</label>
        <input type="date" class="form-control" id="startdate" name="startdate" value="<?= date('Y-m-d')?>" aria-describedby="basic-addon3">
        </div>
        <div class="col-md-4">
        <label for="exampleFormControlSelect1">End Date:</label>
        <input type="date" class="form-control" id="enddate" name="enddate" value="<?= date('Y-m-d')?>" aria-describedby="basic-addon3">
        </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Download" >
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Download modal order detail end -->


<script>
    setInterval(function() {
                  window.location.reload();
                }, 120000);
</script>