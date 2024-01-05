<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>userListing">User's</a>
            <span>/</span>
            <span>Add New User</span>
        </h6>
    </div>
</div>
<!-- Heading -->
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter User Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-8">
					<!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Full Name <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="red-text">*</span></label>
                                        <input type="email" class="form-control form-control-sm required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm required" id="password" name="password" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Verify Password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm required equalTo" id="cpassword" name="cpassword" maxlength="20" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Phone Number <span class="red-text">*</span></label>
                                        <input type="tel" class="form-control form-control-sm required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Authority <span class="red-text">*</span></label>
                                        <select class="form-control form-control-sm required" id="role" name="role" required>
                                            <option value="0">Select Authority</option>
                                            <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->role ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
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
				<div class="col-md-4">
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>