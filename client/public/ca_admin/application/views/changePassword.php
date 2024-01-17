<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Set a New password</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Your Information</div>  
	        <!--Card content-->
	        <div class="card-body">
			<div class="row">
					<div class="col-md-6">
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1">Your old Password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1">New Password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword2">Verify new Password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm" id="inputPassword2" placeholder="Verify New password" name="cNewPassword"
                                            maxlength="20" required>
                                    </div>
                                </div>
                            </div>
                        <!-- /.box-body -->

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            <div class="col-md-6">
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

                    <?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('nomatch'); ?>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>