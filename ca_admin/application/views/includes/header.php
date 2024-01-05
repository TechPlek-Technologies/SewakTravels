<?php date_default_timezone_set('Asia/Kolkata');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://sewaktravels.com/assets/img/favicon.png">-->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon1.png" />
  <title><?php echo $pageTitle; ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/css/mdb-2.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/addons/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/addons/datatables-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.0/css/lightbox.min.css" integrity="sha256-2pv++Afvwfu8oLsnXGxbaK28UnSYFHDKDTuCixzWvRE=" crossorigin="anonymous" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" />


  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/daterangepicker.css" />

  <link href="<?php echo base_url(); ?>assets/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>


  <style>
    .error {
      color: red;
      font-weight: normal;
    }

    .white-skin .navbar .navbar-nav .nav-item .dropdown-menu a:active,
    .white-skin .navbar .navbar-nav .nav-item .dropdown-menu a:focus,
    .white-skin .navbar .navbar-nav .nav-item .dropdown-menu a:hover {
      background-color: #2a75f3 !important;
    }

    #loading {
      background: #000000;
      opacity: 0.2;
      width: 100%;
      height: 100%;
      top: 0px;
      left: 0px;
      position: fixed;
      display: block;
      z-index: 99;
      display: none;
    }

    #loading-image {
      position: absolute;
      top: 25%;
      left: 25%;
      z-index: 100;
    }

    .err {
      font-size: 11px;
      color: #f00;
    }

    .errborder {
      border: 1px solid #f00 !important;
    }
  </style>
  <!-- Datatables style -->



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file: -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datetimepicker.min.css" />
   
  <script type="text/javascript">
    var baseURL = "<?php echo base_url(); ?>";
    var apiURL = "<?php echo API_URL; ?>";

    function loanamount() {
      var original = document.getElementById("loan_amount").value;
      var interest = document.getElementById("loan_rate").value;
      var year = document.getElementById("loan_period").value;

      var interest1 = (Number(original) * Number(interest) * Number(year)) / 100;
      var total = Number(original) + Number(interest1);

      var emi = total / (year * 12);
      document.getElementById("total_paid").value = total;
      document.getElementById("emi_per_month").value = emi.toFixed(2);

    }

    function copyToPickup() {
      var form = document.forms['airoplane_form'];
      form.elements['pickup_location'].value = form.elements['drop_location'].value;
      form.elements['drop_location'].value = form.elements['pickup_location'].value;

      return;
    }
  </script>
  <script type="text/javascript">
    var baseURL = "<?php echo base_url(); ?>";


    function loanamount() {
      var original = document.getElementById("loan_amount").value;
      var interest = document.getElementById("loan_rate").value;
      var year = document.getElementById("loan_period").value;

      var interest1 = (Number(original) * Number(interest) * Number(year)) / 100;
      var total = Number(original) + Number(interest1);

      var emi = total / (year * 12);
      document.getElementById("total_paid").value = total;
      document.getElementById("emi_per_month").value = emi.toFixed(2);

    }
  </script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
</head>
<!-- grey lighten-3 white-skin -->

<body class="fixed-sn grey lighten-3 white-skin" data-spy="scroll" data-target="#scrollspy" data-offset="15" aria-busy="true">

  <!--
<div class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>
-->

  <!--Main Navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn">
          <div class="text-center">
          <!-- <a href="#" class="pl-0 logo-wrapper "><img src="<?php echo base_url(); ?>assets/img/sewak-cabs-logo1.png" class="img-fluid" alt="Logo"></a> -->
           
            <a href="#" class="pl-0 logo-wrapper "><img src="https://sewaktravels.com/assets/img/logo.png" class="img-fluid" alt="Logo"></a>
            
          </div>
        </li>

        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a href="<?php echo base_url(); ?>dashboard" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <i class="w-fa fas fa-chart-pie mr-3"></i>Dashboard
              </a>
            </li>
			<li>
              <a href="<?php echo base_url(); ?>orders" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Orders">
                <i class="w-fa fas fa-chart-pie mr-3"></i>Orders
              </a>
            </li>

            <?php
            // Rol definetion in application/config/constants.php
            if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
              ?>
               <li><a href="<?php echo base_url(); ?>blogs" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Blogs">
                  <i class="w-fa fas fa-taxi mr-3"></i>Blogs
                </a></li>
              <!-- <li><a href="<?php echo base_url(); ?>vendorListing" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="New Vehicle Attach">
                  <i class="w-fa fas fa-taxi mr-3"></i>New Vehicle Attach
                </a></li> -->
              <!-- <li><a href="<?php echo base_url(); ?>addNewVehicleTax" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Vehicle TAX Details">
                  <i class="w-fa fas fa-taxi mr-3"></i>Vehicle TAX
                </a></li> -->
              <!-- <li><a href="<?php echo base_url(); ?>addNewVendorCharge" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Vendor PF/ESI Details">
                  <i class="w-fa fas fa-user mr-3"></i>Vendors PF/ESI
                </a></li> -->

              <!-- <li>
                <a href="<?php echo base_url(); ?>cabCompanyListing" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Cab Rate">Cab Rate</a>
              </li> -->


              <li>
                <a class="collapsible-header waves-effect arrow-r" data-toggle="tooltip" data-placement="right" title="Masters">
                  <i class="w-fa fas fa-table mr-3"></i>Masters<i class="fas fa-angle-down rotate-icon"></i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <!-- <li>
                      <a href="<?php echo base_url(); ?>companyListing" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Company Details">Company Details</a>
                    </li> -->
                    <!-- <li>
                      <a href="<?php echo base_url(); ?>cabCompanyListing" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Cab Rate">Cab Rate</a>
                    </li> -->
					<li>
                      <a href="<?php echo base_url(); ?>couponListings" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Coupon Master">Coupon Master</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>taxs" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Tax Master">Tax Master</a>
                    </li>


                    <!-- <li>
                      <a href="<?php echo base_url(); ?>vehicleTypes" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Vehicle Types">Vehicle Types</a>
                    </li> -->
                    <!-- <li>
                      <a href="<?php echo base_url(); ?>zoneTypesListing" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Zone Masters">Zone Masters</a>
                    </li> -->
                  </ul>
                </div>
              </li>
              <!-- <li>
                <a class="collapsible-header waves-effect arrow-r" data-toggle="tooltip" data-placement="right" title="Masters">
                  <i class="w-fa fas fa-table mr-3"></i>Travel Masters<i class="fas fa-angle-down rotate-icon"></i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a href="<?php echo base_url(); ?>travelingTypesListing" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Traveling Type">Traveling Type</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>travelingVehiclesListing" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Traveling Vehicle Listings">Traveling Vehicle's</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>travelingPackagesListing" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Traveling Packages">Traveling Packages</a>
                    </li>
                  </ul>
                </div>
              </li> -->
            <?php }
            if ($role == ROLE_ADMIN) { ?>
              <!-- <li>
                <a href="<?php echo base_url(); ?>cabRosterListing" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Cab Billing">
                  <i class="w-fa fas fa-taxi mr-3"></i>Cab Billing
                </a>
              </li> -->
              <!-- <li>
                <a class="collapsible-header waves-effect arrow-r" data-toggle="tooltip" data-placement="right" title="Reports Master">
                  <i class="w-fa fas fa-file-alt mr-3"></i>Reports Master<i class="fas fa-angle-down rotate-icon"></i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a href="<?php echo base_url(); ?>vehicleReports" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Cab Reports">Cab Reports</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>vendorWiseReports" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Vendor Wise Reports">Vendor Wise Reports</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>reports" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Reports">Reports</a>
                    </li>
                  </ul>
                </div>
              </li> -->
              <!-- <li>
                <a href="<?php echo base_url(); ?>advanceListing" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Advance Details">
                  <i class="w-fa fas fa-rupee-sign mr-3"></i>Advance Details</a>
              </li> -->
			  <li>
                <a href="<?php echo base_url(); ?>cabListing" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Cab/Vehicle Details">
                  <i class="w-fa fas fa-taxi mr-3"></i>Cab/Vehicle Details</a>
              </li>
 <li>
                <a class="collapsible-header waves-effect arrow-r" data-toggle="tooltip" data-placement="right" title="Pages">
                  <i class="w-fa fas fa-table mr-3"></i>Pages<i class="fas fa-angle-down rotate-icon"></i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <li>
						<a href="<?php echo base_url(); ?>editHome" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Home Page">Home Page</a>
                    </li>
					<li>
						<a href="<?php echo base_url(); ?>editPage/privacy_policy" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Home Page">Privacy Policy</a>
                    </li>
					<li>
						<a href="<?php echo base_url(); ?>editPage/refund_policy" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Refund Policy">Refund Policy</a>
                    </li>
					<li>
						<a href="<?php echo base_url(); ?>editPage/terms_conditions" class="waves-effect" data-toggle="tooltip" data-placement="right" title="Terms and Condiitons">Terms and Condiitons</a>
                    </li>
					<li>
						<a href="<?php echo base_url(); ?>editPage/faq" class="waves-effect" data-toggle="tooltip" data-placement="right" title="FAQ's">FAQ's</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>userListing" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Users Details">
                  <i class="w-fa fas fa-users mr-3"></i>Users</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>log-history" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Log Records">
                  <i class="w-fa fas fa-database mr-3"></i>Log Records
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>log-history-upload" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Replacement">
                  <i class="w-fa fas fa-exchange-alt mr-3"></i>Replacement
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>log-history-backup" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Log Replacement">
                  <i class="w-fa fas fa-sync mr-3"></i>Log Replacement
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>offers" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Offer Cards">
                  <i class="w-fa fas fa-credit-card mr-3"></i>Offers Cards
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>quotation" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Quotation">
                  <i class="w-fa fas fa-credit-card mr-3"></i>Quotation
                </a>
              </li>
              
              <li>
                <a href="<?php echo base_url(); ?>partner" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="right" title="Partner">
                  <i class="w-fa fas fa-user mr-3"></i>Partner
                </a>
              </li>
              
            <?php } ?>



          </ul>
        </li>
        <!-- Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav top-nav-collapse">


      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>

      <!-- Breadcrumb -->
      <div class="breadcrumb-dn mr-auto">
        <p>Sewaktravels</p>
      </div>



      <!-- Navbar links -->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">


        <!-- Dropdown -->
        <li class="nav-item dropdown notifications-nav">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-history"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item waves-effect waves-light" href="#">
              <span>Last Login :</span>
              <span class="float-right"><i class="fas fa-history" aria-hidden="true"></i> <?= empty($last_login) ? "First Introduction" : $last_login; ?></span>
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle border border-light rounded waves-effect waves-light" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-user"></i><span class="d-none d-lg-inline-block ml-2"><?php echo $name; ?></span></a>
          <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="userDropdown">
            <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url(); ?>userEdit">
              <i class="fas fa-user-cog mr-2"></i>Account settings
            </a>
            <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url(); ?>adminCompanyListing">
              <i class="fas fa-building mr-2"></i>Company settings
            </a>
            <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url(); ?>logout">
              <i class="fas fa-sign-out-alt mr-2" aria-hidden="true"></i>Log out
            </a>
          </div>
        </li>
      </ul>
      <!-- Navbar links -->
    </nav>


  </header>
  <!--Main Navigation-->
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-3 mx-lg-2">
    <div class="container-fluid mt-5">