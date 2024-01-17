/**
 * @author Bharat Bhushan
 */

function show(divId, select_item) {
    if (select_item > 0) {

        document.getElementById(divId).style.visibility = 'visible';
        document.getElementById(divId).style.display = 'block';
    } else {
        document.getElementById(divId).style.visibility = 'hidden';
        document.getElementById(divId).style.display = 'none';
    }
}

function showCabRate(id, select_item) {
    var company_id = $("#company_name").val();
    var vehicle_id = $("#invoice_tr_" + id + "_vehicle_id").val();
    var zone_id = $("#invoice_tr_" + id + "_zone").val();
    var zone_type_id = $("#invoice_tr_" + id + "_zone_type").val();

    $.ajax({
        type: 'POST',
        url: baseURL + 'vendor/getZoneTypes',
        data: {
            "company_id": company_id,
            "vehicle_id": vehicle_id,
            "zone_id": zone_id,
            "zone_type_id": zone_type_id
        },
        success: function(response) {
            $("#invoice_tr_" + id + "_rate").html(response);
        }
    });
}


// Code by surya

function AutocompleteDirectionsHandler(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location"),
        o = document.getElementById("drop_location"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler2(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(null), this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location2"),
        o = document.getElementById("drop_location2"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler3(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location3"),
        o = document.getElementById("drop_location3"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler4(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location4"),
        o = document.getElementById("drop_location4"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler5(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location5"),
        o = document.getElementById("drop_location5"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler6(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location6"),
        o = document.getElementById("drop_location6"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler7(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location7"),
        o = document.getElementById("drop_location7"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler8(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location8"),
        o = document.getElementById("drop_location8"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler9(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location9"),
        o = document.getElementById("drop_location9"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}

function AutocompleteDirectionsHandler10(e) {
    this.map = e, this.originPlaceId = null, this.destinationPlaceId = null, this.travelMode = "DRIVING", this.directionsService = new google.maps.DirectionsService, this.directionsDisplay = new google.maps.DirectionsRenderer, this.directionsDisplay.setMap(e);
    new google.maps.Geocoder, new google.maps.DistanceMatrixService;
    var t = document.getElementById("pickup_location10"),
        o = document.getElementById("drop_location10"),
        i = new google.maps.places.Autocomplete(t);
    i.setFields(["place_id"]), i.setComponentRestrictions({
        country: ["in"]
    });
    var n = new google.maps.places.Autocomplete(o);
    n.setFields(["place_id"]), n.setComponentRestrictions({
        country: ["in"]
    }), this.setupPlaceChangedListener(i, "ORIG"), this.setupPlaceChangedListener(n, "DEST")
}
// Code by surya




if (screen.width < 992) {

    $('[data-toggle=offcanvas]').click(function() {
        $('.row-offcanvas').toggleClass('active');
        $('.collapse').toggleClass('in').toggleClass('visible-xs').toggleClass('visible-xs');
    });
} else {

    $('[data-toggle=offcanvas]').click(function() {
        $('.row-offcanvas').toggleClass('active');
        $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
    });
}

$(document).ready(function(e) {
    $('.nav li a:first-child').addClass('collapsed');
});

jQuery(document).ready(function() {

    jQuery(document).on("click", ".deleteUser", function() {
        var userId = $(this).data("userid"),
            hitURL = baseURL + "deleteUser",
            currentRow = $(this);

        var confirmation = confirm("Are you sure to delete this user ?");

        if (confirmation) {
            jQuery.ajax({
                type: "POST",
                dataType: "json",
                url: hitURL,
                data: { userId: userId }
            }).done(function(data) {
                //console.log(data);
                currentRow.parents('tr').remove();
                if (data.status = true) { alert("User successfully deleted"); } else if (data.status = false) { alert("User deletion failed"); } else { alert("Access denied..!"); }
            });
        }
    });

    jQuery(document).on("click", ".deleteUserLicence", function() {
        var userId = $(this).data("userid"),
            hitURL = baseURL + "deleteUserLicence",
            currentRow = $(this);

        var confirmation = confirm("Are you sure to delete this user licence ?");

        if (confirmation) {
            jQuery.ajax({
                type: "POST",
                dataType: "json",
                url: hitURL,
                data: { userId: userId }
            }).done(function(data) {
                //console.log(data);
                currentRow.parents('tr').remove();
                if (data.status = true) { alert("User licence successfully deleted"); } else if (data.status = false) { alert("User licence deletion failed"); } else { alert("Access denied..!"); }
            });
        }
    });


    jQuery(document).on("click", ".searchList", function() {

    });


    jQuery(document).on("change", "#vendor_check_id .vendor_id", function() {
        var vendor_id = $("#vendor_id").val();
        $("#loading").show();
        $.ajax({
            url: baseURL + "vehicle/getVehiclesByVendorId",
            type: 'GET',
            data: { "vendor_id": vendor_id },
            success: function(data) {

                $("#loading").hide();
                //$('#vehicle_id').children('option:not(:first)').remove();
                $('#vehicle_id').find('option').remove();
                
				$('#vehicle_id')
                    .append($("<option></option>")
                        .attr("value", '')
                        .text('All'));
                $.each(data, function(key, value) {
                    $('#vehicle_id')
                        .append($("<option></option>")
                            .attr("value", value.id)
                            .text(value.vehicle_no));
                });
                //Change the text of the default "loading" option.
                //$('#loading_vehicles').text('Select Vehicles'); 
            }
        });
    });

    jQuery(document).on("change", "#zone_check_id .zone_id", function() {
        var zone_id = $("#zone_id").val();
        $("#loading").show();
        $.ajax({
            url: baseURL + "zone/getAttachedZoneListById",
            type: 'GET',
            data: { "zone_id": zone_id },
            success: function(data) {

                $("#loading").hide();
                $('#zone_type').children('option:not(:first)').remove();

                /*$('#zone_type')
                    .append($("<option></option>")
                        .attr("value", '0')
                        .text('Flat'));*/


                $.each(data, function(key, value) {
                    $('#zone_type')
                        .append($("<option></option>")
                            .attr("value", value.zone_type_id)
                            .text(value.zone_type + ' (' + value.description + ')'));
                });
                //Change the text of the default "loading" option.
                $('#loading_zone_type').text('Select Zone Type');
            }
        });
    });


    jQuery(document).on("change", ".invoicetable .addzone", function() {

        var rowid = $(this).parent().parent().attr("data-row-id");
        var zone_id = $("#invoice_tr_" + rowid + "_zone").val();
        var company_id = $("#company_name").val();
        var vendor_id = $("#invoice_tr_" + rowid + "_vendor_id").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "master/getZoneTypeById",
            type: 'GET',
            data: { "vendor_id": vendor_id, "zone_id": zone_id, "company_id": company_id },
            success: function(data) {

                $("#loading").hide();
                $("#invoice_tr_" + rowid + "_zone_type").children('option:not(:first)').remove();

                //$("#invoice_tr_" + rowid + "_zone_type").find('option').remove();

                /*$("#invoice_tr_" + rowid + "_zone_type")
                    .append($("<option></option>")
                        .attr("value", '0')
                        .text('Flat'));*/


                $.each(data, function(key, value) {
                    $("#invoice_tr_" + rowid + "_zone_type")
                        .append($("<option></option>")
                            .attr("value", value.zone_type_id)
                            .text(value.zone_type + ' (' + value.description + ')'));
                });
                //Change the text of the default "loading" option.
                $('#loading_zone_type').text('Select Zone Type');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });


    /*
    28-08-2019
    jQuery(document).on("change", ".invoicetable .addzonetype", function() {

        var rowid = $(this).parent().parent().attr("data-row-id");
        var company_id = $("#company_name").val();
        var vehicle_id = $("#invoice_tr_" + rowid + "_vehicle_id").val();
        var vendor_id = $("#invoice_tr_" + rowid + "_vendor_id").val();
        var zone_id = $("#invoice_tr_" + rowid + "_zone").val();
        var zone_type_id = $("#invoice_tr_" + rowid + "_zone_type").val();

        if (company_id != '') {
            $("#loading").show();
            $.ajax({
                url: baseURL + "getCabCompanyRate",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {
                    "company_id": company_id,
                    "vehicle_id": vehicle_id,
                    "vendor_id": vendor_id,
                    "zone_id": zone_id,
                    "zone_type_id": zone_type_id
                },
                success: function(data) {

                    $("#loading").hide();
                    //var objstringify = JSON.stringify(data); 
                    //var obj = JSON.parse(objstringify);
                    //alert(obj['cab_rate_company']);
                    //$("#invoice_tr_"+rowid+"_zone_type").children('option:not(:first)').remove();

                    $.each(data, function(key, value) {
                        $("#invoice_tr_" + rowid + "_rate").val(value.cab_rate_company);
                        $("#invoice_tr_" + rowid + "_guard_rate").val(value.guard_price_company);
                    });


                },
                error: function(data) { // 500 Status Header
                    $("#loading").hide();
                    Swal.fire({
                        type: 'error',
                        text: 'There seems to be an error. Please try again.'
                    });
                }
            });
        } else {

        }
    });*/

    jQuery(document).on("change", ".invoicetable .addzonetype", function() {

        var rowid = $(this).parent().parent().attr("data-row-id");
        var company_id = $("#company_name").val();
        var vehicle_id = $("#invoice_tr_" + rowid + "_vehicle_id").val();
        var vendor_id = $("#invoice_tr_" + rowid + "_vendor_id").val();
        var vehicle_type_id = $("#invoice_tr_" + rowid + "_vehicle_type").val();
        var zone_id = $("#invoice_tr_" + rowid + "_zone").val();
        var zone_type_id = $("#invoice_tr_" + rowid + "_zone_type").val();

        if (company_id != '') {
            $("#loading").show();
            $.ajax({
                url: baseURL + "getCabRate",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {
                    "company_id": company_id,
                    "vehicle_id": vehicle_id,
                    "vendor_id": vendor_id,
                    "vehicle_type_id": vehicle_type_id,
                    "zone_id": zone_id,
                    "zone_type_id": zone_type_id
                },
                success: function(data) {

                    $("#loading").hide();

                    if (data && data.length > 0) {
                        $.each(data, function (key, value) {
                            $("#invoice_tr_" + rowid + "_rate").val(value.cab_rate_company);
                            $("#invoice_tr_" + rowid + "_guard_rate").val(value.guard_price_company);
                            $("#invoice_tr_" + rowid + "_vendor_rate").val(value.cab_rate_vendor);
                            $("#invoice_tr_" + rowid + "_vendor_guard_rate").val(value.guard_price_vendor);
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            text: 'Please add zone rate in company.'
                        });                        
                    }
                    
                   
                },
                error: function(data) {
                    $("#loading").hide();
                    Swal.fire({
                        type: 'error',
                        text: 'There seems to be an error. Please try again.'
                    });
                }
            });
        } else {

        }
    });



    jQuery(document).on("click", "#search_report", function() {
        var company_id = $("#company_id").val();
        var vendor_id = $("#vendor_id").val();
        var vehicle_id = $("#vehicle_id").val();
        var start_date = $("#start_date1").val();
        var end_date = $("#end_date1").val();

        if (company_id == '' && vendor_id == '' && vehicle_id == null && start_date == '' && end_date == '') {
            Swal.fire({
                type: 'error',
                text: 'Please select atleast one option'
            });
        } else {

            $("#loading").show();
            $.ajax({
                url: baseURL + "master/getAllReports",
                type: 'POST',
                data: {
                    "company_id": company_id,
                    "vendor_id": vendor_id,
                    "vehicle_id": vehicle_id,
                    "start_date": start_date,
                    "end_date": end_date
                },
                success: function(data) {

                    $("#loading").hide();
                    $("#staticTemplate").html(data);
                    //$('#vehicle_id').children('option:not(:first)').remove();
                    /* $('#vehicle_id').find('option').remove()
				  $.each(data, function(key, value) {
					  $('#vehicle_id')
						  .append($("<option></option>")
						  .attr("value", value.id)
						  .text(value.vehicle_no));
				  }); 
				  //Change the text of the default "loading" option.
				  //$('#loading_vehicles').text('Select Vehicles'); */
                },
                error: function(data) { // 500 Status Header
                    $("#loading").hide();
                    Swal.fire({
                        type: 'error',
                        text: 'There seems to be an error. Please try again.'
                    });
                }
            });
        }
    });

    jQuery(document).on("click", ".viewRoster", function() {

        var company_id = $(this).data("companyid");
        var vendor_id = $(this).data("vendorid");
        var vehicle_id = $(this).data("vehicleid");
        var start_date = $("#start_date1").val();
        var end_date = $("#end_date1").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "viewSearchRosterDetails",
            type: 'POST',
            data: {
                "company_id": company_id,
                "vendor_id": vendor_id,
                "vehicle_id": vehicle_id,
                "start_date": start_date,
                "end_date": end_date
            },
            success: function(data) {
                $("#loading").hide();
                $("#viewSearchRoster").html(data);
                //$("#staticTemplate").html(data);
                //$('#noStudentModal').modal('show');
                //$('#noStudentModal').modal('show');
                $('#viewSearchRosterDetails').modal('show');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });


    jQuery(document).on("click", ".viewCompanyWiseRoster", function() {

        var company_id = $(this).data("companyid");
        var vendor_id = $(this).data("vendorid");
        var vehicle_id = $(this).data("vehicleid");
        var start_date = $("#start_date1").val();
        var end_date = $("#end_date1").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "viewCompanyWiseRoster",
            type: 'POST',
            data: {
                "company_id": company_id,
                "vendor_id": vendor_id,
                "vehicle_id": vehicle_id,
                "start_date": start_date,
                "end_date": end_date
            },
            success: function(data) {
                $("#loading").hide();
                $("#viewCompanyRoster").html(data);
                $('#viewCompanyWiseRoster').modal('show');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });


    //$(document).on('keydown', '.autocompletevehicle_no', function() {
    jQuery(document).on("keypress", ".autocomplete_advance", function() {
        $("#vehicle_id").autocomplete({
            source: function(request, response) {
                $("#loading").show();
                $.ajax({
                    url: baseURL + "Vehicle/getVehicles",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term,
                        request: 1
                    },
                    success: function(data) {
                        $("#loading").hide();
                        response(data);
                    },
                    error: function (data) { // 500 Status Header
                        $("#loading").hide();
                        Swal.fire({
                            type: 'error',
                            text: 'No records found. Please try again.'
                        });
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label); // display the selected text
                var id = ui.item.value; // selected id to input
                var vendor_id = ui.item.vendor_id; // selected id to input
                $("#vendor_vehicle_id").val(id);
                $("#vendor_id").val(vendor_id);
                return false;
            }
        });
    });




    jQuery(document).on("change", ".companytable .addzone", function() {

        var rowid = $(this).parent().parent().attr("data-row-id");
        var zone_id = $("#company_tr_" + rowid + "_zone").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "zone/getAttachedZoneListById",
            type: 'GET',
            data: { "zone_id": zone_id },
            success: function(data) {

                $("#loading").hide();
                // $("#company_tr_" + rowid + "_zone_type").children('option:not(:first)').remove();

                $("#company_tr_" + rowid + "_zone_type").children('option:not(:first)').remove();

                /*$("#company_tr_" + rowid + "_zone_type")
                    .append($("<option></option>")
                        .attr("value", '0')
                        .text('Flat'));*/


                $.each(data, function(key, value) {
                    $("#company_tr_" + rowid + "_zone_type")
                        .append($("<option></option>")
                            .attr("value", value.zone_type_id)
                            .text(value.zone_type + ' (' + value.description + ')'));
                });
                //Change the text of the default "loading" option.
                $('#loading_zone_type').text('Select');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });
	
	
	
	jQuery(document).on("change", ".cabCompanyTable .addzone1", function() {
		


        var rowid = $(this).parent().parent().attr("data-row-id");
        var zone_id = $("#company_tr_" + rowid + "_zone").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "zone/getAttachedZoneListById",
            type: 'GET',
            data: { "zone_id": zone_id },
            success: function(data) {

                $("#loading").hide();
                // $("#company_tr_" + rowid + "_zone_type").children('option:not(:first)').remove();

                $("#company_tr_" + rowid + "_zone_type").children('option:not(:first)').remove();

                /*$("#company_tr_" + rowid + "_zone_type")
                    .append($("<option></option>")
                        .attr("value", '0')
                        .text('Flat'));*/


                $.each(data, function(key, value) {
                    $("#company_tr_" + rowid + "_zone_type")
                        .append($("<option></option>")
                            .attr("value", value.zone_type_id)
                            .text(value.zone_type + ' (' + value.description + ')'));
                });
                //Change the text of the default "loading" option.
                $('#loading_zone_type').text('Select');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });
	
	//Delete Admin Company
	jQuery(document).on("click", ".deleteAdminCompany", function() {
        var id = $(this).data("id"),
            hitURL = baseURL + "deleteAdminCompany",
            currentRow = $(this);
			
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "post",
            url: hitURL,
            data: {"id": id },
            success: function(data) {

              if(data == 1)
			  {
				  currentRow.parents('tr').remove();
				  Swal.fire({
					type: 'success',
					text: 'Company has been deleted.'
				  }).then(function() {
					setTimeout(function(){ location.reload(); });
				  })
			  }
			  else{
				 Swal.fire({
					type: 'error',
					text: 'Company has been not deleted.'
				  })
			  }
            },
            error: function() {
              Swal.fire({
                  type: 'error',
                  text: 'There seems to be an error, Please try again!'
              })
            }
          });
        }
      })
    });
	
	//Delete Vendor
	jQuery(document).on("click", ".deleteVendor", function() {
        var id = $(this).data("id"),
            hitURL = baseURL + "deleteVendor",
            currentRow = $(this);
			
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "post",
            url: hitURL,
            data: {"id": id },
            success: function(data) {
              if(data == 1)
			  {
				  currentRow.parents('tr').remove();
				  Swal.fire({
					type: 'success',
					text: 'Vendor has been deleted.'
				  })
			  }
			  else{
				 Swal.fire({
					type: 'error',
					text: 'Vendor has been not deleted.'
				  })
			  }
            },
            error: function() {
              Swal.fire({
                  type: 'error',
                  text: 'There seems to be an error, Please try again!'
              })
            }
          });
        }
      })
    });
	
	//Delete Vehicle
	jQuery(document).on("click", ".deleteVehicle", function() {
        var id = $(this).data("id"),
            hitURL = baseURL + "deleteVehicle",
            currentRow = $(this);
			
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "post",
            url: hitURL,
            data: {"id": id },
            success: function(data) {

              if(data == 1)
			  {
				  currentRow.parents('tr').remove();
				  Swal.fire({
					type: 'success',
					text: 'Vehicle has been deleted.'
				  })
				  /*.then(function() {
					setTimeout(function(){ location.reload(); });
				  })*/
			  }
			  else{
				 Swal.fire({
					type: 'error',
					text: 'Vehicle has been not deleted.'
				  })
			  }
            },
            error: function() {
              Swal.fire({
                  type: 'error',
                  text: 'There seems to be an error, Please try again!'
              })
            }
          });
        }
      })
    });

    //Delete Vehicle
    jQuery(document).on("click", ".deleteAdvance", function () {
        var id = $(this).data("id"),
            hitURL = baseURL + "deleteAdvance",
            currentRow = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: hitURL,
                    data: { "id": id },
                    success: function (data) {

                        if (data == 1) {
                            currentRow.parents('tr').remove();
                            Swal.fire({
                                type: 'success',
                                text: 'Advance has been deleted.'
                            })
                        }
                        else {
                            Swal.fire({
                                type: 'error',
                                text: 'Advance has been not deleted.'
                            })
                        }
                    },
                    error: function () {
                        Swal.fire({
                            type: 'error',
                            text: 'There seems to be an error, Please try again!'
                        })
                    }
                });
            }
        })
    });

    /** Delete Traveling Vehicle Type */
    $(document).ready(function () {
        $(".deleteTravelingType").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteTravelingType",
                        data: { "id": id },
                        success: function (data) {
                            console.log(data);
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Traveling Type has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'Traveling Type delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });

    /** Delete Traveling Vehicle */
    $(document).ready(function () {
        $(".deleteTravelingVehicle").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteTravelingVehicle",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Traveling Vehicle has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'Traveling Vehicle delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });

    /** Delete Traveling Package */
    $(document).ready(function () {
        $(".deleteTravelingPackage").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteTravelingPackage",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Traveling Package has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'Traveling Package delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });

    /** Delete Company */
    $(document).ready(function () {
        $(".deleteCompany").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteCompany",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Company has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'Company delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });

    /** Delete Company Branch */
    $(document).ready(function () {
        $(".deleteCompanyBranch").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteCompanyBranch",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Company branch has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'Company branch delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });




    jQuery(document).on("change", ".autocompletevehicle_no", function() {
            
        var rowid = $(this).parent().parent().attr("data-row-id");
        var vehicle_id = $("#invoice_tr_" + rowid + "_vehicle_id").val();
        var vendor_id = $("#invoice_tr_" + rowid + "_vendor_id").val();
        var company_id = $("#company_name").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "master/getZoneByVendorId",
            type: 'GET',
            data: { "vendor_id": vendor_id, "company_id": company_id },
            success: function (data) {

                $("#loading").hide();

                $("#invoice_tr_" + rowid + "_zone").children('option:not(:first)').remove();

               /* $("#invoice_tr_" + rowid + "_zone")
                    .append($("<option></option>")
                        .attr("value", '0')
                        .text('Flat'));*/


                $.each(data, function (key, value) {
                    $("#invoice_tr_" + rowid + "_zone")
                        .append($("<option></option>")
                            .attr("value", value.zone_id)
                            .text(value.zone_name));
                });
                //Change the text of the default "loading" option.
                $('#loading_zone').text('Select');
            },
            error: function (data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });

    });


    //Cancel Roster
    jQuery(document).on("click", ".deleteRoster", function () {
        var id = $(this).data("id"),
            hitURL = baseURL + "deleteRoster",
            currentRow = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    text: 'Description',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (description) => {
                        

                    $.ajax({
                        type: "post",
                        url: hitURL,
                        data: { "id": id, "description": description },
                        success: function (data) {
                            if (data == 1) {
                                //currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    text: 'Cab Roster has been deleted.'
                                }).then(function () {
                                    setTimeout(function () { location.reload(); });
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    text: 'Cab Roster has been not deleted.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });

                        /*return fetch(`//code/${data}`)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText)
                                }
                                return response.json()
                            })
                            .catch(error => {
                                Swal.showValidationMessage(
                                    `Request failed`
                                    // ${error} 
                                )
                            })*/
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            }
        })
    });

    jQuery(document).on("click", ".cancelRoster", function () {

        var id = $(this).data("id");
        var invoice_id = $(this).data("invid");
        var company_id = $(this).data("compid");
        var vendor_id = $(this).data("venid");
        var vehicle_id = $(this).data("vid");

        $("#loading").show();
        $('#cancel_roster_id').val(id);
        $('#cancel_invoice_id').val(invoice_id);
        $('#cancel_roster_company_id').val(company_id);
        $('#cancel_roster_vendor_id').val(vendor_id);
        $('#cancel_roster_vehicle_id').val(vehicle_id);
        $("#loading").hide();
        $('#modalLRForm').modal('show');


    });



    jQuery(document).on("click", ".cancel_roster", function () {


        var id = $("#cancel_roster_id").val();
        var description = $("#cancel_reason").val();
        var hitURL = baseURL + "cancelRoster";

        if (description != '') {
            $("#loading").show();
            $.ajax({
                type: "post",
                url: hitURL,
                data: { "id": id, "description": description },
                success: function (data) {
                    $("#loading").hide();
                    
                    if (data == 1) {
                        //currentRow.parents('tr').remove();
                        Swal.fire({
                            type: 'success',
                            text: 'Cab Roster has been cancelled.'
                        }).then(function () {
                            setTimeout(function () { location.reload(); });
                        })
                    }
                    else {
                        Swal.fire({
                            type: 'error',
                            text: 'Cab Roster has been not cancelled.'
                        })
                    }
                    $('#modalLRForm').modal('hide');
                },
                error: function () {
                    $("#loading").hide();
                    Swal.fire({
                        type: 'error',
                        text: 'There seems to be an error, Please try again!'
                    })
                }
            });
        } else {
            $("#loading").hide();
            Swal.fire({
                type: 'error',
                text: 'Please add description reason.'
            })

        }
    });


    jQuery(document).on("click", ".cancel_with_taxi", function () {

        var id = $("#cancel_roster_id").val();
        var invoice_id = $("#cancel_invoice_id").val();
        var company_id = $("#cancel_roster_company_id").val();
        var vendor_id = $("#cancel_roster_vendor_id").val();
        var vehicle_id = $("#cancel_roster_vehicle_id").val();
        var taxi = $("#taxi").val();
        var amount = $("#taxi_amount").val();
        var description = $("#cancel_reason_taxi").val();
        var hitURL = baseURL + "cancelRosterWithTaxi";

        if (taxi != '' && amount != '' && description != '') {
            $("#loading").show();
            $.ajax({
                type: "post",
                url: hitURL,
                data: { "id": id, "invoice_id": invoice_id, "company_id": company_id, "vendor_id": vendor_id, "vehicle_id": vehicle_id, "taxi_number": taxi, "amount": amount, "description": description },
                success: function (data) {
                    $("#loading").hide();

                    if (data == 1) {
                        //currentRow.parents('tr').remove();
                        Swal.fire({
                            type: 'success',
                            text: 'Cab Roster has been cancelled.'
                        }).then(function () {
                            setTimeout(function () { location.reload(); });
                        })
                    }
                    else {
                        Swal.fire({
                            type: 'error',
                            text: 'Cab Roster has been not cancelled.'
                        })
                    }
                    $('#modalLRForm').modal('hide');
                },
                error: function () {
                    $("#loading").hide();
                    Swal.fire({
                        type: 'error',
                        text: 'There seems to be an error, Please try again!'
                    })
                }
            });
        } else {
            $("#loading").hide();
            Swal.fire({
                type: 'error',
                text: 'Please fill all fields.'
            })

        }
    });
    
	
	jQuery(document).on("change", ".invoicetable .addzone2", function() {

        var rowid = $(this).parent().parent().attr("data-row-id");
        var zone_id = $("#cab_short_tr_" + rowid + "_zone").val();
        //var company_id = $("#company_name").val();
        //var vendor_id = $("#cab_short_tr_" + rowid + "_vendor_id").val();
		
		//alert(rowid + zone_id + company_id + vendor_id);
		//data: { "vendor_id": vendor_id, "zone_id": zone_id, "company_id": company_id },

        $("#loading").show();
        $.ajax({
            url: baseURL + "master/getZoneTypeByIds",
            type: 'GET',
            data: { "zone_id": zone_id},
            success: function(data) {

                $("#loading").hide();
                $("#cab_short_tr_" + rowid + "_zone_type").children('option:not(:first)').remove();


                $.each(data, function(key, value) {
                    $("#cab_short_tr_" + rowid + "_zone_type")
					.append($("<option></option>")
					.attr("value", value.zone_type_id)
					.text(value.zone_type + ' (' + value.description + ')'));
                });
                //Change the text of the default "loading" option.
                $('#loading_zone_type').text('Select Zone Type');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });
	
	
	
	
	
	jQuery(document).on("click", ".viewSearchRosterDetailsAll", function() {

        var company_id = $(this).data("companyid");
        var vendor_id = $(this).data("vendorid");
        var vehicle_id = $(this).data("vehicleid");
        var start_date = $("#start_date1").val();
        var end_date = $("#end_date1").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "viewSearchRosterDetailsAll",
            type: 'POST',
            data: {
                "company_id": company_id,
                "vendor_id": vendor_id,
                "vehicle_id": vehicle_id,
                "start_date": start_date,
                "end_date": end_date
            },
            success: function(data) {
                $("#loading").hide();
                $("#viewSearchRosterDetailsAll").html(data);
                //$("#staticTemplate").html(data);
                //$('#noStudentModal').modal('show');
                //$('#noStudentModal').modal('show');
                $('#viewSearchRosterDetailsAlls').modal('show');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });


jQuery(document).on("click", ".viewCompanyWiseRosterAll", function() {

        var company_id = $(this).data("companyid");
        var vendor_id = $(this).data("vendorid");
        var vehicle_id = $(this).data("vehicleid");
        var start_date = $("#start_date1").val();
        var end_date = $("#end_date1").val();

        $("#loading").show();
        $.ajax({
            url: baseURL + "viewCompanyWiseRosterAll",
            type: 'POST',
            data: {
                "company_id": company_id,
                "vendor_id": vendor_id,
                "vehicle_id": vehicle_id,
                "start_date": start_date,
                "end_date": end_date
            },
            success: function(data) {
                $("#loading").hide();
                $("#viewCompanyRoster").html(data);
                $('#viewCompanyWiseRosterAll').modal('show');
            },
            error: function(data) { // 500 Status Header
                $("#loading").hide();
                Swal.fire({
                    type: 'error',
                    text: 'There seems to be an error. Please try again.'
                });
            }
        });
    });





    jQuery(document).on("change", "#vendor_charges_id .vendor_charges", function () {
        var vendor_id = $("#vendor_id").val();
        $("#loading").show();
        $.ajax({
            url: baseURL + "vendor/vendor_charges_template",
            type: 'POST',
            data: { "vendor_id": vendor_id },
            success: function (data) {

                $("#loading").hide();
                $("#chargesdetails").html(data);
            }
        });
    });


    jQuery(document).on("click", ".deleteVendorCharge", function () {
        var id = $(this).data("id"),
            currentRow = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: baseURL + "deleteVendorCharge",
                    data: { "id": id },
                    success: function (data) {
                        currentRow.parents('tr').remove();
                        Swal.fire({
                            type: 'success',
                            title: 'Deleted!',
                            text: 'Vendor charges successfully dissociated!'
                        })
                    }
                });
            }
        })
    });


    jQuery(document).on("keypress", ".autocompletevehicleloan_no", function () {
        $("#vehicle_no").autocomplete({
            source: function (request, response) {
                $("#loading").show();
                $.ajax({
                    url: baseURL + "Vehicle/getVehicles",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term,
                        request: 1
                    },
                    success: function (data) {
                        $("#loading").hide();
                        response(data);
                    },
                    error: function (data) { // 500 Status Header
                        $("#loading").hide();
                        Swal.fire({
                            type: 'error',
                            text: 'No records found. Please try again.'
                        });
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label); // display the selected text
                var id = ui.item.value; // selected id to input
                var vendor_id = ui.item.vendor_id; // selected id to input
                $("#vehicle_id").val(id);
                $("#vendor_id").val(vendor_id);


                $("#loading").show();
                $.ajax({
                    url: baseURL + "vendor/vendor_loans_template",
                    type: 'POST',
                    data: { "vendor_id": vendor_id, "vehicle_id": id },
                    success: function (data) {

                        $("#loading").hide();
                        $("#loandetails").html(data);
                    },
                    error: function (data) { // 500 Status Header
                        $("#loading").hide();
                        Swal.fire({
                            type: 'error',
                            text: 'There seems to be an error. Please try again.'
                        });
                    }
                });


                return false;
            }
        });
    });


    jQuery(document).on("click", ".deleteVendorLoan", function () {
        var id = $(this).data("id"),
            currentRow = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: baseURL + "deleteVendorLoan",
                    data: { "id": id },
                    success: function (data) {
                        currentRow.parents('tr').remove();
                        Swal.fire({
                            type: 'success',
                            title: 'Deleted!',
                            text: 'Vendor loan successfully dissociated!'
                        })
                    }
                });
            }
        })
    });

    jQuery(document).on("click", ".viewVendorLoan", function () {
        var id = $(this).data("id");
        $("#loading").show();
        $.ajax({
            type: "post",
            url: baseURL + "vendor/view_loans_template",
            data: {"id": id},
            success: function (data) {
                if (data != '') {
                    $("#loading").hide();
                    $("#viewloandetails").html(data);
                    $('#noClassesModal').modal('show');
                }
                else {
                    $("#loading").hide();
                    $('#noClassesModal').modal('hide');
                }
            }
        });
    });



    jQuery(document).on("keypress", ".autocomplete_mcd", function () {

        var rowid = $(this).parent().parent().attr("data-mcd-id");
        $("#vehicle_mcd_tr_" + rowid + "_vehicle_id").autocomplete({
            source: function (request, response) {
                $("#loading").show();
                $.ajax({
                    url: baseURL + "Vehicle/getVehicles",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term,
                        request: 1
                    },
                    success: function (data) {
                        $("#loading").hide();
                        response(data);
                    },
                    error: function (data) { // 500 Status Header
                        $("#loading").hide();
                        Swal.fire({
                            type: 'error',
                            text: 'No records found. Please try again.'
                        });
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label); // display the selected text
                var id = ui.item.value; // selected id to input
                var vendor_id = ui.item.vendor_id; // selected id to input
                $("#vehicle_mcd_tr_" + rowid + "_vendor_vehicle_id").val(id);
                $("#vehicle_mcd_tr_" + rowid + "_vendor_id").val(vendor_id);
                return false;
            }
        });
    });


    jQuery(document).on("keypress", ".autocomplete_tax", function () {

        var rowid = $(this).parent().parent().attr("data-tax-id");
        $("#vehicle_tax_tr_" + rowid + "_vehicle_id").autocomplete({
            source: function (request, response) {
                $("#loading").show();
                $.ajax({
                    url: baseURL + "Vehicle/getVehicles",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term,
                        request: 1
                    },
                    success: function (data) {
                        $("#loading").hide();
                        response(data);
                    },
                    error: function (data) { // 500 Status Header
                        $("#loading").hide();
                        Swal.fire({
                            type: 'error',
                            text: 'No records found. Please try again.'
                        });
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label); // display the selected text
                var id = ui.item.value; // selected id to input
                var vendor_id = ui.item.vendor_id; // selected id to input
                $("#vehicle_tax_tr_" + rowid + "_vendor_vehicle_id").val(id);
                $("#vehicle_tax_tr_" + rowid + "_vendor_id").val(vendor_id);
                return false;
            }
        });
    });




    /** Delete Company Branch */
    $(document).ready(function () {
        $(".deleteVehicleMcd").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteVehicleMcd",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'MCD has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'MCD delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });


    /** Delete Company Branch */
    $(document).ready(function () {
        $(".deleteVehicleTax").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteVehicleTaxs",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'TAX has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'TAX delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });
	
	/** Delete Company Branch */
    $(document).ready(function () {
        $(".deleteCab").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: baseURL + "deleteCab",
                        data: { "id": id },
                        success: function (data) {
                            if (data == true) {
                                currentRow.parents('tr').remove();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Vehicle has been deleted.'
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Failed!',
                                    text: 'Vehicle delete failed.'
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });
	
	/** Send an Email of order */
    $(document).ready(function () {
        $(".sendOrderEmail").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                text: "Are you sure want to send an email?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, send it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
					$("#loading").show();
                    $.ajax({
                        type: "post",
                        url: baseURL + "sendOrderEmail",
                        data: { "id": id },
                        success: function (res) {
							//console.log(res);
							$("#loading").hide();
                            if (res.response == 1) {
                                Swal.fire({
                                    type: 'success',
                                    text: res.message
                                }).then(function() {
										setTimeout(function() {
										  location.reload();
										});
									})
								
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    text: res.message
                                })
                            }
                        },
                        error: function () {
							$("#loading").hide();
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });
	
	
	/** Send an message of order */
    $(document).ready(function () {
        $(".sendOrderMessage").click(function () {
            var id = $(this).data("id"),
                currentRow = $(this);
            Swal.fire({
                text: "Are you sure want to send message?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, send it!',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
					$("#loading").show();
                    $.ajax({
                        type: "post",
                        url: baseURL + "sendOrderMessage",
                        data: { "id": id },
                        success: function (res) {
							$("#loading").hide();
                            if (res.response == 1) {
                                Swal.fire({
                                    type: 'success',
                                    text: res.message
                                }).then(function() {
									setTimeout(function() {
									  location.reload();
									});
								})
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    text: res.message
                                })
                            }
                        },
                        error: function () {
							$("#loading").hide();
                            Swal.fire({
                                type: 'error',
                                text: 'There seems to be an error, Please try again!'
                            })
                        }
                    });
                }
            })
        });
    });

    


    



	

});

// Code by surya

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance").val(r[0]), $("#duration").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler2.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler2.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance2").val(r[0]), $("#duration2").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler3.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler3.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance3").val(r[0]), $("#duration3").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler4.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler4.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance4").val(r[0]), $("#duration4").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler5.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler5.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance5").val(r[0]), $("#duration5").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler6.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler6.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance6").val(r[0]), $("#duration6").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler7.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler7.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance7").val(r[0]), $("#duration7").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler8.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler8.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance8").val(r[0]), $("#duration8").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler9.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler9.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance9").val(r[0]), $("#duration9").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
}, AutocompleteDirectionsHandler10.prototype.setupPlaceChangedListener = function(e, t) {
    var o = this;
    e.bindTo("bounds", this.map), e.addListener("place_changed", function() {
        var i = e.getPlace();
        i.place_id ? ("ORIG" === t ? o.originPlaceId = i.place_id : o.destinationPlaceId = i.place_id, o.route()) : Swal.fire({
            type: "error",
            text: "Please select an option from the dropdown list."
        })
    })
}, AutocompleteDirectionsHandler10.prototype.route = function() {
    if (this.originPlaceId && this.destinationPlaceId) {
        var e = this;
        this.directionsService.route({
            origin: {
                placeId: this.originPlaceId
            },
            destination: {
                placeId: this.destinationPlaceId
            },
            travelMode: this.travelMode
        }, function(t, o) {
            if ("OK" === o) {
                e.directionsDisplay.setDirections(t);
                var i = t.routes[0].legs[0].distance.text,
                    n = t.routes[0].legs[0].duration.text,
                    a = t.routes[0].overview_path[Math.floor(t.routes[0].overview_path.length / 2)];
                infowindow.setPosition(a), infowindow.setContent(n + ", " + i), infowindow.open(e.map);
                var r = i.split(" km");
                $("#distance10").val(r[0]), $("#duration10").val(n)
            } else Swal.fire({
                type: "error",
                text: "Directions request failed due to " + o
            })
        })
    }
};

// Code by surya