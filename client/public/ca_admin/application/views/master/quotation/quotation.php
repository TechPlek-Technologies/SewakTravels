 <link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet" type="text/css" />

 <!--<link href="<?php echo base_url(); ?>assets/css/quote.css" rel="stylesheet" type="text/css" />-->

<style>

.form-item.c2 .form-control {

    font-size: 16px !important;

    padding-top: 0px !important;

}

.form-item.a1 .form-control {

    font-size: inherit !important;

    padding-top: 0px !important;

}

.home-form {

    padding: 0;

}

.home-form .form-button {

    font-size:inherit;

    width:200px;

    position:relative;

    left: auto;

}

.dashboard-section .nav-tabs li.nav-item a{

    background: #eee;

    border-right: 1px solid #ddd;



}

input[type="date"]::-webkit-calendar-picker-indicator {

    background: transparent;

    bottom: 0;

    color: transparent;

    cursor: pointer;

    height: auto;

    left: 0;

    position: absolute;

    right: 0;

    top: 0;

    width: auto;

}



input[type="time"]::-webkit-calendar-picker-indicator {

    background: transparent;

    bottom: 0;

    color: transparent;

    cursor: pointer;

    height: auto;

    left: 0;

    position: absolute;

    right: 0;

    top: 0;

    width: auto;

}

@media(max-width:370px){

    .dashboard-section .card-body{

        padding: .75rem;

    }

    .dashboard-section .nav-tabs li.nav-item a{

        padding: 12px 10px;

    }

}

</style>

<!-- New code by surya -->
<!-- <style>
    #tawkchat-iframe-container { width:0, height:0 }
    </style>
<iframe src="https://sewaktravels.com/" style="border: none;" height="500" width="1280" title="Iframe Example"></iframe>

    <script>
    $(document).ready(function () {

        window.onbeforeprint = function () {
    if (Tawk_API) {
        Tawk_API.hideWidget();
        setTimeout( function(){
        Tawk_API.showWidget();
        }, 1000 );
    }
};

    $('iframe').on('load', function() {
        $("iframe").contents().find(".sticky-wrapper,.testimonials,.footer-widgets,.footer-meta,.dark,.popup-btn,.tawk-button,.caption-title,.caption-subtitle,.tawk-min-container,.tawk-button-circle").css("display", "none");
    }); 

    $('iframe').on('load', function() {
        $("iframe").contents().find("#about,#drivers1,#slider-bottom-carousel,#cars,#card4,#sticky").css("display", "none");
    }); 
    $('iframe').on('load', function() {
        $("iframe").contents().find(".caption").css("background-color", "#e1e1e1");
    }); 

    $('iframe').on('load', function() {
        $("iframe").contents().find(".tawk-button-circle").css("background", "#f5f5dc00");
    }); 
    
});



    </script> -->
<!-- Ne code by surya -->


 <div class="section  dashboard-section" style="margin-bottom:100px;">

     <div class="container">

         <div class="row">

             <div class="col-lg-12 col-md-12 mt-0 px-0">

                 <div class="card p-0">

                     <div class="card-header">

                         <h3>Quotation</h3>

                     </div>

                     <div class="card-body">

                         <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">

                                 <a class="nav-link active" id="outstation-tab" data-toggle="tab" href="#outstation"

                                     role="tab" aria-controls="outstation" aria-selected="true">

                                     Outstation

                                 </a>

                            </li>

                             <li class="nav-item">

                                 <a class="nav-link" id="airport-tab" data-toggle="tab" href="#airport" role="tab"

                                     aria-controls="airport" aria-selected="false">

                                    Airport 

                                 </a>

                            </li>

                            <li class="nav-item"><a class="nav-link" id="rentals-tab" data-toggle="tab" href="#rentals"

                                     role="tab" aria-controls="rentals" aria-selected="false">

                                     Rental

                                 </a>

                            </li>

                         </ul>

                         <div class="tab-content px-0" id="myTabContent">

                             <div class="tab-pane fade show active" id="outstation"role="tabpanel" aria-labelledby="outstation-tab">

                                 <div class="form-search home-form">



                                     <div class="row">

                                         <div class="container">

                                             <div class="col-lg-12 col-md-12 pb-lg-10 pb-md-10 px-0">

                                                 <div class="row">

                                                     <div class="col-md-12 col-sm-12 px-0">

                                                         <div class="form-check form-check-inline">

                                                             <input type="radio" class="form-check-input"

                                                                 id="pick_type1" name="pick_type1" checked

                                                                 value="one_way" onclick="">

                                                             <label class="form-check-label" for="pick_type1">One

                                                                 Way</label>

                                                         </div>

                                                         <div class="form-check form-check-inline">

                                                             <input type="radio" class="form-check-input"

                                                                 id="pick_type2" name="pick_type1" value="round_trip"

                                                                 onclick="">

                                                             <label class="form-check-label" for="pick_type2">Round

                                                                 Trip</label>

                                                         </div>





                                                     </div>



                                                 </div>

                                             </div>

                                             <div class=" one_way box">

                                                 <?php $this->load->helper("form"); ?>

                                                 <form class="row" role="form" id="airoplane_form"

                                                     action="<?php echo base_url() ?>bookoutstationcar" method="post"

                                                     autocomplete="off" name="airoplane_form">



                                                     <input type="hidden" class="form-control form-control-sm"

                                                         id="distance" name="distance">

                                                     <input type="hidden" class="form-control form-control-sm"

                                                         id="duration" name="duration">

                                                     <input type="hidden" class="form-check-input" name="pick_type"

                                                         value="one_way">

                                                     <input type="hidden" class="form-control form-control-sm"

                                                         id="trip_type" name="trip_type" value="outstation">

                                                     <div class="col-md-6 col-sm-6">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_location7">FROM </label>



                                                             <input type="text"

                                                                 class="form-control form-control-sm  pickup_location"

                                                                 id="pickup_location7" value="" name="pickup_location"

                                                                 maxlength="128" placeholder="Select City" required>

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader3">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>



                                                     <div class="col-md-6 col-sm-6">

                                                         <div class="form-group has-icon  has-label">

                                                             <label for="drop_location7">TO

                                                             </label>

                                                             <div class="swap-class"><a href=""><i

                                                                         class="fa fa-exchange"></i></a></div>

                                                             <input type="text"

                                                                 class="form-control form-control-sm  drop_location"

                                                                 id="drop_location7" value="" name="drop_location"

                                                                 maxlength="128" placeholder="Select City" required>

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader4">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>

                                                     <div class="col-md-6 col-sm-6 form-item c2 ">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_date">PICKUP-DATE</label>

                                                             <input placeholder="" type="date" id="pickup_date"

                                                                 class="form-control form-control-sm" name="pickup_date" min="<?php echo date('Y-m-d',strtotime("+0 day"));?>"

                                                                 value="<?php echo date('Y-m-d');?>" required>



                                                         </div>

                                                     </div>

                                                     <div class="col-md-6 col-sm-6 form-item c2">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_time">PICKUP-TIME</label>

                                                             <input placeholder="" type="time" id="pickup_time"

                                                                 class="time ui-timepicker-input durationExample form-control form-control-sm time-class"

                                                                 name="pickup_time" value="<?php  echo date('h:i'); ?>" required>



                                                         </div>

                                                     </div>

                                                     



                                                     <div class="">

                                                         <button type="submit" value="Select Car"

                                                             class="btn form-button">Book Now</button>

                                                     </div>

                                                 </form>

                                             </div>

                                             <div class=" round_trip box">

                                                 <?php $this->load->helper("form"); ?>

                                                 <form class="row" role="form" id="airoplane_form2"

                                                     action="<?php echo base_url() ?>bookoutstationcar" method="post"

                                                     autocomplete="off" name="airoplane_form">



                                                     <input type="hidden" class="form-control form-control-sm"

                                                         id="distance2" name="distance">

                                                     <input type="hidden" class="form-control form-control-sm"

                                                         id="duration2" name="duration">

                                                     <input type="hidden" class="form-check-input" name="pick_type"

                                                         value="round_trip">

                                                     <input type="hidden" class="form-control form-control-sm"

                                                         id="trip_type" name="trip_type" value="outstation">



                                                     <div class="col-md-6 col-sm-6">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_location8">FROM </label>

                                                             <input type="text"

                                                                 class="form-control form-control-sm  pickup_location"

                                                                 id="pickup_location8" value="" name="pickup_location"

                                                                 maxlength="128" placeholder="Select City" required>

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader3">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>

                                                     <div class="col-md-6 col-sm-6">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="drop_location8">TO



                                                             </label>

                                                             <input type="text"

                                                                 class="form-control form-control-sm  drop_location"

                                                                 id="drop_location8" value="" name="drop_location"

                                                                 maxlength="128" placeholder="Select City" required>

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader4">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>

                                                     <div class="col-md-6 col-sm-6 form-item c2 ">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_date2">PICKUP-DATE</label>

                                                             <input placeholder="" type="date" id="pickup_date2"

                                                                 class="form-control form-control-sm" name="pickup_date" min="<?php echo date('Y-m-d',strtotime("+0 day"));?>"

                                                                 value="<?php echo date('Y-m-d');?>" required>



                                                         </div>

                                                     </div>

                                                     <div class="col-md-6 col-sm-6 form-item c2">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="return_date">RETURN-DATE</label>

                                                             <input placeholder="" type="date" id="return_date2"

                                                                 class="form-control form-control-sm" name="return_date" min="<?php echo date('Y-m-d',strtotime("+0 day"));?>"

                                                                 value="<?php echo date('Y-m-d');?>" required>



                                                         </div>

                                                     </div>

                                                     <div class="col-md-6 col-sm-6 form-item c2">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_time2">PICKUP-TIME</label>

                                                             <input placeholder="" type="time" id="pickup_time2"

                                                                 class="time ui-timepicker-input durationExample form-control form-control-sm time-class"

                                                                 name="pickup_time" value="<?php  echo date('h:i'); ?>" required>



                                                         </div>

                                                     </div>



                                                     <div class="col-md-6 col-sm-6  form-item c2  ">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="return_time2">RETURN-TIME</label>

                                                             <input placeholder="" type="time" id="return_time2"

                                                                 class="time ui-timepicker-input durationExample form-control form-control-sm time-class"

                                                                 name="return_time" value="<?php  echo date('h:i'); ?>" required>



                                                         </div>

                                                     </div>



                                                     <div class="">

                                                         <button type="submit" value="Select Car"

                                                             class="btn form-button">Book Now</button>

                                                     </div>

                                                 </form>

                                             </div>



                                         </div>

                                     </div>



                                 </div>

                             </div>

                             

                             <div class="tab-pane fade" id="rentals" role="tabpanel" aria-labelledby="rentals-tab">

                                 <div class="form-search home-form">

                                     <?php $this->load->helper("form"); ?>

                                     <form role="form" id="local_form" action="<?php echo base_url() ?>bookrentalcar"

                                         method="post" autocomplete="off" name="local_form">



                                         <input type="hidden" class="form-control form-control-sm" id="trip_type"

                                             name="trip_type" value="outstation">

                                         <div class="row">

                                             <div class="container">

                                                 <div class="col-lg-12 col-md-12 pb-10">

                                                     <div class="row">

                                                         <div class="col-md-12 col-sm-12">

                                                             <div class="form-check form-check-inline">

                                                                 <input type="radio" class="form-check-input"

                                                                     id="pick_type5" name="pick_type" checked

                                                                     value="full_day">

                                                                 <label class="form-check-label" for="pick_type5">8 hrs

                                                                     80 km</label>

                                                             </div>

                                                             <div class="form-check form-check-inline">

                                                                 <input type="radio" class="form-check-input"

                                                                     id="pick_type6" name="pick_type" value="half_day">

                                                                 <label class="form-check-label" for="pick_type6">4 hrs

                                                                     40 km</label>

                                                             </div>



                                                         </div>



                                                     </div>

                                                 </div>

                                                 <div class="row ">

                                                     <div class="col-md-4 col-sm-4">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_location9">Pickup Location </label>

                                                             <input type="text"

                                                                 class="form-control form-control-sm  pickup_location"

                                                                 id="pickup_location9" value="" name="pickup_location"

                                                                 maxlength="128" placeholder="Select City">

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader3">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>

                                                     <div class="col-md-4 col-sm-4 form-item c2 ">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_date">PICKUP-DATE</label>

                                                             <input placeholder="" type="date" id="pickup_date"

                                                                 class="form-control form-control-sm" name="pickup_date" min="<?php echo date('Y-m-d',strtotime("+0 day"));?>"

                                                                 value="<?php echo date('Y-m-d');?>">



                                                         </div>

                                                     </div>



                                                     <div class="col-md-4 col-sm-4 form-item c2 ">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_date">PICKUP-TIME</label>

                                                             <input placeholder="" type="time" id="pickup_time"

                                                                 class="form-control form-control-sm time-class time ui-timepicker-input durationExample"

                                                                 name="pickup_time" value="<?php  echo date('h:i'); ?>">



                                                         </div>

                                                     </div>

                                                     <div class="">

                                                         <button type="submit" value="Select Car"

                                                             class="btn form-button">Book Now</button>

                                                     </div>

                                                 </div>



                                             </div>

                                         </div>



                                     </form>

                                 </div>

                             </div>

                             <div class="tab-pane fade" id="airport" role="tabpanel" aria-labelledby="airport-tab">

                                 <div class="form-search home-form">

                                     <?php $this->load->helper("form"); ?>

                                     <form role="form" id="local_form" action="<?php echo base_url() ?>bookairportcar"

                                         method="post" autocomplete="off" name="local_form">



                                         <input type="hidden" class="form-control form-control-sm" id="trip_type"

                                             name="trip_type" value="airport">

                                         <input type="hidden" class="form-control form-control-sm" id="distance"

                                             name="distance">

                                         <input type="hidden" class="form-control form-control-sm" id="duration"

                                             name="duration">

                                         <div class="row row-inputs">

                                             <div class="container-fluid">



                                                 <div class="row ">

                                                     <div class="col-lg-12  form-item a1">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pick_type4">PICKUP TYPE

                                                             </label>

                                                             <select class="form-control form-control-sm sel"

                                                                 id="pick_type4" name="pick_type">

                                                                 <option value="to_airport">To The Airport</option>

                                                                 <option value="from_airport">From The Airport</option>



                                                             </select>



                                                         </div>

                                                     </div>

                                                     <div class="col-lg-6 col-md-6  form-item c1">

                                                         <div class="form-group has-icon has-label small">

                                                             <label for="pickup_location10">FROM </label>

                                                             <input type="text"

                                                                 class="form-control form-control-sm  pickup_location"

                                                                 id="pickup_location10" value="" name="pickup_location"

                                                                 maxlength="128" placeholder="Select City">

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader3">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>

                                                     <div class="col-lg-6 col-md-6  form-item c1">

                                                         <div class="form-group has-icon has-label large">

                                                             <label for="drop_location10">AIRPORT </label>

                                                             <input type="text"

                                                                 class="form-control form-control-sm drop_location "

                                                                 id="drop_location10" value="" name="drop_location"

                                                                 maxlength="128" placeholder="Select Airport">

                                                             <div class="preloader3" style="display: none;"

                                                                 id="preloader4">

                                                                 <div class="circ1" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ2" style="height: 7px; width: 7px;">

                                                                 </div>

                                                                 <div class="circ3" style="height: 7px; width: 7px;">

                                                                 </div>

                                                             </div>

                                                         </div>

                                                     </div>

                                                     <div class="col-lg-6 col-md-6  form-item c2">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_date">PICKUP-DATE</label>

                                                             <input placeholder="" type="date" id="pickup_date"

                                                                 class="form-control form-control-sm" name="pickup_date" min="<?php echo date('Y-m-d',strtotime("+0 day"));?>"

                                                                 value="<?php echo date('Y-m-d');?>">



                                                         </div>

                                                     </div>



                                                     <div class="col-lg-6 col-md-6  form-item c2">

                                                         <div class="form-group has-icon has-label">

                                                             <label for="pickup_date">PICKUP-TIME</label>

                                                             <input placeholder="" type="time" id="pickup_time"

                                                                 class="time ui-timepicker-input durationExample form-control form-control-sm time-class"

                                                                 name="pickup_time" value="<?php  echo date('h:i'); ?>">



                                                         </div>

                                                     </div>

                                                 </div>

                                             </div>

                                         </div>

                                         <div class="">

                                             <button type="submit" value="Select Car" class="btn form-button">Book

                                                 Now</button>

                                         </div>

                                     </form>

                                 </div>

                             </div>

                         </div>

                     </div>

                 </div>

             </div>



         </div>

     </div>

 </div>

 <div id="map" style="display: none;"></div>






<script>

$(document).ready(function(){

    $(".round_trip").hide();

   

    $('input[name="pick_type1"]').click(function(){
       

        var inputValue = $(this).attr("value");

        var targetBox = $("." + inputValue);

        $(".box").not(targetBox).hide();

        $(targetBox).show();

    });

});

$(document).ready(function(){

    $(".round_trip").hide();

   

    $('input[name="pick_type2"]').click(function(){

        var inputValue = $(this).attr("value");

        var targetBox = $("." + inputValue);

        $(".box").not(targetBox).hide();

        $(targetBox).show();

    });

});





</script>

<script>

	const my = new Vue({

		el: '#my',

		data: () => ({

			map: '',

			marker: '',

			latLng: '',

			geocoder: '',

			lat: '',

			lng: '',

			address: '',

			errorMsg: '',

			error: false,

		}),



		mounted() {

			this.getLocation();

		},



		methods: {

			initMap() {

				this.latLng = new google.maps.LatLng(this.lat, this.lng);



				this.geocoder = new google.maps.Geocoder

				this.geocoder.geocode({

					'location': my.latLng

				}, function(results, status) {

					if (status !== 'OK') {

						alert('Error. Please refresh/reload page');



					} else {

						my.address = results[0].formatted_address;

					}

				})



				this.map = new google.maps.Map(this.$refs.map, {

					center: my.latLng,

					zoom: 13,

					disableDefaultUI: true

				});



				this.marker = new google.maps.Marker({

					map: my.map,

					position: my.latLng,

					anchorPoint: new google.maps.Point(0, -29)

				});

			},



			getLocation() {

				navigator.geolocation.getCurrentPosition(this.showLocation, this.showError);

			},



			showLocation(position) {

				this.error = false;

				this.lat = position.coords.latitude;

				this.lng = position.coords.longitude;



				this.initMap();

			},



			showError(err) {

				this.error = true;



				switch (err.code) {

					case 1: // Permission Denied

						this.errorMsg = err.message

						break;



					case 2: // Position Unavailable

						this.errorMsg = err.message

						break;



					case 3: // Timeout

						this.errorMsg = err.message

						break;

				}

			},



			refresh() {

				location.reload();

			},

		},

	});



    



$( document ).ready(function() {

  $('.durationExample').timepicker('setTime', time_plus_6);

});

</script>