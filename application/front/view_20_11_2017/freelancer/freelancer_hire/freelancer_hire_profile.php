<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/freelancer-hire.css?ver=' . time()); ?>">
    </head>
    <body class="page-container-bg-solid page-boxed pushmenu-push">
        <?php echo $header; ?>
        <?php
        $returnpage = $_GET['page'];
        if ($returnpage == 'freelancer_post') {
            echo $freelancer_post_header2_border;
        } else {
            echo $freelancer_hire_header2_border;
        }
        ?>
        <section class="custom-row">
            <div class="container" id="paddingtop_fixed">
                <div class="row" id="row1" style="display:none;">
                    <div class="col-md-12 text-center">
                        <div id="upload-demo" ></div>
                    </div>
                    <div class="col-md-12 cover-pic" >
                        <button class="btn btn-success  cancel-result" onclick="" ><?php echo $this->lang->line("cancel"); ?></button>
                        <button class="btn btn-success set-btn upload-result "><?php echo $this->lang->line("save"); ?></button>
                        <div id="message1" style="display:none;">
                            <div id="floatBarsG">
                                <div id="floatBarsG_1" class="floatBarsG"></div>
                                <div id="floatBarsG_2" class="floatBarsG"></div>
                                <div id="floatBarsG_3" class="floatBarsG"></div>
                                <div id="floatBarsG_4" class="floatBarsG"></div>
                                <div id="floatBarsG_5" class="floatBarsG"></div>
                                <div id="floatBarsG_6" class="floatBarsG"></div>
                                <div id="floatBarsG_7" class="floatBarsG"></div>
                                <div id="floatBarsG_8" class="floatBarsG"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12"  style="visibility: hidden; ">
                        <div id="upload-demo-i" ></div>
                    </div>
                </div>
                <div class="">
                    <div class="" id="row2">
                        <?php
                        $userid = $this->session->userdata('aileenuser');
                        if ($this->uri->segment(3) == $userid) {
                            $user_id = $userid;
                        } elseif ($this->uri->segment(3) == "") {
                            $user_id = $userid;
                        } else {
                            $user_id = $this->uri->segment(3);
                        }
                        $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                        $image = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        $image_ori = $image[0]['profile_background'];
                        if ($image_ori) {
                            ?>
                            <img src="<?php echo FREE_HIRE_BG_MAIN_UPLOAD_URL . $image[0]['profile_background']; ?>" name="image_src" id="image_src" / >
                            <?php
                        } else {
                            ?>
                                 <div class="bg-images no-cover-upload">
                                <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" />
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="container tablate-container  art-profile">    

                <?php if ($returnpage == '' && $freelancerhiredata[0]['user_id'] == $userid) { ?>
                    <div class="upload-img">
                        <label class="cameraButton"><span class="tooltiptext"><?php echo $this->lang->line("upload_cover_photo"); ?></span><i class="fa fa-camera" aria-hidden="true"></i>
                            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
                        </label>
                    </div>
                <?php } ?>



                <div class="profile-photo">
                    <div class="profile-pho">
                        <div class="user-pic padd_img">
                            <?php
                            $fname = $freelancerhiredata[0]['fullname'];
                            $lname = $freelancerhiredata[0]['username'];
                            $sub_fname = substr($fname, 0, 1);
                            $sub_lname = substr($lname, 0, 1);
                            if ($freelancerhiredata[0]['freelancer_hire_user_image']) {
                                if (IMAGEPATHFROM == 'upload') {
                                    if (!file_exists($this->config->item('free_hire_profile_main_upload_path') . $freelancerhiredata[0]['freelancer_hire_user_image'])) {
                                        ?>
                                        <div class="post-img-user">
                                            <?php echo ucfirst(strtolower($sub_fname)) . ucfirst(strtolower($sub_lname)); ?>
                                        </div>
                                    <?php } else { ?>
                                        <img src="<?php echo FREE_HIRE_PROFILE_MAIN_UPLOAD_URL . $freelancerhiredata[0]['freelancer_hire_user_image']; ?>" alt="" >
                                        <?php
                                    }
                                } else {
                                    $filename = $this->config->item('free_hire_profile_main_upload_path') . $freelancerhiredata[0]['freelancer_hire_user_image'];
                                    $s3 = new S3(awsAccessKey, awsSecretKey);
                                    $this->data['info'] = $info = $s3->getObjectInfo(bucket, $filename);
                                    if ($info) {
                                        ?>
                                        <img src="<?php echo FREE_HIRE_PROFILE_MAIN_UPLOAD_URL . $freelancerhiredata[0]['freelancer_hire_user_image']; ?>" alt="" >
                                    <?php } else {
                                        ?>
                                        <div class="post-img-user">
                                            <?php echo ucfirst(strtolower($sub_fname)) . ucfirst(strtolower($sub_lname)); ?>
                                        </div>
                                        <?php
                                    }
                                }
                            } else {
                                ?>
                                <div class="post-img-user">
                                    <?php echo ucfirst(strtolower($sub_fname)) . ucfirst(strtolower($sub_lname)); ?>
                                </div>
                            <?php } ?>
                            <?php if ($returnpage == '' && $freelancerhiredata[0]['user_id'] == $userid) { ?>
                                <a href="javascript:void(0);"  class="cusome_upload" onclick="updateprofilepopup();"><img  src="<?php echo base_url('assets/img/cam.png'); ?>"><?php echo $this->lang->line("update_profile_picture"); ?></a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="job-menu-profile mob-block">
                        <a href="javascript:void(0);">
                            <h3> <?php echo ucwords($freehiredata[0]['fullname']) . ' ' . ucwords($freelancerhiredata[0]['username']); ?></h3>
                        </a>
                        <div class="profile-text">

                            <?php
                            if ($returnpage == '' && $freelancerhiredata[0]['user_id'] == $userid) {
                                if ($freelancerhiredata[0]['designation'] == '') {
                                    ?>
                                    <a id="designation" class="designation" title="Designation"><?php echo $this->lang->line("designation"); ?></a>

                                <?php } else { ?> 
                                    <a id="designation" class="designation" title="<?php echo ucwords($freelancerhiredata[0]['designation']); ?>"><?php echo ucwords($freelancerhiredata[0]['designation']); ?></a>
                                    <?php
                                }
                            } else {
                                if ($freelancerhiredata[0]['designation'] == '') {
                                    ?>
                                    <?php echo $this->lang->line("designation"); ?>
                                <?php } else {
                                    ?>
                                    <a id="designation" class="designation" title="<?php echo ucwords($freelancerhiredata[0]['designation']); ?>"><?php echo ucwords($freelancerhiredata[0]['designation']); ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                    </div>

                    <div class="profile-main-rec-box-menu profile-box-art col-md-12 padding_les">
                        <div class=" right-side-menu art-side-menu padding_less_right  right-menu-jr">  
                            <?php
                            $userid = $this->session->userdata('aileenuser');
                            if ($freelancerhiredata[0]['user_id'] == $userid) {
                                ?>     
                                <ul class="current-user pro-fw">

                                <?php } else { ?>
                                    <ul class="pro-fw4">
                                    <?php } ?>  
                                    <li <?php if (($this->uri->segment(1) == 'freelancer-hire') && ($this->uri->segment(2) == 'employer-details')) { ?> class="active" <?php } ?>>
                                        <?php if ($returnpage == 'freelancer_post') { ?><a title="Employer Details" href="<?php echo base_url('freelancer-hire/employer-details/' . $this->uri->segment(3) . '?page=freelancer_post'); ?>"><?php echo $this->lang->line("employer_details"); ?></a> <?php } else { ?> <a title="Employer Details" href="<?php echo base_url('freelancer-hire/employer-details'); ?>"><?php echo $this->lang->line("employer_details"); ?></a> <?php } ?>
                                    </li>
                                    <li <?php if (($this->uri->segment(1) == 'freelancer-hire') && ($this->uri->segment(2) == 'freelancer-save')) { ?> class="active" <?php } ?>> 
                                        <?php if ($returnpage == 'freelancer_post') { ?><a title="Projects"  href="<?php echo base_url('freelancer-hire/projects/' . $this->uri->segment(3) . '?page=freelancer_post'); ?>"><?php echo $this->lang->line("Projects"); ?></a><?php } else { ?><a title="Projects" href="<?php echo base_url('freelancer-hire/projects'); ?>"><?php echo $this->lang->line("Projects"); ?></a><?php } ?>
                                    </li>
                                    <?php
                                    if (($this->uri->segment(1) == 'freelancer-hire') && ($this->uri->segment(2) == 'projects' || $this->uri->segment(2) == 'employer-details' || $this->uri->segment(2) == 'add-projects' || $this->uri->segment(2) == 'freelancer-save') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) {
                                        ?>
                                        <li <?php if (($this->uri->segment(1) == 'freelancer-hire') && ($this->uri->segment(2) == 'freelancer-save')) { ?> class="active" <?php } ?>><a title="Saved Freelancer" href="<?php echo base_url('freelancer-hire/freelancer-save'); ?>"><?php echo $this->lang->line("saved_freelancer"); ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>                          
                                <?php
                                $userid = $this->session->userdata('aileenuser');
                                if ($userid != $this->uri->segment(3)) {
                                    if ($this->uri->segment(3) != "") {
                                        if (is_numeric($this->uri->segment(3))) {
                                            $id = $this->uri->segment(3);
                                        } else {
                                            $id = $this->db->get_where('freelancer_hire_reg', array('freelancer_hire_slug' => $this->uri->segment(3), 'status' => 1))->row()->user_id;
                                        }
                                        ?>
                                        <div class="flw_msg_btn fr">
                                            <ul> <li>
                                                    <?php
                                                    $returnpage = $_GET['page'];
                                                    if ($returnpage == 'freelancer_post') {
                                                        ?>
                                                        <a href="<?php echo base_url('chat/abc/4/3/' . $id); ?>"><?php echo $this->lang->line("message"); ?></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url('chat/abc/3/4/' . $id); ?>"><?php echo $this->lang->line("message"); ?></a>
                                                    <?php }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <?php if ($returnpage == '' && $freelancerhiredata[0]['user_id'] == $userid) { ?>
                    <div  class="add-post-button mob-block">
                        <a class="btn btn-3 btn-3b" href="<?php echo base_url('freelancer-hire/add-projects'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line("post_project"); ?></a>

                    </div>
                <?php } ?>
                <div class="middle-part">          
                    <div class="job-menu-profile mob-none pt20">
                        <a href="javascript:void(0);">
                            <h3> <?php echo ucwords($freelancerhiredata[0]['fullname']) . ' ' . ucwords($freelancerhiredata[0]['username']); ?></h3>
                        </a>
                        <div class="profile-text">

                            <?php
                            if ($returnpage == '' && $freelancerhiredata[0]['user_id'] == $userid) {
                                if ($freelancerhiredata[0]['designation'] == '') {
                                    ?>
                                    <a id="designation" class="designation" title="Designation"><?php echo $this->lang->line("designation"); ?></a>

                                <?php } else { ?> 
                                    <a id="designation" class="designation" title="<?php echo ucwords($freelancerhiredata[0]['designation']); ?>"><?php echo ucwords($freelancerhiredata[0]['designation']); ?></a>
                                    <?php
                                }
                            } else {
                                if ($freelancerhiredata[0]['designation'] == '') {
                                    ?>
                                    <?php echo $this->lang->line("designation"); ?>
                                <?php } else {
                                    ?>
                                    <a   title=" <?php echo ucwords($freelancerhiredata[0]['designation']); ?>">
                                        <?php echo ucwords($freelancerhiredata[0]['designation']); ?> </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div  class="add-post-button">
                            <?php if ($returnpage == '' && $freelancerhiredata[0]['user_id'] == $userid) { ?>
                                <a class="btn btn-3 btn-3b" href="<?php echo base_url('freelancer-hire/add-projects'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line("post_project"); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 mob-clear">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3><?php echo $this->lang->line("employer_details"); ?></h3>
                                <?php

                                function text2link($text) {
                                    $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
                                    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
                                    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
                                    return $text;
                                }
                                ?>                              
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                        <div class="profile-job-post-detail clearfix">
                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
                                                            <li> <p class="details_all_tital "> <?php echo $this->lang->line("basic_info"); ?></p> </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <li> <b><?php echo $this->lang->line("name"); ?></b> <span> <?php echo $freelancerhiredata[0]['fullname'] . ' ' . $freelancerhiredata[0]['username']; ?> </span>
                                                        </li>

                                                        <li> <b><?php echo $this->lang->line("email"); ?> </b><span> <?php echo $freelancerhiredata[0]['email']; ?></span>
                                                        </li>



                                                        <?php
                                                        if ($returnpage == 'freelancer_post') {
                                                            if ($freelancerhiredata['skyupid']) {
                                                                ?>
                                                                <li> <b><?php echo $this->lang->line("skype_id"); ?></b> <span> <?php echo $freelancerhiredata[0]['skyupid']; ?> </span>
                                                                </li> 
                                                                <?php
                                                            } else {
                                                                echo "";
                                                            }
                                                        } else {
                                                            if ($freelancerhiredata[0]['skyupid']) {
                                                                ?>
                                                                <li> <b><?php echo $this->lang->line("skype_id"); ?></b> <span> <?php echo $freelancerhiredata[0]['skyupid']; ?> </span>
                                                                </li> 
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <li><b><?php echo $this->lang->line("skype_id"); ?></b> <span>
                                                                        <?php echo PROFILENA; ?></span>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($returnpage == 'freelancer_post') {
                                                            if ($freelancerhiredata[0]['phone']) {
                                                                ?>
                                                                <li><b><?php echo $this->lang->line("phone_number"); ?></b> <span><?php echo $freelancerhiredata[0]['phone']; ?></span> </li>
                                                                <?php
                                                            } else {
                                                                echo "";
                                                            }
                                                        } else {
                                                            if ($freelancerhiredata[0]['phone']) {
                                                                ?>
                                                                <li><b><?php echo $this->lang->line("phone_number"); ?></b> <span><?php echo $freelancerhiredata[0]['phone']; ?></span> </li>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <li><b><?php echo $this->lang->line("phone_number"); ?></b> <span>
                                                                        <?php echo PROFILENA; ?></span>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>


                                                    </ul>
                                                </div>
                                                <div class="profile-job-post-title clearfix">
                                                    <div class="profile-job-profile-button clearfix">
                                                        <div class="profile-job-details">
                                                            <ul>
                                                                <li> <p class="details_all_tital "><?php echo $this->lang->line("address"); ?></p> </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="profile-job-profile-menu">
                                                        <ul class="clearfix">
                                                            <li> <b><?php echo $this->lang->line("country"); ?></b> <span> <?php echo $this->db->get_where('countries', array('country_id' => $freelancerhiredata[0]['country']))->row()->country_name; ?> </span>
                                                            </li>

                                                            <li> <b><?php echo $this->lang->line("state"); ?></b><span><?php
                                                                    echo
                                                                    $this->db->get_where('states', array('state_id' => $freelancerhiredata[0]['state']))->row()->state_name;
                                                                    ?> </span>
                                                            </li>

                                                            <?php
                                                            if ($returnpage == 'freelancer_post') {
                                                                if ($freelancerhiredata[0]['city']) {
                                                                    ?>
                                                                    <li><b><?php echo $this->lang->line("city"); ?></b> <span><?php
                                                                            echo
                                                                            $this->db->get_where('cities', array('city_id' => $freelancerhiredata[0]['city']))->row()->city_name;
                                                                            ?></span> </li>
                                                                        <?php
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                } else {
                                                                    if ($freelancerhiredata[0]['city']) {
                                                                        ?>
                                                                    <li><b><?php echo $this->lang->line("city"); ?></b> <span><?php
                                                                            echo
                                                                            $this->db->get_where('cities', array('city_id' => $freelancerhiredata[0]['city']))->row()->city_name;
                                                                            ?></span> </li>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                    <li><b><?php echo $this->lang->line("city"); ?></b> <span>
                                                                            <?php echo PROFILENA; ?></span>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($returnpage == 'freelancer_post') {
                                                                if ($freelancerhiredata[0]['pincode']) {
                                                                    ?>
                                                                    <li> <b><?php echo $this->lang->line("pincode"); ?></b><span><?php echo $freelancerhiredata[0]['pincode']; ?></span>
                                                                    </li>
                                                                    <?php
                                                                } else {
                                                                    echo "";
                                                                }
                                                            } else {
                                                                if ($freelancerhiredata[0]['pincode']) {
                                                                    ?>
                                                                    <li> <b><?php echo $this->lang->line("pincode"); ?></b><span><?php echo $freelancerhiredata[0]['pincode']; ?></span>
                                                                    </li>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <li><b><?php echo $this->lang->line("pincode"); ?></b> <span>
                                                                            <?php echo PROFILENA; ?></span>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="profile-job-post-title clearfix">
                                                    <div class="profile-job-profile-button clearfix">
                                                        <div class="profile-job-details">
                                                            <ul>
                                                                <li><p class="details_all_tital "><?php echo $this->lang->line("professional_information"); ?></p></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="profile-job-profile-menu">
                                                        <ul class="clearfix">
                                                            <li> <b><?php echo $this->lang->line("professional_information"); ?> </b> <span>
                                                                    <?php if ($freelancerhiredata[0]['professional_info']) { ?>

                                                                        <pre>  <?php echo $this->common->make_links($freelancerhiredata[0]['professional_info']); ?> 
                                                                        </pre>
                                                                    <?php } else {
                                                                        echo PROFILENA;
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> 
                                                <div class="profile-job-post-title clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
<?php echo $login_footer ?>
<?php echo $footer; ?>
        <!-- model for popup start -->
        <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
                    <div class="modal-body">
                        <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                        <span class="mes"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- model for popup -->
        <!-- Bid-modal-2  -->
        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                    <div class="modal-body">
                        <span class="mes">
                            <div id="popup-form">
                                <div class="fw" id="profi_loader"  style="display:none;" style="text-align:center;" ><img src="<?php echo base_url('assets/images/loader.gif?ver=' . time()) ?>" /></div>
                                <form id ="userimage" name ="userimage" class ="clearfix" enctype="multipart/form-data" method="post">
                                    <div class="fw">
                                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="upload-one">
                                    </div>
                                    <div class="col-md-7 text-center">
                                        <div id="upload-demo-one" style="width:350px; display: none"></div>
                                    </div>
<!--<input type="submit" name="profilepicsubmit" id="upload-result-one" value="Save" >-->
                                    <input type="submit" class="upload-result-one" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
                                </form>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Model Popup Close -->

        <script  src="<?php echo base_url('assets/js/bootstrap.min.js?ver=' . time()); ?>"></script>
        <script  src="<?php echo base_url('assets/js/croppie.js?ver=' . time()); ?>"></script>
        <!--<script type="text/javascript" src="<?php //echo base_url('assets/js/jquery.validate.js?ver='.time());            ?>">-->
        <!--</script>-->
        <script  type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js?ver=' . time()); ?>"></script>
        <script>
                                var base_url = '<?php echo base_url(); ?>';
        </script>
        <script  type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-hire/freelancer_hire_profile.js?ver=' . time()); ?>"></script>
        <script  type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-hire/freelancer_hire_common.js?ver=' . time()); ?>"></script>
    </body>
</html>