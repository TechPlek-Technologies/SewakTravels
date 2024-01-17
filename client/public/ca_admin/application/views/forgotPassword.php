<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">
</head>
<body class="grey lighten-3 ">

  <!--Main layout-->
  <main>
    <div class="container-fluid">
<div class="row">
    <!--Grid column-->
    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

        <section class="form-elegant">
            <!--Form without header-->
            <div class="card ">
                <div class="card-body mx-4">
                    <!--Header-->
                    <div class="text-center">
                    <?php $this->load->helper('form'); ?>

                    <div class="row">
                      <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                      </div>
                    </div>
            <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        $send = $this->session->flashdata('send');
        $notsend = $this->session->flashdata('notsend');
        $unable = $this->session->flashdata('unable');
        $invalid = $this->session->flashdata('invalid');
        if($error)
        {
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php }

        if($send)
        {
            ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $send; ?>
                </div>
                <?php }

        if($notsend)
        {
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $notsend; ?>
                </div>
                <?php }
        
        if($unable)
        {
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $unable; ?>
                </div>
                <?php }

        if($invalid)
        {
            ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $invalid; ?>
                </div>
                <?php } ?>
				
				<h3 class="dark-grey-text mb-5">
                            <strong>I forgot my password</strong>
                        </h3>
                    </div>

                <form action="<?php echo base_url(); ?>resetPasswordUser" method="post">
                    <div class="md-form has-feedback">
                        <input type="email" class="form-control" name="login_email" required />
                        <label for="email">Email</label>
                    </div>

  
                        <div class="text-center mb-3">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit" />
                        </div>
                        <!-- /.col -->

                </form>
				<hr>
                <div class="card-text">
					<p><a href="<?php echo base_url() ?>">Sign in</a></p>
				</div>
<br>
                </div>
                <!--Footer-->
            </div>
            <!--/Form without header-->
        </section>
    </div>
    <!--Grid column-->
	
	<div class="col-lg-3 col-md-12"></div>

</div>
</main>
<!--Main layout-->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
</body>
</html>