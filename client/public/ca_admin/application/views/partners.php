<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>Partner Management</span>
        </h6>
        <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addPartner" data-toggle="tooltip" data-placement="bottom" title="Add Partner">
            <i class="fas fa-plus"></i> Add Partner
        </a>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Partner's List</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap">

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
                    if ($success) {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($userRecords)) {
                                $i = 0;
                                foreach ($userRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $record->email; ?></td>
                                        <td><?php echo $record->mobile; ?></td>
                                        <td><?php echo $record->state; ?></td>
                                        <td>
                                           
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editPartner/' . $record->userId; ?>" title="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit Partner">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-danger btn-rounded deletePartner" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete" data-toggle="tooltip" data-placement="bottom" title="Delete Partner">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
jQuery(document).ready(function() {
    jQuery(document).on("click", ".deletePartner", function() {
        var e = $(this).data("userid"),
            t = baseURL + "deletePartner",
            o = $(this);
        confirm("Are you sure to delete this Partner ?") && jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: t,
            data: {
                userId: e
            }
        }).done(function(e) {
            o.parents("tr").remove(), (e.status = !0) ? alert("Partner successfully deleted") : (e.status = !1) ? alert("Partner deletion failed") : alert("Access denied..!")
        })
    })
})
</script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>