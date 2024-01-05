    </div>
    </main>
    <!--Main layout-->
    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4">
      <!--Copyright-->
      <div class="footer-copyright py-3">
        &copy; <?= date('Y') ?> Copyright:
        <a href="<?php echo base_url(); ?>">Sewaktravels</a> All Rights Reserved.
      </div>
      <!--/.Copyright-->
    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
   
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb-2.min.js"></script>
    <!-- DataTables  -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/addons/datatables.min.js"></script>
    <!-- DataTables Select  -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/addons/datatables-select.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

<!-- JS Page Level -->

<script src="<?php echo base_url(); ?>assets/js/theme.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/modernizr.custom.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css" />

    <!-- Initializations -->
    <script type="text/javascript">
      $('#dataTables-cabBilling').DataTable({
        "searching": false,
        "bPaginate": false,
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true
      });



      $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();


        function cb(start, end) {
          //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          }
        }, cb);

        cb(start, end);

      });


      // Animations initialization


      // SideNav Initialization
      $(".button-collapse").sideNav();

      var container = document.querySelector('.custom-scrollbar');

      Ps.initialize(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
      });

      // Tooltips Initialization
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })


      new WOW().init();

      $('#uploadAdminCompanyLogo').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?php echo base_url(); ?>upload_logo',
          type: "post",
          data: new FormData(this), //this is formData
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          success: function(data) {
            alert("Upload Image Successful.");
            window.location = '<?php echo base_url(); ?>adminCompanyListing'
          }
        });
      });


      /*$('#vehicle_id').on('change', function(e) {
        e.preventDefault();
        var vehicle_id = $("#vehicle_id").val();
         $.get('<?php echo base_url(); ?>vehicle/getVendorId', {"vehicle_id" : vehicle_id})
         .done(function(response) {
               $("#vendor_id").val(response);
         });
      });*/


      $(".imageUploadForm").on('submit', (function(e) {
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
          type: "POST",
          data: new FormData(this),
          beforeSend: function() {

          },
          contentType: false,
          processData: false,
          success: function(data) {

            var obj = JSON.parse(data);
            if (obj.status == 'error') {
              Swal.fire({
                type: 'error',
                text: obj.message,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                  return new Promise(function(resolve) {
                    setTimeout(function() {
                      resolve()
                    }, 1000)
                  })
                }
              }).then(function() {
                setTimeout(function() {
                  location.reload();
                });
              })

            } else{

              Swal.fire({
                type: 'success',
                text: obj.message,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                  return new Promise(function(resolve) {
                    setTimeout(function() {
                      resolve()
                    }, 1000)
                  })
                }
              }).then(function() {
                setTimeout(function() {
                  location.reload();
                });
              })

            }

          },
          error: function() {}
        });
      }));
    </script>
    <?php if ($this->uri->segment(1) == 'dashboard') { ?>
      <!-- Charts -->
      <script>
        // Line
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });

        //pie
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
          type: 'pie',
          data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
              data: [300, 50, 100, 40, 120],
              backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
              hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
          },
          options: {
            responsive: true,
            legend: false
          }
        });


        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                backgroundColor: [
                  'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                  'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2,
                data: [65, 59, 80, 81, 56, 55, 40]
              },
              {
                label: "My Second dataset",
                backgroundColor: [
                  'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                  'rgba(0, 10, 130, .7)',
                ],
                data: [28, 48, 40, 19, 86, 27, 90]
              }
            ]
          },
          options: {
            responsive: true
          }
        });


        //radar
        var ctxR = document.getElementById("radarChart").getContext('2d');
        var myRadarChart = new Chart(ctxR, {
          type: 'radar',
          data: {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [{
              label: "My First dataset",
              data: [65, 59, 90, 81, 56, 55, 40],
              backgroundColor: [
                'rgba(105, 0, 132, .2)',
              ],
              borderColor: [
                'rgba(200, 99, 132, .7)',
              ],
              borderWidth: 2
            }, {
              label: "My Second dataset",
              data: [28, 48, 40, 19, 96, 27, 100],
              backgroundColor: [
                'rgba(0, 250, 220, .2)',
              ],
              borderColor: [
                'rgba(0, 213, 132, .7)',
              ],
              borderWidth: 2
            }]
          },
          options: {
            responsive: true
          }
        });

        //doughnut
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
          type: 'doughnut',
          data: {
            labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
            datasets: [{
              data: [300, 50, 100, 40, 120],
              backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
              hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
          },
          options: {
            responsive: true
          }
        });
      </script>
    <?php } ?>

    <script type="text/javascript">
      var windowURL = window.location.href;
      pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
      var x = $('a[href="' + pageURL + '"]');
      x.addClass('active');
      x.parent().addClass('active');
      var y = $('a[href="' + windowURL + '"]');
      y.addClass('active');
      y.parent().addClass('active');
    </script>
    <!-- Tables - Use for reference -->
    <script src="<?php echo base_url(); ?>assets/js/datetimepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.0/js/lightbox.min.js" integrity="sha256-/I1k7fzO8O0pqCfvH4Z2hGjDuafCbMb0teTdDWY3IFo=" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script>
    $("#mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
       });
    
      $(function() {

        //Date picker
        $('#datepicker').datepicker({
          dateFormat: 'dd-mm-yy',
          toggleActive: true,
          autoclose: true,
          changeMonth: true,
          changeYear: true,
          yearRange: "c-0:c+10"
        })

        $('#fitness_expiry_date, #insurance_expiry_date, #polution_expiry_date, #permit_1_year_expiry_date, #permit_5_year_expiry_date').datepicker({
          dateFormat: 'dd-mm-yy',
          changeMonth: true,
          changeYear: true,
          yearRange: "c-0:c+10"
        })

        /*$('.datepicker').datepicker({
		  autoclose: true
    })*/

        $('.datepicker').pickadate({
          // Escape any “rule” characters with an exclamation mark (!).
          formatSubmit: 'yyyy-mm-dd',
          today: '',
          clear: 'Clear selection',
          close: 'Cancel'
        })

        //Date picker
        $('#expiry_date').datepicker({
          dateFormat: 'dd-mm-yy',
          toggleActive: true,
          autoclose: true,
          changeMonth: true,
          changeYear: true
        })

        $('#start_date, #end_date').datepicker({
          dateFormat: 'yy-mm-dd',
          toggleActive: true,
          autoclose: true,
          changeMonth: true,
          changeYear: true
        })

        $('#start_date1, #end_date1, #advance_date, #agreement_date').datepicker({
          dateFormat: 'dd-mm-yy',
          toggleActive: true,
          autoclose: true,
          changeMonth: true,
          changeYear: true
        })

        $('#roster_date').datepicker({
          dateFormat: 'dd-mm-yy',
          toggleActive: true,
          autoclose: true,
          changeMonth: true,
          changeYear: true
        })

        // $('.start_date, .end_date').datepicker({
        //   dateFormat: 'dd-mm-yy',
        //   toggleActive: true,
        //   autoclose: true,
        //   changeMonth: true,
        //   changeYear: true
        // })


        //Dynamic Datepicker Fields
        $('body').on('focus', ".start_date", function() {
          $(this).datepicker({
            dateFormat: 'dd-mm-yy',
            toggleActive: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true
          });
        });

        $('body').on('focus', ".end_date", function() {
          $(this).datepicker({
            dateFormat: 'dd-mm-yy',
            toggleActive: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true
          });
        });

        /*
    $('.invoice_shift_timing').datetimepicker({
      format: 'HH:ii P',
      autoclose: 1,
      startView: 1,
      minView: 0,
      maxView: 1,
      forceParse: 0,
      showMeridian: 1,
      minuteStep: 10
  });*/


        //Dynamic Datepicker Fields
        $('body').on('focus', ".invoice_shift_timing", function() {
          $(this).datetimepicker({
            format: 'HH:ii P',
            autoclose: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0,
            showMeridian: 1,
            minuteStep: 10
          });
        });

        //startDate: '-3d'
      })
      $(document).ready(function() {
        $('#dataTables-example').DataTable();
      });

      // MDB Lightbox Init
      $(function() {
        //$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
      });

      lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
      })





      //$(document).on('keydown', '.autocompletevehicle_no', function() {
      $(".invoicetable").on("keypress", ".autocompletevehicle_no", function() {
        var rowid = $(this).parent().parent().attr("data-row-id");

        $("#invoice_tr_" + rowid + "_vehicle_no").autocomplete({
          source: function(request, response) {
            //$("#loading").show();
            $.ajax({
              url: "<?php echo base_url(); ?>Vehicle/getVehicles",
              type: 'GET',
              dataType: "json",
              data: {
                search: request.term,
                request: 1
              },
              success: function(data) {
                //$("#loading").hide();
                response(data);
              }
            });
          },
          select: function(event, ui) {
            $(this).val(ui.item.label); // display the selected text
            var id = ui.item.value; // selected id to input
            var vehicle_type_id = ui.item.vehicle_type_id; // selected id to input
            var vendor_id = ui.item.vendor_id; // selected id to input
            var rate = ui.item.rate; // selected id to input

            $("#invoice_tr_" + rowid + "_vehicle_id").val(id);
            $("#invoice_tr_" + rowid + "_vendor_id").val(vendor_id);
            $("#invoice_tr_" + rowid + "_rate").val(rate);
            $("#invoice_tr_" + rowid + "_vehicle_type option[value=" + vehicle_type_id + "]").attr('selected', 'selected');
            return false;
          }
        });
      });





      $(document).ready(function() {

        /* add more invoice row script code */
        $(".invoicetable .addMoreInvoice").click(function(e) {

          e.preventDefault();


          var trlength = $(".invoice_tr").length;
          var nexttrid = parseInt($("tr.invoice_tr:last").attr("data-row-id")) + 1;

          //var shortid = parseInt($("tr.cab_short_tr"+nexttrid+":last").attr("data-short-id"));
          //var shortid = parseInt($("tr.cab_short_tr"+nexttrid+":last").attr("data-short-id"));
          var shortid = parseInt($("tr.cab_short_tr" + nexttrid).attr("data-short-id"));

          var newtr = '<tr class="invoice_tr" data-row-id="' + nexttrid + '" id="invoice_tr_' + nexttrid + '">';

          newtr += '<td><a class="deleteInvoice red-text" data-invoice-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

          newtr += '<td class="text-center"><span id="invoice_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';
          newtr += '<input type="hidden" id="invoice_tr_' + nexttrid + '_vehicle_id" name="invoice_vehicle_id[]" />';
          newtr += '<input type="hidden" id="invoice_tr_' + nexttrid + '_vendor_id" name="invoice_vendor_id[]" />';
          newtr += '<input type="hidden" id="invoice_tr_' + nexttrid + '_rate" name="invoice_rate[]"/>';
          newtr += '<input type="hidden" id="invoice_tr_' + nexttrid + '_guard_rate" name="invoice_guard_rate[]"/>';
          newtr += '<input type="hidden" id="invoice_tr_' + nexttrid + '_vendor_rate" name="invoice_vendor_rate[]"/>';
          newtr += '<input type="hidden" id="invoice_tr_' + nexttrid + '_vendor_guard_rate" name="invoice_vendor_guard_rate[]"/>';
          newtr += '</td>';


          newtr += '<td><input type="text" id="invoice_tr_' + nexttrid + '_shift_timing" name="invoice_shift_timing[]" class="form-control form-control-sm required invoice_shift_timing" placeholder="H:S" data-bind="content" style="width:90px;" /></td>';

          newtr += '<td><select name="invoice_roster_type[]" id="invoice_tr_' + nexttrid + '_roster_type" class="form-control form-control-sm required" style="width:100px;"><option value="">Type</option><option value="pickup">Pick-Up</option><option value="drop">Drop</option><option value="fullday">Full Day</option>';
          newtr += '</select></td>';

          newtr += '<td><input type="text" id="invoice_tr_' + nexttrid + '_vehicle_no" name="invoice_vehicle_no[]" class="form-control form-control-sm required autocompletevehicle_no" data-bind="content" placeholder="Vehicle No." style="width:130px;" /></td>';

          newtr += '<td><select name="invoice_vehicle_type[]" id="invoice_tr_' + nexttrid + '_vehicle_type" class="form-control form-control-sm required" style="width:150px;">';
          <?php if (!empty($vehicleType)) { ?>
            newtr += '<option value="">Select</option>';
            <?php foreach ($vehicleType as $rl) { ?>
              newtr += '<option value="<?php echo $rl->id; ?>" <?php if ($rl->id == set_value('type')) {
                                                                      echo "selected=selected";
                                                                    } ?>><?php echo $rl->type; ?></option>';
            <?php } ?>
          <?php } ?>
          newtr += '</select></td>';


          newtr += '<td><input type="text" id="invoice_tr_' + nexttrid + '_trip_id" name="invoice_trip_id[]" class="form-control form-control-sm" data-bind="content" placeholder="Trip ID" style="width:80px;" /></td>';

          newtr += '<td><input type="text" id="invoice_tr_' + nexttrid + '_location" name="invoice_location[]" class="form-control form-control-sm required" placeholder="Address" style="width:200px;" /></td>';


          newtr += '<td><select id="invoice_tr_' + nexttrid + '_zone" name="invoice_zone[]" class="form-control form-control-sm required addzone" data-bind="content" style="width:150px;">';
          <?php if (!empty($zoneList)) { ?>
            newtr += '<option value="">Select</option>';
            <?php foreach ($zoneList as $rl) { ?>
              newtr += '<option value="<?php echo $rl->zone_id; ?>" <?php if ($rl->zone_id == set_value('invoice_zone')) {
                                                                          echo "selected=selected";
                                                                        } ?>><?php echo $rl->zone_name; ?></option>';
            <?php } ?>
          <?php } ?>
          newtr += '</select></td>';

          newtr += '<td><select id="invoice_tr_' + nexttrid + '_zone_type" name="invoice_zone_type[]" class="form-control form-control-sm addzonetype required" data-bind="content" style="width:150px;">';
          newtr += '<option value="" id="loading_zone_type">Select</option>';
          newtr += '</select></td>';

          newtr += '<td><select class="form-control form-control-sm required" id="invoice_tr_' + nexttrid + '_guard" name="invoice_guard[]" required data-bind="content" style="width:70px;"><option value="0">No</option><option value="1">Yes</option>';
          newtr += '</select></td>';

          newtr += '<td><input type="text" id="invoice_tr_' + nexttrid + '_penality" name="invoice_penality[]" class="form-control form-control-sm" data-bind="number" placeholder="0" /></td>';

          newtr += '<td><input type="text" id="invoice_tr_' + nexttrid + '_penality_clause" name="invoice_penality_clause[]" class="form-control form-control-sm" data-bind="content" placeholder="" /></td>';

          newtr += '<td>';
          newtr += '<a href="#" class="btn-sm btn-outline-info btn-rounded" data-toggle="tooltip" data-placement="bottom" title="Add Short Cab Details" onclick="addRosterDetails(' + nexttrid + ');">';
          newtr += '<i class="fas fa-pencil-alt"></i>';
          newtr += '</a>';
          newtr += '</td>';

          newtr += '</tr>';


          newtr += '<tr class="invoice" data-invoice-id="' + nexttrid + '" id="invoice_' + nexttrid + '">';
          newtr += '<td colspan="9"></td>';
          newtr += '<td colspan="5">';
          newtr += '<div id="div_' + nexttrid + '" style="display:none;">';
          newtr += '<div class="table-responsive text-nowrap" id="cab_short' + nexttrid + '">';
          newtr += '<table width="100%" class="table table-striped table-bordered table-hover cabshorttable table-sm">';
          newtr += '<tr class="cab_short_tr' + nexttrid + '1" data-short-id="' + nexttrid + '1" id="cab_short_tr_' + nexttrid + '1">';
          newtr += '<td>';
          newtr += '<a class="addMoreCabShort green-text" href="javascript:void(0);" onclick="addMoreCabShort1(' + nexttrid + ', ' + nexttrid + ')">';
          newtr += '<i class="fas fa-plus-circle"></i>';
          newtr += '</a>';
          newtr += '</td>';
          newtr += '<td class="text-center">';
          newtr += '<span id="cab_short_tr_' + nexttrid + '1_id">1</span>';
          newtr += '<input type="hidden" id="cab_short_tr_' + nexttrid + '1_vehicle_id" name="cab_short_vehicle_id[]" />';
          newtr += '<input type="hidden" id="cab_short_tr_' + nexttrid + '1_vendor_id" name="cab_short_vendor_id[]" />';
          newtr += '</td>';
          newtr += '<td>';
          newtr += '<select class="form-control form-control-sm" id="cab_short_tr_' + nexttrid + '1_type" name="cab_short_type[]" data-bind="content">';
          newtr += '<option value="1">Cab</option>';
          newtr += '<option value="2">Taxi</option>';
          newtr += '</select>';
          newtr += '</td>';
          newtr += '<td>';
          newtr += '<input type="text" id="cab_short_tr_' + nexttrid + '1_vehicle_no" name="cab_short_vehicle_no[]" class="form-control form-control-sm auto_completevehicle_no" placeholder="Vehicle No." data-bind="content" style="width:120px;"/>';
          newtr += '</td>';
          newtr += '<td>';
          newtr += '<select class="form-control form-control-sm" id="cab_short_tr_' + nexttrid + '1_vehicle_type" name="cab_short_vehicle_type[]" data-bind="content" style="width:100px;">';
          newtr += '<option value="">Select</option>';
          <?php
          if (!empty($vehicleType)) {
            foreach ($vehicleType as $rl) {
              ?>
              newtr += '<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('type')) {
                                                                    echo "selected=selected";
                                                                  } ?>><?php echo $rl->type ?>';
              newtr += '</option>';
          <?php
            }
          }
          ?>
          newtr += '</select>';
          newtr += '</td>';
          newtr += '<td>';
          newtr += '<input type="text" id="cab_short_tr_' + nexttrid + '1_price" name="cab_short_price[]" class="form-control form-control-sm" placeholder="0" data-bind="number" style="width:70px;"/>';
          newtr += '</td>';
          newtr += '</tr>';
          newtr += '</table></div></div></td></tr>';









          /* insert new row */
          //$(".invoice_tr").last().after(newtr);
          $(".invoice").last().after(newtr);

          /* update tr serial number */
          var trCounter = 1;
          $("tr.invoice_tr").each(function(index) {
            $(this).find("span.serialno").text(trCounter);
            trCounter++;
          });

          /* call function of total invoice */
          //totalInvoiceValueCalculation();
        });


        /* add more invoice row script code */
        $(".companytable .addMoreCompanyRate").click(function(e) {

          e.preventDefault();


          var trlength = $(".company_tr").length;
          var nexttrid = parseInt($("tr.company_tr:last").attr("data-row-id")) + 1;

          var newtr = '<tr class="company_tr" data-row-id="' + nexttrid + '" id="company_tr_' + nexttrid + '">';

          newtr += '<td><a class="deleteCompanyRate red-text" data-invoice-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

          newtr += '<td class="text-center"><span id="company_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';
          newtr += '</td>';

          newtr += '<td><select id="company_tr_' + nexttrid + '_vehicle_type" name="vehicle_type[]" class="form-control form-control-sm required" data-bind="content">';
          <?php if (!empty($vehicleTypes)) { ?>
            newtr += '<option value="">Select</option>';
            <?php foreach ($vehicleTypes as $rl) { ?>
              newtr += '<option value="<?php echo $rl->id; ?>" <?php if ($rl->id == set_value('vehicle_type')) {
                                                                      echo "selected=selected";
                                                                    } ?>><?php echo ucwords(strtolower($rl->type)); ?></option>';
            <?php } ?>
          <?php } ?>
          newtr += '</select></td>';

          newtr += '<td><select id="company_tr_' + nexttrid + '_zone" name="company_zone[]" class="form-control form-control-sm required addzone" data-bind="content">';
          <?php if (!empty($zoneList)) { ?>
            newtr += '<option value="">Select</option>';
            <?php foreach ($zoneList as $rl) { ?>
              newtr += '<option value="<?php echo $rl->zone_id; ?>" <?php if ($rl->zone_id == set_value('company_zone')) {
                                                                          echo "selected=selected";
                                                                        } ?>><?php echo ucwords(strtolower($rl->zone_name)); ?></option>';
            <?php } ?>
          <?php } ?>
          newtr += '</select></td>';

          newtr += '<td><select id="company_tr_' + nexttrid + '_zone_type" name="company_zone_type[]" class="form-control form-control-sm addzonetype required" data-bind="content">';
          newtr += '<option value="" id="loading_zone_type">Select</option>';
          newtr += '</select></td>';

          newtr += '<td><input type="text" id="company_tr_' + nexttrid + '_cab_rate" name="company_cab_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0"  /></td>';

          newtr += '<td><select class="form-control form-control-sm required" id="company_tr_' + nexttrid + '_guard" name="company_guard[]" required data-bind="content"><option value="0">No</option><option value="1">Yes</option>';
          newtr += '</select></td>';

          newtr += '<td><input type="text" id="company_tr_' + nexttrid + '_guard_rate" name="company_guard_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" /></td>';


          newtr += '</tr>';

          /* insert new row */
          $(".company_tr").last().after(newtr);

          /* update tr serial number */
          var trCounter = 1;
          $("tr.company_tr").each(function(index) {
            $(this).find("span.serialno").text(trCounter);
            trCounter++;
          });

        });

        /* add more invoice row script code */
        $(".companycabtable .addMoreCompanyCabRate").click(function(e) {

          e.preventDefault();


          var trlength = $(".company_cab_tr").length;
          var nexttrid = parseInt($("tr.company_cab_tr:last").attr("data-row-id")) + 1;

          var newtr = '<tr class="company_cab_tr" data-row-id="' + nexttrid + '" id="company_cab_tr_' + nexttrid + '">';

          newtr += '<td><a class="deleteCompanyCabRate red-text" data-invoice-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

          newtr += '<td class="text-center"><span id="company_cab_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';
          newtr += '</td>';

          newtr += '<td><select id="company_cab_tr_' + nexttrid + '_vehicle_type" name="company_cab_vehicle_type[]" class="form-control form-control-sm" data-bind="content">';
          <?php if (!empty($vehicleTypes)) { ?>
            newtr += '<option value="">Select</option>';
            <?php foreach ($vehicleTypes as $rl) { ?>
              newtr += '<option value="<?php echo $rl->id; ?>" <?php if ($rl->id == set_value('vehicle_type')) {
                                                                      echo "selected=selected";
                                                                    } ?>><?php echo ucwords(strtolower($rl->type)); ?></option>';
            <?php } ?>
          <?php } ?>
          newtr += '</select></td>';

          newtr += '<td><select id="company_cab_tr_' + nexttrid + '_zone" name="company_cab_zone[]" class="form-control form-control-sm" data-bind="content">';
          <?php if (!empty($zoneList)) { ?>
            newtr += '<option value="">Select</option>';
            <?php foreach ($zoneList as $rl) { ?>
              newtr += '<option value="<?php echo $rl->zone_id; ?>" <?php if ($rl->zone_id == set_value('company_zone')) {
                                                                          echo "selected=selected";
                                                                        } ?>><?php echo ucwords(strtolower($rl->zone_name)); ?></option>';
            <?php } ?>
          <?php } ?>
          newtr += '</select></td>';


          newtr += '<td><input type="text" id="company_cab_tr_' + nexttrid + '_rate_km" name="company_cab_rate_km[]" class="form-control form-control-sm" data-bind="number" placeholder="0"  /></td>';
          newtr += '<td><input type="text" id="company_cab_tr_' + nexttrid + '_rate_flat" name="company_cab_rate_flat[]" class="form-control form-control-sm" data-bind="number" placeholder="0" /></td>';
          newtr += '<td><input type="text" id="company_cab_tr_' + nexttrid + '_night_charge" name="company_cab_night_charge[]" class="form-control form-control-sm" data-bind="number" placeholder="0" /></td>';
          newtr += '<td><input type="text" id="company_cab_tr_' + nexttrid + '_toll_tax" name="company_cab_toll_tax[]" class="form-control form-control-sm" data-bind="number" placeholder="0" /></td>';
          newtr += '<td><input type="text" id="company_cab_tr_' + nexttrid + '_extra" name="company_cab_extra[]" class="form-control form-control-sm" data-bind="number" placeholder="0" /></td>';


          newtr += '</tr>';

          /* insert new row */
          $(".company_cab_tr").last().after(newtr);

          /* update tr serial number */
          var trCounter = 1;
          $("tr.company_cab_tr").each(function(index) {
            $(this).find("span.serialno").text(trCounter);
            trCounter++;
          });

        });


        /* calculate total invoice value function */
        function totalInvoiceValueCalculation() {

          var totalInvoiceValue = 0.00;
          var totalInvoiceWithoutTaxValue = 0.00;
          $("tr.invoice_tr").each(function(index) {

            var rowid = $(this).attr("data-row-id");
            if ($("#invoice_tr_" + rowid + "_itemid").val() != '' && $("#invoice_tr_" + rowid + "_itemid").val() > 0) {

              var taxablevalue = parseFloat($("#invoice_tr_" + rowid + "_taxablevalue").attr("data-invoice-tr-" + rowid + "-taxablevalue"));
              totalInvoiceValue += (taxablevalue);
              totalInvoiceWithoutTaxValue += taxablevalue;
            }
          });

          totalFinalInvoiceValue = totalInvoiceValue.toFixed(2);
          $(".totalprice .invoicetotalprice").text(totalFinalInvoiceValue);


          $.ajax({
            data: {
              totalInvoiceValue: totalFinalInvoiceValue,
              action: "numberToWords"
            },
            dataType: 'json',
            type: 'post',
            url: "<?php echo base_url(); ?>/?ajax=client_convert_number_to_words",
            success: function(response) {

              if (response.status == "success") {
                $(".totalamountwords .totalpricewords").text(response.invoicevalue);
              } else {
                $(".totalamountwords .totalpricewords").text("failed");
              }
            }
          });

        }
        /* end of calculate total invoice value function */

        /* delete invoice row script code */
        $(".invoicetable").on("click", ".deleteInvoice", function() {
          var invoiceId = $(this).attr("data-invoice-id");
          $("#invoice_tr_" + invoiceId).remove();
          /* update tr serial number */
          var trCounter = 1;
          $("tr.invoice_tr").each(function(index) {
            $(this).find("span.serialno").text(trCounter);
            trCounter++;
          });

          /* call function of total invoice */
          //totalInvoiceValueCalculation();
        });


        /* delete invoice row script code */
        $(".companytable").on("click", ".deleteCompanyRate", function() {
          var invoiceId = $(this).attr("data-invoice-id");

          $("#company_tr_" + invoiceId).remove();
          /* update tr serial number */
          var trCounter = 1;
          $("tr.company_tr").each(function(index) {
            $(this).find("span.serialno").text(trCounter);
            trCounter++;
          });
        });

        /* delete invoice row script code */
        $(".companycabtable").on("click", ".deleteCompanyCabRate", function() {
          var invoiceId = $(this).attr("data-invoice-id");
          $("#company_cab_tr_" + invoiceId).remove();
          /* update tr serial number */
          var trCounter = 1;
          $("tr.company_cab").each(function(index) {
            $(this).find("span.serialno").text(trCounter);
            trCounter++;
          });
        });


        /* validate invoice form */
        $('#save_invoice').click(function() {

          var mesg = {};
          if (vali.validate(mesg, 'create-invoice')) {
            return true;
          }
          return false;
        });
        /* end of validate invoice form */

        /* save and add new invoice */
        $("#save_add_new_invoice").click(function() {

          var flag = 0;
          var mesg = {};

          if (vali.validate(mesg, 'create-invoice')) {
            flag = 1;
          }

          if (flag === 1) {

            $("#loading").show();
            $.ajax({
              data: {
                invoiceData: $("#create-invoice").serialize(),
                action: "saveNewInvoice"
              },
              dataType: 'json',
              type: 'post',
              url: "<?php echo base_url(); ?>addNewCabRosters",
              success: function(response) {

                $("#loading").hide();
                if (response.status == "error") {

                  Swal.fire({
                    type: 'error',
                    text: response.message
                  });
                } else if (response.status == "success") {

                  Swal.fire({
                    type: 'success',
                    text: response.message
                  }).then(function() {
                    setTimeout(function() {
                      location.reload();
                    });
                  })
                }
              }
            });
          }
        });
        /* end of save and add new invoice */


        /* save and add new invoice */
        $("#update_add_new_invoice").click(function() {

          var flag = 0;
          var mesg = {};

          if (vali.validate(mesg, 'create-invoice')) {
            flag = 1;
          }

          if (flag === 1) {
            $("#loading").show();
            $.ajax({
              data: {
                invoiceData: $("#create-invoice").serialize(),
                action: "saveUpdateInvoice"
              },
              dataType: 'json',
              type: 'post',
              url: "<?php echo base_url(); ?>editCabRoster",
              success: function(response) {

                $("#loading").hide();
                if (response.status == "error") {

                  Swal.fire({
                    type: 'error',
                    text: response.message
                  });
                } else if (response.status == "success") {

                  Swal.fire({
                    type: 'success',
                    text: response.message
                  }).then(function() {
                    setTimeout(function() {

                      //location.reload(); 
                      window.location.href = "<?php echo base_url(); ?>/cabRosterListing";

                    });
                  })
                }
              }
            });
          }
        });
        /* end of save and add new invoice */

        /* save and add new invoice */
        $("#update_add_new_company").click(function() {

          var flag = 0;
          var mesg = {};

          if (vali.validate(mesg, 'editCompany')) {
            flag = 1;
          }

          if (flag === 1) {
            $("#loading").show();
            $.ajax({
              data: {
                companyData: $("#editCompany").serialize(),
                action: "editCompany"
              },
              dataType: 'json',
              type: 'post',
              url: "<?php echo base_url(); ?>editCompany",
              success: function(response) {

                $("#loading").hide();
                if (response.status == "error") {

                  Swal.fire({
                    type: 'error',
                    text: response.message
                  });
                } else if (response.status == "success") {

                  Swal.fire({
                    type: 'success',
                    text: response.message
                  }).then(function() {
                    setTimeout(function() {

                      //location.reload(); 
                      window.location.href = "<?php echo base_url(); ?>/companyListing";

                    });
                  })
                }
              }
            });
          }
        });
        /* end of save and add new invoice */


        /* save and add new invoice */
        $("#save_add_new_company").click(function() {

          var flag = 0;
          var mesg = {};

          if (vali.validate(mesg, 'addNewCompany')) {
            flag = 1;
          }

          if (flag === 1) {

            $("#loading").show();
            $.ajax({
              data: {
                companyData: $("#addNewCompany").serialize(),
                action: "addNewCompanies"
              },
              dataType: 'json',
              type: 'post',
              url: "<?php echo base_url(); ?>addNewCompanies",
              success: function(response) {

                $("#loading").hide();
                if (response.status == "error") {

                  Swal.fire({
                    type: 'error',
                    text: response.message
                  });
                } else if (response.status == "success") {

                  Swal.fire({
                    type: 'success',
                    text: response.message
                  }).then(function() {
                    setTimeout(function() {
                      location.reload();
                    });
                  })
                }
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
        /* end of save and add new invoice */



















        /* save new invoice */
        $("#create-invoice").submit(function(event) {

          event.preventDefault();

          var finalInvoiceValue = $(".totalprice .invoicetotalprice").text();
          if (finalInvoiceValue.length > 16) {
            $("#amountValidationModal").modal("show");
            return false;
          }

          $("#loading").show();
          $.ajax({
            data: {
              invoiceData: $("#create-invoice").serialize(),
              action: "saveNewInvoice"
            },
            dataType: 'json',
            type: 'post',
            url: "<?php echo base_url(); ?>/?ajax=client_save_invoice",
            success: function(response) {

              $("#loading").hide();
              if (response.status == "error") {

                $(".errorValidationContainer").html(response.message);
                $(".errorValidationContainer").show();
                $('html, body').animate({
                  scrollTop: $(".formcontainer").offset().top
                }, 1000);
              } else if (response.status == "success") {

                $(".errorValidationContainer").html("");
                $(".errorValidationContainer").hide();
                window.location.href = '<?php echo base_url(); ?>/?page=client_invoice_list';
              }
            }
          });
        });
        /* end of save new item */



        /* calculate row invoice function */
        function rowInvoiceCalculation(itemid, rowid) {
          if ($.trim($("#invoice_tr_" + rowid + "_rate").val()).length == 0 || $.trim($("#invoice_tr_" + rowid + "_rate").val()).length == '' || $.trim($("#invoice_tr_" + rowid + "_rate").val()) == '.') {
            var currentTrRate = 0.00;
          } else {
            var currentTrRate = parseFloat($("#invoice_tr_" + rowid + "_rate").val());
          }


          var currentTotal = currentTrRate;
          $("#invoice_tr_" + rowid + "_total").val(currentTotal.toFixed(2));
          $("#invoice_tr_" + rowid + "_total").attr("data-invoice-tr-" + rowid + "-total", currentTotal.toFixed(3));

          /*
            var currentTrTaxableValue = currentTotal;
            $("#invoice_tr_"+rowid+"_taxablevalue").val(currentTrTaxableValue.toFixed(2));
            $("#invoice_tr_"+rowid+"_taxablevalue").attr("data-invoice-tr-"+rowid+"-taxablevalue", currentTrTaxableValue.toFixed(3));
          */


          /* end of calculation */

          /* call function of total invoice */
          totalInvoiceValueCalculation();
        }
        /* end of calculate row invoice function */




      });

      $(document).ready(function() {
        $("#company_name").change(function(e) {
          e.preventDefault();
          //$("#sessionEnd").val(parseInt($("#sessionStart").val())+1);

          var comp_id = $("#company_name").val();

          $.ajax({
            type: 'POST',
            url: baseURL + 'company/getBranchListbyCompanyId',
            data: {
              "id": comp_id
            },
            success: function(response) {
              $("#company_branch_show").html(response);
            }
          });

        });



      });







      /** Delete Course */
      $(document).ready(function() {
        $(".deletecabRoster").click(function() {
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
                url: "<?php echo base_url(); ?>deletecabRoster",
                data: {
                  "id": id
                },
                success: function(data) {
                  currentRow.parents('tr').remove();
                  Swal.fire({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Roster has been deleted.'
                  })
                  /*.then(function() {
                    setTimeout(function(){ location.reload(); });
                  })*/
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
      });







      /*
      $( "#company_id" )
      .change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
          str += $( this ).text() + " ";
        });
        $( "#company_wise" ).text( str );
      })
      .change();
      */

      $(function() {
        $("#company_id").on('change', function(e) {
          e.preventDefault();

          var vendor_id = $('#vendor_id').val();
          var company_id = "";
          var company_name = "";
          var newtr = '';
          var i = 0;

          if (vendor_id == 0) {
            Swal.fire({
              type: 'error',
              text: 'Please select vendor.'
            })
          } else {

            $("#loading").show();
            $("#company_id option:selected").each(function() {
              // company_id += $( this ).val() + ",";
              //company_name += $( this ).text() + " ";

              company_id = $(this).val();
              company_name = $(this).text();

              if (company_id == 0) {
                $("#company_wise").html('');
              } else {
                //$( "#company_wise" ).text( company_name );

                newtr += '<div class="card">';
                newtr += '<div class="card-header white-text primary-color" role="tab">';
                newtr += '<a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo' + i + '">Add Company Rate for ' + company_name + '<i class="fas fa-angle-up rotate-icon ml-2"></i></a>';
                newtr += '</div>';
                newtr += '<div id="collapseTwo' + i + '" class="collapse show" role="tabpanel" >';
                newtr += '<div class="card-body">';
                newtr += '<div class="row">';
                newtr += '<div class="col-md-12">';
                newtr += '<div class="table-responsive text-nowrap">';
                newtr += '<table width="100%" class="table table-striped table-bordered table-hover cabCompanyTable table-sm">';
                newtr += '<thead>';
                newtr += '<tr>';
                newtr += '<th>#</th>';
                newtr += '<th>S.No</th>';
                newtr += '<th>Zone Name <span class="red-text">*</span></th>';
                newtr += '<th>Zone Type <span class="red-text">*</span></th>';

                <?php
                if (!empty($vehicleTypeList)) {
                  foreach ($vehicleTypeList as $rl) {
                    ?>
                    newtr += '<th>Cab Rate - <?php echo ucwords(strtolower($rl->type)); ?> <span class="red-text">*</span></th>';
                <?php
                  }
                }
                ?>

                newtr += '<th>Guard Price <span class="red-text">*</span></th>';
                newtr += '</tr>';
                newtr += '</thead>';
                newtr += '<tbody>';
                newtr += '<tr class="company_tr' + company_id + '" data-row-id="' + company_id + '1" id="company_tr_' + company_id + '1">';
                newtr += '<td>';
                newtr += '<input type="hidden" id="company_tr_' + company_id + '1_cab_id" name="company_cab_id' + company_id + '[]" class="form-control form-control-sm" data-bind="content" value="' + company_id + '"/>';
                newtr += '<a class="addcabCompanyCabRate green-text" onclick="addNewRow(' + company_id + ');">';
                newtr += '<i class="fas fa-plus-circle"></i>';
                newtr += '</a>';
                newtr += '</td>';
                newtr += '<td class="text-center">';
                newtr += '<span id="company_tr_1_id">1</span>';
                newtr += '</td>';
                newtr += '<td>';
                newtr += '<select class="form-control form-control-sm addzone1 required" id="company_tr_' + company_id + '1_zone" name="company_zone' + company_id + '[]" data-bind="content" style="width:150px;">';
                newtr += '<option value="">Select</option>';
                <?php
                if (!empty($zoneList)) {
                  foreach ($zoneList as $rl) {
                    ?>
                    newtr += '<option value="<?php echo $rl->zone_id ?>" <?php if ($rl->zone_id == set_value('company_zone')) {
                                                                                echo "selected=selected";
                                                                              } ?>>';
                    newtr += '<?php echo strtoupper($rl->zone_name); ?>';
                    newtr += '</option>';
                <?php
                  }
                }
                ?>
                newtr += '</select>';
                newtr += '</td>';
                newtr += '<td>';
                newtr += '<select class="form-control form-control-sm addzonetype required" id="company_tr_' + company_id + '1_zone_type" name="company_zone_type' + company_id + '[]" data-bind="content" style="width:150px;">';
                newtr += '<option value="" id="loading_zone_type">Select</option>';
                newtr += '</select>';
                newtr += '</td>';


                <?php
                if (!empty($vehicleTypeList)) {
                  $i = 0;
                  foreach ($vehicleTypeList as $rl) {
                    ?>
                    newtr += '<td>';
                    newtr += '<input type="text" id="company_tr_' + company_id + '1_cab_rate_<?= $i ?>" name="company_cab_rate_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" value="0"/>';
                    newtr += '<input type="hidden" id="company_tr_' + company_id + '1_vehicle_type_name_<?= $i ?>" name="company_vehicle_type_name_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->type); ?>"/>';
                    newtr += '<input type="hidden" id="company_tr_' + company_id + '1_vehicle_type_id_<?= $i ?>" name="company_vehicle_type_id_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->id); ?>"/>';
                    newtr += '<input type="hidden" id="company_tr_' + company_id + '1_vehicle_type_slug_<?= $i ?>" name="company_vehicle_type_slug_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->slug); ?>"/>';



                    // newtr += '<th>Cab Rate - <?php echo ucwords(strtolower($rl->type)); ?> <span class="red-text">*</span></th>';

                    newtr += '</td>';

                <?php
                    $i++;
                  }
                }
                ?>


                // newtr += '<td>';
                // newtr += '<input type="text" id="company_tr_1_cab_rate" name="company_cab_rate[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" />';
                // newtr += '</td>';




                newtr += '<td>';
                newtr += '<input type="text" id="company_tr_' + company_id + '1_guard_rate required" name="company_guard_rate' + company_id + '[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" />';
                newtr += '</td>';
                newtr += '</tr>';
                newtr += '</tbody>';
                newtr += '</table>';
                newtr += '</div>';
                newtr += '</div>';
                newtr += '</div>';
                newtr += '</div>';
                newtr += '</div>';
                newtr += '</div>';
                newtr += '<div class="clearfix">&nbsp;</div>';

                $("#company_wise").html(newtr);

                i++;
              }

            });

            $("#loading").hide();
          }

        })

      });


      /* save and add new cab company */
      $("#save_add_new_cabrate").click(function() {

        var flag = 0;
        var mesg = {};

        if (vali.validate(mesg, 'addNewCabCompany')) {
          flag = 1;
        }

        if (flag === 1) {

          $("#loading").show();
          $.ajax({
            data: {
              invoiceData: $("#addNewCabCompany").serialize(),
              action: "saveNewCabCompany"
            },
            dataType: 'json',
            type: 'post',
            url: baseURL + "addNewCabCompanies",
            success: function(response) {

              $("#loading").hide();
              if (response.status == "error") {

                Swal.fire({
                  type: 'error',
                  text: response.message
                });
              } else if (response.status == "success") {

                Swal.fire({
                  type: 'success',
                  text: response.message
                }).then(function() {
                  setTimeout(function() {
                    location.reload();
                  });
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
      });
      /* end of save and add new invoice */


      /* add more invoice row script code */
      //$(".cabCompanyTable .addcabCompanyCabRate").click(function(e) {

      function addNewRow(company_id) {
        //alert('test');

        //e.preventDefault();
        //
        //var newtr = '<tr class="company_tr" data-row-id="'+nexttrid+'" id="company_tr_'+nexttrid+'">';

        var trlength = $(".company_tr" + company_id).length;
        var nexttrid = parseInt($("tr.company_tr" + company_id + ":last").attr("data-row-id")) + 1;

        var newtr = '<tr class="company_tr' + company_id + '" data-row-id="' + nexttrid + '" id="company_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteCabCompanyRate red-text" data-invoice-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a>';
        newtr += '<input type="hidden" id="company_tr_' + nexttrid + '_cab_id" name="company_cab_id' + company_id + '[]" class="form-control form-control-sm" data-bind="content" value="' + company_id + '"/>';

        newtr += '</td>';

        newtr += '<td class="text-center"><span id="company_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span></td>';
        newtr += '<td>';
        newtr += '<select class="form-control form-control-sm addzone1 required" id="company_tr_' + nexttrid + '_zone" name="company_zone' + company_id + '[]" data-bind="content" style="width:150px;">';
        newtr += '<option value="">Select</option>';
        <?php
        if (!empty($zoneList)) {
          foreach ($zoneList as $rl) {
            ?>
            newtr += '<option value="<?php echo $rl->zone_id ?>" <?php if ($rl->zone_id == set_value('company_zone')) {
                                                                        echo "selected=selected";
                                                                      } ?>>';
            newtr += '<?php echo strtoupper($rl->zone_name); ?>';
            newtr += '</option>';
        <?php
          }
        }
        ?>
        newtr += '</select>';
        newtr += '</td>';
        newtr += '<td>';
        newtr += '<select class="form-control form-control-sm addzonetype required" id="company_tr_' + nexttrid + '_zone_type" name="company_zone_type' + company_id + '[]" data-bind="content" style="width:150px;">';
        newtr += '<option value="" id="loading_zone_type">Select</option>';
        newtr += '</select>';
        newtr += '</td>';


        <?php
        if (!empty($vehicleTypeList)) {
          $i = 0;
          foreach ($vehicleTypeList as $rl) {
            ?>
            newtr += '<td>';
            newtr += '<input type="text" id="company_tr_' + nexttrid + '_cab_rate_<?= $i ?>" name="company_cab_rate_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" value="0"/>';
            newtr += '<input type="hidden" id="company_tr_' + nexttrid + '_vehicle_type_name_<?= $i ?>" name="company_vehicle_type_name_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->type); ?>"/>';
            newtr += '<input type="hidden" id="company_tr_' + nexttrid + '_vehicle_type_id_<?= $i ?>" name="company_vehicle_type_id_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->id); ?>"/>';
            newtr += '<input type="hidden" id="company_tr_' + nexttrid + '1_vehicle_type_slug_<?= $i ?>" name="company_vehicle_type_slug_' + company_id + '<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->slug); ?>"/>';



            // newtr += '<th>Cab Rate - <?php echo ucwords(strtolower($rl->type)); ?> <span class="red-text">*</span></th>';

            newtr += '</td>';

        <?php
            $i++;
          }
        }
        ?>

        //newtr += '<td>';
        //newtr += '<input type="text" id="company_tr_'+nexttrid+'_cab_rate" name="company_cab_rate[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" />';
        //newtr += '</td>';







        newtr += '<td>';
        newtr += '<input type="text" id="company_tr_' + nexttrid + '_guard_rate required" name="company_guard_rate' + company_id + '[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" />';
        newtr += '</td>';


        newtr += '</tr>';

        // insert new row
        $(".company_tr" + company_id).last().after(newtr);

        // update tr serial number
        var trCounter = 1;
        $("tr.company_tr" + company_id).each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });


      }

      /* delete invoice row script code */
      $("#company_wise").on("click", ".deleteCabCompanyRate", function() {
        var invoiceId = $(this).attr("data-invoice-id");
        $("#company_tr_" + invoiceId).remove();
        /* update tr serial number */
        var trCounter = 1;
        $("tr.company_tr" + invoiceId).each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });
      });


      $(".invoicetable").on("keypress", ".auto_completevehicle_no", function() {
        var rowid = $(this).parent().parent().attr("data-short-id");
        //var comp_id = $("#cab_short_type").val();

        $("#cab_short_tr_" + rowid + "_vehicle_no").autocomplete({
          source: function(request, response) {
            //$("#loading").show();
            $.ajax({
              url: baseURL + "Vehicle/getVehicles",
              type: 'GET',
              dataType: "json",
              data: {
                search: request.term,
                request: 1
              },
              success: function(data) {
                //$("#loading").hide();
                response(data);
              }
            });
          },
          select: function(event, ui) {
            $(this).val(ui.item.label); // display the selected text
            var id = ui.item.value; // selected id to input
            var vehicle_type_id = ui.item.vehicle_type_id; // selected id to input
            var vendor_id = ui.item.vendor_id; // selected id to input
            var rate = ui.item.rate; // selected id to input

            $("#cab_short_tr_" + rowid + "_vehicle_id").val(id);
            $("#cab_short_tr_" + rowid + "_vendor_id").val(vendor_id);
            // $("#cab_short_tr_"+rowid+"_rate").val(rate);
            // $("#cab_short_tr_"+rowid+"_vehicle_type option[value="+vehicle_type_id+"]").attr('selected','selected');
            return false;
          }
        });
      });

      //$('#cab_short').hide();

      function addRosterDetails(id) {
        var divElem = $('#cab_short' + id);
        if (divElem.is(":visible")) {
          $('#div_' + id).hide();
        } else {
          $('#div_' + id).show();
        }
        // if (id > 0) {
        //   document.getElementById('div_' + id).style.visibility = 'visible';
        //   document.getElementById('div_' + id).style.display = 'block';
        // } else {
        //   document.getElementById('div_' + id).style.visibility = 'hidden';
        //   document.getElementById('div_' + id).style.display = 'none';
        // }
      }

      /*
        $('.addRosterDetails').click(function(){
          var rowid = $(this).parent().parent().attr("data-row-id");
          
          $('#cab_short'+rowid).show();
        });
      */

      /* add more invoice row script code */
      $(".addMoreCabShort").click(function(e) {

        e.preventDefault();

        var nextrowtrid = parseInt($("tr.invoice_tr").attr("data-row-id"));
        var nexttrid = parseInt($("tr.cab_short_tr" + nextrowtrid + ":last").attr("data-short-id")) + 1;
        var trlength = $(".cab_short_tr" + nextrowtrid).length;

        //alert(trlength + ' - nexttrid - ' + nexttrid + 'nextrowtrid - ' + nextrowtrid);

        var newtr = '<tr class="cab_short_tr' + nextrowtrid + '" data-short-id="' + nexttrid + '" id="cab_short_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteCabShort red-text" data-short-cab-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a>';
        newtr += '</td>';

        newtr += '<td class="text-center"><span id="cab_short_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';

        newtr += '<input type="hidden" id="cab_short_tr_' + nexttrid + '_vehicle_id" name="cab_short_vehicle_id[]" />';
        newtr += '<input type="hidden" id="cab_short_tr_' + nexttrid + '_vendor_id" name="cab_short_vendor_id[]" />';


        newtr += '</td>';
        newtr += '<td><select class="form-control form-control-sm" id="cab_short_tr_' + nexttrid + '_type" name="invoice_guard[]" data-bind="content"><option value="1">Cab</option><option value="2">Taxi</option>';
        newtr += '</select></td>';
        newtr += '<td><input type="text" id="cab_short_tr_' + nexttrid + '_vehicle_no" name="cab_short_vehicle_no[]" class="form-control form-control-sm auto_completevehicle_no" data-bind="content" placeholder="Vehicle No." style="width:120px;" /></td>';

        newtr += '<td>';
        newtr += '<select class="form-control form-control-sm" id="cab_short_tr_1_vehicle_type" name="cab_short_vehicle_type[]" data-bind="content" style="width:100px;">';
        newtr += '<option value="">Select</option>';
        <?php
        if (!empty($vehicleType)) {
          foreach ($vehicleType as $rl) {
            ?>
            newtr += '<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('type')) {
                                                                  echo "selected=selected";
                                                                } ?>><?php echo $rl->type ?>';
            newtr += '</option>';
        <?php
          }
        }
        ?>
        newtr += '</select>';
        newtr += '</td>';

        newtr += '<td><input type="text" id="cab_short_tr_' + nexttrid + '_cab_rate" name="cab_short_cab_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0" style="width:70px;" /></td>';
        newtr += '</tr>';

        /* insert new row */
        $(".cab_short_tr" + nextrowtrid).last().after(newtr);
        //$(".invoice"+nextrowtrid).last().after(newtr);

        /* update tr serial number */
        var trCounter = 1;
        $("tr.cab_short_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });

      });

      function addMoreCabShort1(rowid, shortid) {

        var nextrowtrid = parseInt($("tr.invoice_tr:last").attr("data-row-id"));
        var nexttrid = parseInt($("tr.cab_short_tr" + nextrowtrid).attr("data-short-id")) + 1;
        var trlength = $(".cab_short_tr" + nexttrid).length;

        alert(trlength + ' - nexttrid - ' + nexttrid + 'nextrowtrid - ' + nextrowtrid + ' rowid - ' + rowid + ' shortid - ' + shortid);

        var newtr = '<tr class="cab_short_tr' + nextrowtrid + '" data-short-id="' + nexttrid + '" id="cab_short_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteCabShort red-text" data-short-cab-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a>';







        newtr += '</td>';

        newtr += '<td class="text-center"><span id="cab_short_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';
        newtr += '<input type="hidden" id="cab_short_tr_' + nexttrid + '_vehicle_id" name="cab_short_vehicle_id[]" />';
        newtr += '<input type="hidden" id="cab_short_tr_' + nexttrid + '_vendor_id" name="cab_short_vendor_id[]" />';
        newtr += '</td>';
        newtr += '<td><select class="form-control form-control-sm" id="cab_short_tr_' + nexttrid + '_type" name="invoice_guard[]" data-bind="content"><option value="1">Cab</option><option value="2">Taxi</option>';
        newtr += '</select></td>';
        newtr += '<td><input type="text" id="cab_short_tr_' + nexttrid + '_vehicle_no" name="cab_short_vehicle_no[]" class="form-control form-control-sm auto_completevehicle_no" data-bind="content" placeholder="Vehicle No." style="width:120px;" /></td>';

        newtr += '<td>';
        newtr += '<select class="form-control form-control-sm" id="cab_short_tr_1_vehicle_type" name="cab_short_vehicle_type[]" data-bind="content" style="width:100px;">';
        newtr += '<option value="">Select</option>';
        <?php
        if (!empty($vehicleType)) {
          foreach ($vehicleType as $rl) {
            ?>
            newtr += '<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('type')) {
                                                                  echo "selected=selected";
                                                                } ?>><?php echo $rl->type ?>';
            newtr += '</option>';
        <?php
          }
        }
        ?>
        newtr += '</select>';
        newtr += '</td>';

        newtr += '<td><input type="text" id="cab_short_tr_' + nexttrid + '_cab_rate" name="cab_short_cab_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0" style="width:70px;" /></td>';
        newtr += '</tr>';

        /* insert new row */
        $(".cab_short_tr" + shortid).last().after(newtr);
        //$(".invoice"+nextrowtrid).last().after(newtr);

        /* update tr serial number */
        var trCounter = 1;
        $("tr.cab_short_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });

      }

      /* delete invoice row script code */
      $(".cabshorttable").on("click", ".deleteCabShort", function() {
        var invoiceId = $(this).attr("data-short-cab-id");
        $("#cab_short_tr_" + invoiceId).remove();
        /* update tr serial number */
        var trCounter = 1;
        $("tr.cab_short").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });
      });
















      function addNewRowRate() {
        //alert('test');

        //e.preventDefault();
        //
        //var newtr = '<tr class="company_tr" data-row-id="'+nexttrid+'" id="company_tr_'+nexttrid+'">';

        var trlength = $(".company_tr").length;
        var nexttrid = parseInt($("tr.company_tr:last").attr("data-row-id")) + 1;



        var newtr = '<tr class="company_tr" data-row-id="' + nexttrid + '" id="company_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteCabCompanyRate red-text" data-invoice-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a>';
        newtr += '<input type="hidden" id="company_tr_' + nexttrid + '_cab_id" name="company_cab_id[]" class="form-control form-control-sm" data-bind="content" value=""/>';

        newtr += '</td>';

        newtr += '<td class="text-center"><span id="company_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span></td>';
        newtr += '<td>';
        newtr += '<select class="form-control form-control-sm addzone1 required" id="company_tr_' + nexttrid + '_zone" name="company_zone[]" data-bind="content" style="width:150px;">';
        newtr += '<option value="">Select</option>';
        <?php
        if (!empty($zoneList)) {
          foreach ($zoneList as $rl) {
            ?>
            newtr += '<option value="<?php echo $rl->zone_id ?>" <?php if ($rl->zone_id == set_value('company_zone')) {
                                                                        echo "selected=selected";
                                                                      } ?>>';
            newtr += '<?php echo strtoupper($rl->zone_name); ?>';
            newtr += '</option>';
        <?php
          }
        }
        ?>
        newtr += '</select>';
        newtr += '</td>';
        newtr += '<td>';
        newtr += '<select class="form-control form-control-sm addzonetype required" id="company_tr_' + nexttrid + '_zone_type" name="company_zone_type[]" data-bind="content" style="width:150px;">';
        newtr += '<option value="" id="loading_zone_type">Select</option>';
        newtr += '</select>';
        newtr += '</td>';


        <?php
        if (!empty($vehicleTypeList)) {
          $i = 0;
          foreach ($vehicleTypeList as $rl) {
            ?>
            newtr += '<td>';
            newtr += '<input type="text" id="company_tr_' + nexttrid + '_cab_rate_<?= $i ?>" name="company_cab_rate_<?= $i ?>[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" value="0"/>';
            newtr += '<input type="hidden" id="company_tr_' + nexttrid + '_vehicle_type_name_<?= $i ?>" name="company_vehicle_type_name_<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->type); ?>"/>';
            newtr += '<input type="hidden" id="company_tr_' + nexttrid + '_vehicle_type_id_<?= $i ?>" name="company_vehicle_type_id_<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->id); ?>"/>';
            newtr += '<input type="hidden" id="company_tr_' + nexttrid + '1_vehicle_type_slug_<?= $i ?>" name="company_vehicle_type_slug_<?= $i ?>[]" class="form-control form-control-sm" value="<?php echo strtolower($rl->slug); ?>"/>';



            // newtr += '<th>Cab Rate - <?php echo ucwords(strtolower($rl->type)); ?> <span class="red-text">*</span></th>';

            newtr += '</td>';

        <?php
            $i++;
          }
        }
        ?>

        //newtr += '<td>';
        //newtr += '<input type="text" id="company_tr_'+nexttrid+'_cab_rate" name="company_cab_rate[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" />';
        //newtr += '</td>';







        newtr += '<td>';
        newtr += '<input type="text" id="company_tr_' + nexttrid + '_guard_rate required" name="company_guard_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" />';
        newtr += '</td>';


        newtr += '</tr>';

        // insert new row
        $(".company_tr").last().after(newtr);

        // update tr serial number
        var trCounter = 1;
        $("tr.company_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });


      }



      /* save and add new cab company */
      $("#save_edit_cabrate").click(function() {

        var flag = 0;
        var mesg = {};

        if (vali.validate(mesg, 'editNewCabCompany')) {
          flag = 1;
        }

        if (flag === 1) {

          $("#loading").show();
          $.ajax({
            data: {
              invoiceData: $("#editNewCabCompany").serialize(),
              action: "updateCompanyRate"
            },
            dataType: 'json',
            type: 'post',
            url: baseURL + "updateCompanyRate",
            success: function(response) {

              $("#loading").hide();
              if (response.status == "error") {

                Swal.fire({
                  type: 'error',
                  text: response.message
                });
              } else if (response.status == "success") {

                Swal.fire({
                  type: 'success',
                  text: response.message
                }).then(function() {
                  setTimeout(function() {
                    //location.reload();
                    window.location.href = "<?php echo base_url(); ?>/cabCompanyListing";
                  });
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
      });
      /* end of save and add new invoice */







      /* save and add new invoice */
      $("#save_add_new_tax").click(function() {

        var flag = 0;
        var mesg = {};

        if (vali.validate(mesg, 'addNewVehicleTaxs')) {
          flag = 1;
        }

        if (flag === 1) {

          $("#loading").show();
          $.ajax({
            data: {
              invoiceData: $("#addNewVehicleTaxs").serialize(),
              action: "addNewVehicleTaxs"
            },
            dataType: 'json',
            type: 'post',
            url: "<?php echo base_url(); ?>addNewVehicleTaxs",
            success: function(response) {

              $("#loading").hide();
              if (response.status == "error") {

                Swal.fire({
                  type: 'error',
                  text: response.message
                });
              } else if (response.status == "success") {

                Swal.fire({
                  type: 'success',
                  text: response.message
                }).then(function() {
                  setTimeout(function() {
                    location.reload();
                  });
                })
              }
            }
          });
        }
      });
      /* end of save and add new invoice */


      /* save and add new invoice */
      $("#update_add_new_tax").click(function() {

        var flag = 0;
        var mesg = {};

        if (vali.validate(mesg, 'editVehicleTaxs')) {
          flag = 1;
        }

        if (flag === 1) {
          $("#loading").show();
          $.ajax({
            data: {
              invoiceData: $("#editVehicleTaxs").serialize(),
              action: "editVehicleTaxs"
            },
            dataType: 'json',
            type: 'post',
            url: "<?php echo base_url(); ?>editVehicleTaxs",
            success: function(response) {

              $("#loading").hide();
              if (response.status == "error") {

                Swal.fire({
                  type: 'error',
                  text: response.message
                });
              } else if (response.status == "success") {

                Swal.fire({
                  type: 'success',
                  text: response.message
                }).then(function() {
                  setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>/addNewVehicleTax";

                  });
                })
              }
            }
          });
        }
      });
      /* end of save and add new invoice */


      /* delete invoice row script code */
      $(".companyMcdTaxtable").on("click", ".deleteVehicleMcdRate", function() {
        var rowId = $(this).attr("data-mcd-id");
        $("#vehicle_mcd_tr_" + rowId).remove();
        /* update tr serial number */
        var trCounter = 1;
        $("tr.vehicle_mcd_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });
      });

      /* delete invoice row script code */
      $(".companyStateTaxtable").on("click", ".deleteVehicleTaxRate", function() {
        var rowId = $(this).attr("data-tax-id");
        $("#vehicle_tax_tr_" + rowId).remove();
        /* update tr serial number */
        var trCounter = 1;
        $("tr.vehicle_tax_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });
      });


      /* add more invoice row script code */
      $(".addMoreVehicleStateTax").click(function(e) {

        e.preventDefault();


        var trlength = $(".vehicle_tax_tr").length;
        var nexttrid = parseInt($("tr.vehicle_tax_tr:last").attr("data-tax-id")) + 1;

        var newtr = '<tr class="vehicle_tax_tr" data-tax-id="' + nexttrid + '" id="vehicle_tax_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteVehicleTaxRate red-text" data-tax-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

        newtr += '<td class="text-center"><span id="vehicle_tax_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';
        newtr += '<input type="hidden" id="vehicle_tax_tr_' + nexttrid + '_vendor_id" name="tax_vendor_id[]">';
        newtr += '<input type="hidden" id="vehicle_tax_tr_' + nexttrid + '_vendor_vehicle_id" name="tax_vendor_vehicle_id[]">';
        newtr += '</td>';

        newtr += '<td>';
        newtr += '<input type="text" class="form-control form-control-sm required autocomplete_tax" placeholder="Vehicle Number" id="vehicle_tax_tr_' + nexttrid + '_vehicle_id" name="tax_vehicle_id[]">';
        newtr += '</td>';

        newtr += '<td><select id="vehicle_tax_tr_' + nexttrid + '_state" name="tax_state[]" class="form-control form-control-sm required" data-bind="content">';
        <?php if (!empty($states)) { ?>
          <?php foreach ($states as $rl) { ?>
            newtr += '<option value="<?php echo $rl->id; ?>" <?php if ($rl->id == 34) {
                                                                    echo "selected=selected";
                                                                  } ?>><?php echo ucwords(strtolower($rl->state)); ?></option>';
          <?php } ?>
        <?php } ?>
        newtr += '</select></td>';

        newtr += '<td><select id="vehicle_tax_tr_' + nexttrid + '_mcd_type" name="tax_type[]" class="form-control form-control-sm required" data-bind="content">';
        newtr += '<option value="1" selected>Per Trip</option>';
        newtr += '<option value="2" > Monthly </option>';
        newtr += '</select></td>';

        newtr += '<td><input type="number" id="vehicle_tax_' + nexttrid + '_mcd_amount" name="tax_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';

        newtr += '<td><input type="text" id="vehicle_tax_' + nexttrid + '_start_date" name="tax_start_date[]" class="form-control form-control-sm required start_date" data-bind="content" placeholder="dd-mm-yy" value="<?php echo date('d-m-Y'); ?>" /></td>';

        newtr += '<td><input type="text" id="vehicle_tax_' + nexttrid + '_end_date" name="tax_end_date[]" class="form-control form-control-sm required end_date" data-bind="content" placeholder="dd-mm-yy" /></td>';


        newtr += '</tr>';

        /* insert new row */
        $(".vehicle_tax_tr").last().after(newtr);

        /* update tr serial number */
        var trCounter = 1;
        $("tr.vehicle_tax_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });

      });


      /* add more invoice row script code */
      $(".companyMcdTaxtable .addMoreVehicleMcdTax").click(function(e) {

        e.preventDefault();


        var trlength = $(".vehicle_mcd_tr").length;
        var nexttrid = parseInt($("tr.vehicle_mcd_tr:last").attr("data-mcd-id")) + 1;

        var newtr = '<tr class="vehicle_mcd_tr" data-mcd-id="' + nexttrid + '" id="vehicle_mcd_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteVehicleMcdRate red-text" data-mcd-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

        newtr += '<td class="text-center"><span id="vehicle_mcd_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span>';
        newtr += '<input type="hidden" id="vehicle_mcd_tr_' + nexttrid + '_vendor_id" name="mcd_vendor_id[]">';
        newtr += '<input type="hidden" id="vehicle_mcd_tr_' + nexttrid + '_vendor_vehicle_id" name="mcd_vendor_vehicle_id[]">';
        newtr += '</td>';

        newtr += '<td><input type="text" class="form-control form-control-sm required autocomplete_mcd" placeholder="Vehicle Number" id="vehicle_mcd_tr_' + nexttrid + '_vehicle_id" name="mcd_vehicle_id[]"></td>';

        newtr += '<td><select id="vehicle_mcd_tr_' + nexttrid + '_state" name="mcd_state[]" class="form-control form-control-sm required" data-bind="content">';
        <?php if (!empty($states)) { ?>
          <?php foreach ($states as $rl) { ?>
            newtr += '<option value="<?php echo $rl->id; ?>" <?php if ($rl->id == 9) {
                                                                    echo "selected=selected";
                                                                  } ?>><?php echo ucwords(strtolower($rl->state)); ?></option>';
          <?php } ?>
        <?php } ?>
        newtr += '</select></td>';

        newtr += '<td><select id="vehicle_mcd_tr_' + nexttrid + '_mcd_type" name="mcd_type[]" class="form-control form-control-sm required" data-bind="content">';
        newtr += '<option value="1">Per Trip</option>';
        newtr += '<option value="2" selected> Monthly </option>';
        newtr += '</select></td>';

        newtr += '<td><input type="number" id="vehicle_mcd_' + nexttrid + '_mcd_amount" name="mcd_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';

        newtr += '<td><input type="text" id="vehicle_mcd_' + nexttrid + '_start_date" name="mcd_start_date[]" class="form-control form-control-sm required start_date" data-bind="content" placeholder="dd-mm-yy" value="<?php echo date('d-m-Y'); ?>" /></td>';

        newtr += '<td><input type="text" id="vehicle_mcd_' + nexttrid + '_end_date" name="mcd_end_date[]" class="form-control form-control-sm required end_date" data-bind="content" placeholder="dd-mm-yy" /></td>';


        newtr += '</tr>';

        /* insert new row */
        $(".vehicle_mcd_tr").last().after(newtr);

        /* update tr serial number */
        var trCounter = 1;
        $("tr.vehicle_mcd_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });

      });

      $(".cabshorttable").on("keypress", ".auto_completevehicle_no", function() {
        var rowid = $(this).parent().parent().attr("data-short-id");
        //var comp_id = $("#cab_short_type").val();

        $("#cab_short_tr_" + rowid + "_vehicle_no").autocomplete({
          source: function(request, response) {
            //$("#loading").show();
            $.ajax({
              url: baseURL + "Vehicle/getVehicles",
              type: 'GET',
              dataType: "json",
              data: {
                search: request.term,
                request: 1
              },
              success: function(data) {
                //$("#loading").hide();
                response(data);
              }
            });
          },
          select: function(event, ui) {
            $(this).val(ui.item.label); // display the selected text
            var id = ui.item.value; // selected id to input
            var vehicle_type_id = ui.item.vehicle_type_id; // selected id to input
            var vendor_id = ui.item.vendor_id; // selected id to input
            var rate = ui.item.rate; // selected id to input

            $("#cab_short_tr_" + rowid + "_vehicle_id").val(id);
            $("#cab_short_tr_" + rowid + "_vendor_id").val(vendor_id);
            // $("#cab_short_tr_"+rowid+"_rate").val(rate);
            // $("#cab_short_tr_"+rowid+"_vehicle_type option[value="+vehicle_type_id+"]").attr('selected','selected');
            return false;
          }
        });
      });
	  
	  /* add more prive for city taxi row script code */
      $(".cabtable .addMoreVehicle").click(function(e) {

        e.preventDefault();


        var trlength = $(".cab_tr").length;
        var nexttrid = parseInt($("tr.cab_tr:last").attr("data-cab-id")) + 1;

        var newtr = '<tr class="cab_tr" data-cab-id="' + nexttrid + '" id="cab_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteCabRate red-text" data-cab-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

        newtr += '<td class="text-center"><span id="cab_city_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span></td>';

        newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_from" name="cab_city_from[]" class="form-control form-control-sm required" data-bind="number" placeholder="From (km)" /></td>';

        newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_to" name="cab_city_to[]" class="form-control form-control-sm required" data-bind="number" placeholder="To (km)" value="" /></td>';
        newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_amount_one_way" name="cab_city_amount_one_way[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_amount_two_way" name="cab_city_amount_two_way[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_additional_amount" name="cab_city_additional_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_time_amount" name="cab_city_time_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_driver_amount" name="cab_city_driver_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_city_' + nexttrid + '_night_amount" name="cab_city_night_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';


        newtr += '</tr>';

        /* insert new row */
        $(".cab_tr").last().after(newtr);

        /* update tr serial number */
        var trCounter = 1;
        $("tr.cab_tr").each(function(index) {
          $(this).find("span.serialno").text(trCounter);
          trCounter++;
        });

      });
	 
	  /* add more price for Outstation taxi row script code */
      $(".cabtable .addOutstationVehicle").click(function(e) {

        e.preventDefault();


        var trlength = $(".cab_outstation_tr").length;
        var nexttrid = parseInt($("tr.cab_outstation_tr:last").attr("data-outstation-id")) + 1;

        var newtr = '<tr class="cab_outstation_tr" data-outstation-id="' + nexttrid + '" id="cab_outstation_tr_' + nexttrid + '">';

        newtr += '<td><a class="deleteOutstationCabRate red-text" data-outstation-id="' + nexttrid + '" href="javascript:void(0);"><i class="fas fa-trash deleteicon"></i></a></td>';

        newtr += '<td class="text-center"><span id="cab_outstation_tr_' + nexttrid + '_id">' + (trlength + 1) + '</span></td>';

        newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_from" name="cab_outstation_from[]" class="form-control form-control-sm required" data-bind="number" placeholder="From (km)" /></td>';

        newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_to" name="cab_outstation_to[]" class="form-control form-control-sm required" data-bind="number" placeholder="To (km)" value="" /></td>';
        newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_one_way_amount" name="cab_outstation_one_way_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_two_way_amount" name="cab_outstation_two_way_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_additional_amount" name="cab_outstation_additional_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_time_amount" name="cab_outstation_time_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_driver_amount" name="cab_outstation_driver_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';
		newtr += '<td><input type="number" id="cab_outstation_' + nexttrid + '_night_amount" name="cab_outstation_night_amount[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" /></td>';

        newtr += '</tr>';

        /* insert new row */
        $(".cab_outstation_tr").last().after(newtr);

        /* update tr serial number */
        var trCounter = 1;
        $("tr.cab_outstation_tr").each(function(index) {
			$(this).find("span.serialno").text(trCounter);
			trCounter++;
        });

      });
	  
	  /* delete invoice row script code */
        $(".cabtable").on("click", ".deleteCabRate", function() {
			var id = $(this).attr("data-cab-id");
			$("#cab_tr_" + id).remove();

			var trCounter = 1;
			$("tr.cab_tr").each(function(index) {
				$(this).find("span.serialno").text(trCounter);
				trCounter++;
			});
        });
		
		/* delete outstation cab rate row script code */
        $(".cabtable").on("click", ".deleteOutstationCabRate", function() {
			var id = $(this).attr("data-outstation-id");
			$("#cab_outstation_tr_" + id).remove();
			
			/* update tr serial number */
			var trCounter = 1;
			$("tr.cab_outstation_tr").each(function(index) {
				$(this).find("span.serialno").text(trCounter);
				trCounter++;
			});
        });
    </script>
    <script>
        // time_plus_6 = new Date(new Date().getTime());
        // var pickdate = document.getElementById("pickup_date").value;
        // console.log(pickdate);
        // 	if(pickdate =! new Date(new Date())){
        // 	 $('.durationExample').timepicker({
        // 	'step': 15,
        //     'timeFormat': 'H:i',
        //     'minTime': time_plus_6,
        // 	'maxTime': '11:59pm',
        // 	});
        // 	}
        // 	else{
        // 	    $('.durationExample').timepicker({
        // 	'step': 15,
        // 	'timeFormat': 'H:i',
        // 	'maxTime': '11:59pm',
        // 	 });
        // 	}
        
        // $( document ).ready(function() {
        //   $('.durationExample').timepicker('setTime', time_plus_6);
        // });
        
        jQuery.support.cors = true;
	$(document).ready(function() {
		// Initialize 
		$("#pincode").autocomplete({
			minLength: 6,
			source: function(request, response) {
				// Fetch data
				$(".preloader3").show();
				$.ajax({

					url: baseURL + "getZipCode",
					type: 'GET',
					dataType: "json",
					contentType: "application/json",
					data: {
						search: request.term
					},
					success: function(data) {
						$(".preloader3").hide();

						if (!$.trim(data)) {
							$("#city").val('');
							$("#state").val('');
							$("#state_code").val('');
							$("#officename").val('');
							$("#address").val('');
						} else {
							$("#city").val(data[0].districtname);
							$("#state").val(data[0].statename);
							$("#state_code").val(data[0].state_code);
							//$("#state option[value=" + data[0].state_id + "]").attr('selected', 'selected');
							$("#officename").val(data[0].officename);
							$("#address").val(data[0].taluk);
						}
					},
					error: function(response) {
						$(".preloader3").hide();
						$("#city").val('');
						$("#state").val('');
						$("#state_code").val('');
						$("#officename").val('');
						$("#address").val('');
					}
				});
			}
		});
	});
	

	

	function someFunction(destroyFeedback) {
		setTimeout(function() {
			destroyFeedback(true);
		}, 1000);
	}
	
	$(document).ready(function() {
		$("#change").on('click', function() {
			$("#loading").show();
			var pickup = $('#pickup_location').val();
			$('#pickup_location').val($('#drop_location').val());
			$('#drop_location').val(pickup);
			$("#loading").hide();
		});
	});
	
	
		$("form").submit(function(event) {

			//Billing Details
			var car_type = document.forms["bookcar"]["car-rental-selected-car"].value;
			var pickup_date = document.forms["bookcar"]["car-rental-selected-car"].value;
			var pickup_time = document.forms["bookcar"]["pickup_time"].value;
			var drop_date = document.forms["bookcar"]["drop_date"].value;
			var return_time = document.forms["bookcar"]["return_time"].value;
			var pickup_location = document.forms["bookcar"]["pickup_location"].value;
			var drop_location = document.forms["bookcar"]["drop_location"].value;
			var full_name = document.forms["bookcar"]["full_name"].value;
			var phone_number = document.forms["bookcar"]["phone_number"].value;
			var email_address = document.forms["bookcar"]["email_address"].value;
			var pincode = document.forms["bookcar"]["pincode"].value;
			var state = document.forms["bookcar"]["state"].value;
			var city = document.forms["bookcar"]["city"].value;
			var address = document.forms["bookcar"]["address"].value;

			//Coupon Details
			var coupon = document.forms["bookcar"]["coupon_code"].value;

			//Additional Details
			var order_comments = document.forms["bookcar"]["order_comments"].value;

			//Payment Option
			var paymentoption = document.forms["bookcar"]["paymentoption"].value;


			contactno = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;

			var error = false;
			var validemail = validEmail(email);
			var error_firstname = 'Invalid first name';
			var error_lastname = 'Invalid last name';
			var error_email = 'Invalid email address';
			var error_phone = 'Incorrect contact number';
			var error_country = 'Select country';
			var error_state = 'Select state';
			var error_city = 'Please fill city';
			var error_zipcode = 'Please fill pincode';
			var error_billing_address = 'Please fill address';


			if (first_name == "") {
				$('#firstname').css("border", "1px solid red");
				$('#error_firstname').text(error_firstname);
				error = true;
			} else {
				$('#firstname').css("border", "1px solid #00000026");
				$('#error_firstname').text('');
			}
			if (last_name == "") {
				$('#lastname').css("border", "1px solid red");
				$('#error_lastname').text(error_lastname);
				error = true;
			} else {
				$('#lastname').css("border", "1px solid #00000026");
				$('#error_lastname').text('');
			}
			if (email == "") {
				$('#email').css("border", "1px solid red");
				$('#error_email').text(error_email);
				error = true;
			} else {
				$('#email').css("border", "1px solid #00000026");
				$('#error_email').text('');
			}

			if (phone == "") {
				$('#phone').css("border", "1px solid red");
				$('#error_phone').text(error_phone);
				error = true;
			} else if (!contactno.test(phone)) {
				$('#error_phone').text('Please add your valid 10 digit phone number.');
				$('#phone').css("border", "1px solid #e74c3c");
				error = true;
			} else {

				$('#phone').css("border", "1px solid #00000026");
				$('#error_phone').text('');
			}

			if (country == "") {
				$('#billing_country').css("border", "1px solid red");
				$('#error_billing_country').text(error_country);
				error = true;
			} else {
				$('#billing_country').css("border", "1px solid #00000026");
				$('#error_billing_country').text('');
			}

			if (state == "") {
				$('#billing_state').css("border", "1px solid red");
				$('#error_billing_state').text(error_state);
				error = true;
			} else {
				$('#billing_state').css("border", "1px solid #00000026");
				$('#error_billing_state').text('');
			}
			if (city == "") {
				$('#billing_city').css("border", "1px solid red");
				$('#error_billing_city').text(error_city);
				error = true;
			} else {
				$('#billing_city').css("border", "1px solid #00000026");
				$('#error_billing_city').text('');
			}
			pincode = /^\d{6}$/;
			if (zipcode == "") {
				$('#zipcode').css("border", "1px solid red");
				$('#error_zipcode').text(error_zipcode);
				error = true;
			} else if (!pincode.test(zipcode)) {
				$('#zipcode').css("border", "1px solid red");
				$('#error_zipcode').text('Please enter valid pincode');
				error = true;

			} else {
				$('#zipcode').css("border", "1px solid #00000026");
				$('#error_zipcode').text('');
			}

			if (address1 == "") {
				$('#billing_address').css("border", "1px solid red");
				$('#error_billing_address').text(error_billing_address);
				error = true;
			} else {
				$('#billing_address').css("border", "1px solid #00000026");
				$('#error_billing_address').text('');
			}


			if (gstin != "") {

				var gst_state = gstin.substring(0, 2);
				if (ValidGstNo(gstin.toUpperCase()) == false) {
					swal({
						text: 'Invalid GSTIN number.'
					});
					error = true;
				}
			}

			if (error == true) {

			} else {

				var data = {
					"first_name": first_name,
					"last_name": last_name,
					"company_name": company_name,
					"gstin": gstin,
					"country": country,
					"state": state,
					"city": city,
					"zipcode": zipcode,
					"address_1": address1,
					"address_2": address2,
					"email": email,
					"phone": phone,
					"coupon_code": coupon,
					"order_comments": order_comments,
					"paymentoption": paymentoption
				};
				$.post(baseURL + "payment/save_order", data,
					function(response) {


						let timerInterval
						Swal({
							title: 'Initiating your order process',
							html: 'Your order is being processed, Please wait for a moment.',
							timer: 2000,
							onBeforeOpen: () => {
								Swal.showLoading()
								timerInterval = setInterval(() => {}, 100)
							},
							onClose: () => {
								clearInterval(timerInterval)
							}
						}).then((result) => {})

						if (response == 0) {
							let timerInterval
							Swal({
								html: 'There seems to be an error, please try again.',
								//customClass: 'custom_swl_popup',
								timer: 1500,
								onBeforeOpen: () => {
									Swal.showLoading()
									timerInterval = setInterval(() => {
										//Swal.getContent().querySelector('strong').textContent = Swal.getTimerLeft()
									}, 100)
								},
								onClose: () => {
									clearInterval(timerInterval)
								}
							}).then((result) => {})
						} else {
							setTimeout(function() {
								window.location.href = baseURL + "payment/pgRedirect/" + response;
							}, 1000);
				
				// echo "baseURL + "payment/pgRedirect/" + response";
				// die();
						}

					});
				//document.payuform.submit();
			}
			event.preventDefault();
		});


		var pricingCAR = 0,
			minAmount = 0,
			fullAmount = 0,
			carValue = $(".car-rent-price"),
			minBookValue = $(".minbook-amount"),
			fullAmountValue = $(".full-amount"),
			cars = $('input[name="car-rental-selected-car"]');


		cars.change(function() {
			pricingCAR = $(this).attr('data-price');
			minAmount = (pricingCAR * <?= ($minAmount[0]->price) ? $minAmount[0]->price : 0; ?>) / 100;
			carValue.html('<i class="fas fa-rupee-sign"></i> ' + pricingCAR);
			minBookValue.html('<i class="fas fa-rupee-sign"></i> ' + minAmount);
			fullAmountValue.html('<i class="fas fa-rupee-sign"></i> ' + pricingCAR);
		});

		$('#car-rental').on('formSubmitSuccess', function() {
			carValue.html('<i class="fas fa-rupee-sign"></i> 0');
		});


		$('.car-image').on('click', function() {
     
			$(this).siblings().children('div').removeClass('check');
			$(this).children('div').addClass('check');
		});

	
		$("#loginuser").click(function(event) {

		// Fetch form to apply custom Bootstrap validation
		var form = $("#login_form")

		if (form[0].checkValidity() === false) {
			event.preventDefault()
			event.stopPropagation()
		}

		form.addClass('was-validated');
		// Perform ajax submit here...

		var mobile = $("#mobile").val();
		var regexphone = /^[0-9]{10}$/;

		var error = false;

		if (mobile == '') {
			$('#error_phone').text('Enter your mobile number.');
			error = true;
		} else if (!regexphone.test(mobile)) {
			error = true;
			$('#error_phone').text('Invalid mobile number.');
		} else {
			$('#error_phone').text('');
		}
		if (error == false) {

			$(this).text('Please wait...');
			$(this).attr("disabled", true);

			$.ajax({
				url: baseURL + "login_user",
				type: "POST",
				data: {
					"mobile": mobile
				},
				success: function(response) {
					//data, textStatus, jqXHR
					//response.code
					$('#loginuser').text('Continue');
					$('#loginuser').removeAttr('disabled');

					if (response.status == "1") {
						$('#mobilediv').hide();
						//$('#haveaccount').hide();
						$('#otpdiv').show();


						$('#verification_code_id').html('sms xxxxxx sent to ' + mobile.replace(/\d(?=\d{4})/g, "*"));


					} else {
						Swal.fire({
							text: response.message
						});
					}

				},
				error: function(response) {
					//jqXHR, textStatus, errorThrown
					$('#loginuser').text('Continue');
					$('#loginuser').removeAttr('disabled');
					//console.log(response);
					Swal.fire({
						text: response
					});
				}
			})

		}
	});

	$("#otpcode").click(function(event) {

		// Fetch form to apply custom Bootstrap validation
		var form = $("#login_form")

		if (form[0].checkValidity() === false) {
			event.preventDefault()
			event.stopPropagation()
		}

		form.addClass('was-validated');
		// Perform ajax submit here...

		var verification_code = $("#verification_code").val();
		var mobile = $("#mobile").val();
		var regexphone = /^[0-9]{6}$/;

		var error = false;

		if (verification_code == '') {
			$('#error_phone').text('Enter your verification code.');
			error = true;
		} else if (!regexphone.test(verification_code)) {
			error = true;
			$('#error_phone').text('Invalid verification code.');
		} else {
			$('#error_phone').text('');
		}
		if (error == false) {

			$(this).text('Please wait...');
			$(this).attr("disabled", true);

			$.ajax({
				url: baseURL + "loginMeOtp",
				type: "POST",
				data: {
					"verification_code": verification_code,
					"mobile": mobile
				},
				success: function(response) {
					//data, textStatus, jqXHR
					$('#otpcode').text('Continue');
					$('#otpcode').removeAttr('disabled');
				// 	console.log(response);
					if (response == 'success') {
						setTimeout(function() {
							window.location.href = baseURL + "/dashboard";
						});
						//$('#mobilediv').hide();
						//$('#haveaccount').hide();
						//$('#otpdiv').show();
					} else {
						Swal.fire({
							text: response
						});
					}

				},
				error: function(response) {
					//jqXHR, textStatus, errorThrown
					$('#otpcode').text('Continue');
					$('#otpcode').removeAttr('disabled');
					//console.log(response);
					Swal.fire({
						text: response
					});
				}
			})

		}
	});

	$("#signup").click(function(event) {

		// Fetch form to apply custom Bootstrap validation
		var form = $("#register_form")

		if (form[0].checkValidity() === false) {
			event.preventDefault()
			event.stopPropagation()
		}

		form.addClass('was-validated');
		// Perform ajax submit here...

		protect_email = function(user_email) {
			var avg, splitted, part1, part2;
			splitted = user_email.split("@");
			part1 = splitted[0];
			avg = part1.length / 2;
			part1 = part1.substring(0, (part1.length - avg));
			part2 = splitted[1].toLowerCase();
			return part1 + "***@" + part2;
		};

		function validEmail(e) {
			var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
			return String(e).search(filter) != -1;
		}

		var fname = $("#fname").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var pincode = $("#pincode").val();
		var city = $("#city").val();
		var state = $("#state").val();
		var state_code = $("#state_code").val();
		var officename = $("#officename").val();
		var address = $("#address").val();
		var terms_conditions = $("input[name='terms_conditions']:checked").val();
		//var recaptcha_response = $("#captcha").val();
		var regexphone = /^[0-9]{10}$/;
		var regexpincode = /^[0-9]{6}$/;
		var error = false;
		var validemail = '';


		if (fname == '' || fname.trim() == "") {
			$('#error_fname').text("Enter your full name.");
			error = true;
		} else {
			if (!/^[a-zA-Z ]*$/g.test(fname)) {
				$('#error_fname').text('Full name should be alpha charcter only.');
				error = true;
			} else {
				$('#error_fname').text('');
			}
		}

		if (email != '') {
			validemail = validEmail(email);
			if (validemail == false) {
				$('#error_email').text('Invalid email address.');
				error = true;
			} else {
				$('#error_email').text('');
			}
		}


		if (mobile == '') {
			$('#error_phone').text('Enter your mobile number.');
			error = true;
		} else if (!regexphone.test(mobile)) {
			error = true;
			$('#error_phone').text('Invalid mobile number.');
		} else {
			$('#error_phone').text('');
		}


		if (pincode == '') {
			$('#error_pincode').text('Enter your pincode.');
			error = true;
		} else if (!regexpincode.test(pincode)) {
			error = true;
			$('#error_pincode').text('Invalid pincode.');
		} else {
			$('#error_pincode').text('');
		}



		// if (recaptcha_response == '' || recaptcha_response.length != 6) {

		// 	$('#error_captcha').text("Please enter the code you see on the left.");
		// 	error = true;
		// } else {
		// 	$('#error_captcha').text('');
		// }

		if ($('#terms_conditions').is(':checked')) {
			$('#error_accept').text('');
		} else {
			$('#error_accept').text('Please accept terms and conditions.');
			error = true;
		}
		if (error == false) {


			$(this).text('Please wait...');
			$(this).attr("disabled", true);


			$.ajax({
				url: baseURL + "register_user",
				type: "POST",
				data: {
					"name": fname.toLowerCase(),
					"email": email.toLowerCase(),
					"mobile": mobile,
					"pincode": pincode,
					"city": city,
					"state": state,
					"state_code": state_code,
					"officename": officename,
					"address": address,
					"terms_conditions": terms_conditions
				},
				success: function(response) {
					//console.log(response);
					//data, textStatus, jqXHR
					//response.code
					$('#signup').text('Register Now');
					$('#signup').removeAttr('disabled');
					//console.log(response);
					if (response.status == 1) {

						$('#registerdiv').hide();
						//$('#haveaccount').hide();
						$('#otpdiv').show();
						$('#verification_code_id').html('sms xxxxxx sent to ' + mobile.replace(/\d(?=\d{4})/g, "*"));

					} else {
						Swal.fire({
							text: response.message
						});
					}

				},
				error: function(response) {
					//jqXHR, textStatus, errorThrown
					$('#signup').text('Register Now');
					$('#signup').removeAttr('disabled');
					//console.log(response);
					Swal.fire({
						text: response
					});
				}
			})

		}
	});
	$("#registerotpcode").click(function(event) {

		// Fetch form to apply custom Bootstrap validation
		var form = $("#register_form")

		if (form[0].checkValidity() === false) {
			event.preventDefault()
			event.stopPropagation()
		}

		form.addClass('was-validated');
		// Perform ajax submit here...

		var verification_code = $("#verification_code").val();
		var mobile = $("#mobile").val();
		var regexphone = /^[0-9]{6}$/;

		var error = false;

		if (verification_code == '') {
			$('#error_phone').text('Enter your verification code.');
			error = true;
		} else if (!regexphone.test(verification_code)) {
			error = true;
			$('#error_phone').text('Invalid verification code.');
		} else {
			$('#error_phone').text('');
		}
		if (error == false) {

			$(this).text('Please wait...');
			$(this).attr("disabled", true);

			$.ajax({
				url: baseURL + "RegisterMeOtp",
				type: "POST",
				data: {
					"verification_code": verification_code,
					"mobile": mobile
				},
				success: function(response) {
					//data, textStatus, jqXHR
					$('#registerotpcode').text('Continue');
					$('#registerotpcode').removeAttr('disabled');
					//console.log(response);
					if (response == 'success') {


						Swal.fire({
							text: 'Your account has been verified successfully.'
						}).then(function() {
							setTimeout(function() {
								window.location.href = baseURL + "dashboard";
							});
						});


						//$('#mobilediv').hide();
						//$('#haveaccount').hide();
						//$('#otpdiv').show();
					} else {
						Swal.fire({
							text: response
						});
					}

				},
				error: function(response) {
					//jqXHR, textStatus, errorThrown
					$('#registerotpcode').text('Continue');
					$('#registerotpcode').removeAttr('disabled');
					//console.log(response);
					Swal.fire({
						text: response
					});
				}
			})

		}
	});




	$('.add-to-cart').on('click', function() {
		//$(this).attr('disabled', 'disabled');
		//$(this).text('Added in cart');
		var cab_id = $(this).attr('data-id');
		var car_type = $(this).attr('data-car-type');
		var car_price = $(this).attr('data-price');
		var cab_total_price = $(this).attr('data-total-price');

		// var fname = $("#fname").val();
		// var email = $("#email").val();
		// var mobile = $("#mobile").val();
		// var pincode = $("#pincode").val();
		var trip_type = $("#trip_type").val();
		var pick_type = $("#pick_type").val();
		var pickup_location = $("#pickup_location").val();
		var drop_location = $("#drop_location").val();
		var pickup_date = $("#pickup_date").val();
		var pickup_time = $("#pickup_time").val();
		var return_date = $("#return_date").val();
		var return_time = $("#return_time").val();
		var distance = $("#distance").val();
		var duration = $("#duration").val();

		//var cart_total_amount = $('#cart-hid-total-amt').val();

		var total_discount = 0;
		var total_min_amount = 0;
		var tax = 5;
		var total_sub_amount = car_price*distance;
		var total_tax = 0;
		total_cart_price = car_price*distance;

		if(total_discount)
		{
			total_cart_price = (total_cart_price - total_discount);
		}

		total_tax = ((total_cart_price*tax)/100);
		total_cart_price = total_cart_price + total_tax;

		total_min_amount = ((total_cart_price*20)/100);


		$("#loading").show();


		$.ajax({
			url: baseURL + "user/add_to_cart",
			type: "POST",
			data: {
				// "name": fname,
				// "email": email.toLowerCase(),
				// "mobile": mobile,
				// "pincode": pincode,
				"trip_type": trip_type,
				"pick_type": pick_type,
				"pickup_location": pickup_location,
				"drop_location": drop_location,
				"pickup_date": pickup_date,
				"pickup_time": pickup_time,
				"return_date": return_date,
				"return_time": return_time,
				"distance": distance,
				"duration": duration,
				"cab_id": cab_id,
				"car_type": car_type,
				"car_price": car_price,
				"cab_total_price": cab_total_price,
				"total_tax":total_tax,
				"total_discount":total_discount,
				"total_cart_price":total_cart_price
			},
			success: function(response) {
				$("#loading").hide();
				$('.car-image').css("border", "none");
				//console.log(response);
				//data, textStatus, jqXHR
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				if (response.status == 1) {
					//$('#registerdiv').hide();
					//$('#haveaccount').hide();
					//$('#otpdiv').show();
					//$('#mini-total').html('dsfdsfdsf');
					
					$('#total_discount').html(total_discount);
					$('#total_tax').html(total_tax);
					$('#total_sub_amount').html(total_sub_amount);
					
					$('#minimum_amount').html('<i class="fas fa-rupee-sign"></i> ' + total_cart_price);
						$('#minimum_amount2').html('<i class="fas fa-rupee-sign"></i> ' + total_cart_price);
					$('#full_amount').html('<i class="fas fa-rupee-sign"></i> ' + total_min_amount);
					
					if(total_min_amount)
					{
						$('#proceed-payment').show();
						//$('#proceed-payment').text('Book Now');
						
					}

				} else {
					Swal.fire({
						text: 'There seems to be an error, when user registration. Please try again.'
					});
				}

			},
			error: function(response) {
				$("#loading").hide();
				//jqXHR, textStatus, errorThrown
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				Swal.fire({
					text: 'There seems to be an error, when user registration. Please try again.'
				});
			}
		})
	});
	
	
	
	$('.update_rental_cart').on('click', function() {
    
		var trip_id = $("#trip_id").val();
		//var vehicle_id = $(this).attr('data-id');
		var vehicle_id = $("input[name='car-rental-selected-car']:checked").val();
// 		var pick_type = $("input[name='pick_type']:checked").val();
        var pick_type = $("#pick_type").val();
		var pickup_date = $("#pickup_date").val();
		var pickup_time = $("#pickup_time").val();
		
// 		console.log('pick_type');
// 		console.log(pick_type);
		
		var dataArr  = {
				"trip_id": trip_id,
				"vehicle_id": vehicle_id,
				"pick_type": pick_type,
				"pickup_date": pickup_date,
				"pickup_time": pickup_time
			};
			
		//console.log(dataArr);
		$("#loading").show();

		$.ajax({
			url: baseURL + "quotation/update_rental_cart",
			type: "POST",
			data: dataArr,
			success: function(response) {
				$("#loading").hide();
				$('.car-image').css("border", "none");
				//console.log(response);
				//data, textStatus, jqXHR
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				if (response.status == 1) {
					
					
					$('#km_approx_text').html(response.cart_data.duration);
					$('#additional_km_fare').html(response.cart_data.additional_km_fare);
					$('#additional_km_fare_text').html(response.cart_data.additional_ride_time_fare);
					$('#after_first_km').html(response.cart_data.distance);
					//$('#additional_km_fare_text').html(response.cart_data.distance);
					if(response.cart_data.distance == 40)
					{
						$('#after_first_km_text').html('4');
					}
					else{
						$('#after_first_km_text').html('8');
					}

					$('#total_car_price').html(response.cart_data.car_price + '/-');
					$('#total_discount').html(response.cart_data.total_discount + '/-');
					$('#total_tax').html(response.cart_data.total_tax + '/-');
					$('#total_sub_amount').html(response.cart_data.sub_total + '/-');
					
					$('#minimum_amount').html('&#8377; ' + response.cart_data.total_price);
					$('#minimum_amount2').html('&#8377; ' + response.cart_data.total_price);
					$('#full_amount').html('&#8377; ' + response.cart_data.min_total);
					$('#start_fee').html(response.cart_data.start_fee);
					$('#base_price').html(response.cart_data.price);
					$('#proceed-payment').show();

				} else {
					Swal.fire({
						text: 'There seems to be an error. Please try again.'
					});
				}

			},
			error: function(response) {
				$("#loading").hide();
				//jqXHR, textStatus, errorThrown
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				Swal.fire({
					text: 'There seems to be an error. Please try again.'
				});
			}
		})
	});
	
	$('#apply_coupon').on('click', function() {
		var trip_id = $("#trip_id").val();
		var coupon_code = $("#coupon_code").val();
		if(coupon_code != ''){
			var dataArr = {
				"id": trip_id, "coupon_code": coupon_code
			};
			
			$("#loading").show();
			
			$.ajax({
				url: baseURL + "apply_coupon",
				type: "POST",
				data: dataArr,
				success: function(response) {
					$("#loading").hide();
					if (response.status == 1) {
						$('#total_discount').html(response.cart_data.total_discount + '/-');
						$('#total_tax').html(response.cart_data.total_tax + '/-');
						$('#total_sub_amount').html(response.cart_data.sub_total + '/-');
						
						$('#minimum_amount').html('&#8377; ' + response.cart_data.total_price);
						$('#minimum_amount2').html('&#8377; ' + response.cart_data.total_price);
						$('#full_amount').html('&#8377; ' + response.cart_data.min_total);
						
						Swal.fire({
							text: response.message
						});
					} else {
						Swal.fire({
							text: response.message
						});
					}
				},
				error: function(response) {
					$("#loading").hide();
					//jqXHR, textStatus, errorThrown
					$('#proceed-payment').text('Book Now');
					$('#proceed-payment').removeAttr('disabled');
					//console.log(response);
					Swal.fire({
						text: 'There seems to be an error. Please try again.'
					});
				}
			})
		}else{
			Swal.fire({
				text: 'Please enter coupon code.'
			});
		}
	});
	
	$('.update_outstation_cart').on('click', function() {
		var trip_id = $("#trip_id").val();
		var vehicle_id = $("input[name='car-rental-selected-car']:checked").val();
		var pick_type = $("input[name='pick_type']:checked").val();
		var pickup_date = $("#pickup_date").val();
		var pickup_time = $("#pickup_time").val();
		var return_date = $("#return_date").val();
		var return_time = $("#return_time").val();
		
		var dataArr  = {
				"trip_id": trip_id,
				"vehicle_id": vehicle_id,
				"pick_type": pick_type,
				"pickup_date": pickup_date,
				"pickup_time": pickup_time,
				"return_date": return_date,
				"return_time": return_time
			};
			
		//console.log(dataArr);
		$("#loading").show();

		$.ajax({
			url: baseURL + "quotation/update_outstation_cart",
			type: "POST",
			data: dataArr,
			success: function(response) {
				$("#loading").hide();
				$('.car-image').css("border", "none");
				//console.log(response);
				//data, textStatus, jqXHR
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				console.log(response);
				if (response.status == 1) {
					//console.log(response.cart_data);					
					$('#km_approx_text').html(response.cart_data.km_approx);
					$('#additional_km_fare').html(response.cart_data.additional_km_fare);
					$('#additional_km_fare_text').html(response.cart_data.additional_ride_time_fare);
					$('#after_first_km').html(response.cart_data.distance);
					//$('#additional_km_fare_text').html(response.cart_data.distance);

					$('#after_first_km_text').html(response.cart_data.distance);
					$('#total_car_price').html(response.cart_data.car_price + '/-');
					$('#total_discount').html(response.cart_data.total_discount + '/-');
					$('#total_tax').html(response.cart_data.total_tax + '/-');
					$('#total_sub_amount').html(response.cart_data.sub_total + '/-');
					
					$('#minimum_amount').html('&#8377; ' + response.cart_data.total_price);
					$('#minimum_amount2').html('&#8377; ' + response.cart_data.total_price);
					$('#full_amount').html('&#8377; ' + response.cart_data.min_total);
					
					$('#driver_allowance').html(response.cart_data.driver_allowance);
					$('#night_charges').html(response.cart_data.night_charges);
					$('#additional_km_fare1').html(response.cart_data.additional_km_fare);
					$('#additional_km_fare2').html(response.cart_data.additional_ride_time_fare);
					$('#after_first_km1').html(response.cart_data.distance);
					
					$('#additional_ride_time_fare1').html(response.cart_data.additional_ride_time_fare);
					$('#additional_ride_time_fare2').html(response.cart_data.additional_km_fare);
					$('#start_fee').html(response.cart_data.start_fee);
					$('#base_price').html(response.cart_data.price);
					$('#proceed-payment').show();

				} else {
					Swal.fire({
						text: 'There seems to be an error. Please try again.'
					});
				}

			},
			error: function(response) {
				$("#loading").hide();
				//jqXHR, textStatus, errorThrown
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				Swal.fire({
					text: 'There seems to be an error. Please try again.'
				});
			}
		})
	});
	
	$('.update_city_cart').on('click', function() {
		var trip_id = $("#trip_id").val();
		var vehicle_id = $("input[name='car-rental-selected-car']:checked").val();
		var pick_type = $("input[name='pick_type']:checked").val();
		var pickup_date = $("#pickup_date").val();
		var pickup_time = $("#pickup_time").val();
		var return_date = $("#return_date").val();
		var return_time = $("#return_time").val();
		
		var dataArr  = {
				"trip_id": trip_id,
				"vehicle_id": vehicle_id,
				"pick_type": pick_type,
				"pickup_date": pickup_date,
				"pickup_time": pickup_time,
				"return_date": return_date,
				"return_time": return_time
			};
			
		//console.log(dataArr);
		$("#loading").show();

		$.ajax({
			url: baseURL + "quotation/update_city_cart",
			type: "POST",
			data: dataArr,
			success: function(response) {
				$("#loading").hide();
				$('.car-image').css("border", "none");
				//console.log(response);
				//data, textStatus, jqXHR
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				if (response.status == 1) {					
					$('#km_approx_text').html(response.cart_data.km_approx);
					$('#additional_km_fare').html(response.cart_data.additional_km_fare);
					$('#additional_km_fare_text').html(response.cart_data.additional_ride_time_fare);
					$('#after_first_km').html(response.cart_data.distance);
					//$('#additional_km_fare_text').html(response.cart_data.distance);

					$('#after_first_km_text').html(response.cart_data.distance);
					$('#total_car_price').html(response.cart_data.car_price + '/-');
					$('#total_discount').html(response.cart_data.total_discount + '/-');
					$('#total_tax').html(response.cart_data.total_tax + '/-');
					$('#total_sub_amount').html(response.cart_data.sub_total + '/-');
					
					$('#minimum_amount').html('&#8377; ' + response.cart_data.total_price);
					$('#minimum_amount2').html('&#8377; ' + response.cart_data.total_price);
					$('#full_amount').html('&#8377; ' + response.cart_data.min_total);
					
					$('#driver_allowance').html(response.cart_data.driver_allowance);
					$('#night_charges').html(response.cart_data.night_charges);
					$('#additional_km_fare1').html(response.cart_data.additional_km_fare);
					$('#additional_km_fare2').html(response.cart_data.additional_ride_time_fare);
					$('#after_first_km1').html(response.cart_data.distance);
					
					$('#additional_ride_time_fare1').html(response.cart_data.additional_ride_time_fare);
					$('#additional_ride_time_fare2').html(response.cart_data.additional_km_fare);
					$('#start_fee').html(response.cart_data.start_fee);
					$('#base_price').html(response.cart_data.price);
					$('#proceed-payment').show();

				} else {
					Swal.fire({
						text: 'There seems to be an error. Please try again.'
					});
				}

			},
			error: function(response) {
				$("#loading").hide();
				//jqXHR, textStatus, errorThrown
				$('#proceed-payment').text('Book Now');
				$('#proceed-payment').removeAttr('disabled');
				//console.log(response);
				Swal.fire({
					text: 'There seems to be an error. Please try again.'
				});
			}
		})
	});
	

	$("#proceed-payment").click(function(event) {
		// Fetch form to apply custom Bootstrap validation
		var form = $("#car-rental")

		if (form[0].checkValidity() === false) {
			event.preventDefault()
			event.stopPropagation()
		}

		form.addClass('was-validated');
		// Perform ajax submit here...

		protect_email = function(user_email) {
			var avg, splitted, part1, part2;
			splitted = user_email.split("@");
			part1 = splitted[0];
			avg = part1.length / 2;
			part1 = part1.substring(0, (part1.length - avg));
			part2 = splitted[1].toLowerCase();
			return part1 + "***@" + part2;
		};

		function validEmail(e) {
			var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
			return String(e).search(filter) != -1;
		}


		var car = $("input[name='car-rental-selected-car']:checked").val();
		var pickup_date = $("#pickup_date").val();
		var pickup_time = $("#pickup_time").val();
		var fname = $("#fname").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var coupon_code = $("#coupon_code").val();
		var amount_type = $("input[name='amount_type']:checked").val();
		//var recaptcha_response = $("#captcha").val();
		var regexphone = /^[0-9]{10}$/;
		var regexpincode = /^[0-9]{6}$/;
		var error = false;
		var validemail = '';
		var user_id = '';
		
		if (car == undefined) {
			$('.car-image').css("border", "1px solid red");
			error = true;
		}
		else{
			$('.car-image').css("border", "none");
		}

		// //$('.ml-0').css("border", "1px solid red");
		if (fname == '' || fname.trim() == "") {
			$('#error_fname').text("Enter your full name.");
			error = true;
		} else {
			if (!/^[a-zA-Z ]*$/g.test(fname)) {
				$('#error_fname').text('Full name should be alpha charcter only.');
				error = true;
			} else {
				$('#error_fname').text('');
			}
		}

		if (email != '') {
			validemail = validEmail(email);
			if (validemail == false) {
				$('#error_email').text('Invalid email address.');
				error = true;
			} else {
				$('#error_email').text('');
			}
		}

		if (mobile == '') {
			$('#error_phone').text('Enter your mobile number.');
			error = true;
		} else if (!regexphone.test(mobile)) {
			error = true;
			$('#error_phone').text('Invalid mobile number.');
		} else {
			$('#error_phone').text('');
		}

		// if (recaptcha_response == '' || recaptcha_response.length != 6) {

		// 	$('#error_captcha').text("Please enter the code you see on the left.");
		// 	error = true;
		// } else {
		// 	$('#error_captcha').text('');
		// }
		if (error == false) {
			$(this).text('Please wait...');
			$(this).attr("disabled", true);
			jQuery.support.cors = true;
			$.ajax({
				url: baseURL + "user/checkUserExist",
                type : 'POST',
				data: {
					"name": fname.toLowerCase(),
					"email": email.toLowerCase(),
					"mobile": mobile,
					"terms_conditions":1
				},
				success: function(response) {
					user_id = response;					
					$.ajax({
						url: baseURL + "payment/save_order",
						type : 'POST',
						data: {
							"user_id": user_id,
							"name": fname.toLowerCase(),
							"email": email.toLowerCase(),
							"mobile": mobile,
							"amount_type":amount_type,
							"coupon_code":coupon_code,
							"pickup_date" : pickup_date,
							"pickup_time" : pickup_time
						},
						success: function(response) {
							//console.log(response);
							//data, textStatus, jqXHR
							$('#proceed-payment').text('Book Now');
							$('#proceed-payment').removeAttr('disabled');

							let timerInterval
							Swal.fire({
								title: 'Initiating your order process',
								html: 'Your order is being processed, Please wait for a moment.',
								timer: 2000,
								onBeforeOpen: () => {
									Swal.showLoading()
									timerInterval = setInterval(() => {}, 100)
								},
								onClose: () => {
									clearInterval(timerInterval)
								}
							}).then((result) => {})

							if (response == 0) {
								let timerInterval
								Swal({
									html: 'There seems to be an error, please try again.',
									//customClass: 'custom_swl_popup',
									timer: 1500,
									onBeforeOpen: () => {
										Swal.showLoading()
										timerInterval = setInterval(() => {
											//Swal.getContent().querySelector('strong').textContent = Swal.getTimerLeft()
										}, 100)
									},
									onClose: () => {
										clearInterval(timerInterval)
									}
								}).then((result) => {})
							} else {
								setTimeout(function() {
									window.location.href = baseURL + "payment/pgRedirect/" + response;
								}, 1000);
							}

						},
						error: function(response) {
							//jqXHR, textStatus, errorThrown
							$('#proceed-payment').text('Book Now');
							$('#proceed-payment').removeAttr('disabled');
							console.log(response);
							Swal.fire({
								text: response
							});
						}
					})
				},
				error: function(response) {
					//jqXHR, textStatus, errorThrown
					$('#proceed-payment').text('Book Now');
					$('#proceed-payment').removeAttr('disabled');
					console.log(response);
					Swal.fire({
						text: response
					});
				}
			});
		}
	});
	
    $("input.time").timepicker({
      timeFormat: "g:i A"
      // => 2:03 AM
    });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/common.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jalerts/jquery.browser.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jalerts/jquery.alerts.js"></script>
    <!-- <script src="https://sewakcabs.com/assets/js/common.js"></script> -->
      <?php if ($this->uri->segment(1) == "quotation") { ?>
        <script>
		// This example requires the Places library. Include the libraries=places
		// parameter when you first load the API. For example:
		// <script
		// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
		// var infowindow;

		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				mapTypeControl: false,
				center: {
					lat: 20.5937,
					lng: 78.9629
				},
				zoom: 5,
				disableDefaultUI: false
			});

			infowindow = new google.maps.InfoWindow();


      



			new AutocompleteDirectionsHandler7(map);
			new AutocompleteDirectionsHandler8(map);
			new AutocompleteDirectionsHandler9(map);
			new AutocompleteDirectionsHandler10(map);
		}
		//AIzaSyA_YqYVTkNqQcetW04CYCrRm1QnomaXoNA, AIzaSyASouLkN1w9q5p4qlu0f038_wL6mW0zMAg
	</script>
	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASouLkN1w9q5p4qlu0f038_wL6mW0zMAg&libraries=places&callback=initMap" async defer></script>
	<?php } ?>

  <script>

	





	</script>
  
    <div id="loading">
      <img id="loading-image" src="<?php echo base_url(); ?>assets/img/loading.gif" />
    </div>
    </body>

    </html>