<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 <?=empty($companyRecords) ? 'mt-1' : '' ?>">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Admin Company Setting</span>
        </h6>
        <?php if (empty($companyRecords)) { ?>
            <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewAdminCompany">
                <i class="fas fa-plus"></i> Add New Admin Company Details
            </a> <?php } ?>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Admin Company List</div>
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
                    <table width="100%" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Logo</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Landline</th>
                                <th>Contact Person</th>
                                <th>PAN</th>
                                <th>GSTIN</th>
                                <th>Pincode</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($companyRecords)) {
                                $i = 0;
                                foreach ($companyRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><a href="" data-toggle="modal" data-target="#modalUploadLogo"><?php if (empty($record->image)) {
                                                                                                                        echo '<span class="btn-sm btn-outline-indigo btn-rounded" data-toggle="tooltip" data-placement="bottom" title="Upload Logo">' . mb_substr(strtoupper($record->company_name), 0, 2) . '</span>';
                                                                                                                    } else {
                                                                                                                        echo '<img src="' . base_url() . 'upload/admin/images/' . $record->image . '" data-toggle="tooltip" data-placement="bottom" title="Change Logo" />';
                                                                                                                    } ?></a></td>
                                        <td><?php echo $record->company_name; ?></td>
                                        <td><?php echo $record->email; ?></td>
                                        <td><?php echo $record->mobile ?></td>
                                        <td><?php echo $record->landline; ?></td>
                                        <td><?php echo $record->contact_person; ?></td>
                                        <td><?php echo $record->pan; ?></td>
                                        <td><?php echo $record->gstin; ?></td>
                                        <td><?php echo $record->pincode; ?></td>
                                        <td><?php echo $record->address; ?></td>
                                        <td><?php echo $record->city; ?></td>
                                        <td><?php echo $record->statename; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldAdminCompany/' . $record->id; ?>" title="Edit" data-toggle="tooltip" data-placement="bottom">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-danger btn-rounded deleteAdminCompany" href="#" data-id="<?php echo $record->id; ?>" title="Delete" data-toggle="tooltip" data-placement="bottom">
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


<div class="modal fade" id="modalUploadLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Upload Logo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="uploadAdminCompanyLogo">
                <input type="hidden" name="id" value="<?= $companyRecords[0]->id ?>">
                <div class="modal-body mx-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="userfile" class="custom-file-input" id="file" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-indigo" id="btn_upload" type="submit">Upload <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>