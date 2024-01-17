<?php

$userId = '';
$name = '';
$email = '';
$mobile = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $name = $uf->name;
        $email = $uf->email;
        $mobile = $uf->mobile;
    }
}


?>
<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Account settings</span>
        </h6>
    </div>
</div>
<!-- Heading -->


<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Your Information</div>  
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
					<div class="col-md-12">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateUser" action="<?php echo base_url() ?>updateUser" method="post" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Full name <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" value="<?php echo $name; ?>" id="fname" name="fname" maxlength="128">
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required email" id="email" value="<?php echo $email; ?>" name="email"
                                            maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="oldpassword">Old password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm required" placeholder="Old password" id="oldpassword" name="oldpassword" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">New password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm required equalTo" placeholder="New password" id="cpassword" name="cpassword" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword2">Verify New password <span class="red-text">*</span></label>
                                        <input type="password" class="form-control form-control-sm required equalTo" placeholder="New password repeat" id="cpassword2" name="cpassword2" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Phone number <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required digits" id="mobile" value="<?php echo $mobile; ?>" name="mobile" maxlength="10">
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
            
            
        </div>
	</div>
	</div>
</div>
</div>