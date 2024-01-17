<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Edit Home Page</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editHomes" action="<?php echo base_url() ?>editHomes" method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-12">
            <?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if ($error) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php }
            $success = $this->session->flashdata('success');
            if ($success) { ?>
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
        <!--Grid column-->
        <div class="col-md-4 mb-3">
            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">City - Banner Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_heading">Banner Heading (City) <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Book a City Taxi to your destination in town" value="<?php echo $records[0]->banner_heading; ?>" id="banner_heading" name="banner_heading" required>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_description">Banner Description (City) <span class="red-text">*</span></label>
                                        <textarea class="form-control form-control-sm" id="banner_description" name="banner_description" rows="3" required><?php echo $records[0]->banner_description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-4 mb-3">
            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Outstation - Banner Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_heading2">Banner Heading (Outstation) <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Book a Outstation Taxi to your destination in town" value="<?php echo $records[0]->banner_heading2; ?>" id="banner_heading2" name="banner_heading2" required>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_description2">Banner Description (Outstation) <span class="red-text">*</span></label>
                                        <textarea class="form-control form-control-sm" id="banner_description2" name="banner_description2" rows="3" required><?php echo $records[0]->banner_description2; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-4 mb-3">
            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Rentals - Banner Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_heading3">Banner Heading (Rentals) <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Book a Rentals Taxi to your destination in town" value="<?php echo $records[0]->banner_heading3; ?>" id="banner_heading3" name="banner_heading3" required>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="banner_description3">Banner Description (Rentals) <span class="red-text">*</span></label>
                                        <textarea class="form-control form-control-sm" id="banner_description3" name="banner_description3" rows="3" required><?php echo $records[0]->banner_description3; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
<div class="col-md-8 mb-3">

            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">About Us Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_heading">About Us Heading <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="About Us" value="<?php echo $records[0]->about_heading; ?>" id="about_heading" name="about_heading" required>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_description">About Us Description <span class="red-text">*</span></label>
                                        <textarea class="form-control form-control-sm" id="about_description" name="about_description" rows="5" required><?php echo $records[0]->about_description; ?></textarea>
                                    </div>
                                </div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col-md-4 mb-3">

            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Fleets Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fleet_heading">Fleet Heading <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Meet our Awesome Fleet" value="<?php echo $records[0]->fleet_heading; ?>" id="fleet_heading" name="fleet_heading" required>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fleet_description">Fleet Description <span class="red-text">*</span></label>
                                        <textarea class="form-control form-control-sm" id="fleet_description" name="fleet_description" rows="5" required><?php echo $records[0]->fleet_description; ?></textarea>
                                    </div>
                                </div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        


		<div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header white-text primary-color">
                    <a class="white-text">
                        Services Details
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
<div class="row">
<div class="col-md-3">
<div class="col-md-12">
									<div class="form-group">
										<label for="service_heading">Services Heading <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm" placeholder="A car for every occasion" value="<?php echo $records[0]->service_heading; ?>" id="service_heading" name="service_heading" required>

									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="service_description">Service Description <span class="red-text">*</span></label>
										<textarea class="form-control form-control-sm" rows="5" id="service_description" name="service_description" required><?php echo $records[0]->service_description; ?></textarea>

									</div>
								</div>
</div>
<div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_one">Services One Name <span class="red-text">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="City Taxi" value="<?php echo $records[0]->service_one; ?>" id="service_one" name="service_one" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_one_description">Service One Description <span class="red-text">*</span></label>
                                <textarea class="form-control form-control-sm" rows="5" name="service_one_description" id="service_one_description" required><?php echo $records[0]->service_one_description; ?></textarea>

                            </div>
                        </div>

            </div>
        </div>
<div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_two">Services Two Name <span class="red-text">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="Outstation" value="<?php echo $records[0]->service_two; ?>" id="service_two" name="service_two" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_two_description">Service Two Description <span class="red-text">*</span></label>
                                <textarea class="form-control form-control-sm" rows="5" name="service_two_description" id="service_two_description" required><?php echo $records[0]->service_two_description; ?></textarea>

                            </div>
                        </div>
            </div>
        </div>
        <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_three">Services Three Name <span class="red-text">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="Rentals" value="<?php echo $records[0]->service_three; ?>" id="service_three" name="service_three" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_three_description">Service Three Description <span class="red-text">*</span></label>
                                <textarea class="form-control form-control-sm" rows="5" name="service_three_description" id="service_three_description" required><?php echo $records[0]->service_three_description; ?></textarea>

                            </div>
                        </div>
                    </div>
        </div>
</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header white-text primary-color">
                    <a class="white-text">
                        Features Details
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
<div class="row">
<div class="col-md-3">
<div class="col-md-12">
									<div class="form-group">
										<label for="feature_heading">Features Heading <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm" placeholder="A car for every occasion" value="<?php echo $records[0]->feature_heading; ?>" id="feature_heading" name="feature_heading" required>

									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="feature_description">Features Description <span class="red-text">*</span></label>
										<textarea class="form-control form-control-sm" id="feature_description" name="feature_description" rows="5" required><?php echo $records[0]->feature_description; ?></textarea>

									</div>
								</div>
</div>
<div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feature_one">Feature One Name <span class="red-text">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="Save Money & Your Safety First" value="<?php echo $records[0]->feature_one; ?>" id="feature_one" name="feature_one" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feature_one_description">Feature One Description <span class="red-text">*</span></label>
                                <textarea class="form-control form-control-sm" rows="5" name="feature_one_description" id="feature_one_description" required><?php echo $records[0]->feature_one_description; ?></textarea>

                            </div>
                        </div>

            </div>
        </div>
<div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feature_two">Feature Two Name <span class="red-text">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="Top Rated Driver-Partners" value="<?php echo $records[0]->feature_two; ?>" id="feature_two" name="feature_two" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feature_two_description">Feature Two Description <span class="red-text">*</span></label>
                                <textarea class="form-control form-control-sm" rows="5" name="feature_two_description" id="feature_two_description" required><?php echo $records[0]->feature_two_description; ?></textarea>

                            </div>
                        </div>
            </div>
        </div>
        <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feature_three">Feature Three Name <span class="red-text">*</span></label>
                                <input type="text" class="form-control form-control-sm" placeholder="24/7 Customer Support" value="<?php echo $records[0]->feature_three; ?>" id="feature_three" name="feature_three" required>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="feature_three_description">Feature Three Description <span class="red-text">*</span></label>
                                <textarea class="form-control form-control-sm" rows="5" name="feature_three_description" id="feature_three_description" required><?php echo $records[0]->feature_three_description; ?></textarea>

                            </div>
                        </div>
                    </div>
        </div>
</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="col-md-12">
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <input type="reset" class="btn btn-default" value="Reset" />
            </div>


        </div>
    </div>
</form>