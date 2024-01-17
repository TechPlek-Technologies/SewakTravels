<style>
    @media(max-width:400px){
        .logo-custom-class img{
            height:50px;
        }
    }
</style>
<div class="header-wrapper fix">
    <div class="container">
        <a href="<?php echo base_url(); ?>" class="btn btn-theme-transparent"><i class="fa fa-long-arrow-left"></i></a>
        <a href="<?php echo base_url(); ?>" class="logo-custom-class"><img src="<?php echo base_url(); ?>assets/img/logo_2.png" alt="Sewak Travels" /></a>
        <ul class="sign-in-menu">
        <?php
            $isLoggedIn = $this->session->userdata('isLoggedIn');
            if (isset($isLoggedIn) || $isLoggedIn == TRUE) { ?>
            <li class="sign-in"><a href="<?php echo base_url(); ?>userEdit"><i class="fa fa-user"></i><span class="text">My Account</span></a></li>
            <li class="register active"><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-in"></i><span class="text">Log out</span></a></li>
        <?php } else { ?>

            <li class="sign-in"><a href="<?php echo base_url(); ?>loginMe"><i class="fa fa-user"></i><span class="text">Sign In</span></a></li>
            <li class="register active"><a href="<?php echo base_url(); ?>register"><i class="fa fa-sign-in"></i><span class="text">Register</span></a></li>
        <?php } ?>
        </ul>
    </div>
</div>