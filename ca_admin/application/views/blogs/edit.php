

<!-- Heading -->

<div class="card mb-3">

    <!--Card content-->

    <div class="card-body d-sm-flex justify-content-between">

        <h6 class="mb-sm-0">

            <a href="<?php echo base_url(); ?>adminCompanyListing">Blog Master</a>

            <span>/</span>

            <span>Edit Blog</span>

        </h6>

    </div>

</div>

<!-- Heading -->

<!--Grid row-->

<!-- form start -->

<?php $this->load->helper("form"); ?>

<form role="form" id="editBlogs" action="<?php echo base_url() ?>editBlogs/<?php echo $blog["id"]; ?>" method="post" autocomplete="off" enctype="multipart/form-data" name="editBlogs">

    <input type="hidden" name="id" id="id" value="<?php echo $blog["id"]; ?>">

    <div class="row">



        <!--Grid column-->

        <div class="col-md-12">



            <!--Card-->

            <div class="card">

                <div class="card-header white-text primary-color">Edit Blog Information</div>

                <!--Card content-->

                <div class="card-body">



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

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="blog_title">Blog Title <span class="red-text">*</span></label>

                                        <input type="text" class="form-control form-control-sm required" placeholder="Blog Title" value="<?php echo $blog["blog_title"]; ?>" id="blog_title" name="blog_title">

                                        

                                    </div>

                                </div>

                                <div class="col-md-12">  

                                    <div class="form-group ">

                                        <label for="banner_image" >Blog Image<span class="red-text">*</span>

                                        </label>

                                        <input type="file" value="<?php echo base_url().'assets/blogs/'.$blog["banner_image"] ?>" class="form-control form-control-sm required" id="banner_image" name="userfile2">

                                        <img src="<?php echo base_url().'assets/blogs/'.$blog["banner_image"] ?>" />      

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="short_description">Short Description<span class="red-text">*</span></label>

                                        <textarea type="text" rows="3" class="form-control form-control-sm" placeholder="Short Description" id="short_description" name="short_description"><?php echo $blog["short_description"]; ?></textarea>



                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="description">Long Description<span class="red-text">*</span></label>

                                        <textarea id="mymce"  rows="5" class="form-control form-control-sm" placeholder=" Description" id="description" name="description"> <?php echo $blog["description"]; ?></textarea>



                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="meta_keywords">Meta keywords</label>

                                        <input type="text" class="form-control form-control-sm" placeholder="Meta keywords" value="<?php echo $blog["meta_keywords"]; ?>" id="meta_keywords" name="meta_keywords">



                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="meta_description">Meta Description</label>

                                        <input type="text" class="form-control form-control-sm" placeholder="Meta Description" value="<?php echo $blog["meta_description"]; ?>" id="meta_description" name="meta_description">



                                    </div>

                                </div>

                                      <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="alt_tag">Alt Tag</label>

                                        <input type="text" class="form-control form-control-sm" placeholder="Alt Tag" value="<?php echo $blog["alt_tag"]; ?>" id="alt_tag" name="alt_tag">



                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="blog_tags">Tags</label>

                                        <input type="text" class="form-control form-control-sm" placeholder="Tags" value="<?php echo $blog["blog_tags"]; ?>" id="blog_tags" name="blog_tags">



                                    </div>

                                </div>

                            </div>

                            

                        </div>



                    </div>

                </div>

            </div>



        </div>

       

        <div class="col-md-12">

            <!-- Accordion card -->

            <div class="card-footer text-center">

                <input type="submit" class="btn btn-primary" value="Submit" />

                <input type="reset" class="btn btn-default" value="Reset" />

            </div>







        </div>



    </div>

</form>

  <script src="<?php echo site_url(); ?>assets/tinymce/tinymce.min.js"></script>

    <script> 

    // $(document).ready(function() {

    //     $('.textarea_editor').wysihtml5();

    // });



    $(document).ready(function() {



        if ($("#mymce").length > 0) {

            tinymce.init({

                selector: "textarea#mymce",

                theme: "modern",

                height: 300,

                plugins: [

                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

                    "save table contextmenu directionality emoticons template paste textcolor"

                ],

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

        

            });

        }

    });

 </script> 