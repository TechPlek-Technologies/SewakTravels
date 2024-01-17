<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>log-history" data-toggle="tooltip" data-placement="bottom" title="Log History">Log History</a>
            <span>/</span>
            <span>Download Backup Log Process</span>
        </h6>
    </div>
</div>
<!-- Heading -->


<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Please choose your sql or gz.sql file for the replacement process. (Select Replacement from server or select file must.)</div>  
	        <!--Card content-->
	        <div class="card-body">
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
                                <form role="form" action="<?php echo base_url() ?>logHistoryUploadFile" method="post" id="LoghistoryUpload" role="form" enctype="multipart/form-data"
                                    accept-charset="utf-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role">Log Table Spares</label>
                                                    <select class="form-control form-control-sm" id="optionfilebackup" name="optionfilebackup">
                                                        <option value="0">Select a Backup</option>
                                                        <?php
                                            if(!empty($backups))
                                            {
                                                    foreach ($backups as $k => $v)
                                                    {       
                                                    if (!is_array($v))
                                                    {
                                                    ?>
                                                            <option value="<?php echo $v ?>">
                                                                <?php echo $v ?>
                                                            </option>
                                                            <?php
                                                }
                                            }
                                            }
                                            ?>
                                                    </select>
												</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
												<label for="filebackup">Select file</label>
												<input type="file" id="filebackup" name="filebackup" class="form-control form-control-sm">
											</div>
										</div>
									</div>
					
                                    <!-- /.box-body -->

                                 <div class="card-footer text-center">
			<input type="submit" class="btn btn-primary" value="Load" />
			<input type="reset" class="btn btn-default" value="Reset" />
		</div>
                                </form>

                        </div>
        </div>
    </div>
</div> 