<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('dragdrop/fileinput.css?ver=' . time()); ?>">
        <link href="<?php echo base_url('dragdrop/themes/explorer/theme.css?ver=' . time()); ?>" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/video.css?ver=' . time()); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css?ver=' . time()); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css?ver=' . time()) ?>" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/3.3.0/select2.css?ver=' . time()); ?>">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css?ver=' . time()); ?>">
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery-ui-1-12-1.css?ver=' . time()); ?>">  DOWNLOAD FROM : href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/business/business.css?ver=' . time()); ?>">
        <style type="text/css">
            .two-images, .three-image, .four-image{
                height: auto !important;
            }
        </style>
    </head>
    <body class="page-container-bg-solid page-boxed pushmenu-push">
        <!-- START HEADER -->
        <?php echo $header; ?>
        <!-- END HEADER -->
        <?php echo $business_header2_border; ?>
        <section>
            <div class="user-midd-section bui_art_left_box" id="paddingtop_fixed">
                <div class="container art_container">
                    <div class="">
                        <div class="profile-box-custom fl animated fadeInLeftBig left_side_posrt" >
                            <div class="left_fixed">
                                <?php echo $business_left; ?>
                                <div class="full-box-module_follow fw fixed_right_display_none ">
                                    <!-- follower list start  -->  
                                    <div class="common-form">
                                        <h3 class="user_list_head">User List
                                        </h3>
                                        <div class="seeall">
                                            <a href="<?php echo base_url('business-profile/userlist/' . $businessdata[0]['business_slug']); ?>">All User
                                            </a>
                                        </div>
                                    </div>
                                    <!-- GET USER FOLLOE SUGESSION LIST START [AJAX DATA DISPLAY UNDER profile-boxProfileCard_follow CLASS]-->
                                    <div class="profile-boxProfileCard_follow fw  module">

                                    </div>
                                    <!-- GET USER FOLLOE SUGESSION LIST START -->
                                    <!-- follower list end  -->
                                </div>
                                <div class="custom_footer_left fw" style="margin-top: 15px;">
                                    <div class="fl">
                                        <ul>
                                            <li><a href=""> About Us </a></li>
                                            <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
                                            <li><a href="">Contact Us</a></li>
                                            <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
                                            <li><a  href="">Blogs</a></li>
                                            <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
                                            <li><a href="">Terms & Condition </a></li>
                                            <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
                                            <li><a href="">Privacy Policy</a></li>
                                            <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
                                            <li><a href="">Send Us Feedback</a></li>
                                        </ul>
                                    </div>
                                    <div>

                                    </div>

                                </div>
                            </div>
                            <br>
                            <div id="result"></div>   
                        </div>
                        <!-- popup start -->
                        <!-- Trigger/Open The Modal -->
                        <!-- <div id="myBtn">Open Modal</div>-->

                        <?php
                        if ($this->session->flashdata('error')) {
                            echo $this->session->flashdata('error');
                        }
                        ?>

                        <div class=" custom-right-art animated fadeInUp">
                            <div class="mian_middle_post_box">  
                                <div class="right_side_posrt fl"> 
                                    <div class="post-editor col-md-12">
                                        <div class="main-text-area col-md-12">
                                            <div class="popup-img"> 
                                                <?php if ($businessdata[0]['business_user_image']) { ?>

                                                    <?php
                                                    if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $businessdata[0]['business_user_image'])) {
                                                        ?>
                                                        <img  src="<?php echo base_url(NOBUSIMAGE); ?>"  alt="">
                                                    <?php } else {
                                                        ?>

                                                        <img  src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $businessdata[0]['business_user_image']); ?>"  alt="">

                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <img  src="<?php echo base_url(NOBUSIMAGE); ?>"  alt="">
                                                <?php } ?>
                                            </div>
                                            <div id="myBtn"  class="editor-content popup-text">
                                                <span> <?php echo $this->lang->line("post_your_product"); ?></span> 
                                                <div class="padding-left padding_les_left camer_h">
                                                    <i class="fa fa-camera"></i> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- body content start-->
                                    <!-- ALL POST DATA DISPLAY IN TO business-all-post CLASS AFTER CALL AJAX -->
                                    <!--                      video tag   khytai chndge 8-7    <div>
                                    <video width="100%" height="350" controls>
                                 <source src="<?php echo base_url($this->config->item('bus_post_main_upload_path') . $businessmultiimage[0]['image_name']); ?>" type="video/mp4">
                                <source src="<?php echo base_url($this->config->item('bus_post_main_upload_path') . $businessmultiimage[0]['image_name']); ?>" type="video/ogg">
                                     Your browser does not support the video tag.
                                         </video>
                                </div>-->
                                    <div class="bs-example">
                                        <div class="progress progress-striped" id="progress_div">
                                            <div class="progress-bar" style="width: 0%;">
                                                <span class="sr-only">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                            <div class='progress' id="progress_div">
                                                                    <div class='bar' id='bar'></div>
                                                                    <div class='percent' id='percent'>0%</div>
                                                                </div>-->
                                    <div class="business-all-post">
                                        <div class="nofoundpost"> 
                                        </div>
                                        <!-- no post found div end -->
                                    </div>
                                    <div class="fw" id="loader" style="text-align:center;"><img src="<?php echo base_url('images/loader.gif?ver=' . time()) ?>" /></div>
                                </div>

                                <div class="animated fadeInRightBig ">
                                    <div class="right_middle_side_posrt fixed_right_display"> 
                                        <div class="full-box-module_follow" style="margin-top: 0px;">
                                            <!-- follower list start  -->  
                                            <div class="common-form">
                                                <h3 class="user_list_head">User List
                                                </h3>
                                                <div class="seeall">
                                                    <a href="<?php echo base_url('business-profile/userlist/' . $businessdata[0]['business_slug']); ?>">All User
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- GET USER FOLLOE SUGESSION LIST START [AJAX DATA DISPLAY UNDER profile-boxProfileCard_follow CLASS]-->
                                            <div class="profile-boxProfileCard_follow fw  module">

                                            </div>
                                            <!-- GET USER FOLLOE SUGESSION LIST START -->
                                            <!-- follower list end  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </section>
                    <!-- The Modal -->
                    <div id="myModal" class="modal-post">
                        <!-- Modal content -->
                        <div class="modal-content-post">
                            <span class="close1">&times;
                            </span>
                            <div class="post-editor col-md-12 post-edit-popup" id="close">
                                <?php // echo form_open_multipart(base_url('business_profile/business_profile_addpost_insert/'), array('id' => 'artpostform', 'name' => 'artpostform', 'class' => 'clearfix', 'onsubmit' => "return imgval(event)"));  ?>
                                <?php echo form_open_multipart(base_url('business-profile/bussiness-profile-post-add'), array('id' => 'artpostform', 'name' => 'artpostform', 'class' => 'clearfix upload-image-form', 'onsubmit' => "return imgval(event)")); ?>
                                <div class="main-text-area col-md-12" >
                                    <div class="popup-img-in"> 
                                        <?php
                                        if ($businessdata[0]['business_user_image'] != '') {
                                            ?>

                                            <?php
                                            if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $businessdata[0]['business_user_image'])) {
                                                ?>
                                                <img  src="<?php echo base_url(NOBUSIMAGE); ?>"  alt="">
                                            <?php } else {
                                                ?>

                                                <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $businessdata[0]['business_user_image']); ?>"  alt="">

                                            <?php } ?>

                                            <?php
                                        } else {
                                            ?>
                                            <img  src="<?php echo base_url(NOBUSIMAGE); ?>"  alt="">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div id="myBtn1"  class="editor-content col-md-10 popup-text" >
                                        <textarea id="test-upload-product" placeholder="<?php echo $this->lang->line("post_your_product"); ?>"  onKeyPress=check_length(this.form); onKeyUp=check_length(this.form); onKeyDown=check_length(this.form); onblur=check_length(this.form);  name=my_text rows=4 cols=30 class="post_product_name" style=" position: relative;" tabindex="1"></textarea>
                                        <div class="fifty_val">                       
                                            <input size=1 value=50 name=text_num class="text_num"  readonly> 
                                        </div>
                                        <div class="camera_in padding-left padding_les_left camer_h">
                                            <i class=" fa fa-camera" >
                                            </i> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row"></div>
                                <div  id="text"  class="editor-content col-md-12 popup-textarea" >
                                    <textarea id="test-upload-des" name="product_desc" class="description" placeholder="Enter Description" tabindex="2"></textarea>

                                </div>
                                <div class="print_privew_post">
                                </div>
                                <div class="preview">
                                </div>
                                <div id="data-vid" class="large-8 columns">
                                </div>
                                <h2 id="name-vid">
                                </h2>
                                <p id="size-vid">
                                </p>
                                <p id="type-vid">
                                </p>
                                <div class="popup-social-icon">
                                    <ul class="editor-header">
                                        <li>
                                            <div class="col-md-12"> 
                                                <div class="form-group">
                                                    <input id="file-1" type="file" class="file" name="postattach[]"  multiple class="file" data-overwrite-initial="false" data-min-file-count="2" style="display: none;">
                                                </div>
                                            </div>
                                            <label for="file-1">
                                                <i class=" fa fa-camera upload_icon" > Photo</i>
                                                <i class=" fa fa-video-camera upload_icon" > Video </i> 
                                                <i class="fa fa-music upload_icon" > Audio </i>
                                                <i class=" fa fa-file-pdf-o upload_icon"   > PDF </i>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="fr margin_btm">
                                    <button type="submit"  value="Submit">Post
                                    </button>    
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- popup end -->  
                    <!-- Bid-modal  -->
                    <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal">&times;
                                </button>       
                                <div class="modal-body">
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bid-modal  -->
                    <div class="modal fade message-box biderror" id="posterrormodal" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="posterror-modal-close" data-dismiss="modal">&times;
                                </button>       
                                <div class="modal-body">
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model Popup Close -->

                    <!-- Bid-modal-2  -->
                    <div class="modal fade message-box" id="likeusermodal" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close1" data-dismiss="modal">&times;</button>       
                                <div class="modal-body">
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model Popup Close -->


                    <!-- Bid-modal for this modal appear or not start -->
                    <div class="modal fade message-box" id="post" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close" id="post"data-dismiss="modal">&times;</button>       
                                <div class="modal-body">
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bid-modal for this modal appear or not  Popup Close -->

                    <div class="modal fade message-box" id="postedit" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close" id="postedit"data-dismiss="modal">&times;</button>       
                                <div class="modal-body">
                                    <span class="mes">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer>
                        <?php echo $footer; ?>
                    </footer>
                    <script src="<?php echo base_url('js/jquery.wallform.js?ver=' . time()); ?>"></script>
                    <!--<script src="<?php // echo base_url('js/jquery-ui.min.js?ver='.time());      ?>"></script>-->
                    <!--<script src="<?php // echo base_url('js/demo/jquery-1.9.1.js?ver='.time());      ?>"></script>--> 
                    <!--<script src="<?php // echo base_url('js/demo/jquery-ui-1.9.1.js?ver='.time());      ?>"></script>--> 
                    <script src="<?php echo base_url('js/bootstrap.min.js?ver=' . time()); ?>"></script>
                    <script type = "text/javascript" src="<?php echo base_url('js/jquery.form.3.51.js?ver=' . time()) ?>"></script> 
                    <!-- POST BOX JAVASCRIPT START --> 
                    <script src="<?php echo base_url('js/mediaelement-and-player.min.js?ver=' . time()); ?>"></script>
                    <script src="<?php echo base_url('dragdrop/js/plugins/sortable.js?ver=' . time()); ?>"></script>
                    <script src="<?php echo base_url('dragdrop/js/fileinput.js?ver=' . time()); ?>"></script>
                    <script src="<?php echo base_url('dragdrop/js/locales/fr.js?ver=' . time()); ?>"></script>
                    <script src="<?php echo base_url('dragdrop/js/locales/es.js?ver=' . time()); ?>"></script>
                    <script src="<?php echo base_url('dragdrop/themes/explorer/theme.js?ver=' . time()); ?>"></script>
                    <!-- POST BOX JAVASCRIPT END --> 
                    <script>
                                            var base_url = '<?php echo base_url(); ?>';
                    </script>
                    <script type="text/javascript" defer="defer" src="<?php echo base_url('js/webpage/business-profile/home.js?ver=' . time()); ?>"></script>
                    <?php
//$this->minify->js(array('webpage/business-profile/home_1.js'));
                    ?>
                    <script>
                                            $(function () {
                                                function split(val) {
                                                    return val.split(/,\s*/);
                                                }
                                                function extractLast(term) {
                                                    return split(term).pop();
                                                }
                                                /* first box */
                                                $("#tags").bind("keydown", function (event) {
                                                    if (event.keyCode === $.ui.keyCode.TAB &&
                                                            $(this).autocomplete("instance").menu.active) {
                                                        event.preventDefault();
                                                    }
                                                })
                                                        .autocomplete({
                                                            minLength: 1,
                                                            source: function (request, response) {
                                                                // delegate back to autocomplete, but extract the last term
                                                                $.getJSON(base_url + "business_profile/ajax_business_skill", {term: extractLast(request.term)}, response);
                                                            },
                                                            focus: function () {
                                                                // prevent value inserted on focus
                                                                return false;
                                                            },
                                                            select: function (event, ui) {
                                                                var terms = split(this.value);
                                                                if (terms.length <= 1) {
                                                                    // remove the current input
                                                                    terms.pop();
                                                                    // add the selected item
                                                                    terms.push(ui.item.value);
                                                                    // add placeholder to get the comma-and-space at the end
                                                                    terms.push("");
                                                                    this.value = terms.join(", ");
                                                                    return false;
                                                                } else {
                                                                    var last = terms.pop();
                                                                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                                                                    $(this).effect("highlight", {}, 1000);
                                                                    $(this).attr("style", "border: solid 1px red;");
                                                                    return false;
                                                                }
                                                            }
                                                        });
                                                /* first box*/
                                                /* location box*/
                                                $("#searchplace").bind("keydown", function (event) {
                                                    if (event.keyCode === $.ui.keyCode.TAB &&
                                                            $(this).autocomplete("instance").menu.active) {
                                                        event.preventDefault();
                                                    }
                                                })
                                                        .autocomplete({
                                                            minLength: 1,
                                                            source: function (request, response) {
                                                                // delegate back to autocomplete, but extract the last term
                                                                $.getJSON(base_url + "business_profile/ajax_location_data", {term: extractLast(request.term)}, response);
                                                            },
                                                            focus: function () {
                                                                // prevent value inserted on focus
                                                                return false;
                                                            },
                                                            select: function (event, ui) {
                                                                var terms = split(this.value);
                                                                if (terms.length <= 1) {
                                                                    // remove the current input
                                                                    terms.pop();
                                                                    // add the selected item
                                                                    terms.push(ui.item.value);
                                                                    // add placeholder to get the comma-and-space at the end
                                                                    terms.push("");
                                                                    this.value = terms.join(", ");
                                                                    return false;
                                                                } else {
                                                                    var last = terms.pop();
                                                                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                                                                    $(this).effect("highlight", {}, 1000);
                                                                    $(this).attr("style", "border: solid 1px red;");
                                                                    return false;
                                                                }
                                                            }
                                                        });
                                                /* location box*/
                                            });
                    </script>
                    </body>
                    </html>
