<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>vendorListing">Vendor List</a>
            <span>/</span>
            <span>Upload Vehicle Docs</span>
        </h6>
    </div>
</div>
<!-- Heading -->

    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
	<!-- form start -->
    <?php $this->load->helper("form"); ?>
     <form role="form" enctype="multipart/form-data" action="<?php echo base_url() ?>upload_vehicle_files" method="post" class="imageUploadForm">
	 <input type="hidden" value="<?=$id?>" name="id">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Upload Vehicle Docs</div>  
	        <!--Card content-->
	        <div class="card-body">
                <div class="row">
					<div class="col-md-12">
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
                        <?php }
                        $success = $this->session->flashdata('success');
                        if($success){ ?>
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
                        <div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Photo of the ARCY:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files0" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_1" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Photo of the Insurance:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files1" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_2" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Photo of the Polution:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files2" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_3" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Fitness Certificate:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files3" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_4" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						
						
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">AADHAR Card:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files4" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_5" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Driving Licence:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files5" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_6" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Police Verification:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files6" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_7" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="text-center font-weight-bold">Driver Photo:</label>
							</div>
							<div class="col-sm-4 text-left">
								<input type="file" name="upl_files7" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png, .doc, .docx, .pdf, .xlsx">
							</div>
							<div class="col-sm-2 text-left">
							 <input type="submit" id="doc_8" class="btn btn-info btn-sm btn-mini" value="Upload">
							</div>
                        </div>	
					</div>
				</div>
			</div>
		</div>
    <!--
	<div class="card-footer text-center">
        <input type="submit" class="btn btn-primary" value="Submit" />
        <input type="reset" class="btn btn-default" value="Reset" />
    </div>	
	-->
		
		</form>
	</div>
</div>